@extends('layouts.dashboard')

@section('content')
<div class="row user">
    <div class="col-md-12">
        <div class="profile">
            <div class="info"><img class="user-img" src="{{asset('images/avatar128.png')}}" />
                <h4>{{Auth::user()->name}}</h4>
                <p></p>
            </div>
            <div class="cover-image"></div>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="tile user-settings">
                <h4 class="line-head">My Profile</h4>
                <form method="post" action="/updateuser" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{Auth::user()->id}}" />
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <label>UserID</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{Auth::user()->name}}" readonly>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-12 mb-4">
                            <label>FirstName</label>
                            <input class="form-control" type="text" name="firstname" id="firstname" value="{{Auth::user()->firstname}}" />
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-12 mb-4">
                            <label>LastName</label>
                            <input class="form-control" type="text" name="lastname" id="firstname" value="{{Auth::user()->lastname}}" />
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-12 mb-4">
                            <label>Phone Number</label>
                            <input class="form-control" type="text" name="phone" id="phone" value="{{Auth::user()->phone}}" />
                        </div>
                        
                        <div class="clearfix"></div>
                        <div class="col-md-12 mb-4">
                            <label>New Password</label>
                            <input class="form-control" name="newpassword" id="newpassword" type="password">
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-12 mb-4">
                            <label>Password Confirm</label>
                            <input class="form-control" name="newpasswordconfirm" id="newpasswordconfirm" type="password">
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-md-12">
                            <button class="btn btn-primary float-right" id="profile-submit" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>        
</div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $("#profile-submit").click(function(){
           
            let newpassword = $("#newpassword").val();
            let newpasswordconfirm = $("#newpasswordconfirm").val();

            if(newpassword != newpasswordconfirm && newpassword != ""){
                alert("Please Confirm new password.");
                $("#newpassword").focus();
                return false;
            }
        });
    });
</script>
@endsection
