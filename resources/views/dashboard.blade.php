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
                        <button type="submit" name="removeFriend" value="{{ $friend->id }}">Remove Friend</button>
                    </form></td>
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
        @foreach ($notFriends as $friend)
            <tr>
                <td>{{ $friend->name }}</td>
                <td>{{ $friend->email }}</td>
                <td>
                    <form method="post" action="{{ URL::to('/dashboard') }}">
                        {{ csrf_field() }}
                        <button type="submit" name="addFriend" value="{{ $friend->id }}">Add Friend</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
