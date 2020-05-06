<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomesController extends Controller
{
    public function index()
    {
        
        $user = \Auth::user();

        
        $folder = $user->folders()->first();

        
        if (is_null($folder)) {
            return view('home');
        }

        // フォルダがあればそのフォルダのタスク一覧にリダイレクトする
        return redirect()->route('books.index', [
            'id' => $folder->id,
        ]);
    }
}
