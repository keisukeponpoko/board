@extends('layouts.application')

@section('title', 'スレッド一覧')

@section('content')
  <h1>{{$board->name}}</h1>
  <a href="{{route('board.index')}}">掲示板一覧に戻る</a>

  <div>
    <a href="{{route('board.thread.create', $board->id)}}">新規作成</a>
  </div>

  <table>
    <thead>
      <tr>
        <th>スレッド名</th>
        <th>コメント数</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($threads as $thread)
        <tr>
          <td>
            <a href="{{route('board.thread.post.index', [$thread->board_id, $thread->id])}}">
              {{$thread->name}}
            </a>
          </td>
          <td>{{$thread->posts_count}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
