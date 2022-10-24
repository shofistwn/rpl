@extends('layouts.main')

@section('title', 'Edit Artikel ' . $artikel->judul)

@section('content')
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container position-relative" data-aos="fade-up">

            <div class="row gy-4 d-flex justify-content-center">

                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="250">

                    <form action="{{ route('artikel.update', $artikel) }}" method="post" role="form"
                        class="php-email-form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mt-3">
                            <div class="text-center mb-3">
                                <img src="{{ Storage::url('public/artikel/') . $artikel->foto }}" alt=""
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
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul"
                                id="judul" placeholder="Judul" value="{{ old('judul', $artikel->judul) }}" required>

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
                                name="kategori" id="kategori" placeholder="Kategori"
                                value="{{ old('kategori', $artikel->kategori) }}" required>

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
                            <a href="{{ route('guru.index') }}" class="btn-back me-2">Kembali</a>
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
            $('#summernote').summernote();
            var isi = {!! json_encode($artikel->isi) !!};
            $('#summernote').summernote('code', isi);
        });
    </script>
@endpush
