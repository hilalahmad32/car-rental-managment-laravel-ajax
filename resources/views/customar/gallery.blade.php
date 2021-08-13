<x-layouts>
    <x-slot name="title">Gallery</x-slot>
    <x-slot name="content">
        <div class="gallery-img">
            <h1>Welcome to Car Gallery</h1>
        </div>

        <!-- gallery -->
        <div class="container my-5">
            <h1 class="text-center">Gallery</h1>
            <p class="text-center mb-4">
                This is Small Image gallery
            </p>
            <div class="row">
                @foreach ($gallery as $gal)
                <div class="col-lg-4 col-md-6 col-sm-12 mt-2">
                    <div class="gallery-imgs">
                        <img src="{{asset("upload/gallery")}}/{{$gal->gallery}}" class="rounded" alt="">
                    </div>
                </div>
                @endforeach
            </div>
            <div class="load mt-5">
                <button class="loading-button">Load More</button>
            </div>
        </div>
    </x-slot>
</x-layouts>