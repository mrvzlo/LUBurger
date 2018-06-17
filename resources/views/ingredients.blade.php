@extends('layouts.app', ['title' => __('msg.ingred')])
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <ol>
             @foreach ($ings as $ingr)
             <li>{{$ingr->name}}</li>
                @endforeach
            
            <li> 
            	<form action="{{url(App::getLocale().'/ingredients/new')}}" class='form-horizontal' accept-charset="UTF-8">
            		@csrf
                    <input class="form-control "{{($errors->has('name') ? ' is-invalid' : '' )}} name="name" type="text" value="" autofocus>     
                    @if ($errors->has('name')) <p>{{ $errors->first('name') }}</p> @endif 
                    <input class="btn btn-primary" type="submit" value={{__('msg.add')}}>
                </form>  
            </li>
            </ol>
                
        </div>
    </div>
</div>
@endsection
