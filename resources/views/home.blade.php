@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session()->has('success'))
                <div class="alert alert-success">
                {{ session()->get('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">Data Bank</div>

                    <div class="row">
                        <div class="card-body">
                            <div class="col-md-12">
                                <table class="table table-bordred">
                                    <tr>
                                        <th>Email</th>
                                        <th>Bank</th>
                                        <th>Logo</th>
                                        <th>Ket</th>
                                    </tr>
                                    @foreach($data as $row)
                                    <tr>
                                        <td>{{ $row->contact_email }}</td>
                                        <td>{{ $row->bank_name }}</td>  
                                        <td>
                                            <img src="/fetch_image/{{ $row->id }}"  class="img-thumbnail" width="75" />
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" href="/delete/{{ $row->id }}">Hapus</a>
                                            <a class="btn btn-primary" href="/edit/{{ $row->id }}">Ubah</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
