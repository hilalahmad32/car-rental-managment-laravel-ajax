<x-app-layout>
    <x-slot name="title">register-user</x-slot>
    <x-slot name="content">
      <div class="container my-5">
          <div class="card">
              <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h5>Admins ()</h5>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#users">
                        Add Admins
                    </button>
                </div>
              </div>
          </div>
      </div>
      <div class="container">
        <div id="get-user"></div>
  </div>
      <x-guest-layout>
        <x-slot name="title">register-user</x-slot>
      <div class="modal fade" id="users" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Add User</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                {{-- <x-auth-card> --}}
                    <!-- Validation Errors -->
                    {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}
    

                <form id="save-user">
                    @csrf
                    <!-- First Name -->
                    <div>
                        <x-label for="fname" :value="__('First Name')" />

                        <x-input id="fname" class="block mt-1 w-full" type="text" name="fname" :value="old('fname')"
                             autofocus />
                    </div>
                    <!-- Last Name -->
                    <div class="mt-4">
                        <x-label for="lname" :value="__('Last Name')" />

                        <x-input id="lname" class="block mt-1 w-full" type="text" name="lname" :value="old('lname')"
                             autofocus />
                    </div>
                    <!-- username -->
                    <div class="mt-4">
                        <x-label for="name" :value="__('Username')" />

                        <x-input id="username" class="block mt-1 w-full" type="text" name="username"
                            :value="old('username')"  autofocus />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-label for="email" :value="__('Email')" />

                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                             />
                    </div>
                    <!-- User image -->
                    <div class="mt-4">
                        <x-label for="image" :value="__('Image')" />

                        <x-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')"
                             autofocus />
                    </div>
                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password" :value="__('Password')" />

                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" 
                            autocomplete="new-password" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-input id="c_password" class="block mt-1 w-full" type="password"
                            name="password_confirmation"  />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-button class="ml-4">
                            {{ __('Register') }}
                        </x-button>
                    </div>
                </form>
                                   
            {{-- </x-auth-card> --}}
              </div>
          </div>
      </div>
  </div>
  
</x-guest-layout>
      <x-guest-layout>
        <x-slot name="title">register-user</x-slot>
      <div class="modal fade" id="edit-user" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Update User</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                {{-- <x-auth-card> --}}
                    <!-- Validation Errors -->
                    {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}
    

                <form id="update-user">
                    @csrf
                    <div id="get-user-form"></div>
                 
                    
                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4">
                            {{ __('Register') }}
                        </x-button>
                    </div>
                </form>
                                   
            {{-- </x-auth-card> --}}
              </div>
          </div>
      </div>
  </div>
  
</x-guest-layout>

      
    </x-slot>
</x-app-layout>