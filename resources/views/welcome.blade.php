<x-app-layout>
    <!-- main-slider -->
    <section class="w3l-main-slider position-relative" id="home">
        <div class="companies20-content">
            <div class="owl-one owl-carousel owl-theme">
                @if (!isset($filmsSearch))
                    @foreach ($movies as $movie)
                        @php
                            if ($loop->iteration > 3) {
                                break;
                            }
                        @endphp
                        <div class="item"
                            style="background:url({{ $movie->Poster }}) no-repeat center;background-size: cover;">
                            <li>
                                <div class="slider-info banner-view bg bg2">
                                    <div class="banner-info">
                                        <h3>{{ $movie->title }}</h3>
                                        <p>{{ $movie->description }}</p>
                                        <a href="#small-dialog1" class="popup-with-zoom-anim play-view1">
                                            <span class="video-play-icon">
                                                <span class="fa fa-play"></span>
                                            </span>
                                            <h6>Watch Trailer</h6>
                                        </a>
                                        <!-- dialog itself, mfp-hide class is required to make dialog hidden -->
                                        <div id="small-dialog1" class="zoom-anim-dialog mfp-hide">
                                            <iframe src="{{ $movie->Poster }}" allowfullscreen=""></iframe>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- //banner-slider-->
    <!-- main-slider -->
    <!--grids-sec2-->
    <section class="w3l-grids">
        <div class="grids-main py-5">
            @if (isset($filmsSearch))
                <div class="container py-lg-3">
                    <div class="headerhny-title">
                        <div class="w3l-title-grids">
                            <div class="headerhny-left">
                                <h3 class="hny-title">THE FILM THAT YOU SEARCH :</h3>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        @foreach ($filmsSearch as $movie)
                            <div class="item vhny-grid w-45 h-45">
                                <div class="box16 mb-0">
                                    <a href="{{ route('singlePage', ['id' => $movie->id]) }}">
                                        <figure>
                                            <img class="img-fluid" src="{{ $movie->Poster }}" alt="">
                                        </figure>
                                        <div class="box-content">
                                            <h4> <span class="post"><span class="fa fa-clock-o"> </span>
                                                    {{ $movie->duration }}

                                                </span>

                                                <span class="post fa fa-heart text-right"></span>
                                            </h4>
                                        </div>
                                        <span class="fa fa-play video-icon" aria-hidden="true"></span>
                                    </a>
                                </div>
                                <h3> <a class="title-gd"
                                        href="{{ route('singlePage', ['id' => $movie->id]) }}">{{ $movie->title }}</a>
                                </h3>
                                <p>{{ $movie->description }}</p>
                                <div class="button-center text-center mt-4">
                                    <a href="{{ route('singlePage', ['id' => $movie->id]) }}"
                                        class="btn watch-button">Reserve now</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="container py-lg-3">
                    <div class="headerhny-title">
                        <div class="w3l-title-grids">
                            <div class="headerhny-left">
                                <h3 class="hny-title">New Releases</h3>
                            </div>
                            <div class="headerhny-right text-lg-right">
                                <h4><a class="show-title" href="/genre">Show all</a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="owl-three owl-carousel owl-theme">
                        @foreach ($movies as $movie)
                            @php
                                if ($loop->iteration > 6) {
                                    break;
                                }
                            @endphp
                            <div class="item vhny-grid">
                                <div class="box16 mb-0">
                                    <a href="{{ route('singlePage', ['id' => $movie->id]) }}">
                                        <figure>
                                            <img class="img-fluid" src="{{ $movie->Poster }}" alt="">
                                        </figure>
                                        <div class="box-content">
                                            <h4> <span class="post"><span class="fa fa-clock-o"> </span>
                                                    {{ $movie->duration }}
                                                    <span class="text-right post fa fa-heart"></span>
                                            </h4>
                                        </div>
                                        <span class="fa fa-play video-icon" aria-hidden="true"></span>
                                    </a>
                                </div>
                                <h3> <a class="title-gd"
                                        href="{{ route('singlePage', ['id' => $movie->id]) }}">{{ $movie->title }}</a>
                                </h3>
                                <p>{{ $movie->description }}</p>
                                <div class="mt-4 text-center button-center">
                                    <a href="{{ route('singlePage', ['id' => $movie->id]) }}"
                                        class="btn watch-button">Reserve now</a>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
    <!--grids-sec2-->
    <!--mid-slider -->
    <section class="w3l-mid-slider position-relative">
        <div class="companies20-content">
            <div class="owl-mid owl-carousel owl-theme">
                @dd($movies)
                @foreach ($movies as $movie)
                    @php
                        if ($loop->iteration < 9 || $loop->iteration > 15) {
                            continue;
                        }
                    @endphp
                    <div class="item">
                        <li>
                            <div class="slider-info mid-view bg bg2"
                                style="background: url({{ $movie->Poster }}) no-repeat center;background-size:cover;min-height:500px;">
                                <div class="container">
                                    <div class="mid-info">
                                        <span class="sub-text">{{ $movie->type }}</span>
                                        <h3>{{ $movie->title }}</h3>
                                        <p>{{ $movie->year }} {{ $movie->genre }} - {{ $movie->duration }}</p>
                                        <a class="watch" href="{{ route('singlePage', ['id' => $movie->id]) }}"><span
                                                class="fa fa-play" aria-hidden="true"></span>
                                            Watch Trailer</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- //mid-slider-->
    <!--/tabs-->
    <section class="w3l-albums py-5" id="projects">
        <div class="container py-lg-4">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <!--Horizontal Tab-->
                    <div id="parentHorizontalTab">
                        <ul class="resp-tabs-list hor_1">
                            <li>Recent Movies</li>
                            <li>Popular Movies</li>
                            <li>Trend Movies</li>
                            <div class="clear"></div>
                        </ul>
                        <div class="resp-tabs-container hor_1">
                            {{-- this data came from database --}}
                            <div class="albums-content">
                                <div class="row">
                                    <!--/set1-->
                                    @if (!isset($filmsSearch))
                                        @foreach ($movies as $movie)
                                            <div class="col-lg-4 new-relise-gd mt-lg-0 mt-0">
                                                <div class="slider-info">
                                                    <div class="img-circle">
                                                        <a href="{{ route('singlePage', ['id' => $movie->id]) }}">

                                                            <img src="{{ $movie->Poster }}" class="img-fluid"
                                                                alt="author image">
                                                            <div class="overlay-icon">

                                                                <span class="fa fa-play video-icon"
                                                                    aria-hidden="true"></span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="message">
                                                        <p>{{ $movie->type }}</p>
                                                        <a class="author-book-title"
                                                            href="{{ route('singlePage', ['id' => $movie->id]) }}">{{ $movie->title }}</a>
                                                        <h4> <span class="post"><span class="fa fa-clock-o"> </span>
                                                                {{ $movie->duration }}
                                                            </span>

                                                            <span class="post fa fa-heart text-right"></span>
                                                        </h4>
                                                    </div>
                                                </div>

                                            </div>
                                        @endforeach
                                    @endif

                                </div>
                                <div class="">
                                    {{ $movies->links() }}
                                </div>
                            </div>
                            <div class="albums-content">
                                <div class="row">
                                    <!--/set1-->
                                    <div class="col-lg-4 new-relise-gd mt-lg-0 mt-0">
                                        <div class="slider-info">
                                            <div class="img-circle">
                                                <a href="/genre"><img src="assets/images/m1.jpg" class="img-fluid"
                                                        alt="author image">
                                                    <div class="overlay-icon">

                                                        <span class="fa fa-play video-icon" aria-hidden="true"></span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="message">
                                                <p>English</p>
                                                <a class="author-book-title" href="/genre">Rocketman</a>
                                                <h4> <span class="post"><span class="fa fa-clock-o"> </span> 2 Hr
                                                        4min

                                                    </span>

                                                    <span class="post fa fa-heart text-right"></span>
                                                </h4>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-4 new-relise-gd mt-lg-0 mt-0">
                                        <div class="slider-info">
                                            <div class="img-circle">
                                                <a href="/genre"><img src="assets/images/m2.jpg" class="img-fluid"
                                                        alt="author image">
                                                    <div class="overlay-icon">

                                                        <span class="fa fa-play video-icon" aria-hidden="true"></span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="message">
                                                <p>English</p>
                                                <a class="author-book-title" href="/genre">Doctor Sleep</a>
                                                <h4> <span class="post"><span class="fa fa-clock-o"> </span> 2 Hr
                                                        4min

                                                    </span>

                                                    <span class="post fa fa-heart text-right"></span>
                                                </h4>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-4 new-relise-gd mt-lg-0 mt-0">
                                        <div class="slider-info">
                                            <div class="img-circle">
                                                <a href="/genre"><img src="assets/images/m3.jpg" class="img-fluid"
                                                        alt="author image">
                                                    <div class="overlay-icon">

                                                        <span class="fa fa-play video-icon" aria-hidden="true"></span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="message">
                                                <p>English</p>
                                                <a class="author-book-title" href="/genre">Knives Out</a>
                                                <h4> <span class="post"><span class="fa fa-clock-o"> </span> 2 Hr
                                                        4min

                                                    </span>

                                                    <span class="post fa fa-heart text-right"></span>
                                                </h4>
                                            </div>
                                        </div>

                                    </div>
                                    <!--//set1-->
                                    <!--/set2-->
                                    <div class="col-lg-4 new-relise-gd mt-lg-0 mt-0">
                                        <div class="slider-info">
                                            <div class="img-circle">
                                                <a href="/genre"><img src="assets/images/m7.jpg" class="img-fluid"
                                                        alt="author image">
                                                    <div class="overlay-icon">

                                                        <span class="fa fa-play video-icon" aria-hidden="true"></span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="message">
                                                <p>English</p>
                                                <a class="author-book-title" href="/genre">Frozen 2</a>
                                                <h4> <span class="post"><span class="fa fa-clock-o"> </span> 2 Hr
                                                        4min

                                                    </span>

                                                    <span class="post fa fa-heart text-right"></span>
                                                </h4>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-4 new-relise-gd mt-lg-0 mt-0">
                                        <div class="slider-info">
                                            <div class="img-circle">
                                                <a href="/genre"><img src="assets/images/m8.jpg" class="img-fluid"
                                                        alt="author image">
                                                    <div class="overlay-icon">

                                                        <span class="fa fa-play video-icon" aria-hidden="true"></span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="message">
                                                <p>English</p>
                                                <a class="author-book-title" href="/genre">Toy Story 4</a>
                                                <h4> <span class="post"><span class="fa fa-clock-o"> </span> 2 Hr
                                                        4min

                                                    </span>

                                                    <span class="post fa fa-heart text-right"></span>
                                                </h4>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-4 new-relise-gd mt-lg-0 mt-0">
                                        <div class="slider-info">
                                            <div class="img-circle">
                                                <a href="/genre"><img src="assets/images/m9.jpg" class="img-fluid"
                                                        alt="author image">
                                                    <div class="overlay-icon">

                                                        <span class="fa fa-play video-icon" aria-hidden="true"></span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="message">
                                                <p>English</p>
                                                <a class="author-book-title" href="/genre">Joker</a>
                                                <h4> <span class="post"><span class="fa fa-clock-o"> </span> 2 Hr
                                                        4min

                                                    </span>

                                                    <span class="post fa fa-heart text-right"></span>
                                                </h4>
                                            </div>
                                        </div>

                                    </div>
                                    <!--//set2-->
                                </div>
                            </div>
                            <div class="albums-content">
                                <div class="row">
                                    <!--/set3-->
                                    <div class="col-lg-4 new-relise-gd mt-lg-0 mt-0">
                                        <div class="slider-info">
                                            <div class="img-circle">
                                                <a href="/genre"><img src="assets/images/m7.jpg" class="img-fluid"
                                                        alt="author image">
                                                    <div class="overlay-icon">

                                                        <span class="fa fa-play video-icon" aria-hidden="true"></span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="message">
                                                <p>English</p>
                                                <a class="author-book-title" href="/genre">Frozen 2</a>
                                                <h4> <span class="post"><span class="fa fa-clock-o"> </span> 2 Hr
                                                        4min

                                                    </span>

                                                    <span class="post fa fa-heart text-right"></span>
                                                </h4>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-4 new-relise-gd mt-lg-0 mt-0">
                                        <div class="slider-info">
                                            <div class="img-circle">
                                                <a href="/genre"><img src="assets/images/m8.jpg" class="img-fluid"
                                                        alt="author image">
                                                    <div class="overlay-icon">

                                                        <span class="fa fa-play video-icon" aria-hidden="true"></span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="message">
                                                <p>English</p>
                                                <a class="author-book-title" href="/genre">Toy Story 4</a>
                                                <h4> <span class="post"><span class="fa fa-clock-o"> </span> 2 Hr
                                                        4min

                                                    </span>

                                                    <span class="post fa fa-heart text-right"></span>
                                                </h4>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-4 new-relise-gd mt-lg-0 mt-0">
                                        <div class="slider-info">
                                            <div class="img-circle">
                                                <a href="/genre"><img src="assets/images/m9.jpg" class="img-fluid"
                                                        alt="author image">
                                                    <div class="overlay-icon">

                                                        <span class="fa fa-play video-icon" aria-hidden="true"></span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="message">
                                                <p>English</p>
                                                <a class="author-book-title" href="/genre">Joker</a>
                                                <h4> <span class="post"><span class="fa fa-clock-o"> </span> 2 Hr
                                                        4min

                                                    </span>

                                                    <span class="post fa fa-heart text-right"></span>
                                                </h4>
                                            </div>
                                        </div>

                                    </div>
                                    <!--//set3-->
                                    <!--/set3-->
                                    <div class="col-lg-4 new-relise-gd mt-lg-0 mt-0">
                                        <div class="slider-info">
                                            <div class="img-circle">
                                                <a href="/genre"><img src="assets/images/m10.jpg" class="img-fluid"
                                                        alt="author image">
                                                    <div class="overlay-icon">

                                                        <span class="fa fa-play video-icon" aria-hidden="true"></span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="message">
                                                <p>English</p>
                                                <a class="author-book-title" href="/genre">Alita</a>
                                                <h4> <span class="post"><span class="fa fa-clock-o"> </span> 2 Hr
                                                        4min

                                                    </span>

                                                    <span class="post fa fa-heart text-right"></span>
                                                </h4>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-4 new-relise-gd mt-lg-0 mt-0">
                                        <div class="slider-info">
                                            <div class="img-circle">
                                                <a href="/genre"><img src="assets/images/m11.jpg" class="img-fluid"
                                                        alt="author image">
                                                    <div class="overlay-icon">

                                                        <span class="fa fa-play video-icon" aria-hidden="true"></span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="message">
                                                <p>English</p>
                                                <a class="author-book-title" href="/genre">The Lego</a>
                                                <h4> <span class="post"><span class="fa fa-clock-o"> </span> 2 Hr
                                                        4min

                                                    </span>

                                                    <span class="post fa fa-heart text-right"></span>
                                                </h4>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-4 new-relise-gd mt-lg-0 mt-0">
                                        <div class="slider-info">
                                            <div class="img-circle">
                                                <a href="/genre"><img src="assets/images/m12.jpg" class="img-fluid"
                                                        alt="author image">
                                                    <div class="overlay-icon">

                                                        <span class="fa fa-play video-icon" aria-hidden="true"></span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="message">
                                                <p>English</p>
                                                <a class="author-book-title" href="/genre">The Hustle</a>
                                                <h4> <span class="post"><span class="fa fa-clock-o"> </span> 2 Hr
                                                        4min

                                                    </span>

                                                    <span class="post fa fa-heart text-right"></span>
                                                </h4>
                                            </div>
                                        </div>

                                    </div>
                                    <!--//set3-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //tabs-->
</x-app-layout>
