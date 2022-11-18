@extends('layouts.main')
@section('container')
    <div class="container">
        <div class="mt-3">
            <h5 class="text-center">Tambah Perusahaan</h5>
            <div class="card w-100 m-auto" style="max-width: 461px">
                <div class="card-body">
                    <div class="row">
                        <form action="/perusahaan" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control @error('nama') is-invalid  @enderror" name="nama" value="{{ old('nama')}}" id="nama">
                                        @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                      </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="telepon" class="form-label">Telepon</label>
                                        <input type="number" class="form-control @error('telepon') is-invalid  @enderror" id="telepon" value="{{old('telepon')}}" name="telepon">
                                        @error('telepon')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                      </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="status_dihubungi" class="form-label">Status dihubungi</label>
                                <select class="form-select form-select-sm @error('status_dihubungi') is-invalid  @enderror" name="status_dihubungi" aria-label="Default select example">
                                    @if (1 == old('status_dihubungi'))
                                    <option value="1" selected>Sudah dihubungi</option>
                                    <option value="0">Belum dihubungi</option>
                                    @else
                                    <option value="1">Sudah dihubungi</option>
                                    <option value="0" selected>Belum dihubungi</option>
                                    @endif
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea type="text" class="form-control @error('deskripsi') is-invalid  @enderror" name="deskripsi" name="deskripsi" id="deskripsi">{{old('deskripsi')}}</textarea>
                                @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
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