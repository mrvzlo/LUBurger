@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2"><div class="card">
            <div class="card-header">{{__('msg.ingred')}}</div>
            <form action="{{url(App::getLocale())}}" class='form-horizontal card-body' accept-charset="UTF-8" enctype="multipart/form-data">
                <input type="radio" name="orderby" value="new"
                @if (!isset($param['orderby']) || $param['orderby']!="rate") checked @endif
                > {{__('msg.newest')}}<br/>
                <input type="radio" name="orderby" value="rate"
                @if (isset($param['orderby']) && $param['orderby']=="rate") checked @endif
                > {{__('msg.toprate')}}<br/><br/>
                @foreach ($ingrs as $ingr)
                <input type="checkbox" name="ing{{$ingr->id}}" 
                @if (!isset($param['modified']) || isset($param['ing'.$ingr->id])) checked @endif
                > {{$ingr->name}}<br/>
                @endforeach
                <input class="btn btn-primary" type="submit" value={{__('msg.select')}}>
                <a href="{{App::getlocale()}}" class="btn btn-primary">{{__('msg.cancel')}}</a> 
            </form>
        </div></div>
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
        <div class="col-md-2"></div>
    </div>
</div>
@endsection
