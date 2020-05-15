@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="text-center">
            <h1>{{ $user->name }}'s Profile</h1>
            <p>{{ $user->email }}</p>
        </div>
    </div>

    <!-- Submit posts on own page -->
    @if (Auth::user()->id === $user->id)
    <div class="row my-3 text-center justify-content-center">
        <form method="post" action="{{ URL::to('/profile/' . $user->id) }}" class="col-md-6">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="postContent">Say Something?</label>
                <textarea class="form-control" name="postContent" id="postContent" rows="2" placeholder="What's on your mind??"></textarea>
            </div>
            <button type="submit" name="postForm" class="btn btn-primary">Say It!</button>
        </form>
    </div>
    @endif

    <!-- hides profile if not friends -->
    @if(Auth::user()->friend_id === $user->id)
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-2">

            </div>

            <div class="col-md-8 text-center">
                <h3>My Posts</h3>

                @foreach ($user->posts->reverse() as $post)
                    <div class="card">
                        <div class="card-header">{{ $post->user->name }}</div>
                        <div class="card-body">{{ $post->content }}</div>

                        <div id="postNumber{{ $post->id }}" class="collapse hide" aria-labelledby="headingOne">
                            <!-- append comments to each post -->
                            @foreach ($post->comments->reverse() as $comment)
                                    <div class="text-left container">
                                        <h6>By {{ $comment->user->name }} @ {{ $comment->created_at }}</h6>
                                        <code>{{ $comment->content }}</code>
                                    </div>
                            @endforeach
                            <form method="post" action="{{ URL::to('/profile/'. $user->id) }}" class="">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <textarea class="form-control" name="commentContent" id="commentContent" rows="1"></textarea>
                                </div>
                                <button type="submit" name="commentForm" value="{{ $post->id }}" class="btn btn-primary">Say It!</button>
                            </form>
                        </div>

                        <!-- Add a comment to a certain post -->
                        <button class="btn btn-link" data-toggle="collapse" data-target="#postNumber{{ $post->id }}">
                            {{ $post->commentCount }} Comments
                        </button>
                    </div>
                @endforeach
            </div>

            <div class="col-md-2">

            </div>
        </div>
    </div>
    @else
        <form method="post" action="{{ URL::to('/profile/' . $user->id) }}">
            {{ csrf_field() }}
            <button type="submit" name="addFriend" value="{{ $user->id }}">Add Friend!</button>
        </form>
    @endif


@endsection
