@extends('layouts.application')

@section('title', 'コメント追加')

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

  <form action="{{route('board.thread.post.store', [$thread->board_id,  $thread->id])}}" method="post">
    {{ csrf_field() }}
    <div>
      <label for="name">名前</label>
      <input type="text" name="name" placeholder="名前">
    </div>
    <div>
      <label for="comment">コメント</label>
      <textarea name="comment" placeholder="コメント"></textarea>
    </div>
    <div>
      <label for="password">パスワード</label>
      <input type="text" name="password" placeholder="パスワード">
    </div>
    <div>
      <input type="submit" value="送信">
    </div>
  </form>
@endsection
