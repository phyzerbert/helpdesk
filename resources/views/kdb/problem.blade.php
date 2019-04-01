@extends('layouts.dashboard')
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-database"></i>&nbsp;Knowledge Base</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Knowledge Base</a></li>
        </ul>
    </div>
    <div class="">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="tile">
                    <div class="tile-header">                     
                        <h3 class="tile-title float-left">Knowledge Base</h3>
                        <div class="float-right">
                            <form class="form-inline" action="{{route("kdb.index")}}" method="POST">
                                @csrf
                                <div class="app-search">
                                    <input class="form-control" type="search" name="key" value="{{$key}}" style="width:250px;" placeholder="Search(minimum 3 characters)" />
                                    <button class="app-search__button" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                                <a href="{{route('kdb.create')}}" class="btn btn-primary" id="create_article">Create An Aricle</a>                          
                            </form>
                            
                        </div>                                             
                    </div>
                    <div class="clearfix"></div>
                    <div class="tile-body mt-3">
                        <h4>List of IT Problems</h4>
                        <table class="table table-hover text-center" id="documentTable">
                            <thead>
                                <tr>
                                    <th width="50">No</th>
                                    <th>Problem</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($problems as $item)
                                    <tr>
                                        <td>{{ ($page_number-1) * 10 + $loop->index+1 }}</td>
                                        <td class="problem" align="left"><a href="{{route('kdb.solution', $item->id)}}">@isset($item->problem) {{$item->kb_number}}&nbsp;-&nbsp;{{$item->problem}} @endisset</a></td>
                                    </tr>
                                @endforeach                 
                            </tbody>
                        </table>
                        <div class="clearfix">
                            <div class="pull-left" style="margin: 0;">
                                <p>Total <strong style="color: red">{{ $problems->total() }}</strong> Problems</p>
                            </div>
                            <div class="pull-right" style="margin: 0;">
                                {!! $problems->links() !!}
                            </div>
                        </div>
                    </div>                   
                </div>
            </div>            
        </div>
    </div>
@endsection
