@extends('layouts.app')

@section('content')
<div class="container">
    @if (!Auth::guest())
        @if (Auth::User()->isChef())
            <div class="row justify-content-center">
                <div class ="col-md-12">
                    <a class="btn btn-primary" href="{{App::getlocale()}}/dish/add">{{__('msg.NewDish')}}</a>
            </div></div>
        @endif
    @endif
    <div class="row justify-content-center">
        <div class="card col-md-2">
            <form action="{{url(App::getLocale())}}" >
            <?php $i=0; ?><br/>
                <input type="radio" name="order"> {{__('msg.newest')}}<br/>
                <input type="radio" name="order"> {{__('msg.toprate')}}<br/><br/>
                @foreach ($ingrs as $ingr)
                <?php $i++; ?>
                <input type="checkbox" name="i{{$i}}"> {{$ingr}}<br/>
                @endforeach
                <input class="btn btn-primary" type="submit" value={{__('msg.select')}}>
                <button form="null" class="btn btn-primary">{{__('msg.cancel')}}</button> 
            </form>
        </div>
        @for ($j=0; $j<2; $j++)
        <div class="col-md-4">
            <?php $i=0; ?>
            @foreach ($dishes as $dish)
            <?php $i++; ?>
            @if ($i%2!=$j)
            <div class="card">
                <a href="{{ url(App::getLocale().'/dish/'.$dish->id)}}">
                <div class="card-header">{{$dish->name}}</div>
                <div class="card-body">
                    <img style="height: 200px;" src="{{ url('uploads/'.$dish->photo_url)}}" alt="">
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
                </a>
            </div>
            @endif
            @endforeach
        </div>
        @endfor
    </div>
</div>
@endsection
