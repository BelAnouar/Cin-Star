<header id="site-header" class="w3l-header fixed-top">
    <!--/nav-->
    <nav class="navbar navbar-expand-lg navbar-light fill px-lg-0 py-0 px-3">
        <div class="container">
            <h1>
                <a class="navbar-brand" href="/home">
                    <span class="fa fa-play icon-log" aria-hidden="true"></span>
                    CineStar
                </a>
            </h1>
            <!-- if logo is image enable this
      <a class="navbar-brand" href="#index.html">
       <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
      </a> -->
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <!-- <span class="navbar-toggler-icon"></span> -->
                <span class="fa icon-expand fa-bars"></span>
                <span class="fa icon-close fa-times"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    @hasrole('admin')
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Dashboard</a>
                        </li>
                    @endhasrole
                    <li class="nav-item">
                        <a class="nav-link" href="/genre">Genre</a>
                    </li>
                    @auth
                        <form action="{{ route('logout') }}">
                            @csrf
                            <button class="nav-link">Logout</button>
                        </form>
                    @else
                        <li class="nav-item">
                            <a class="nav-link active" href="/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register">SignUp</a>
                        </li>
                    @endauth
                </ul>

                <!--/search-right-->
                <!--/search-right-->
                <div class="search-right">
                    <a href="#search" class="btn search-hny mr-lg-3 mt-lg-0 mt-4" title="search">Search <span
                            class="fa fa-search ml-3" aria-hidden="true"></span></a>
                    <!-- search popup -->
                    <div id="search" class="pop-overlay">
                        <div class="popup">
                            <form action="#" method="post" class="search-box">
                                <input type="search" placeholder="Search your Keyword" name="search"
                                    required="required" autofocus="">
                                <button type="submit" class="btn"><span class="fa fa-search"
                                        aria-hidden="true"></span></button>
                            </form>
                            <div class="browse-items">
                                <h3 class="hny-title two mt-md-5 mt-4">Browse all:</h3>
                                <ul class="search-items">
                                    <li><a href="/genre">Action</a></li>
                                    <li><a href="/genre">Drama</a></li>
                                    <li><a href="/genre">Family</a></li>
                                    <li><a href="/genre">Thriller</a></li>
                                    <li><a href="/genre">Commedy</a></li>
                                    <li><a href="/genre">Romantic</a></li>
                                    <li><a href="/genre">Tv-Series</a></li>
                                    <li><a href="/genre">Horror</a></li>
                                    <li><a href="/genre">Action</a></li>
                                    <li><a href="/genre">Drama</a></li>
                                    <li><a href="/genre">Family</a></li>
                                    <li><a href="/genre">Thriller</a></li>
                                    <li><a href="/genre">Commedy</a></li>
                                    <li><a href="/genre">Romantic</a></li>
                                    <li><a href="/genre">Tv-Series</a></li>
                                    <li><a href="/genre">Horror</a></li>
                                </ul>
                            </div>
                        </div>
                        <a class="close" href="#close">×</a>
                    </div>
                    <!-- /search popup -->
                    <!--/search-right-->
                </div>


            </div>
            <!-- toggle switch for light and dark theme -->
            <div class="mobile-position">
                <nav class="navigation">
                    <div class="theme-switch-wrapper">
                        <label class="theme-switch" for="checkbox">
                            <input type="checkbox" id="checkbox">
                            <div class="mode-container">
                                <i class="gg-sun"></i>
                                <i class="gg-moon"></i>
                            </div>
                        </label>
                    </div>
                </nav>
            </div>
            <!-- //toggle switch for light and dark theme -->
        </div>
    </nav>
    <!--//nav-->
</header>
