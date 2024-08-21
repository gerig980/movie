@extends('partials.header')

<body>
    <!-- HEADER -->
    <header>
        @include('partials.navbar')
    </header>
    <!-- HOME -->
    {{-- <section class="home container" id="home">
        @if(!empty($posts))
        @foreach($posts as $post)
        @if($post->isBanner == 1 && $post->isPublished == 1)
        <img src="{{URL::asset($post->getFirstMediaUrl('posts'))}}" alt="#" class="home-img">
        <div class="home-text">

            <h1 class="home-title">{{$post->title}}</h1>
            <p>@foreach($post->tags as $tag)
                    {{$tag['name']}}
                    @endforeach</p>
            <a href="/movie/{{$post->id}}" class="watch-btn"><i class='bx bx-right-arrow'></i>
                <span>Watch Now</span>
            </a>
        </div>
    @endif
    @endforeach
    @endif
    </section> --}}
    <!-- HOME END -->

    <!-- POPULAR SECTION START-->
    <section class="popular container" id="popular">
        <!--HEADING-->
        <div class="heading">
            <h2 class="heading-title">Popular Movies</h2>
        </div>
        <!-- CONTENT -->
        <div class="popular-content swiper">
            <div class="splide" role="group">
                <div class="splide__track">
                    <ul class="splide__list" style="height: 400px">
                        @if(!empty($posts))
                        @foreach ($posts->sortByDesc('created_at')->take(5) as $post)
                        @if($post->isPublished == 1)
                        <li class="splide__slide">
                            <div class="movie-box">
                                <img src="{{$post->poster}}" alt="" class="movie-box-img">
                                <div class="box-text">
                                    <h2 class="movie-title">{{$post->title}}</h2>
                                    <span class="movie-type">
                                        @foreach($post->tags as $tag)
                                        {{$tag->name}}
                                        @endforeach
                                    </span>
                                    <a href="/movie/{{$post->id}}" class="watch-btn play-btn">
                                        <i class="bx bx-right-arrow"></i>
                                    </a>
                                </div>
                            </div>
                        </li>
                        @endif
                        @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--POPULAR SECTION END-->
    <!-- MOVIES SECTION START-->

    <section class="movies container" id="movies">
        <!--HEADING-->
        <div class="heading">
            <h2 class="heading-title">Movies And Shows</h2>
        </div>
        <!-- MOVIES CONTENT-->
        <div class="movies-content">
            <!--MOVIES BOX 1-->
            @if(!empty($posts))
            @foreach($posts as $post)
            @if($post->isPublished == 1)
            <div class="movie-box">
                <img src="{{$post->poster}}" alt="" class="movie-box-img">
                <div class="box-text">
                    <h2 class="movie-title">{{$post->title}}</h2>
                    <span class="movie-type">
                        {{$post->tag}}
                    </span>
                    <a href="/movie/{{$post->id}}" class="watch-btn play-btn">
                        <i class="bx bx-right-arrow"></i>
                    </a>
                </div>

            </div>
            @endif
            @endforeach
            @endif
        </div>
    </section>
    <!-- MOVIES SECTION END-->
    <!-- NEXT PAGE-->
    <div class="pagination-container">
    <ul class="pagination">
        @if ($posts->currentPage() > 1)
            <li class="page-item"><a class="page-link" href="{{ $posts->previousPageUrl() }}"><i class="fas fa-chevron-left"></i></a></li>
        @endif
        @for ($i = 1; $i <= $posts->lastPage(); $i++)
            <li class="page-item {{ ($i == $posts->currentPage()) ? 'active' : '' }}"><a class="page-link" href="{{ $posts->url($i) }}">{{ $i }}</a></li>
        @endfor
        @if ($posts->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $posts->nextPageUrl() }}"><i class="fas fa-chevron-right"></i></a></li>
        @endif
    </ul>
</div>

    <!--Copyright-->
    <div class="copyright">
        <p>&#169; SnackTime All Right Reserved</p>
    </div>

    <script>

        var categoryContent = document.getElementById('category-content');
        function changeDisplay(){
                if(categoryContent.classList.contains('active')){
                categoryContent.classList.remove('active');
                }else{
                categoryContent.classList.add('active');
                }

        }
    </script>

    <!-- <script src="/js/swiper-bundle.min.js"></script> -->
    <script src="
        https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js
        "></script>
    {{-- <script src=" https://cdn.jsdelivr.net/npm/swiper@9.1.1/swiper-bundle.min.js "></script> --}}
    <script src="{{URL::asset('assets/js/script.js')}}"></script>
</body>

</html>
