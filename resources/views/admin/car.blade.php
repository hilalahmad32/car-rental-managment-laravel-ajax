<x-app-layout>
    <x-slot name="title">Car</x-slot>

    <x-slot name="content">
        <div class="container my-5">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>Car</h4>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addcar">
                            Add Car
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container my-3">
            <input type="text" name="search" id="search" placeholder="Search Here..."
                class="form-control form-control-lg w-50 m-auto">
        </div>
        <div class="container">
            <div id="car-table"></div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addcar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="addcars">
                            @csrf
                            <div class="form-group">
                                <label for="">Enter Car Name</label>
                                <input type="text" name="car_name" id="car_name" class="form-control form-control-lg">
                            </div>
                            <div class="form-group">
                                <label for="">Enter Car Category</label>
                                <select name="car_id" id="car_id" class="form-control form-control-lg">
                                    <option disabled selected>Select Car category</option>
                                    @foreach ($category as $cat)
                                    <option value="{{$cat->id}}">{{$cat->car_cat_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Enter Car Description</label>
                                <textarea name="desc" id="desc" cols="30" rows="10"
                                    class="form-control form-control-lg"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Enter Car Image</label>
                                <input type="file" name="car_img" id="car_img" class="form-control form-control-lg">
                            </div>
                            <div class="form-group">
                                <label for="">Enter Car Price</label>
                                <input type="text" name="price" id="price" class="form-control form-control-lg">
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="edit-car" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="editcars">
                            @csrf
                            <div id="car-form-data"></div>
                            <div class="form-group">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>