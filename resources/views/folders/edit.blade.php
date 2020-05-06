@extends('layouts.app')

@section('content')

    <h1>ジャンル編集</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($current_folder, ['route' => ['folders.update', $current_folder->id], 'method' => 'put']) !!}
        
                <div class="form-group">
                    {!! Form::label('genre', 'ジャンル名:') !!}
                    {!! Form::text('genre', null, ['class' => 'form-control']) !!}
                </div>
        
                {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
        
            {!! Form::close() !!}
        </div>
    </div>
@endsection