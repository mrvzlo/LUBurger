@extends('layouts.app', ['title' => $dish->name])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{$dish->name}}</div>
                <div class="card-body">
                    <img class="img-thumbnail half" src="{{ url('uploads/'.$dish->photo_url)}}" alt="">
                    <div class="totalright">
                    <p class="price">{{$dish->price}} €</p>
                    <p>{{__('msg.ingred')}}:
                    	@foreach ($ings as $ing){{$ing}}@endforeach
                    </p>
                    <p>{{__('msg.totalRate')}}:
                        @for ($r=1; $r<6; $r++)<img style="width: 20px;" 
                            @if($r<=$dish->rating)
                                src="{{ url('uploads/10.png')}}"
                            @elseif ($r<=$dish->rating+0.5)
                                src="{{ url('uploads/05.png')}}"
                            @else
                                src="{{ url('uploads/00.png')}}"
                            @endif
                             alt="">
                        @endfor  
                    </p>
                    @if (!Auth::guest())
                    <p>{{__('msg.yourRate')}}
                        @for ($r=1; $r<6; $r++)
                        <a href={{url('rate/'.Auth::User()->id.'/'.$dish->id.'/'.$r)}}>
                            <img style="width: 20px;" 
                            @if($r<=$Urate)
                                src="{{ url('uploads/10.png')}}"
                            @elseif ($r<=$Urate+0.5)
                                src="{{ url('uploads/05.png')}}"
                            @else
                                src="{{ url('uploads/00.png')}}"
                            @endif
                             alt=""></a>
                        @endfor  
                    </p>
                    @endif
                    <a class="btn btn-a" href="{{ url(App::getLocale().'/cart/add/'.$dish->id)}}">{{__('msg.toCart')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
