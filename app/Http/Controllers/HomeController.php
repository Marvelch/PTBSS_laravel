<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\modelbank;
use Illuminate\Support\Facades\Response;
use Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    $data = modelbank::latest()->paginate(5);
    
    return view('home', compact('data'))
    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    function fetch_image($image_id)
        {
        $image = modelbank::findOrFail($image_id);

        $image_file = Image::make($image->logo);

        $response = Response::make($image_file->encode('jpeg'));

        $response->header('Content-Type', 'image/jpeg');

        return $response;
    }

    function delete($id)
    {
        $del = modelbank::where('id',$id)->delete();

        return redirect()->back()->with('success', 'Data Berhasil Terhapus !');
    }

    function edit($id)
    {
        $bank = modelbank::where('id',$id)->get();

        
        return view('Edit',compact('bank'));
    }

    function Update(Request $request)
    {
        $request->validate([
            'bank_name' => 'required|min:3',
            'logo' =>  'required|image|dimensions:max_width=100,max_height=100|mimes:jpg,png',
        ]);
        
        $image_file = $request->logo;

        $image = Image::make($image_file)->encode('jpg');

        $form_data = array(
            'contact_email' => $request->contact_email,
            'bank_name'  => $request->bank_name,
            'logo' => $image
           );
        
        $x = NULL;
        $z = NULL;
        $s = NULL;

        $form_null = array(
            'bank_name'  => $z,
            'logo' => $s
           );
        
        modelbank::where('id',3)->update($form_null);
        modelbank::where('id',3)->update($form_data);
      
        return redirect()->back()->with('success', 'Data Berhasil Tersimpan !');
    }
}
