@extends('partials.header')


<body>
    <!-- HEADER -->
    <header>
        @include('partials.navbar')

    </header>
    <!-- Play Movie Container -->
    <div  class="play-container container">

         <video id="myvideo1"  controls style="width:100%">
            <source data-html5-video id="myvideo" src="{{$post[0]->url}}" type="video/mp4">

        </video>
        {{-- <iframe id="myiframe" height="90%" width="100%" src="{{$post[0]->url}}" frameborder="0"></iframe> --}}

</div>
         <div class="download">
        <h2 class="download-title">Other Links</h2>
       <div class="download-links">
{{--
<a id="link1" href="#" data-src="{{ $post[0]->url }}">Link 1</a>
<a id="link2" href="#" data-src="{{ $post[0]->url2 }}">Link 2</a>
<a id="link3" href="#" data-src="{{ $post[0]->url3 }}">Link 3</a>
<a id="link4" href="#" data-src="{{ $post[0]->url4 }}">Link 4</a> --}}

</div>
        {{-- </div> --}}
        {{-- <div class="play-text">
            <h2>{{$post[0]->title}}</h2>
            <!--Ratings-->
            <div class="rating">
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
            </div>
            <!-- Tags -->
            <div class="tags">
                @foreach ($post[0]->tags as $tag)
                    <span>{{$tag->name}}</span>

                @endforeach
            </div>
            <!--Trailer Button-->
            <a href="#" class="watch-btn">
                <i class='bx bx-right-arrow'></i>
                <span>Watch the trailer</span>
            </a>
        </div> --}}
        <!--Play Btn-->
        {{-- <i class='bx bx-right-arrow play-movie'></i> --}}
        <!-- Video Container -->
        {{-- <div class="video-container">
            <!-- Video-Box -->
            <div class="video-box">
                <video id="myvideo"  controls>
                <source data-html5-video id="myvideo" src="{{$post[0]->url}}" type="video/mp4">
                </video>
                <!-- Close Video Icon-->
                <i class='bx bx-x close-video'></i>
            </div>
        </div> --}}
    </div>
    <!-- About -->
    <div class="about-movie container">
        <h2 class="cast-heading">Genre</h2>
         <div class="cast" style="padding-bottom: 1rem">
            @foreach($post[0]->category as $category)
            <div class="cast-box">
                <span class="cast-title">{{$category->name}}</span>
            </div>@endforeach
        </div>
        <h2>{{$post[0]->title}}</h2>
        <p>{!!$post[0]->content!!}</p>
        <!-- Movie Cast-->
        <h2 class="cast-heading">Movie Cast</h2>
        <div class="cast">
            @foreach($post[0]->tags as $tag)
            <div class="cast-box">
                <span class="cast-title">{{$tag->name}}</span>
            </div>@endforeach
        </div>
    </div>
    <!-- Download -->
    {{-- <div class="download">
        <h2 class="download-title">Other Links</h2>
       <div class="download-links">
    <a id="link1" src="{{ $post[0]->url2 }}">Link 1</a>
    <a id="link2" src="{{ $post[0]->url3 }}">Link 2</a>
    <a id="link3" src="{{ $post[0]->url4 }}">Link 3</a>
</div> --}}
    </div>
    <!--Copyright-->
    <div class="copyright">
        <p>&#169; SnackTime All Right Reserved</p>
    </div>


    <script src="{{URL::asset('assets/js/playbutton.js')}}"></script>

<script>
  const video = document.getElementById('myvideo1');
  const videoSource = document.getElementById('myvideo');
  const iframe = document.getElementById('myiframe');
  const links = document.querySelectorAll('.download-links a');

  links.forEach(link => {
    link.addEventListener('click', event => {
      event.preventDefault();

      const newSrc = link.getAttribute('data-src');
      const newType = link.getAttribute('data-type');

      // Check if the browser supports the new video type
      const isVideoSupported = video.canPlayType(newType);

      // Update the video source URL and type, or fallback to the iframe
      if (isVideoSupported) {
        videoSource.setAttribute('src', newSrc);
        videoSource.setAttribute('type', newType);
        video.style.display = 'block';
        iframe.style.display = 'none';
        video.load();
        video.play();
      } else {
        iframe.setAttribute('src', newSrc);
        video.style.display = 'none';
        iframe.style.display = 'block';
      }
    });
  });

  video.addEventListener('play', function() {
    iframe.style.display = 'none';
  });
</script>
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

</body>

</html>
