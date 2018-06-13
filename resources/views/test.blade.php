@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$lang}}</div>

                <div class="card-body">
                            {{ trans('msg.home') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
