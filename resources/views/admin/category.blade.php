<x-app-layout>
    <x-slot name="title">Category</x-slot>
    <x-slot name="content">
        <div class="container my-5">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-item-center">
                        <h4>Category</h4>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#category">
                            Add Category
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container my-4">
            <input type="text" name="search" id="search" class="form-control form-control-lg w-50 m-auto">
        </div>
        <div class="container">
            <div id="category-table"></div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="category" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="addpostcategory">
                            @csrf
                            <div class="form-group">
                                <label for="">Enter Category Name</label>
                                <input type="text" name="cat_name" id="cat_name" class="form-control form-control-lg">
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

        <div class="modal fade" id="editcat" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="editpostcategory">
                            @csrf
                            <div id="category-form"></div>
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