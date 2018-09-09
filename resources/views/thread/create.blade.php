@extends('layouts.application')

@section('title', 'スレッド作成')

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

  <form action="{{route('board.thread.store', $board->id)}}" method="post">
    {{ csrf_field() }}
    <div>
      <label for="name">名前</label>
      <input type="text" name="name" placeholder="スレッドの名前">
    </div>
    <div>
      <input type="submit" value="送信">
    </div>
  </form>
@endsection
