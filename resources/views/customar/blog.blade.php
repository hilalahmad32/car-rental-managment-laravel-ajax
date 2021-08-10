<x-layouts>
    <x-slot name="title">Blog</x-slot>
    <x-slot name="content">
        <div class="blogbg">
            <h1>Welcome to Blog</h1>
        </div>

        <section class="car-posts">
            <h1 class="text-center text-capitalize">Articales and Blog Post</h1>
            <div class="container mt-5">
                <div class="row">
                    @forelse ($posts as $post)
                    <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
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
                                <a href="{{ route('blog-detail', [$post->id]) }}"><button class="read-more">Read more
                                        ></button></a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                        <div class="my-card">
                            <div class="my-card-header post-img">
                                <img src="{{asset("images/cat (1).jpeg")}}" alt="">
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
                <div class="load mt-5">
                    <button class="loading-button">Load More</button>
                </div>
        </section>
    </x-slot>
</x-layouts>