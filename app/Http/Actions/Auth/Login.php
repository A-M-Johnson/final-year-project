<?php

namespace App\Http\Actions\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\UserDepartment;

class Login {

    public function handle(LoginRequest $request) {

        try {

            Log::info("received request to login user account ", [$request]);
            
            if(!Auth::attempt(["email" => $request->email, "password" => $request->password])) {
                return redirect("login")->withErrors([
                    'all' => 'Invalid email or password'
                ]);
            }

            if(!UserDepartment::where('user_id', Auth::user()->id)->where("role", $request->role)->exists()) {
                Auth::logout();
                return redirect("login")->withErrors([
                    'all' => 'Please check your account role and try again.'
                ]);
            }

            Log::info("user logged in successfully account ");

            session(["role" => $request->role]);
            
            if($request->role == "student") {
                return redirect("/student");
            }
    
            return redirect("/dashboard");
        } catch(\Exception $e) {

            report($e);
            Log::error("error occured during handling of request");
            return redirect("login");
            
        }

    }
}