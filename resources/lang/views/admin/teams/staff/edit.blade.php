@extends('admin.layout')
@section('title','Team Overview:staff')
@section('content')

    <section id="team-overview">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('allTeams')}}"> Teams</a></li>
            <li class="breadcrumb-item"> <a href="{{route('viewTeam',$team->name)}}">{{$team->name}}</a> </li>
            <li class="breadcrumb-item active">{{$staff->fname.''.$staff->lname}}</li>
        </ol>
        <div id="admin-box" class="well well">
            <header>
                <h2>Team Overview</h2>
                <div id="separator"></div>
                @if(session('res') && session('res')=='updated')<div class="center-block alert alert-success">{{session('res')}}</div> @endif
                @if(session('error'))<div class="center-block alert alert-danger">{{session('error')}}</div> @endif
                <div class="row">
                    <div class="col-sm-5">
                        <img src="{{asset('images/team/'.$staff->image)}}" class="img-responsive">
                        <h4>{{$staff->fname.' '.$staff->lname}}</h4>
                        <ul class="list-unstyled">
                            <li>Position: <span>{{$staff->position}}</span></li>
                            <li><p>{{$staff->description}}</p></li>

                        </ul>
                    </div>
                    <div class="col-sm-7">
                        <form class="form-horizontal" id="editstaff" method="post" action="" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <input type="file" name="staff_image" id="staff-image" class="form-control">
                                        <p class="error">@if($errors->has('staff_image')) @endif {{$errors->first('staff_image')}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <div class="row">

                                    <div class="col-xs-6">
                                        <input type="text" class="form-control" id="staff-fname" value="{{$staff->fname}}" name="staff_firstName" placeholder="first name">
                                        <p class="error">@if($errors->has('staff_firstName')) @endif {{$errors->first('staff_firstName')}}</p>
                                    </div>
                                    <div class="col-xs-6">
                                        <input type="text" class="form-control" id="staff-lname" value="{{$staff->lname}}" name="staff_lastName" placeholder="Last name">
                                        <p class="error">@if($errors->has('staff_lastName')) @endif {{$errors->first('staff_lastName')}}</p>
                                    </div>
                                </div>

                            </div>
                            <div id="yellow-separator"></div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <label>Position</label>

                                        <select name="staff_position" id="staff-position" class="form-control">
                                            <option value="">select one</option>
                                            @foreach($positions as $position)
                                                @if(strtolower($position)==$staff->position)
                                                    <option value="{{$staff->position}}" selected>{{$staff->position}}</option>
                                                @else
                                                    <option value="{{$position}}">{{$position}}</option>
                                                @endif
                                            @endforeach

                                        </select>
                                        <p class="error">@if($errors->has('staff_position')) @endif {{$errors->first('staff_position')}}</p>
                                    </div>
                                </div>
                            </div>
                            <div id="yellow-separator"></div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <label>Description</label>
                                        <textarea id="staff_description" name="staff_description" class="form-control">{{$staff->description}}</textarea>
                                        <p class="error">@if($errors->has('staff_height')) @endif {{$errors->first('staff_height')}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" id="" class="btn btn-primary register-staff">Update</button>
                                    <input type="reset"  hidden >
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </header>
        </div>

    </section>

@endsection
@section('footer-scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('a#removestaff').on('click',function(){
                if(confirm('Are you sure you want to remove this staff ')==false){
                    return false;
                }
            })
        })
    </script>
@endsection