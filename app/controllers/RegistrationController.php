<?php

namespace App\Controllers;

use App\Models\Validator;
use App\Models\Register;


class RegistrationController
{
    /**
     * Validates data and uploads it into Database
     * 
     * @return mixed
     */
    public function registration(): mixed
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

    /**
     * Returns 'Congratulations' part of registration form
     * 
     * @return mixed
     */
    public function shareOnSocialMedia(): mixed
    {
        return view('congratulations');
    }

    /**
     * Redirects the user to the Conference List page after registration
     * 
     * @return void
     */
    public function congratulations(): void
    {
        redirect('list');
    }
}
