@extends('layouts.main')
@section('container')
    <div class="container">
        <div class="mt-3">
            <h5 class="text-center">Edit Perusahaan</h5>
            <div class="card w-100 m-auto" style="max-width: 461px">
                <div class="card-body">
                    <div class="row">
                        <form action="/perusahaan/{{$perusahaan->id}}" method="post">
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control @error('nama') is-invalid  @enderror" id="nama" name="nama" value="{{old('nama',$perusahaan->nama)}}">
                                        @error('nama')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                      </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="pic" class="form-label">PIC</label>
                                        <input type="text" class="form-control @error('pic') is-invalid  @enderror" name="pic" value="{{old('pic',$perusahaan->pic)}}" id="pic">
                                        @error('pic')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                      </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="telepon" class="form-label">Telepon</label>
                                        <input type="number" class="form-control @error('telepon') is-invalid  @enderror" name="telepon" value="{{old('telepon',$perusahaan->telepon)}}" id="telepon">
                                        @error('telepon')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                      </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="status_dihubungi" class="form-label">Status dihubungi</label>
                                        <select class="form-select form-select-sm" aria-label="Default select example" name="status_dihubungi" value="{{old('status_dihubungi',$perusahaan->status_dihubungi)}}">
                                            @if (1 == old('status_dihubungi',$perusahaan->status_dihubungi))
                                            <option value="1" selected>Sudah dihubungi</option>
                                            <option value="0">Belum dihubungi</option>
                                            @else
                                            <option value="1">Sudah dihubungi</option>
                                            <option value="0" selected>Belum dihubungi</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea type="text" class="form-control @error('deskripsi') is-invalid  @enderror" id="deskripsi" name="deskripsi">{{old('deskripsi',$perusahaan->deskripsi)}}</textarea>
                                @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                              </div>
                              <div class="text-end">
                                  <a href="/perusahaan" class="btn btn-info btn-sm text-white"><i class="bi bi-arrow-left-short text-white"></i> Kembali</a>
                                  <button type="submit" class="btn btn-primary btn-sm">Simpan <i class="bi bi-folder-check"></i></button>
                              </div>
                        </form>
                            
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection