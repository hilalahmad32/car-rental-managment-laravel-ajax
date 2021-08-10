<x-layouts>
    <x-slot name="title">update-profile</x-slot>
    <x-slot name="content">
        <div class="container my-5">
           <div class="row">
<div class="col-lg-3 col-md-12 col-sm-12">

             @include('../customar/include/sidebar');
</div>
               <div class="col-lg-8 col-md-12 col-sm-12">
                   <div class="card">
                       <div class="card-header">
                           <h3>Update Profile</h3>
                       </div>
                       <div class="card-body">
                           @if (session()->has("danger"))
                           <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{session("danger")}}
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                           @endif
                           @if (session()->has("success"))
                           <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{session("success")}}
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                           @endif
                           @if (session()->has("error"))
                           <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{session("error")}}
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                           @endif
                        
                          <form action="" id="update-profile" method="POST" enctype="multipart/form-data">
                              @csrf
                             <div class='form-group'>
                                    <label for=''>Enter First Name</label>
                                    <input type='text' value="{{$profile->fname}}" name='edit_fname' id='edit_fname' class='form-control form-control-lg'>
                            </div>
                            <div class='form-group'>
                                    <label for=''>Enter Last Name</label>
                                    <input type='text' value="{{$profile->lname}}" name='edit_lname' id='edit_lname' class='form-control form-control-lg'>
                            </div>
                            <div class='form-group'>
                                    <label for=''>Enter Username</label>
                                    <input type='text' value="{{$profile->username}}" name='edit_username' id='edit_username' class='form-control form-control-lg'>
                            </div>
                            <div class='form-group'>
                                    <label for=''>Enter Email</label>
                                    <input type='text' value="{{$profile->email}}" name='edit_email' id='edit_email' class='form-control form-control-lg'>
                            </div>
                            <div class='form-group'>
                                    <label for=''>Enter Image</label>
                                    <input type='file' name='edit_file' id='edit_file' class='form-control form-control-lg'>
                                    <img src='{{ asset('upload/customar') }}/{{$profile->image}}' style='width:100px;height:100px;' />
                                    <input type='hidden' value='{{$profile->image}}' name='old_file' id='old_file' class='form-control form-control-lg'>
                            </div>
                            <div class="form-group">
                                  <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                          </form>
                       </div>
                   </div>
               </div>
           </div>
        </div>
    </x-slot>
</x-layouts>