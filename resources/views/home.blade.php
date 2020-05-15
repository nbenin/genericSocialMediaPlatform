@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row my-3 text-center justify-content-center">
        <form method="post" action="{{ URL::to('/home') }}" class="col-md-6">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="postContent">Say Something?</label>
                <textarea class="form-control" name="postContent" id="postContent" rows="2" placeholder="What's on your mind??"></textarea>
            </div>
            <button type="submit" name="postForm" class="btn btn-primary">Say It!</button>
        </form>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-2">

        </div>

        <div class="col-md-8 text-center">
            <h1>Feed</h1>
            @foreach ($allPosts as $post)
                <div class="card">
                    <!-- Main content of each post -->
                    <div class="card-header"><h3>{{ $post->user->name }}</h3> @ {{ $post->created_at }}</div>
                    <div class="card-body"><h4><strong>{{ $post->content }}</strong></h4></div>

                    <div id="postNumber{{ $post->id }}" class="collapse hide" aria-labelledby="headingOne">
                        <!-- append comments to each post -->
                        @foreach ($allComments as $comment)
                            @if($post->id === $comment->post_id)
                                <div class="text-left container">
                                    <h6>By {{ $comment->user->name }} @ {{ $comment->created_at }}</h6>
                                    <code>{{ $comment->content }}</code>
                                </div>
                            @endif

                        @endforeach
                        <form method="post" action="{{ URL::to('/home') }}" class="">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <textarea class="form-control" name="commentContent" id="commentContent" rows="1"></textarea>
                            </div>
                            <button type="submit" name="commentForm" value="{{$post->id}}" class="btn btn-primary">Say It!</button>
                        </form>
                    </div>

                    <!-- Add a comment to a certain post -->
                    <button class="btn btn-link" data-toggle="collapse" data-target="#postNumber{{ $post->id }}">
                        {{ $post->comments }} Comments
                    </button>
                </div>
            @endforeach
        </div>

        <div class="col-md-2">

        </div>
    </div>
</div>
@endsection
