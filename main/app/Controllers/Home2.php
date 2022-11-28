<?php

namespace App\Controllers;

class Home2 extends BaseController
{
    public function index2()
    {
        return view('index2');
    }

    public function demo()
    {
        return view('admin_add_item');
    }


    public function forms_input_groups()
    {
        return view('forms_input_groups');
    }

    public function forms_basic_inputs()
    {
        return view('forms_basic_inputs');
    }

    public function edit_register_table()
    {
        return view('edit_register_table');
    }

    public function pages_account_settings_connections()
    {
        return view('pages_account_settings_connections');
    }

    public function pages_account_settings_notifications()
    {
        return view('pages_account_settings_notifications');
    }

    public function tables_basic()
    {
        return view('tables_basic');
    }
    
    public function pages_misc_error()
    {
        return view('pages_misc_error');
    }
}