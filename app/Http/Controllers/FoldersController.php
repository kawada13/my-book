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
}
