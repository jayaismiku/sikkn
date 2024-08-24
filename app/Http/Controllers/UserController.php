<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
	public function __construct()
	{
		//
	}

	public function reset($role = null, $key = null1)
	{
		if ($key == null) {
            switch ($role) {
                case 'panitia':
                    $users = User::where('role', $role)->get();
                    foreach ($users as $user) {
                        
                    }
                    break;
                
                default:
                    # code...
                    break;
            }
        }
	}

}
