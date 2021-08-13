<x-layouts>
    <x-slot name="title">reset-password</x-slot>
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
                        
                          <form action="" method="POST">
                              @csrf
                             <div class='form-group'>
                                    <label for=''>Enter First Name</label>
                                    <input type='text'  name='email' id='email' class='form-control form-control-lg'>
                            </div>
                            <div class='form-group'>
                                    <label for=''>Enter Last Name</label>
                                    <input type='password' name='update_password' id='update_password' class='form-control form-control-lg'>
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