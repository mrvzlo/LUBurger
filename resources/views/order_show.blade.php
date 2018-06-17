@extends('layouts.app', ['title' => __('msg.order')])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">{{__('msg.order')}}</div>
            <div class="card-body">
                {{__('msg.dstAddress').': '.$ord->address}}<br/>
                {{__('msg.status').': '.$ord->status}}<br/>
                @if ($ord->st==1) 
                {{__('msg.dTime').': '.$ord->delivery}}<br/>
                @endif
                @if (Auth::User()->isAdmin())
                {{__('msg.ordby').': '.$ord->u_name}}<br/>
                {{__('msg.phone').': '.$ord->u_phone}}
                @endif

                    <table class="table table-hover">
                        <thead><tr class="table-primary">
                            <th scope="col"></th>
                            <th scope="col">{{__('msg.dish')}}</th>
                            <th scope="col">{{__('msg.price')}}</th>
                            <th scope="col">{{__('msg.count')}}</th>
                            <th scope="col">{{__('msg.total')}}</th>
                        </tr></thead>
                        <tbody>
                            <?php $i=1; ?>
                        @foreach ($list as $dish)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{ $dish->name }}</td>
                            <td>{{ $dish->price  }}€</td>
                            <td>{{ $dish->count  }} </td>
                            <td>{{ $dish->count*$dish->price }}€</td>
                        </tr>
                        @endforeach 
                        <tr class="table-primary">
                            <td colspan="4"></td>
                            <td>{{ $ord->sum }}€</td>
                        </tr>                        
                        </tbody>
                    </table>
                @if (Auth::User()->isAdmin() && $ord->st==0)
                <form action="{{url(App::getLocale().'/order/update/'.$ord->id)}}" class='form-horizontal' accept-charset="UTF-8">
                    {{__('msg.dTime')}}
                    <input class="form-control" type="time" name="time">
                        @if ($errors->has('time')) <p>{{ $errors->first('time') }}</p> @endif 
                    <input class="btn btn-primary" type="submit" value={{__('msg.set')}}>
                </form>
                @endif
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
