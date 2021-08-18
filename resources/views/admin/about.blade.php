<x-app-layout>
    <x-slot name="title">About</x-slot>
    <x-slot name="content">
        <div class="container my-5">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>About ( 1 ) </h5>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#about">
                            Add About
                        </button>
                    </div>
                </div>
               
            </div>
        </div>
        <div class="container">
            <div id="get-about"></div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="about" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add About</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="addabout" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Upload Image</label>
                                <input type="file" name="about_image" id="about_image" class="form-control form-control-lg">
                            </div>
                            <div class="form-group">
                                <label for="">Enter About</label>
                                <textarea name="about" id="about_des" cols="30" rows="10" class="form-control form-control-lg"></textarea>
                              
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
        <!-- Modal -->
        <div class="modal fade" id="editabout" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update About</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="updateabout" enctype="multipart/form-data">
                            @csrf
                            <div id="edit-about"></div>
                            
                            <div class='form-group'>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- Read More Modal -->
        <div class="modal fade" id="readMore" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                       <div id="read-mores"></div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
