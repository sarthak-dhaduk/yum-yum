<?php
    namespace App\validations;
    class CustomValidation 
    {
        public function check_small(string $password, string $error = null): bool
    {
        $password = trim($password);
        $regex_lowercase = '/[a-z]/';
        if (preg_match_all($regex_lowercase, $password) < 1) {
            return FALSE;
        }
        return true;
    }
    public function check_capital(string $password, string $error = null): bool
    {
        $password = trim($password);
        $regex_uppercase = '/[A-Z]/';
        if (preg_match_all($regex_uppercase, $password) < 1) {
            return FALSE;
        }
        return true;
    }
    public function check_number(string $password, string $error = null): bool
    {
        $password = trim($password);
        $regex_number = '/[0-9]/';
        if (preg_match_all($regex_number, $password) < 1) {
            return FALSE;
        }
        return true;
    }

    public function check_special(string $password, string $error = null): bool
    {
        $password = trim($password);
        $regex_special = '/[!@#$%^&*()\-_=+{};:,<.>§~]/';
        if (preg_match_all($regex_special, $password) < 1) {
            return FALSE;
        }
        return TRUE;
    }
}
