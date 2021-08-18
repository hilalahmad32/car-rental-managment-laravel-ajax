<x-app-layout>
    <x-slot name="title">Update Profile </x-slot>
    <x-slot name="content">
        <div class="container my-5">
            <div class="card">
                <div class="card-header">
                    <h1>Update Profile</h1>
                </div>
                <div class="card-body">
                    <form action="" enctype="multipart/form-data" id="updateProfiles">
                        <div>
                            <label>First Name</label>
                    
                            <input id='edit_fname' value='{{$profile->fname}}'  class='block form-control form-control-lg mt-1 w-full' type='text' name='edit_fname' autofocus />
                            <input id='edit_id' value='{{$profile->id}}'  class='block form-control form-control-lg mt-1 w-full' type='hidden' name='edit_id' autofocus />
                        </div>
                      
                        <div class='mt-4'>
                            <label>Last Name</label>
                            <input id='edit_lname' value='{{$profile->lname}}' class='block form-control form-control-lg mt-1 w-full' type='text' name='edit_lname'
                                 autofocus />
                        </div>
                      
                        <div class='mt-4'>
                            <label>Username</label>       
                            <input id='edit_username' value='{{$profile->username}}' class='block form-control form-control-lg mt-1 w-full' type='text' name='edit_username'
                              autofocus />
                        </div>
                    
                      
                        <div class='mt-4'>
                            <label>Email</label>     
                            <input id='edit_email' value='{{$profile->email}}' class='block form-control form-control-lg mt-1 w-full' type='email' name='edit_email'
                                 />
                        </div>
                    
                        <div class='mt-4'>
                            <label>Image</label>    
                             <input id='new_image' class='block form-control form-control-lg mt-1 w-full' type='file' name='new_image'
                                 autofocus />
                                 <img src='{$image}' alt='' style='width:100px;height:100px;'>
                                 <input id='old_image' value='{{$profile->image}}'  class='block form-control form-control-lg mt-1 w-full' type='hidden' name='old_image'
                                 autofocus />
                        </div>
                        <div class='mt-4'>
                          <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>