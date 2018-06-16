@extends('layouts.app', ['title' => $dish->name])

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
                    <p>
                        @for ($r=1; $r<6; $r++)<img style="width: 20px;" 
                            @if($r<=$dish->rating)
                                src="{{ url('uploads/10.jpg')}}"
                            @elseif ($r<=$dish->rating+0.5)
                                src="{{ url('uploads/05.jpg')}}"
                            @else
                                src="{{ url('uploads/00.jpg')}}"
                            @endif
                             alt="">
                        @endfor  
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
