@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    <?php
    	$url = url()->current();
    	$ur2 = url()->previous();
    	echo $url.$ur2;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
