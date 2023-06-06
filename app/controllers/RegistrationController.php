<?php

namespace App\Controllers;

use App\Models\Validator;
use App\Models\Register;


class RegistrationController
{
    public function registration()
    {
        $errors = [
            'input' => Validator::input(),
            'phone' => Validator::phone(),
            'email' => Validator::email(),
            'date' => Validator::date(),
        ];

        foreach ($errors as $error) {
            if ($error) {
                return view('registration', compact('errors'));
            }
        }

        Register::upload();

        return view('shareOnSocialMedia', [
            'title' => ucwords($_POST['title'])
        ]);
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
