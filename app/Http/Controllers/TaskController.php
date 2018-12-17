<?php

namespace App\Http\Controllers;

use App\Folder;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(int $id) {
      $folders = Folder::all();
      $current_folder = Folder::find($id);
    //   Folder ModelでhasMany tasks を定義したことによって下記の記述が可能
    //   taskを取得
      $tasks = $current_folder->tasks()->get();
      
      return view('tasks.index', [
        'folders' => $folders,
        'current_folder_id' => $current_folder->id,
        'tasks' => $tasks,
        ]);
    }
}
