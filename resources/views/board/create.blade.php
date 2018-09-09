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

  <form action="{{route('board.store')}}" method="post">
    {{ csrf_field() }}
    <div>
      <label for="name">名前</label>
      <input type="text" name="name" placeholder="掲示板名">
    </div>
    <div>
      <label for="description">説明</label>
      <textarea name="description" placeholder="説明"></textarea>
    </div>
    <div>
      <input type="submit" value="送信">
    </div>
  </form>
@endsection
