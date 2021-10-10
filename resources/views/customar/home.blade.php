<x-layouts>
    <x-slot name="title">Home</x-slot>
    <x-slot name="content">
        <div class="mybg">
            <h1>Welcome to My Car Rental</h1>
        </div>

        <!-- car category -->
        <section class="car-category">
            <h1 class="text-center text-capitalize">Choose Your Car Category</h1>
            <div class="container mt-5">
                <div class="row">
                    @forelse ($category as $cat)
                    <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                        <div class="imgs">
                        <a href="{{ route('category-post', [$cat->id]) }}"> <img src="{{asset("upload/car-category")}}/{{$cat->car_image}}" style="width:300px;height:250px;" alt=""></a>
                        </div>
                        <div class="cat-car-name">
                            <h1>{{$cat->car_cat_name}}</h1>
                        </div>
                    </div>
                    @empty
                    <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                        <div class="imgs">
                            <img src="{{asset("images/cat (4).jpeg")}}" alt="">
                        </div>
                        <div class="cat-car-name">
                            <h1>Luxurs</h1>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- latest car -->

        <section class="cars">
            <h1 class="text-center text-capitalize">Latest Cars</h1>
            <div class="container mt-5">
                <div class="row">
                    @forelse ($cars as $car)
                    <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                        <div class="imgs">
                            <img src="{{asset("upload/cars")}}/{{$car->car_image}}" alt="">
                        </div>
                        <div class="car-name">
                            <h1>{{$car->car_name}}</h1>
                        </div>
                    </div>
                    @empty
                    <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                        <div class="imgs">
                            <img src="{{asset("images/cat (6).jpeg")}}" alt="">
                        </div>
                        <div class="car-name">
                            <h1>Jali</h1>
                        </div>
                    </div>
                    @endforelse

                </div>
            </div>
        </section>

        <!-- Articales and blog -->
        <section class="car-posts">
            <h1 class="text-center text-capitalize">Articales and Blog Post</h1>
            <div class="container mt-5">
                <div class="row">
                    @forelse ($posts as $post)
                    <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                        <div class="my-card">
                            <div class="my-card-header post-img">
                                <img src="{{asset("upload/posts")}}/{{$post->image}}" alt="">
                            </div>
                            <div class="my-card-body">
                                <h6>{{$post->create_at}}</h6>
                                <h3 id="heading">{{$post->title}}</h3>
                                <p id="para">
                                    {{$post->description}}
                                </p>
                            </div>
                            <div class="my-card-footer">
                                <button class="read-more">Read more ></button>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                        <div class="my-card">
                            <div class="my-card-header post-img">
                                <img src="{{asset("images/cat (6).jpeg")}}" alt="">
                            </div>
                            <div class="my-card-body">
                                <h6>Jun 12 2021</h6>
                                <h3 id="heading">Lorem ipsum dolor sit amet
                                    consectetur
                                    adipisicing elit.</h3>
                                <p id="para">
                                    Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Hic, repudiandae soluta
                                    iste tenetur dolor quam tempore...
                                </p>
                            </div>
                            <div class="my-card-footer">
                                <button class="read-more">Read more ></button>
                            </div>
                        </div>
                    </div>
                    @endforelse


                </div>
            </div>
        </section>
    </x-slot>
</x-layouts>
