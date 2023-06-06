<?php

namespace App\Models;

use App\Core\App;

class Validator
{

    public static function input()
    {
        foreach ($_POST as $input) {
            if (strlen(trim($input)) == 0) {
                return 'Please, fill in all fields';
            }
        }
    }

    public static function phone()
    {
        if (strlen($_POST['phone']) < 18) {
            return 'Provide full phone number';
        }
    }

    public static function email()
    {
        $usedEmails = App::get('database')->selectInfo('email', 'user');

        foreach ($usedEmails as $email) {
            if ($email['email'] === $_POST['email']) {
                return 'Email is already used';
            }
        }
    }

    public static function date()
    {
        if ($_POST['date'] < date('Y-m-d')) {
            return 'Date - not earlier than today';
        }
    }
}
