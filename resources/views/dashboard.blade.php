@extends('layouts.app')

@section('content')
    <h2 class="subheader">Friends</h2>
    <table style="width:100%;">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach (Auth::user()->friends as $friend)
            <tr>
                <td>{{ $friend->name }}</td>
                <td>{{ $friend->email }}</td>
                <td><form method="post" action="{{ URL::to('/dashboard') }}">
                        {{ csrf_field() }}
                        <button type="submit" name="removeFriend" onclick="removeFriend()" value="{{ $friend->id }}">Remove Friend</button>
                    </form>
                    <input type="button" value="{{ $friend->id }}" class="removeFriend">
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <h2 class="subheader">Other People</h2>
    <table style="width:100%;">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($notFriends as $notFriend)
            <tr>
                <td>{{ $notFriend->name }}</td>
                <td>{{ $notFriend->email }}</td>
                <td>
                    <form method="post" action="{{ URL::to('/dashboard') }}">
                        {{ csrf_field() }}
                        <button type="submit" name="addFriend" value="{{ $notFriend->id }}">Add Friend</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
