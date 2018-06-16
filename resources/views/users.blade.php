@extends('layouts.app', ['title' => 'Ingredients'])
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <ol>
             @foreach ($users as $user)
             <li>{{$user->name}}</li>
                @endforeach
            </ol>
                
        </div>
    </div>
</div>
@endsection
