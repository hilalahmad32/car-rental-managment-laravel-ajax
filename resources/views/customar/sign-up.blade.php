<x-layouts>
    <x-slot name="title">Sign up</x-slot>
    <x-slot name="content">
        <div class="carbg">
            <h1>Welcome to SignUp</h1>
        </div>

        <div class="container my-5">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12 mt-3 offset-lg-3
                    offset-md-2 offset-sm-12">
                    <form action="" id="addCustomar">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="">Enter First Name</label>
                                    <input type="text" name="fname" id="fname" class="form-control form-control-lg">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="">Enter Last Name</label>
                                    <input type="text" name="lname" id="lname" class="form-control form-control-lg">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="">Enter Username</label>
                            <input type="text" name="username" id="username" class="form-control form-control-lg">
                        </div>
                        <div class="form-group">
                            <label for="">Enter Email</label>
                            <input type="text" name="email" id="email" class="form-control form-control-lg">
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="">Enter Password</label>
                                    <input type="password" name="password" id="password"
                                        class="form-control form-control-lg">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="">Enter Confirm Password</label>
                                    <input type="password" name="cpassword" id="cpassword"
                                        class="form-control form-control-lg">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Enter Profile</label>
                            <input type="file" name="profile" id="profile" class="form-control form-control-lg">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success">Sign Up</button>
                        </div>
                        <span>Already Acount ? <a href="{{ route('signin') }}">Sign
                                in</a></span>
                    </form>
                </div>
            </div>
        </div>
    </x-slot>
</x-layouts>
