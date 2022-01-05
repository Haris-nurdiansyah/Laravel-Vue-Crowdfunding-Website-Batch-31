@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <h6> Your name is : {{ auth()->user()->name }} </h6>
                    <h6> Your name is : {{ auth()->user()->role->name }} </h6>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
