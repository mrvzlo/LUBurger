@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{__('msg.NewDish')}}</div>
                <div class="card-body">
	            	<form action="{{url(App::getLocale().'/ingredients/new')}}" class='form-horizontal' accept-charset="UTF-8" enctype="multipart/form-data">
	            		@csrf
	            		<label>{{__('msg.name')}}</label>
	                    <input class="form-control" name="name" type="text" value="">   
	            		<label>{{__('msg.ingred')}}</label>
	            		
	            		<br/><label>{{__('msg.price')}}</label>
	                    <input class="form-control" name="name" type="number" value="">  
	                    <label>{{__('msg.photo')}}</label>
	                    <input class="form-control" type="file" name="file">
	                    <input class="btn btn-primary" type="submit" value={{__('msg.add')}}>
	                </form>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection