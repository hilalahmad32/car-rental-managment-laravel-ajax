<x-layouts>
<x-slot name="title">contact</x-slot>
<x-slot name="content">
<div class="contactbg">
            <h1>Welcome to Contact</h1>
        </div>

        <div class="container mt-5">
            <h1 class="text-center my-4">Contact US</h1>
            <ul>
                <li class="social text-center">
                    <i class="fa fa-facebook"
                        aria-hidden="true"></i>
                    <i class="fa fa-instagram ml-3"
                        aria-hidden="true"></i>
                    <i class="fa fa-pinterest ml-3"
                        aria-hidden="true"></i>
                    <i class="fa fa-youtube ml-3"
                        aria-hidden="true"></i>
                </li>
            </ul>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 mt-3">
                    <div class="about-img">
                        <form action="" id="contact-form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Enter Your Name</label>
                                <input type="text" name="name" id="name"
                                    class="form-control form-control-lg">
                            </div>
                            <div class="form-group">
                                <label for="">Enter Email</label>
                                <input type="text" name="email" id="email"
                                    class="form-control form-control-lg">
                            </div>
                            <div class="form-group">
                                <label for="">Enter Message</label>
                                <textarea name="message" id="message" cols="30"
                                    rows="10" class="form-control
                                    form-control-lg"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Message</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 mt-3">
                    <h1 style="font-size:5rem;">Location</h1>
                </div>
            </div>
        </div>

</x-slot>
</x-layouts>