@extends('layouts.app')

@section('content')
<div class="container">
    @if (!Auth::guest())
        @if (Auth::User()->isChef())
            <div class="row justify-content-center">
                <div class ="col-md-10">
                    <a class="btn btn-primary" href="{{App::getlocale()}}/dish/add">{{__('msg.NewDish')}}</a>
            </div></div>
        @endif
    @endif
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
