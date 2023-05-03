<?php

namespace App\Models;

use App\Core\App;

class Validator
{

    public static function input($post) //global $_POST
    {
        foreach ($post as $input) {
            if (strlen(trim($input)) == 0) {
                return 'PLease, fill in all fields';
            }
        }
    }

    public static function phone($value)
    {
        if (strlen($value) < 18) {
            return 'Provide full phone number';
        }
    }

    public static function email($value)
    {
        $usedEmails = App::get('database')->selectInfo('email', 'user');

        foreach ($usedEmails as $email) {
            if ($email['email'] === $value) {
                return 'Email is already used';
            }
        }
    }

    public static function date($value)
    {
        if ($value < date('Y-m-d')) {
            return 'Date - not earlier than today';
        }
    }
}
