<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset("css/styles.css")}}">
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>{{$title}}</title>
</head>

<body>
    <div id="error-message"></div>
    <div id="success-message"></div>
    <div class="pre-loader">
        <img src="images/pre-loader.gif" alt="">
    </div>
    <div class="container-fluid">
        <header class="container">
            <div class="d-flex justify-content-between custom-header">
                @if (session()->has("email"))
                <h6>{{session("email")}}</h6>
                @endif
               
                <div class="right-side-header">
                    @if (session()->has("loggedUser"))
                    <a href="/book-car" class="{{Request::routeIs("book-car") ?'activess' : ""}}">Account</a>
                    <a href="{{ route('logouts')}}" class="{{Request::routeIs("loggouts") ?'activess' : ""}}">Logout</a>
                    @else
                    <a href="{{ route('signup')}}" class="{{Request::routeIs("signup") ?'activess' : ""}}">Sign up</a>
                    <a href="{{ route('signin') }}" class="{{Request::routeIs("signin") ?'activess' : ""}}">Sign in</a>
                    @endif

                </div>

            </div>
        </header>
    </div>
    <div class="container-fluid bg-dark">
        <div class="container">
            <div class="myNavbar cus-nav">
                <div class="left-side">
                    <img src="{{asset("images/logo.png")}}" alt="">
                </div>
                <i id="open" class="fa fa-bars" aria-hidden="true"></i>
                <div id="main-nav" class="responsive main-side">
                    <ul>
                        <i id="close" class="fa fa-times" aria-hidden="true"></i>
                        <li><a href="{{ route('home') }}" class="{{Request::routeIs("home") ?'actives' : ""}}">Home</a></li>
                        <li><a href="{{ route('cars') }}" class="{{Request::routeIs("cars") ?'actives' : ""}}">Car</a></li>
                        <li><a href="{{route('blog')}}" class="{{Request::routeIs("blog") ?'actives' : ""}}">Blog</a></li>
                        <li><a href="{{route('gallery')}}" class="{{Request::routeIs("gallery") ?'actives' : ""}}">Gallery</a></li>
                        <li><a href="{{ route('abouts') }}" class="{{Request::routeIs("abouts") ?'actives' : ""}}">About</a></li>
                        <li><a href="{{route('contacts')}}" class="{{Request::routeIs("contacts") ?'actives' : ""}}">Contact</a></li>
                    </ul>
                </div>
                <div class="right-side">
                    <ul>
                        <li class="shop">
                            <span class=""><i class="fa
                                        fa-shopping-cart
                                        shopping-cart" aria-hidden="true">
                                    <span class="count">4</span></i>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <main>
        {{$content}}
    </main>
    <!-- footer -->
    <section class="container-fluid bg-dark footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 mt-4">
                    <h4>About us</h4>
                    <p class="mt-3">Lorem ipsum dolor sit amet consectetur
                        adipisicing
                        elit. Praesentium rerum eveniet neque, soluta libero
                        magnam.</p>
                    <h2>CarRental</h2>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mt-4">
                    <div class="contact-info">
                        <h4>Contact Info</h4>
                        <ul class="mt-3">
                            <li>+9874944</li>
                            <li>ahilal205@gmail.com</li>
                            <li>Mon 8:00 and 18:00 Sunday Closed</li>
                            <li class="social">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                <i class="fa fa-instagram ml-3" aria-hidden="true"></i>
                                <i class="fa fa-pinterest ml-3" aria-hidden="true"></i>
                                <i class="fa fa-youtube ml-3" aria-hidden="true"></i>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mt-4">
                    <div class="newslatter">
                        <h4>NewsLatter</h4>
                        <form action="" id="subscribe">
                            @csrf
                            <div class="form-group mt-3">
                                <input type="email" name="email" placeholder="Enter Email ....." id="email" class="form-control">
                                <button type="submit" class="btn btn-success w-100 mt-4">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{asset("js/jquery.js")}}"></script>
    <script src="{{asset("js/action.js")}}"></script>
    <script src="{{asset("js/bootstrap.min.js")}}"></script>
    {{-- <script src="{{asset("js/home.js")}}"></script> --}}

</body>

</html>