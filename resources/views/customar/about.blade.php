<x-layouts>
    <x-slot name="title">About</x-slot>
    <x-slot name="content">
        <div class="aboutbg">
            <h1>Welcome to Cars</h1>
        </div>

        <div class="container mt-5">
            <div class="row">
                @foreach ($abouts as $about)
                <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                    <div class="about-img">
                        <img src="{{asset("upload/about")}}/{{$about->about_image}}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                   @php
                       echo $about->about;
                   @endphp
                </div>
                @endforeach
               
            </div>
        </div>
    </x-slot>
</x-layouts>