@extends('layouts.application')

@section('title', 'コメント修正')

@section('content')
  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  <a href="{{route('board.thread.post.index', [$thread->board_id,  $thread->id])}}">投稿一覧に戻る</a>

  <form action="{{route('board.thread.post.update', [$thread->board_id,  $thread->id, $post->id])}}" method="post">
    <input type="hidden" name="_method" value="PUT">
    {{ csrf_field() }}
    <div>
      <label for="name">名前</label>
      <input type="text" name="name" placeholder="名前" value="{{$post->name}}">
    </div>
    <div>
      <label for="comment">コメント</label>
      <textarea name="comment" placeholder="コメント">{{$post->comment}}</textarea>
    </div>
    <div>
      <label for="password">パスワード確認</label>
      <input type="text" name="password" placeholder="パスワード">
    </div>
    <div>
      <input type="submit" value="送信">
    </div>
  </form>
@endsection
