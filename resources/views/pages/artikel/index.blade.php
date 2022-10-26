@extends('layouts.main')

@section('title', 'Artikel')

@section('content')

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row g-5">

                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

                    <div class="row gy-5 posts-list">

                        @forelse ($dataArtikel as $artikel)
                            <div class="col-lg-6">
                                <article class="d-flex flex-column">

                                    <div class="post-img">
                                        <img src="{{ Storage::url('public/artikel/') . $artikel->foto }}" alt=""
                                            class="img-fluid">
                                    </div>

                                    <h2 class="title">
                                        <a href="{{ route('artikel.show', $artikel->slug) }}">{{ $artikel->judul }}</a>
                                    </h2>

                                    <div class="meta-top">
                                        <ul>
                                            <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                    href="blog-details.html">{{ $artikel->user->name }}</a></li>
                                            <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                    href="blog-details.html"><time
                                                        datetime="2022-01-01">{{ $artikel->created_at }}</time></a></li>
                                            <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a
                                                    href="blog-details.html">12 Comments</a></li>
                                        </ul>
                                    </div>

                                    <div class="content">
                                        {!! $artikel->isi !!}
                                    </div>

                                    <div class="read-more mt-auto align-self-end">
                                        <a href="{{ route('artikel.show', $artikel->slug) }}">Read More <i
                                                class="bi bi-arrow-right"></i></a>
                                    </div>

                                </article>
                            </div><!-- End post list item -->
                        @empty
                            <p class="text-muted text-center">Tidak ada data!</p>
                        @endforelse

                    </div><!-- End blog posts list -->

                    <div class="blog-pagination">
                        <ul class="justify-content-center">
                            <li><a href="#">1</a></li>
                            <li class="active"><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                        </ul>
                    </div><!-- End blog pagination -->

                </div>

                @include('includes.sidebar')
            </div>

        </div>
    </section><!-- End Blog Section -->
@endsection
