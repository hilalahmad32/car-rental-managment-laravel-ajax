<x-layouts>
    <x-slot name="title">Car</x-slot>
    <x-slot name="content">
        <div class="carbg">
            <h1>Welcome to <span class="text-danger">{{$category->car_cat_name}}</span></h1>
        </div>

        <div class="container my-5">
            <form action="">
                <div class="form-inline">
                    <input type="text" name="search" id="searc" placeholder="Search Here..." class="form-control
                                form-control-lg w-100">
                </div>
            </form>
            <div class="row">
                @forelse ($cars as $car)
                <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                    <div class="my-border">
                        <div class="main_img">
                            <img src="{{ asset('upload/cars') }}/{{$car->car_image}}" class="rounded" alt="">
                        </div>
                        <div class="p-4">
                            <div class="title d-flex justify-content-between
                                                            mt-3">
                                <h2>{{$car->car_name}}</h2>
                                <h1>${{$car->car_price}}</h1>
                            </div>
                            <div class="review text-primary">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <span class="ml-3">4 Reviews</spanc>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-lg-6">
                                    <div class="d-flex mt-3">
                                        <span class="">
                                            <h4><i class="fa fa-user" aria-hidden="true"></i></h4>
                                            <span>4</span>
                                        </span>
                                        <span class="ml-3">
                                            <h4><i class="fa fa-comment" aria-hidden="true"></i>
                                            </h4>
                                            <span>4</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-6">
                                    <span>
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                        <span class="ml-1">Audio input</span>
                                    </span>
                                    <span class="ml-2">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                        <span class="ml-1">Bluetooth</span>
                                    </span>
                                    <span>
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                        <span class="ml-1">Audio input</span>
                                    </span>
                                </div>
                                <a href="{{ route('car-detail', $car->id) }}"><button class="read-more">Read
                                        more
                                        ></button></a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                    <div class="my-border">
                        <div class="main_img">
                            <img src="{{ asset('images/bg-3.jpeg') }}" class="rounded" alt="">
                        </div>
                        <div class="p-4">
                            <div class="title d-flex justify-content-between
                                        mt-3">
                                <h2>Car Name</h2>
                                <h1>$65</h1>
                            </div>
                            <div class="review text-primary">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <span class="ml-3">4 Reviews</spanc>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-lg-6">
                                    <div class="d-flex mt-3">
                                        <span class="">
                                            <h4><i class="fa fa-user" aria-hidden="true"></i></h4>
                                            <span>4</span>
                                        </span>
                                        <span class="ml-3">
                                            <h4><i class="fa fa-comment" aria-hidden="true"></i>
                                            </h4>
                                            <span>4</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-6">
                                    <span>
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                        <span class="ml-1">Audio input</span>
                                    </span>
                                    <span class="ml-2">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                        <span class="ml-1">Bluetooth</span>
                                    </span>
                                    <span>
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                        <span class="ml-1">Audio input</span>
                                    </span>
                                </div>
                                <button class="loading-button">Load More</button>
                            </div>
                        </div>

                    </div>
                </div>
                @endforelse

            </div>
            <div class="load mt-5">
                <button class="loading-button">Load More</button>
            </div>
        </div>
    </x-slot>
</x-layouts>