<!-- NAV -->
<div class="nav container">
    <a href="/" class="logo">
        Snack<span>Time</span>
    </a>
    <!-- Search Box -->
     <form action="{{route('filter.category')}}" >
    <div class="search-box">
        <input type="search" name="search" id="search-input" placeholder="Search Movie">
        <i name="submit" class='bx bx-search'></i>
    </div>
    </form>
    <!-- User -->
    {{-- <a href="#" class="user">
        <img src="{{URL::asset('assets/images/avatar-img.png')}}" alt="user" class="user-img">
    </a> --}}

    <!-- NavBar -->
    <div class="navbar">
        <a href="/" class="nav-link">
            <i class='bx bx-home'></i>
            <span class="nav-link-title">Home</span>
        </a>
        <a href="#popular" class="nav-link">
            <i class='bx bxs-hot'></i>
            <span class="nav-link-title">Trending</span>
        </a>
        <a href="#explorer" class="nav-link">
            <i class='bx bx-compass'></i>
            <span class="nav-link-title">Explore</span>
        </a>
        <a href="#movies" class="nav-link">
            <i class='bx bx-tv'></i>
            <span class="nav-link-title">Movies</span>
        </a>
        <a href="#favorites" class="nav-link">
            <i class='bx bx-heart'></i>
            <span class="nav-link-title">Favorites</span>
        </a>

        <div class="dropdown" id="category-bnt" onclick="changeDisplay()">
            <div class="nav-link">
            <i class="bx bx-category"></i>
            <span class="nav-link-title">Category</span>
            <div class="dropdown-content" id="category-content">
                <div class="dropdown-body">
                    @foreach($categories as $category)
                    <a name="category" href="{{ route('filter.category', ['category' => $category->name]) }}">{{$category->name}}</a>
                    @endforeach
                </div>
            </div>
            </div>
        </div>

    </div>
</div>
