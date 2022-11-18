@extends('layouts.main')
@section('container')
    <div class="container">
        <div class="mt-3">
            <div class="card w-50 m-auto">
                <div class="card-body">
                    <div class="row">
                            <h5 class="text-center">{{$perusahaan->nama}}</h5>
                            <p class="text-center">{{$perusahaan->telepon}}- <span class="{{($perusahaan->status_dihubungi)? 'badge badge-sm bg-primary' : 'badge badge-sm bg-danger'}}">{{($perusahaan->status_dihubungi)? 'Sudah dihubungi' : 'Belum dihubungi'}}</span></p>
                            <p class="text-justify">{{$perusahaan->deskripsi}}</p>
                            
                    </div>
                    <a href="/perusahaan" class="btn btn-info btn-sm text-white"><i class="bi bi-arrow-left-short text-white"></i> Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection