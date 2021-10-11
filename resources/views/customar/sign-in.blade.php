<x-layouts>
    <x-slot name="title">Sign in</x-slot>
    <x-slot name="content">
        <div class="carbg">
            <h1>Welcome to Login</h1>
        </div>

        <div class="container my-5">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12 mt-3 offset-lg-3
                    offset-md-2 offset-sm-12">
                    <form action="" id="login">
                        @csrf
                        <div class="form-group">
                            <label for="">Enter Email</label>
                            <input type="text" name="email" id="email" class="form-control form-control-lg">
                        </div>
                        <div class="form-group">
                            <label for="">Enter Password</label>
                            <input type="password" name="password" id="password" class="form-control form-control-lg">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success">Login</button>
                        </div>
                        <span>Create Acount ? <a href="{{ route('signup') }}">Sign
                                Up</a></span>
                    </form>
                </div>
            </div>
        </div>
    </x-slot>
</x-layouts>
