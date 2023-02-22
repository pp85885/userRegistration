@extends('layout')

@section('title',"Login Form")
    
@section('content')

<div class="container">
    <h2>User Login</h2>
    <div style="color:red" id="show_error"></div>
    <form method="post" id="login_form" onsubmit="return false" autocomplete="off">
        @csrf
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" />
            <span class="text-danger error-text email_error" style="color: red"></span>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" />
            <span class="text-danger error-text password_error" style="color: red"></span>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        Don't have account? <a href="{{ url('/') }}">Register</a>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $("#login_form").submit(function(){
        $("#show_error").html('');
        $.ajax({
            url:  "{{ url('login') }}",
            type: "POST",
            data: $('#login_form').serialize(),
            beforeSend:function(){
                $(document).find('span.error-text').text('');
            },
            success: function(data){
                if (data.status==0) {
                    $.each(data.error, function(prefix, val){
                        $('span.'+prefix+'_error').text(val[0]);
                    });
                }else if(data == 2){
                    $("#show_error").html("Invalid login details");
                }else{
                    alert("Logged in as a "+data.user);
                    $('#login_form')[0].reset();
                }
            }
        })
    });
</script>

@endsection