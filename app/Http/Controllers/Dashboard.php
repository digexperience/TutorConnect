<?php

namespace App\Http\Controllers;

use App\Models\User;

class Dashboard extends Controller
{
    public function admin()
    {
        return view('admin.index');
    }

    public function tutor()
    {
        return view('tutor.index');
    }

    public function learner()
    {
        return view('learner.index');
    }
}
