@extends('layouts.app')

@section('title', 'Edit Guru')

@section('content')
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container position-relative" data-aos="fade-up">

            <div class="row gy-4 d-flex justify-content-center">

                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="250">

                    <form action="{{ route('guru.update', $guru->id) }}" method="post" role="form" class="php-email-form"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <img src="{{ Storage::url('public/assets/img/guru') . '/' . $guru->foto }}"
                                    class="img-fluid rounded" alt="">
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                        name="foto" id="foto">
                                </div>
                            </div>

                            @error('foto')
                                <div class="alert alert-danger alert-dismissible fade show mt-2 mb-0" role="alert">
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control @error('foto') is-invalid @enderror" name="nama"
                                id="nama" placeholder="Nama Lengkap" value="{{ old('nama', $guru->nama) }}">

                            @error('nama')
                                <div class="alert alert-danger alert-dismissible fade show mt-2 mb-0" role="alert">
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <input type="email" class="form-control @error('foto') is-invalid @enderror" name="email"
                                id="email" placeholder="Email" value="{{ old('email', $guru->email) }}">

                            @error('email')
                                <div class="alert alert-danger alert-dismissible fade show mt-2 mb-0" role="alert">
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <input type="text" class="form-control @error('foto') is-invalid @enderror" name="telepon"
                                id="telepon" placeholder="Telepon" value="{{ old('telepon', $guru->telepon) }}">

                            @error('telepon')
                                <div class="alert alert-danger alert-dismissible fade show mt-2 mb-0" role="alert">
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <textarea class="form-control @error('foto') is-invalid @enderror" name="alamat" rows="5" placeholder="Alamat">{{ old('alamat', $guru->alamat) }}</textarea>

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
