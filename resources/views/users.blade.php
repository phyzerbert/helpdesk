@extends('layouts.dashboard')
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-users"></i>&nbsp;User Management</h1>
        <!-- <p>A free and open source Bootstrap 4 admin template</p> -->
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Users</a></li>
    </ul>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="btn-group mb-3 float-right">
                    <a class="btn btn-info btn-sm" href="#" id="btn-add" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add New"><i class="fa fa-lg fa-plus"></i>Add New</a>
                </div>
                <div class="tile-body mt-3">
                    <table class="table table-hover table-bordered text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>UserID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone</th>
                                <th>Role</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ ($page_number-1) * 10 + $loop->index+1 }}</td>
                                <td class="username">{{$user->name}}</td>
                                <td class="firstname">{{$user->firstname}}</td>
                                <td class="lastname">{{$user->lastname}}</td>
                                <td class="phone">{{$user->phone}}</td>
                                <td class="role">{{$user->role}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="clearfix">
                        <div class="pull-left" style="margin: 0;">
                            <p>Total <strong style="color: red">{{ $users->total() }}</strong> users</p>
                        </div>
                        <div class="pull-right" style="margin: 0;">
                            {!! $users->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="userModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Create User</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <form action="/user/create" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" />
                    <div class="form-group">
                        <label class="control-label">User ID</label>
                        <input class="form-control" type="text" name="name" id="name" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label class="control-label">First Name</label>
                        <input class="form-control" type="text" name="firstname" id="firstname" placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Last Name</label>
                        <input class="form-control" type="text" name="lastname" id="lastname" placeholder="Last Name">
                    </div>
                    <div class="form-group">
                            <label class="control-label">Phone Number</label>
                            <input class="form-control" type="text" name="phone" id="phone" placeholder="Phone Number">
                        </div>
                    <div class="form-group">
                        <label class="control-label">Role</label>
                        <select class="form-control" name="role" id="role">
                            <option value="User">User</option>
                            <option value="Admin">Administrator</option>
                        </select>
                    </div>

                    <div class="form-group password-field">
                        <label class="control-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Password">
                    </div>

                    <div class="form-group password-field">
                        <label class="control-label">Password Confirm</label>
                        <input type="password" name="password_confirmation" id="confirmpassword" class="form-control"
                            placeholder="Password Confirm">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>&nbsp;Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>&nbsp;Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function () {
        $("#btn-add").click(function(){
            $("#userModal").modal();
        });
    });
</script>
@endsection