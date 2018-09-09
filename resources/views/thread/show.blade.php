@extends('layouts.application')

@section('title', 'スレッド一覧')

@section('content')
  <table>
    <thead>
      <tr>
        <th>スレッド名</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($threads as $thread)
        <tr>
          <td><a href="{{url('post', $thread->id)}}">{{$thread->name}}</a></td>
        </tr>
      @endforeach
    </tbody>
@endsection
