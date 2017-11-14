@extends('adminTeam.layout')
@section('title','Team Overview:Player')
@section('content')

    <section id="team-overview">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('overview')}}"> staffs</a></li>
            <li class="breadcrumb-item active">{{$staff->fname.' '.$staff->lname}}</li>
        </ol>
        <div id="admin-box" class="well well">
            <header>
                <h2>{{$staff->position}} Information</h2>
                <div id="separator"></div>
                <div class="row">
                    <div class="col-sm-5">
                        @if($staff->image=='')
                            <img src="{!! asset('images/user.jpg') !!}" class="img-responsive">
                        @else
                            <img src="{{asset('images/team/'.$staff->image)}}" class="img-responsive">
                        @endif
                        <h4>{{$staff->fname.' '.$staff->lname}}</h4>
                            <ul class="list-unstyled">
                                <li>Position: <span>{{$staff->position}}</span></li>
                                <li> {{$staff->description?$staff->description:''}}</li>
                            </ul>
                    </div>

                    <div class="col-sm-7">
                        <a href="{{route('upStaff',[$staff->id])}}" id="editStaff" class="btn-purple"><i class="fa fa-edit"></i> Edit </a>
                        <a href="{{route('downStaff',[$staff->id])}}" id="removeStaff" class="btn-purple"><i class="fa fa-remove"></i> Remove</a>
                    </div>
                </div>
            </header>
        </div>

    </section>

@endsection
@section('footer-scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('a#removeStaff').on('click',function(){
                if(confirm('Are you sure you want to remove this staff ')==false){
                    return false;
                }
            })
        })
    </script>
@endsection