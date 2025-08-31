<?php

namespace App\Controllers;

class User extends BaseController
{
      public function index(): string
    {
        return view('user/index');
        
    }
      public function database(): string
    {
        return view('user/database');
        
    }
  
 
}
