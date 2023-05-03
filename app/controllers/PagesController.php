<?php

namespace App\Controllers;

use App\Core\App;

class PagesController
{
    public function home()
    {
        return view('index');
    }

    public function list()
    {
        $users = App::get('database')->selectInfo('first, last, photo, title, date', 'user');

        return view('list', compact('users'));
    }
}
