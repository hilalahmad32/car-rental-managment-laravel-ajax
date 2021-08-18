<x-app-layout>
    <x-slot name="title">Car Category</x-slot>
    <x-slot name="content">
        <div class="container my-5">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Car Category ( <span id="total-car-category"></span> )</h5>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#carcategory">
                            Add Category
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mb-2">
            <input type="text" placeholder="Search Here..." name="search" id="search"
                class="form-control form-control-lg mb-3 m-auto w-50">
        </div>
        <div class="container">
            <div id="table-data"></div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="carcategory" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Car Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="addcarCategory" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Enter Category</label>
                                <input type="text" name="car_cat_name" id="car_cat_name"
                                    class="form-control form-control-lg">
                            </div>
                            <div class="form-group">
                                <label for="">Enter Image</label>
                                <input type="file" name="car_img" id="car_img"
                                    class="form-control form-control-lg form-control-file">
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

        <div class='modal fade' id='editcategory' tabindex='-1' role='dialog' aria-labelledby='modelTitleId'
            aria-hidden='true'>
            <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title'>Add Car Category</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>

                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>

                    <div class='modal-body'>
                        <form action='' id='editcarCategory' enctype='multipart/form-data'>
                            @csrf
                            <div id="form-data"></div>
                            <div class='form-group'>
                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                <button type='submit' class='btn btn-primary'>Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>