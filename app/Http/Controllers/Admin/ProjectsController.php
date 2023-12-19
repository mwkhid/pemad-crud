<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Projects;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        //menampilkan data pada db
        $items = Projects::with('bills')->get();
        return view('admin.projects.index', [
            'items' => $items
        ]);
    }
}
