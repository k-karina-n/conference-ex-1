<?php

namespace App\Controllers;

use App\Models\{Validator, Register};


class RegistrationController
{
    public function registration()
    {
        $errors = [
            'input' => Validator::input($_POST),
            'phone' => Validator::phone($_POST['phone']),
            'email' => Validator::email($_POST['email']),
            'date' => Validator::date($_POST['date']),
        ];

        foreach ($errors as $error) {
            if (!$error == 0) {
                return view('registration', compact('errors'));
            }
        }

        Register::upload();

        $title = ucwords($_POST['title']);

        return view('shareOnSocialMedia', compact('title'));
    }

    public function shareOnSocialMedia()
    {
        return view('congratulations');
    }

    public function congratulations()
    {
        return header("Location: /list");
    }
}
