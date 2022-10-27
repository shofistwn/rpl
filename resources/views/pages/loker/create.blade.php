@extends('layouts.main')

@section('title', 'Buat Artikel')

@section('content')
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container position-relative" data-aos="fade-up">

            <div class="row gy-4 d-flex justify-content-center">

                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="250">

                    <form action="{{ route('artikel.store') }}" method="post" role="form" class="php-email-form"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mt-3">
                            <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto"
                                id="foto" required>

                            @error('foto')
                                <div class="alert alert-danger alert-dismissible fade show mt-2 mb-0" role="alert">
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul"
                                id="judul" placeholder="Judul" value="{{ old('judul') }}" required>

                            @error('judul')
                                <div class="alert alert-danger alert-dismissible fade show mt-2 mb-0" role="alert">
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <input type="text" class="form-control @error('kategori') is-invalid @enderror"
                                name="kategori" id="kategori" placeholder="Kategori" value="{{ old('kategori') }}"
                                required>

                            @error('kategori')
                                <div class="alert alert-danger alert-dismissible fade show mt-2 mb-0" role="alert">
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <textarea class="form-control @error('isi') is-invalid @enderror" name="isi" id="summernote"></textarea>

                            @error('isi')
                                <div class="alert alert-danger alert-dismissible fade show mt-2 mb-0" role="alert">
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @enderror
                        </div>

                        <div class="text-center mt-3">
                            <a href="{{ route('artikel.index') }}" class="btn-back me-2">Kembali</a>
                            <button type="submit">Simpan</button>
                        </div>
                    </form>

                </div><!-- End Contact Form -->
            </div>

        </div>
    </section><!-- End Contact Section -->
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 450,
                placeholder: 'Konten artikel',
            });
        });
    </script>
@endpush
