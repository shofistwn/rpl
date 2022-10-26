@extends('layouts.main')

@section('title', 'Edit Guru')

@section('content')
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container position-relative" data-aos="fade-up">

            <div class="row gy-4 d-flex justify-content-center">

                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="250">

                    <form action="{{ route('guru.update', $guru) }}" method="post" role="form" class="php-email-form"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mt-3">
                            <div class="text-center mb-3">
                                <img src="{{ Storage::url('public/guru/') . $guru->foto }}" alt=""
                                    class="img-fluid w-50">
                            </div>

                            <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto"
                                id="foto">

                            @error('foto')
                                <div class="alert alert-danger alert-dismissible fade show mt-2 mb-0" role="alert">
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                                id="nama" placeholder="Nama Lengkap" value="{{ old('nama', $guru->nama) }}" required>

                            @error('nama')
                                <div class="alert alert-danger alert-dismissible fade show mt-2 mb-0" role="alert">
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <select class="form-control @error('komli') is-invalid @enderror" name="komli" id="komli"
                                required>
                                <option value="" selected>Pilih Kompetensi Keahlihan:</option>
                                <option {{ old('komli', $guru->komli) == 'Basis Data' ? 'selected' : '' }}
                                    value="Basis Data">Basis Data</option>
                                <option {{ old('komli', $guru->komli) == 'Design Grafis' ? 'selected' : '' }}
                                    value="Design Grafis">Design Grafis</option>
                                <option
                                    {{ old('komli', $guru->komli) == 'Pemrogaman Berorientasi Objek' ? 'selected' : '' }}
                                    value="Pemrogaman Berorientasi Objek">Pemrogaman Berorientasi Objek</option>
                                <option
                                    {{ old('komli', $guru->komli) == 'Pemrograman Web Dan Perangkat Bergerak' ? 'selected' : '' }}
                                    value="Pemrograman Web Dan Perangkat Bergerak">Pemrograman Web Dan Perangkat Bergerak
                                </option>
                                <option
                                    {{ old('komli', $guru->komli) == 'Produk Kreatif dan Kewirausahaan' ? 'selected' : '' }}
                                    value="Produk Kreatif dan Kewirausahaan">Produk Kreatif dan Kewirausahaan</option>
                            </select>

                            @error('komli')
                                <div class="alert alert-danger alert-dismissible fade show mt-2 mb-0" role="alert">
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <input type="text" class="form-control @error('telepon') is-invalid @enderror" name="telepon"
                                id="telepon" placeholder="Telepon" value="{{ old('telepon', $guru->telepon) }}" required>

                            @error('telepon')
                                <div class="alert alert-danger alert-dismissible fade show mt-2 mb-0" role="alert">
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="5" placeholder="Alamat"
                                required>{{ old('alamat', $guru->alamat) }}</textarea>

                            @error('alamat')
                                <div class="alert alert-danger alert-dismissible fade show mt-2 mb-0" role="alert">
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @enderror
                        </div>

                        <div class="text-center mt-3">
                            <a href="{{ route('guru.index') }}" class="btn-back me-2">Kembali</a>
                            <button type="submit">Simpan</button>
                        </div>
                    </form>

                </div><!-- End Contact Form -->

            </div>

        </div>
    </section><!-- End Contact Section -->
@endsection
