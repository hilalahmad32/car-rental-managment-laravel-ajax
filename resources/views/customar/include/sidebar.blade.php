    <div class="card">
        <div class="card-header">
            <div class="account-image">
                <img src="{{asset("upload/customar")}}/{{$account->image}}" alt="">
            </div>
        </div>
        <div class="card-body">
            <a href="{{ route('book-car')}}"><button class="btn w-100 btn-success my-2">Book Car</button></a>
            <a href=""><button   class="btn w-100 btn-success my-2">Payment</button></a>
            <a href="{{ route('update-profile') }}"><button id="edit-profile"  class="btn w-100 btn-success my-2">Update Profile</button></a>
            <button  class="btn w-100 btn-danger my-2" id="delete-account">Delete Account</button>
        </div>
    </div>