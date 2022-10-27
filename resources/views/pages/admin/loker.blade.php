@extends('layouts.dashboard')

@section('title', 'Guru')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
            <a href="{{ route('guru.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Tambah Guru</a>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data @yield('title')</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Kompetensi Keahlian</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Kompetensi Keahlian</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse ($dataLoker as $guru)
                                <tr>
                                    <td>
                                        <img class="img-profile rounded-circle w-25" src="{{ Storage::url('public/guru/') . $guru->foto }}">
                                    </td>
                                    <td><strong>{{ $guru->nama }}</strong></td>
                                    <td>{{ $guru->komli }}</td>
                                    <td>{{ $guru->telepon }}</td>
                                    <td>{{ $guru->alamat }}</td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('guru.destroy', $guru) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-primary mb-2"
                                                href="{{ route('guru.edit', $guru->id) }}">Edit</a>

                                            <button class="btn btn-danger" type="submit">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
