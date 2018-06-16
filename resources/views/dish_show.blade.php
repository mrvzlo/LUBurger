@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{$dish->name}}</div>
                <div class="card-body">
                	<p>{{$dish->price}} €</p>
                    <img class="img-thumbnail" src="{{ url('uploads/'.$dish->photo_url)}}" alt="" style="display: none">
                    <p>{{__('msg.ingred')}}:
                    	@foreach ($ings as $ing){{$ing}}@endforeach
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
