@extends('layouts.app', ['title' => 'Ingredients'])
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <ol>
             @foreach ($ings as $ingr)
             <li>{{__('msg.'.$ingr->name)}}</li>
                @endforeach
            
            <li> 
            	<form action="{{url(App::getLocale().'/ingredients/new')}}" class='form-horizontal' accept-charset="UTF-8">
                    <input class="form-control " name="name" type="text" value="">   
                    <input class="btn btn-primary" type="submit" value="Add">
                </form>  
            </li>
            </ol>
                
        </div>
    </div>
</div>
@endsection
