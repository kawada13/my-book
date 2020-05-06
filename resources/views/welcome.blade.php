@extends('layouts.app')

@section('content')
          <h1 class="display-4">comics</h1>
          <p class="lead">気になる本を整理</p>
          {!! link_to_route('signup.get', '登録!', [], ['class' => 'btn btn-primary btn-lg']) !!}
@endsection