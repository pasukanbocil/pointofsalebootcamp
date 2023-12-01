<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user', [
            'pageTitle' => 'User',
            'content' => 'ini halaman user'
        ]);
    }

    public function profile()
    {
        return view('profile.index', [
            'title' => 'Profile',
            'content' => 'Profile',
            'name' => 'Dicky Satria Putra Herlambang',
            'address' => 'Garut',
            'phone' => '089533333333',
            'image' => 'dicky.jpg'
        ]);
    }
}
