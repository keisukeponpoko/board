@extends('layouts.application')

@section('title', '掲示板一覧')

@section('content')
  <table>
    <thead>
      <tr>
        <th>掲示板名</th>
        <th>説明</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($boards as $board)
        <tr>
          <td><a href="{{url('thread', $board->id)}}">{{$board->name}}</a></td>
          <td>{{$board->description}}</td>
        </tr>
      @endforeach
    </tbody>
@endsection
