@extends('layouts.app')

@section('content')

    <div class="container">
        <h3>Create Shortened URL <a class="pull-right" href="{{url('urls')}}">Shortened URLs</a></h3>
        @if(Session::has('success'))
            <div class="alert alert-success">{!! Session::get('success') !!}</div>
        @endif
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{!! $error !!}</div>
            @endforeach
        @endif
        <form action="" method="post" class="form-horizontal" id="shortened-form">
            {{csrf_field()}}
            <div class="form-group">
                <label class="col-lg-2 " for="name">URL:</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="real_url" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2" for="name">&nbsp;</label>
                <div class="col-lg-10">
                    <button class="btn btn-primary" type="submit">Create</button>
                </div>
            </div>
        </form>
   
@endsection
