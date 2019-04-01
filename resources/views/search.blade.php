@extends('layouts.dashboard')
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-folder-open"></i>&nbsp;Search an Incident(s)</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Search an Incident(s)</a></li>
        </ul>
    </div>
    <div class="">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="tile">
                    <div class="tile-header">                     
                        <h3 class="tile-title">Search an Incident(s)</h3>                    
                        <form class="form-inline" action="{{route("incident.search")}}" method="POST">
                            @csrf
                            <label class="control-label">User ID</label>
                            <input class="form-control form-control-sm ml-3" type="text" name="username" value="{{$username}}" placeholder="User ID">
                            <label class="control-label ml-3">First Name</label>
                            <input class="form-control form-control-sm ml-3" type="text" name="firstname" value="{{$firstname}}" placeholder="First Name">
                            <label class="control-label ml-3">Last Name</label>
                            <input class="form-control form-control-sm ml-3" type="text" name="lastname" value="{{$lastname}}" placeholder="Last Name">                        
                            <label class="control-label ml-3">Phone Number</label>
                            <input class="form-control form-control-sm ml-2" type="text" name="phone" value="{{$phone}}" placeholder="Phone Number">
                            <label class="control-label ml-3">Urgency</label>
                            <label class="form-check-label ml-3">
                                <input class="form-check-input" type="radio" name="urgency" value="0" @if ($urgency != "1") checked @endif>Low
                            </label>
                            <label class="form-check-label ml-3">
                                <input class="form-check-input" type="radio" name="urgency" value="1" @if ($urgency == "1") checked @endif>High
                            </label>
                            <button class="btn btn-primary btn-sm ml-4" type="submit"><i class="fa fa-fw fa-lg fa-search"></i>Search Now</button>
                            
                        </form>                       
                    </div>
                    <div class="tile-body mt-3">
                        @csrf
                        <table class="table table-hover table-bordered text-center" id="documentTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>User ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Phone Number</th>
                                    <th>Urgency</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($incidents as $item)
                                    <tr>
                                        <td>{{ ($page_number-1) * 10 + $loop->index+1 }}</td>
                                        <td class="username">@isset($item->user) {{$item->user->name}} @endisset</td>
                                        <td class="firstname">@isset($item->user) {{$item->user->firstname}} @endisset</td>
                                        <td class="lastname">@isset($item->user) {{$item->user->lastname}} @endisset</td>
                                        <td class="phone">@isset($item->user) {{$item->user->phone}} @endisset</td>
                                        <td class="urgency">@if($item->urgency == "0") Low @else High @endif</td>
                                        <td class="">{{$item->description}}</td>
                                    </tr>
                                @endforeach                 
                            </tbody>
                        </table>
                        <div class="clearfix">
                            <div class="pull-left" style="margin: 0;">
                                <p>Total <strong style="color: red">{{ $incidents->total() }}</strong> Incidents</p>
                            </div>
                            <div class="pull-right" style="margin: 0;">
                                {!! $incidents->links() !!}
                            </div>
                        </div>
                    </div>                   
                </div>
            </div>            
        </div>
    </div>

@endsection
