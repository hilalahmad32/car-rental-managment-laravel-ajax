<x-app-layout>
    <x-slot name="title">Gallery</x-slot>
    <x-slot name="content">
        <div class="container my-5">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>Gallery</h4>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelId">
                            Add Gallery
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->

        <div class="container">
            <div id="gallery-data"></div>

        </div>

        <!-- Modal -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
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
                        <form action="" id="submitGallery">
                            @csrf
                            <div class="form-group">
                                <label for="">Enter Image</label>
                                <input type="file" name="file" id="file" class="form-control form-control-lg">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>

         <!-- Modal -->
         <div class="modal fade" id="edit-gallerys" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
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
                     <form action="" id="editGallery">
                         @csrf
                         <div id="form-gallery"></div>
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary">update</button>
                     </form>
                 </div>
             </div>
         </div>
     </div>
    </x-slot>
</x-app-layout>