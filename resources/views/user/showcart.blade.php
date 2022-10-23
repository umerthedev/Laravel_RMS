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
                        <a href="{{ url('/') }}" class="logo">
                            <img src="{{ url('home_assests/assets/images/klassy-logo.png') }}"
                                align="klassy cafe html template">
                            <a class="menu-trigger">
                                <span>Menu</span>
                            </a>
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

    <div id="top">
        <div class="container px-3 my-5 clearfix">
            <!-- Shopping cart table -->

            <div class="card">
                <div class="card-header">
                    <h2>Shopping Cart</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered m-0">
                            <a href="{{ url('/') }}" class="btn btn-danger mb-2">Back</a>
                            <thead>
                                <tr>
                                    <!-- Set columns width -->
                                    <th class="text-center py-3 px-4" style="min-width: 400px;">Food Name</th>
                                    <th class="text-right py-3 px-4" style="width: 100px;">Price</th>
                                    <th class="text-center py-3 px-4" style="width: 120px;">Quantity</th>
                                    <th class="text-right py-3 px-4" style="width: 100px;">Total</th>
                                    <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a
                                            href="#" class="shop-tooltip float-none text-light" title=""
                                            data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a>
                                    </th>
                                </tr>
                            </thead>


                            <tbody>
                                <form action="{{ url('ordernow') }}" method="post">
                                    @csrf

                                    @php
                                        $totalprice = 0;
                                    @endphp

                                    @forelse ($cart as $data)
                                        <tr>
                                            <td class="p-4">
                                                <div class="media align-items-center">
                                                    <img src="{{ url('/admin_assets/foodimage/' . $data->image) }}"
                                                        class="d-block ui-w-40 ui-bordered mr-4" alt="">
                                                    <div class="media-body">
                                                        <a href="#"
                                                            class="d-block text-dark">{{ $data->name }}</a>
                                                        <input type="text" name="food_name[]"
                                                            value="{{ $data->name }}" hidden>

                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-right font-weight-semibold align-middle p-4">
                                                <input type="text" name="price[]" value="{{ $data->price }}"
                                                    hidden>
                                                {{ $data->price }}
                                            </td>
                                            <td class="align-middle p-4"><input type="text"
                                                    class="form-control text-center" value="{{ $data->quantity }}">
                                                <input type="number" name="quantity[]" value="{{ $data->quantity }}"
                                                    hidden>
                                            </td>
                                            <td class="text-right font-weight-semibold align-middle p-4">
                                                {{ $data->quantity * $data->price }}
                                            </td>
                                            <td class="text-center align-middle px-0"><a
                                                    href="{{ url('removecart', $data->id) }}"
                                                    class="shop-tooltip close float-none text-danger" title=""
                                                    data-original-title="Remove">×</a></td>
                                        </tr>
                                        @php
                                            $totalprice = $totalprice + $data->quantity * $data->price;
                                        @endphp
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">No food added in cart</td>
                                        </tr>
                                    @endforelse

                            </tbody>
                        </table>
                        <?php $deliverycharge = 50; ?>
                    </div>
                    <!-- / Shopping cart table -->

                    <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
                        <div class="mt-4">
                            <label class="text-muted font-weight-normal">Promocode</label>
                            <input type="text" placeholder="ABC" class="form-control">
                        </div>
                        <div class="d-flex">
                            <div class="text-right mt-4 mr-5">
                                <label class="text-muted font-weight-normal m-0">Delivery charge </label>
                                <div class="text-large"><strong>50 tk </strong></div>
                            </div>
                            <div class="text-right mt-4">
                                <label class="text-muted font-weight-normal m-0">Total price</label>
                                @if ($totalprice)
                                    <div class="text-large">
                                        <strong> TK {{ $totalprice + $deliverycharge }}
                                        </strong>
                                    @else
                                        <div class="text-large"><strong> TK 0
                                            </strong>
                                        </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @if ($totalprice)
                    <div class="float-right">
                        <button type="button" id="order" class="btn btn-lg btn-primary text-dark mt-2">Order
                            Now</button>
                    </div>
                @else
                    <div style="text-align: center" class="mb-4">
                        <a href="{{ url('/') }}" class="btn btn-lg btn-primary text-dark "> Please Add
                            food from
                            menu</a>
                    </div>
                @endif
            </div>
        </div>

        <div class="card-body" id="appear" style="display: none;">
            <div class="table-responsive">
                <table class="table table-bordered m-0">

                    <div class="col-lg-6">
                        <div class="contact-form">

                            <div class="row">
                                <div class="col-lg-12" style="padding-bottom: 20px">
                                    <h4>Place Your Order Information</h4>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <fieldset>
                                        <input name="name" type="text" id="name" placeholder="Your Name*"
                                            required="">
                                    </fieldset>
                                </div>

                                <div class="col-lg-6 col-sm-12">
                                    <fieldset>
                                        <input name="phone" type="text" id="phone"
                                            placeholder="Phone Number*" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12 col-sm-12">
                                    <fieldset>
                                        <input name="address" type="text" id="address" placeholder="Address"
                                            required="">
                                    </fieldset>
                                </div>



                                <div class="col-lg-6" style="padding-top: 10px">
                                    <fieldset>
                                        <button type="submit">Confirm
                                            Order</button>

                                    </fieldset>
                                </div>
                                <div class="col-lg-6" style="padding-top: 10px">
                                    <fieldset>

                                        <button class="main-button-icon" id="close"
                                            type="button">Cancel</button>
                                    </fieldset>
                                </div>

                            </div>

                        </div>
                    </div>
                </table>

            </div>
        </div>
        </form>
    </div>



    <!-- ***** Footer Start ***** -->
    @include('user.footer')

    @include('user.script')

    <script>
        $(document).ready(function() {
            $('#order').click(function() {
                $('#appear').show();
            });
        });
        $(document).ready(function() {
            $('#close').click(function() {
                $('#appear').hide();
            });
        });
    </script>


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
