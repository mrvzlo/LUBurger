@extends('layouts.app', ['title' => __('msg.orders')])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">{{__('msg.orders')}}</div>
            <div class="card-body">
                @if ($count!=0)
                    <table class="table table-hover">
                        <thead><tr class="table-primary">
                            <th scope="col"></th>
                            @if (Auth::User()->isAdmin())
                            <th scope="col">{{__('msg.user')}}</th>
                            <th scope="col">{{__('msg.phone')}}</th>
                            @endif
                            <th scope="col">{{__('msg.dstAddress')}}</th>
                            <th scope="col">{{__('msg.price')}}</th>
                            <th scope="col">{{__('msg.status')}}</th>
                            <th scope="col">{{__('msg.dTime')}}</th>
                            <th></th>
                        </tr></thead>
                        <tbody>
                            <?php $i=1; ?>
                        @foreach ($ords as $ord)
                        <tr class="{{$ord->status}}">
                            <td>{{$i++}}</td>
                            @if (Auth::User()->isAdmin())
                            <td>{{ $ord->u_name }}</td>
                            <td>{{ $ord->u_phone }}</td>
                            @endif
                            <td>{{ $ord->address }}</td>
                            <td>{{ $ord->sum  }}€</td>
                            <td>{{ $ord->status  }}  </td>
                            <td>{{ $ord->delivery }}</td>
                            <td><a class="btn btn-primary btn-sm" href="{{url(App::getLocale().'/order/'.$ord->id)}}">{{ __('msg.details') }}</a></td>
                        </tr>
                        @endforeach          
                        </tbody>
                    </table>
                @else
                {{__('msg.noOrder')}}
                @endif
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
