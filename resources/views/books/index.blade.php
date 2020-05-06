@extends('layouts.app')

@section('content')
<div class="row">
  
   <div class="col col-md-4">
     <ol class="breadcrumb">
        <li class="active">ジャンル</li>
     </ol>
     
     {!! link_to_route('folders.create', 'ジャンルを追加', [], ['class' => 'btn btn-outline-secondary btn-block']) !!}
     <div class="list-group" style="max-width: 400px;">
    　@foreach($folders as $folder)
    　   <a
           href="{{ route('books.index', ['id' => $folder->id]) }}"
           class="list-group-item {{ $current_folder_id === $folder->id ? 'active' : '' }}"
        >
            {{ $folder->genre }}
            {!! link_to_route('folders.edit', '編集', ['id' => $current_folder_id]) !!}
         </a>
    　@endforeach
     </div>
    </div>
      
      

   <div class="column col-md-8">
      <ol class="breadcrumb">
        <li class="active">本</li>
      </ol>
      {!! link_to_route('books.create', '本を検索して追加', ['id' => $current_folder_id], ['class' => 'btn btn-outline-secondary btn-block']) !!}
      
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">タイトル</th>
            <th scope="col">状況</th>
          </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
          <tr>
             <td>{{ $book->title }}</td>
             <td><span class="label {{ $book->status_class }}">{{ $book->status_label }}</span></td>
             <td>{!! link_to_route('books.update', '編集', ['id' => $book->folder_id, 'book_id' => $book->id]) !!}</td>
             <td>
                 {!! Form::model($book, ['route' => ['books.destroy', $book->folder_id, $book->id], 'method' => 'delete']) !!}
                 {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                 {!! Form::close() !!}
                 </td>
          </tr>
        </tbody>
        @endforeach
      </table>
   </div>
</div>
@endsection