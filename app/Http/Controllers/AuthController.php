<?php

namespace App\Http\Controllers;

use App\Http\Actions\Auth\CreateUser;
use App\Http\Actions\Auth\Login;
use App\Http\Actions\Departments\GetDepartments;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //

    public function createUser(CreateUser $action, CreateUserRequest $request) {
        return $action->handle($request);
    }

    public function displaySignup(GetDepartments $action, Request $request) {
        return view('html.signup', [
            'departments' => $action->handle($request),
        ]);
    }

    public function loginUser(Login $action, LoginRequest $request) {
        return $action->handle($request);
    } 
}
