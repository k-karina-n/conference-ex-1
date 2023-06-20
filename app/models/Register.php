<?php

namespace App\Models;

use App\Core\App;

class Register
{
    /**
     * Uploads photo and inserts data into table
     * 
     * @return void
     */
    public static function upload(): void
    {

        $filename = $_FILES["file"]["name"];

        $tempname = $_FILES["file"]["tmp_name"];

        $folder = "userPhoto/" . basename($filename);

        move_uploaded_file($tempname, $folder);

        App::get('database')->insert('user', [
            'first' => ucfirst($_POST['firstName']),
            'last' => ucfirst($_POST['lastName']),
            'phone' => $_POST['phone'],
            'email' => $_POST['email'],
            'country' => $_POST['country'],

            'photo' => $filename,
            'title' => ucwords($_POST['title']),
            'description' => $_POST['description'],
            'date' => $_POST['date'],
        ]);
    }
}
