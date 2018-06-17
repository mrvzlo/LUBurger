@extends('layouts.app', ['title' => __('msg.cart')])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">{{__('msg.cart')}}</div>
            <div class="card-body">
            	@if (!session()->exists('cart') || $count==0)
            	{{__('msg.emptyCart')}}
            	@else
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
                            <td>
                            	<a class="btn btn-primary btn-sm" href='{{ url(App::getLocale().'/cart/add/'.$dish->id) }}'>+</a>
                            	 {{ $dish->count  }} 
                            	<a class="btn btn-primary btn-sm" href='{{ url(App::getLocale().'/cart/remove/'.$dish->id) }}'>-</a>
                            </td>
                            <td>{{ $dish->count*$dish->price }}€</td>
                        </tr>
                        @endforeach 
                        <tr class="table-primary">
                            <td colspan="4"></td>
                            <td>{{ $total }}€</td>
                        </tr>                        
                        </tbody>
                    </table>
                <form action="{{url(App::getLocale().'/order/new')}}" class='form-horizontal' accept-charset="UTF-8" enctype="multipart/form-data">
                	@csrf
                	{{__('msg.dstAddress')}}
                	<input type="text" class="form-control" name="address">
                                @if ($errors->has('address'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                	<input type="submit" class="btn btn-primary" name="submit" value="{{__('msg.makeOrder')}}">
                </form>
            	@endif
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
