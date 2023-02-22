@extends('layout')

@section('title',"User Resgistation")

@section('content')

@if (Session::has('message'))
    <div class="alert alert-success">   
        {{ Session::get('message'); }}
    </div>
@endif
<h2>User Registration</h2>
<form method="post" id="user_form" action="{{ url('registerUser') }}" autocomplete="off">
    @csrf
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="name" />
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="email" />
    </div>
    <div class="form-group">
        <label>Phone</label>
        <input type="text" class="form-control" name="phone" />
    </div>
    <div class="form-group">
        <label>Address</label>
        <input type="text" class="form-control" name="address" />
    </div>
    <div class="row form-group">
        <div class="col-md-4">
            <label>Country</label>
            <select class="form-control" name="country">
                <option value="">Select</option>
                <option value="ind">India</option>
            </select>
        </div>
        <div class="col-md-4">
            <label>State</label>
            <select class="form-control" name="state">
                <option value="">Select</option>
                <option value="mp">Madhaya Pradesh</option>
                <option value="up">Utter Pradesh</option>
            </select>
        </div>
        <div class="col-md-4">
            <label>city</label>
            <select class="form-control" name="city">
                <option value="">Select</option>
                <option value="indore">Indore</option>
                <option value="kanpur">Kanpur</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label>Zip Code</label>
        <input type="number" class="form-control" name="zip_code" />
    </div>
    <div class="form-group">
        <label>User Roles</label>
        <select class="form-control" name="user_role">
            <option value="">Select</option>
            @foreach ($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" class="form-control" name="password" autocomplete="off"/>
    </div>
    <div class="form-group">
        <label for="confirm_password">Confirm Password</label>
        <input type="password" class="form-control" id="confirm_password" name="confirm_password" />
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    Already have account? <a href="{{ url('login') }}">Login</a>
</form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script>
$(document).ready(function() {
$("#user_form").validate({
    rules: {
        name: "required",
        email: {required: true, email:true},
        phone: {required: true, minlength: 10, number: true},
        password: { required: true, minlength : 5},
        confirm_password: {
            required: true,
            minlength : 5,
            equalTo: "#password",
        },
        address: "required",
        city: "required",
        state: "required",
        country: "required",
        zip_code: "required",
        user_role: "required",
    },
    messages:{
        phone:{
            required: 'Phone number is required',
        }
    }
});
});
</script>

@endsection
