@extends('layouts.app')

@section('content')
<main role="main" class="container">
    <div class="jumbotron">
      <h1>ようこそ</h1>
      <p>ますは本のジャンルを作成しましょう</p>
      <a href="{{ route('folders.create') }}" class="btn btn-primary">本ジャンル作成ページへ</a>
    </div>
</main>
@endsection