<?php

namespace App\Models;

use App\Core\App;

class Validator
{

    /**
     * Checks that all inputs in the registration form have data
     * 
     * @return string|null
     */
    public static function input(): ?string
    {
        foreach ($_POST as $input) {
            if (strlen(trim($input)) == 0) {
                return 'Please, fill in all fields';
            }
            return null;
        }
    }

    /**
     * Validates the phone number length
     * 
     * @return string|null
     */
    public static function phone(): ?string
    {
        if (strlen($_POST['phone']) < 18) {
            return 'Provide full phone number';
        }
        return null;
    }

    /**
     * Validates email uniqueness
     * 
     * @return string|null
     */
    public static function email(): ?string
    {
        $usedEmails = App::get('database')->selectInfo('email', 'user');

        foreach ($usedEmails as $email) {
            if ($email['email'] === $_POST['email']) {
                return 'Email is already used';
            }
        }
        return null;
    }

    /**
     * Validates date
     * 
     * @return string|null
     */
    public static function date(): ?string
    {
        if ($_POST['date'] < date('Y-m-d')) {
            return 'Date - not earlier than today';
        }
        return null;
    }
}
