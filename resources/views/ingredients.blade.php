@extends('layouts.app', ['title' => __('msg.ingred')])
@section('content')
<div class="container col-md-5">
    <div class="card">
        <div class="card-body">
            <table class="table"><?php $i=1; ?>
             @foreach ($ings as $ingr)
             <tr>
                <td>{{$i++}}. </td>
                <td>{{$ingr->name}} </td>
                <td><a class=" btn-secondary btn-sm" href="{{url(App::getLocale().'/ingredient/remove/'.$ingr->id)}}">X</a></td>
            </tr>
                @endforeach
            
            </table> 
            	<form action="{{url(App::getLocale().'/ingredients/new')}}" class='form-horizontal' accept-charset="UTF-8">
            		@csrf
                    <input class="form-control half"{{($errors->has('name') ? ' is-invalid' : '' )}} name="name" type="text" value="" autofocus>     
                    <input class="btn btn-a right" type="submit" value={{__('msg.add')}}>
                    @if ($errors->has('name')) <p>{{ $errors->first('name') }}</p> @endif 
                </form>  
            </li>
            </ol>
                
        </div>
    </div>
</div>
@endsection
