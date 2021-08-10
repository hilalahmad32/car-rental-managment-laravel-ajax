<x-layouts>
    <x-slot name="title">Car-detail - {{$posts->title}}</x-slot>
    <x-slot name="content">
        <div class="carbg">
            <h1>Welcome to posts detail - <span class="text-danger">{{$posts->title}}</span></h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 offset-lg-2 offset-md-0 offset-sm-0">

                    <h4 class="my-5">{{$posts->title}}</h4>
                    <div class="car-detail">
                        <img src="{{ asset('upload/posts') }}/{{$posts->image}}" alt="">
                    </div>
                    <div class="desc my-3">
                        {{$posts->description}}
                    </div>
                    <form action="" id="comment-form">
                        @csrf
                        <div class="form-group">
                            <label for="">Enter Comment</label>
                            <input type="hidden" name="post_id" id="posts_id" value="{{$posts->id}}" class="form-control form-control-lg">
                            <textarea name="comment" id="comment" cols="30" rows="10"
                                class="form-control form-control-lg"></textarea>
                        </div>
                        @if (session()->has("loggedUser"))
                        <div class="form-group">
                            <button type="submit" id="submitComment" data-id="{{$posts->id}}"
                                class="btn btn-success">Comment</button>
                        </div>
                        @else
                        <div class="form-group">
                            <button id="gotologin" class="btn btn-success">Comment</button>
                         
                        </div>
                        @endif
                        
                    </form>
                </div>
            </div>
        </div>


        </div>
        <div class="container my-3">
           <div id="load-comments"></div>

        </div>
    </x-slot>
</x-layouts>