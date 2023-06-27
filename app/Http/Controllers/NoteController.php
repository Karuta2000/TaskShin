<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class NoteController extends Controller
{
    public function index()
    {
        return view('app.notes');
    }

}
