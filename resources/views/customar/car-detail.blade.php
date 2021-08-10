<x-layouts>
    <x-slot name="title">Car-detail - {{$cars->car_name}}</x-slot>
    <x-slot name="content">
        <div class="carbg">
            <h1>Welcome to Cars detail - <span class="text-danger">{{$cars->car_name}}</span></h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="d-flex justify-content-between">
                        <h4 class="my-5">{{$cars->car_name}}</h4>
                        <h4 class="my-5">${{$cars->car_price}}</h4>
                    </div>
                    <div class="car-detail">
                        <img src="{{ asset('upload/cars') }}/{{$cars->car_image}}" alt="">
                    </div>
                    <div class="desc my-3">
                        {{$cars->car_desc}}
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-lg-12 mb-3">
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
                        <div class="my-5">  
                            <form action="">
                                @csrf
                                @if (session()->has("loggedUser"))
                                <button class="btn btn-primary" data-id="{{$cars->id}}" id="likebtn">
                                    Like ( <span id="like-data"></span> ) 
                                </button>
                                @else
                                <button class="btn btn-primary" id="gotologin">Like ( <span id="like-data"></span> ) </button>
                                @endif
                            </form>
                        </div>
                    </div>
                    <form action="" id="review-form">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" value='{{$cars->id}}' id='car_id' class="form-control form-contorl-lg">
                            <label for="">Enter Your review</label>
                            <select name="review" id="review" class="form-control form-control-lg">
                                <option disabled selected>Select Review</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Enter Comment</label>
                            <textarea name="comment" id="comment" cols="30" rows="10"
                                class="form-control form-control-lg"></textarea>
                        </div>
                        @if (session()->has("loggedUser"))
                        <div class="form-group">
                            <button type="submit" id="submitReview" data-id="{{$cars->id}}"
                                class="btn btn-success">Comment</button>
                        </div>
                        @else
                        <div class="form-group">
                            <button id="gotologin"  class="btn btn-success">Comment</button>
                        </div>
                        @endif
                    </form>
                    <div class="my-3">
                        <div id="load-review"></div>
            
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 mt-5">
                  <div class="card">
                      <div class="card-header">Book Car</div>
                      <div class="card-body">
                          <form action="" id="book-car">
                              @csrf
                              <div class="form-group">
                                <label for="">Days of Book Car</label>
                                <input type="hidden" value="{{$cars->id}}" name="id" id="id" class="form-control form-control-lg">
                                <input type="number" name="days" id="days" class="form-control form-control-lg">
                              </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Book</button> 
                            </div>
                          </form>
                    </div>
                  </div>
                
                </div>
                
            </div>
                
        </div>
        
    </x-slot>
</x-layouts>