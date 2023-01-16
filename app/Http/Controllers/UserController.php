<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function index()
    {
        dd('end');
        //$projects = Project::find(1);

        //return view('articles.index', compact('articles'));
    }

    public function create()
    {
        $project =
            [
                'name' => 'admin',
                'password' => 'admin',
                'email' => 'admin@admin.com',
                'role' => 'admin',
                ];
        User::create($project);
        dd('succses');

    }

}
