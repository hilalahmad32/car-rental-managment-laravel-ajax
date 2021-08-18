<x-app-layout>
    <x-slot name="title">Dashborad</x-slot>

    <x-slot name="content">
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                       
                        <div class="card-body">
                            <h1>{{count($categorys)}}</h1>
                          <h3>  Car Category</h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">
                            <h1>{{count($cars)}}</h1>
                          <h3>  Cars</h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">
                            <h1>{{count($posts)}}</h1>
                          <h3>Posts</h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">
                            <h1>{{count($customars)}}</h1>
                          <h3>Customers</h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                       
                        <div class="card-body">
                            <h1>{{count($likes)}}</h1>
                          <h3> Likes</h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">
                            <h1>{{count($car_comments)}}</h1>
                          <h3>Car Comments</h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">
                            <h1>{{count($comments)}}</h1>
                          <h3>Posts Comments</h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">
                            <h1>{{count($car_books)}}</h1>
                          <h3>Book Car</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area mr-1"></i>
                          Customars
                        </div>
                        <div class="card-body">
                            <div id="get-customars"></div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('customars') }}">View More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar mr-1"></i>
                            Likes
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                   <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>User Name</th>
                                        <th>Car Name</th>
                                        <th>Likes</th>
                                    </tr>
                                   </thead>
                                   <tbody>
                                       @forelse ($likes as $like)
                                       <tr>
                                        <td>{{$like->id}}</td>
                                        <td>{{$like->like_customar->username}}</td>
                                        <td>{{$like->like_car->car_name}}</td>
                                        <td>{{$like->like}}</td>
                                    </tr>
                                       @empty
                                      <h6>Record Not Found</h6>
                                       @endforelse
                                   </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('likes') }}">View More</a>
                               <h5>Total Like ( {{$sumlikes}} )</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-sm-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                           Car Review
                        </div>
                        <div class="card-body">
                            <div class='table-responsive'>
                                <table class='table'>
                                   <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>User Name</th>
                                        <th>Car Name</th>
                                        <th>Comments</th>
                                        <th>Reviews</th>
                                    </tr>
                                   </thead>
                                   <tbody>
                                       @forelse ($car_comments as $comment)
                                       <tr>
                                        <td>{{$comment->id}}</td>
                                        <td>{{$comment->customars->username}}</td>
                                        <td>{{$comment->cars->car_name}}</td>
                                        <td>{{$comment->comment}}</td>
                                        <td>{{$comment->review}}</td>
                                    </tr>
                                       @empty
                                      <h6>Record Not Found</h6>
                                       @endforelse
                                   </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('review') }}">View More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-sm-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                           Car Book
                        </div>
                        <div class="card-body">  
                            <div id="get-car-book"></div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('car-book') }}">View More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-sm-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                           Comments
                        </div>
                        <div class="card-body">
                            <div class='table-responsive'>
                                <table class='table'>
                                   <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>User Name</th>
                                        <th>Car Name</th>
                                        <th>Comments</th>
                                    </tr>
                                   </thead>
                                   <tbody>
                                       @forelse ($comments as $comment)
                                       <tr>
                                        <td>{{$comment->id}}</td>
                                        <td>{{$comment->blog_customars->username}}</td>
                                        <td>{{$comment->posts->title}}</td>
                                        <td>{{$comment->comment}}</td>
                                    </tr>
                                       @empty
                                      <h6>Record Not Found</h6>
                                       @endforelse
                                   </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('comments') }}">View More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </main>
    </x-slot>
</x-app-layout>