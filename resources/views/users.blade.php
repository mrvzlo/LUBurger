@extends('layouts.app', ['title' => 'Ingredients'])
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{url(App::getLocale().'/users/update')}}" class='form-horizontal'>
            <table>
            <tr>
                <th></th>
                <th>{{__('msg.name')}}</th>
                <th>{{__('msg.email')}}</th>
                <th>{{__('msg.phone')}}</th>
                <th>{{__('msg.role')}}</th>
            </tr>
            <?php $i=1; $roles=array('none','admin','chef');?>
             @foreach ($users as $user)<tr>
                <td>{{$i++}}</td>
             <td>{{$user->name}} </td> 
             <td>{{$user->email}} </td> 
             <td>{{$user->phone}} </td> 
             <td>
                <select name="role" class="form-control" id="role{{$user->id}}">
                        @foreach ($roles as $r)
                            <option value={{$r}} 
                            @if ($r==$roles[$user->role-1]) selected @endif
                            >{{__('msg.'.$r)}}</option>
                        @endforeach
                </select>
                             </td>
                </tr>@endforeach
            </table>
            @csrf
            <input class="btn btn-primary" type="submit" value={{__('msg.update')}}>
            </form>
        </div>
    </div>
</div>
@endsection
