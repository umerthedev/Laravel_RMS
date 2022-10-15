<!DOCTYPE html>
<html lang="en">

<head>

    @include('user.css')

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="home_assests/assets/images/klassy-logo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>

                            <!--
                            <li class="submenu">
                                <a href="javascript:;">Drop Down</a>
                                <ul>
                                    <li><a href="#">Drop Down Page 1</a></li>
                                    <li><a href="#">Drop Down Page 2</a></li>
                                    <li><a href="#">Drop Down Page 3</a></li>
                                </ul>
                            </li>
                        -->
                            <li class="scroll-to-section"><a href="#menu">Menu</a></li>
                            <li class="scroll-to-section"><a href="#chefs">Chefs</a></li>
                            {{-- <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a href="#">Features Page 4</a></li>
                                </ul>
                            </li> --}}

                            <li class="scroll-to-section"><a href="#reservation">Contact Us</a></li>
                            <li class="scroll-to-section">


                                @auth
                                    <a href="{{ url('/showcart', Auth::user()->id) }}">cart
                                        <span class="badge badge-pill bg-primary text-white">{{ $count }}</span>
                                    </a>
                                @endauth
                                @guest
                                    <a href="{{ url('login') }}">cart
                                        <span class="badge badge-pill bg-primary text-white">0</span>
                                    </a>
                                @endguest

                            </li>
                            <li>
                                @if (Route::has('login'))
                                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                        @auth
                                <li>
                                    <x-app-layout>

                                    </x-app-layout>
                                </li>
                            @else
                                <li> <a href="{{ route('login') }}"
                                        class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a></li>

                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}"
                                            class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                    </li>
                                @endif
                            @endauth
                </div>
                @endif
                </li>
                </ul>
                {{-- <a class='menu-trigger'>
                            <span>Menu</span>
                        </a> --}}
                <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
        </div>
        {{-- dismisable alert --}}
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                {{ session()->get('message') }}

            </div>
        @endif
        {{-- end dismisable alert --}}
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    @include('user.banner')
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** About Area Starts ***** -->
    @include('user.aboutus')
    <!-- ***** About Area Ends ***** -->

    <!-- ***** Menu Area Starts ***** -->
    @include('user.ourmanu')
    <!-- ***** Menu Area Ends ***** -->

    <!-- ***** Chefs Area Starts ***** -->
    @include('user.chefs')
    <!-- ***** Chefs Area Ends ***** -->

    <!-- ***** Reservation Us Area Starts ***** -->
    @include('user.reservation')
    <!-- ***** Reservation Area Ends ***** -->

    <!-- ***** Menu Area Starts ***** -->
    @include('user.menuArea')
    <!-- ***** Chefs Area Ends ***** -->

    <!-- ***** Footer Start ***** -->
    @include('user.footer')

    @include('user.script')
    <script>
        $(function() {
            var selectedClass = "";
            $("p").click(function() {
                selectedClass = $(this).attr("data-rel");
                $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("." + selectedClass).fadeOut();
                setTimeout(function() {
                    $("." + selectedClass).fadeIn();
                    $("#portfolio").fadeTo(50, 1);
                }, 500);

            });
        });
    </script>
</body>

</html>
