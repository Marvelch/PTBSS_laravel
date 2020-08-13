<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\modelbank;
use Image;

class bankcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bank');
    }

    /**
     * Save bank_name, logo, contact_email ( unique )
     * 
     */

    public function simpandata(Request $request)
    {
        $request->validate([
            'bank_name' => 'required|min:3',
            'logo' =>  'required|image|dimensions:max_width=100,max_height=100|mimes:jpg,png',
            'contact_email' => 'required|unique:bank'
        ]);
        
        $image_file = $request->logo;

        $image = Image::make($image_file)->encode('jpg');

        $form_data = array(
            'contact_email' => $request->contact_email,
            'bank_name'  => $request->bank_name,
            'logo' => $image
           );
      
        modelbank::create($form_data);
      
        return redirect()->back()->with('success', 'Data Berhasil Tersimpan !');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
