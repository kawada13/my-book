@extends('layouts.app')

@section('content')

    <h1>編集</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($book, ['route' => ['books.update', $book->folder_id, $book->id], 'method' => 'put']) !!}
        
                <div class="form-group">
                    {!! Form::label('title', 'タイトル:') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                   <select name="status" id="status" class="form-control">
                       @foreach(\App\Book::STATUS as $key => $val)
                       <option value="{{ $key }}"{{ $key == old('status', $book->status) ? 'selected' : '' }}>{{ $val['label'] }}</option>
  　　　　　　　　　　　　　　　　　　　@endforeach
                   </select>
                </div>
                
                <div class="form-group">
                   {!! Form::hidden('user_id', Auth::user()->id) !!}
                </div>
                
                {!! Form::submit('編集', ['class' => 'btn btn-primary']) !!}
        
            {!! Form::close() !!}
        </div>
    </div>
@endsection
