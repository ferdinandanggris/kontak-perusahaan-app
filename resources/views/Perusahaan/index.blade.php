
@extends('layouts.main')
@section('container')
<div class="container">
  <div class="d-flex justify-content-between">
      <h5 class="mt-3">Perusahaan</h5>
      <div class="text-end">
          <a href="/perusahaan/create" class="btn btn-primary btn-sm mt-3"><i class="bi bi-plus-lg text-white"></i> Tambah Perusahaan</a>
      </div>
  </div>
  @if (session('success'))
  <div class="row my-2 mx-1">
      {{-- <div class="col-lg-8"> --}}
  <div class="mb-0 alert alert-success alert-dismissible fade show" role="alert">
      {{session('success')}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  {{-- </div> --}}
</div>
  @endif
  <div class="card bg-white mt-3 shadow-lg bg-white">
      <div class="card-body">
          <form action="/perusahaan" method="get">
              <div class="row">
                  <div class="col-md-2 col-sm-4">
                      <div class="row g-3 align-items-center">
                          <div class="col-auto">
                            <input type="text" id="nama" placeholder="Nama Perusahaan" name="nama" value="{{ app('request')->nama }}" class="form-control form-control-sm">
                          </div>
                        </div>
                      </div>   
                  <div class="col-md-3 col-sm-4">
                      <select class="form-select form-select-sm" name="status_dihubungi" aria-label="Default select example">
                        <option {{app('request')->status_dihubungi == 1 ? 'selected' : ''}} value="1">Sudah dihubungi</option>
                        <option {{app('request')->status_dihubungi == 0 ? 'selected' : ''}} value="0">Belum dihubungi</option>
                        <option {{(app('request')->status_dihubungi == -1 || app('request')->status_dihubungi == null) ? 'selected' : ''}} value="-1">Semua</option>
                      </select>
                  </div>
                  <div class="col-md-3 col-sm-3">
                      <div class="search">
                          <button type="submit" class="btn btn-sm btn-outline-primary"><i class="bi bi-search"></i> Cari</button>
                        </div>
                  </div>
              </div>
              </form>
 
          <div class="table-responsive mt-4">
          <table class="table table-hover">
              <thead class="bg-light ">
                <tr>
                  <th scope="col" style="vertical-align: middle">#</th>
                  <th scope="col" style="vertical-align: middle">Nama Perusahaan</th>
                  <th scope="col" style="vertical-align: middle">Telepon</th>
                  <th scope="col" style="vertical-align: middle">Status Dihubungi 
                  </th>
               
                  <th scope="col" width="120"></th>
                </tr>
              </thead>
              <tbody>
                
                  @foreach ($perusahaan as $i => $val)
                  <tr>
                      <td style="vertical-align: middle">{{$perusahaan->firstItem() + $i }}</td>
                      <td style="vertical-align: middle">{{$val->nama}}</td>
                      <td style="vertical-align: middle">{{$val->telepon}}</td>
                      <td style="vertical-align: middle">{{($val->status_dihubungi) ? 'Sudah dihubungi' : 'Belum dihubungi'}} 
                          <form action="/perusahaan/editStatus/{{$val->id}}" method="post" class="d-inline">@method('put') @csrf<button type="submit" class="badge {{($val->status_dihubungi) ? 'bg-primary' : 'bg-danger'}} border-0"  
                              data-bs-toggle="tooltip" data-bs-placement="top"
                              data-bs-custom-class="custom-tooltip"
                              data-bs-title="Ubah status">
                              <i class="bi bi-arrow-repeat"></i></button>
                          </form>
                      </td>
                      {{-- <td class="text-break" style="width: 15rem;">{{$val->deskripsi}}</td> --}}
                      <td>
                          {{-- <a href="/perusahaan/{{$val->id}}" class="badge bg-info mr-2"><i class="bi bi-eye"></i></a> --}}
                          <a href="/perusahaan/{{$val->id}}" class="badge bg-info mr-2"><i class="bi bi-eye"></i></a>
                          <a href="/perusahaan/{{$val->id}}/edit" class="badge bg-warning mr-2"><i class="bi bi-pencil-square"></i></a>
                          <form action="/perusahaan/{{$val->id}}" class="d-inline" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="badge border-0 bg-danger" onclick="return confirm('Apakah anda yakin ingin menghapus?')"><i class="bi bi-trash"></i></button>
                        </form>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
            
            <div class="d-flex justify-content-end">
              {!! $perusahaan->links() !!}
            </div>
          </div>
          </div>
      </div>


@endsection