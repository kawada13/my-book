<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Folder;

use App\Book;

class BooksController extends Controller
{
    public function index($id)
    {
        
         $current_folder = Folder::find($id);
         
         if (\Auth::id() === $current_folder->user_id) {
             
             $folders = \Auth::user()->folders()->get();
        
       
        
             $books = $current_folder->books()->get();

             return view('books.index', [
            'folders' => $folders,
            'current_folder_id' => $id,
            'books' => $books,
            ]);
         }
         
         return back();
        
    }
    
    public function create($id)
    {
        $current_folder = Folder::find($id);
        $response = null;
        
        if (\Auth::id() === $current_folder->user_id) {
           return view('books.create', [
            'folder_id' => $id,
            'response' => $response,
           ]);
        }
        
        return back();
    }
    
    
    public function store(int $id, Request $request) 
    {
    
        
        $current_folder = Folder::find($id);
        
        if (\Auth::id() === $current_folder->user_id) {
        $book = new Book;
        $book->title = $request->title;
        $book->user_id = $request->user_id;
        
        $current_folder->books()->save($book);
        
        return redirect()->route('books.index', [
            'id' => $current_folder->id,
            ]);
        }
        
        return back();
    }
    
    public function edit(int $id, int $book_id)
   {
    $book = Book::find($book_id);
    
    $current_folder = Folder::find($id);
    if (\Auth::id() === $current_folder->user_id) {
    

    return view('books.edit', [
        'book' => $book,
    ]);
    
    }
    return back();
   }
   
   
   public function update(int $id, int $book_id, Request $request)
  {
      
    
    $book = Book::find($book_id);
    $current_folder = Folder::find($id);
    
     if (\Auth::id() === $current_folder->user_id) {
    
    $book->title = $request->title;
    $book->status = $request->status;
    $book->save();

    
    return redirect()->route('books.index', [
        'id' => $book->folder_id,
    ]);
    }
     return back();
     
  }
  
  public function destroy(int $id, int $book_id) {
        
        $book = Book::find($book_id);
        
        $current_folder = Folder::find($id);
        
        $book->delete();
        
        return redirect()->route('books.index', [
        'id' => $book->folder_id,
    ]);
    }
}
