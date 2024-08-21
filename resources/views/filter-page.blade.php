@extends('partials.header')

<body>
    <!-- HEADER -->
    <header>
        @include('partials.navbar')

    </header>


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
