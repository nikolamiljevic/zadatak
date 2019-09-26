@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <b> Title </b> 
                </div>
                <div class="card-body">
                    Article body
                </div>
                <hr>
                <h3>Comments</h3>
                <div class="card-body alert-info">
                <b>Username</b><br>
                    Comment
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



