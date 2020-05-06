<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Folder;

class FoldersController extends Controller
{
    public function create()
    {
        $folder = new Folder;

        return view('folders.create', [
            'folder' => $folder,
        ]);
        
    }
    
    public function store(Request $request)
    {
        
      $folder = new Folder;
      $folder->genre = $request->genre;
      \Auth::user()->folders()->save($folder);

    return redirect()->route('books.index', [
        'id' => $folder->id,
    ]);

    }
    
    public function edit($id)
   {
    
    $current_folder = Folder::find($id);
    if (\Auth::id() === $current_folder->user_id) {
    

    return view('folders.edit', [
        'current_folder' => $current_folder,
    ]);
    
    }
    return back();
   }
   
   
   public function update(Request $request, $id)
  {
      
    $user =  \Auth::user();
    $current_folder = Folder::find($id);
    
     if (\Auth::id() === $current_folder->user_id) {
    
     $current_folder->genre = $request->genre;
     $user->folders()->save($current_folder);

    
    return redirect()->route('books.index', [
        'id' => $current_folder->id,
    ]);
    }
     return back();
     
  }
    
}
