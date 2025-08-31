<?php

namespace App\Controllers;

use App\Models\MyUserModel;

class User extends BaseController
{
    public function index(): string
    {
        $userModel = new MyUserModel();

        $data = [
            'title' => 'Dashboard',
            'user'  => $userModel->find(user()->id) // ambil fresh dari DB
        ];

        return view('user/index', $data);
    }

    public function database(): string
    {
        return view('user/database');
    }
}

// namespace App\Controllers;

// class User extends BaseController
// {
//       public function index(): string
//     {
//         return view('user/index');
        
//     }
//       public function database(): string
//     {
//         return view('user/database');
        
//     }
  
 
// }