@extends('layouts.app')

@section('title', 'Pengguna | KTP')

@section('content')
    <div class="pagetitle">
        <h1>Kartu Tanda Penduduk</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Kartu Tanda Penduduk</li>
        </ol>
        </nav>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="col-12 col-md-12 order-md-12 order-first">
                  <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                          <a type="button" class="btn btn-outline-primary"
                          href="">
                          Tambah Data
                          </a>
                      </li>
                    </ol>
                  </nav>
                  
                </div>
            </div>
            <div class="card-body shadow">
                <h5 class="card-title">Data Kartu Tanda Penduduk</h5>
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($akta as $data)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $data->nik }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>
                                    <form action="{{ route('akta.destroy', $data->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-outline-danger">
                                            <i class="ri-delete-bin-6-line"></i>
                                        </button>
                                    </form>
                                    <a href="{{ url('cetakpdf') }}" target="_blank" class="btn btn-danger">
                                        <i class="bi bi-file-earmark-pdf-fill"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection