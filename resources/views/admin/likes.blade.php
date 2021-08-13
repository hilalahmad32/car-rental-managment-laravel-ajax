<x-app-layout>
    <x-slot name="title">Likes</x-slot>
    <x-slot name="content">
        <div class="container my-5">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-chart-bar mr-1"></i>
                    Likes ( {{count($likes)}} )
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
                                <th>Delete</th>
                            </tr>
                           </thead>
                           <tbody>
                               @forelse ($likes as $like)
                               <tr>
                                <td>{{$like->id}}</td>
                                <td>{{$like->like_customar->username}}</td>
                                <td>{{$like->like_car->car_name}}</td>
                                <td>{{$like->like}}</td>
                                <td>Delete</td>
                            </tr>
                               @empty
                              <h6>Record Not Found</h6>
                               @endforelse
                           </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>