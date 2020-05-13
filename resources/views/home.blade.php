@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row my-3 text-center justify-content-center">
        <form method="post" action="{{URL::to('/home')}}" class="col-md-6">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="postContent">Say Something?</label>
                <textarea class="form-control" name="postContent" id="postContent" rows="2" placeholder="What's on your mind??"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Say It!</button>
        </form>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-3">

        </div>

        <div class="col-md-6 text-center">
            <div class="card">
                <div class="card-header">Feed</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>

        <div class="col-md-3">

        </div>
    </div>
</div>
@endsection
