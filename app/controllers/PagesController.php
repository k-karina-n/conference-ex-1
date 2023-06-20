<?php

namespace App\Controllers;

use App\Core\App;

class PagesController
{
    /**
     * Returns main page view
     * 
     * @return mixed
     */
    public function home(): mixed
    {
        return view('index');
    }

    /**
     * Returns Conference List page with data
     * 
     * @return mixed
     */
    public function list(): mixed
    {
        $users = App::get('database')->selectInfo('first, last, photo, title, date', 'user');

        return view('list', compact('users'));
    }
}
