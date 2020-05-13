@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="text-center">
            <h1>{{ $user->id }}</h1>
            <p>{{ $user->email }}</p>
        </div>
    </div>

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-3">

            </div>

            <div class="col-md-6 text-center">
                <h3>Feed</h3>

                @foreach ($userPosts as $post)
                    <div class="card">
                        <div class="card-header">{{ $post->user_id }}</div>
                        <div class="card-body">{{ $post->content }}</div>
                    </div>
                @endforeach
            </div>

            <div class="col-md-3">

            </div>
        </div>
    </div>
@endsection
