@extends('layouts.application')

@section('title', '投稿一覧')

@section('content')
  <h1>{{$thread->name}}</h1>
  <a href="{{route('board.thread.index', $thread->board_id)}}">スレッド一覧に戻る</a>

  <div>
    <a href="{{route('board.thread.post.create', [$thread->board_id, $thread->id])}}">
      コメント投稿
    </a>
  </div>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>ユーザ名</th>
        <th>メッセージ</th>
        <th>ユーザID</th>
        <th>IPアドレス</th>
        <th>編集</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $post)
        <tr id="post{{$post->inner_id}}" style="height: 20vh">
          <td>{{$post->inner_id}}</td>
          <td>{{$post->name}}</td>
          <td>
            {!! Helper::comment_display($post->comment) !!}
          </td>
          <td>{{$post->author_hash}}</td>
          <td>{{$post->ip_addr}}</td>
          <td>
            <a href="{{route('board.thread.post.edit', [$thread->board_id, $thread->id, $post->id])}}">
              編集
            </a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
