<?php

namespace App\Http\Actions\Auth;
use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use App\Models\UserDepartment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class CreateUser {

    public function handle(CreateUserRequest $request) {

        try {


            Log::info("received request to create user account ", [$request]);

            $user = User::create([
                "name"=> $request->name,
                "email"=> $request->email,
                "password"=> bcrypt($request->password),
                "index_number"=> $request->index_number,
            ]);

            $department = UserDepartment::create([
                'user_id' => $user->id,
                'department_id' => $request->department,
                'year' => $request->year,
                'role' => 'student',
            ]);

            session(["role" => 'student']);

            Log::info("user created successfully account ", [$user]);
    
            if(!Auth::attempt(["email" => $request->email, "password" => $request->password])) {
                return redirect("login")->withErrors([
                    'all' => 'Invalid email or password'
                ]);
            }

            if($department->role == "student") return redirect("/student");
            return redirect("/dashboard");

        } catch(\Exception $e) {

            report($e);
            Log::error("error occured during handling of request");
            return redirect("login");
            
        }

    }
}