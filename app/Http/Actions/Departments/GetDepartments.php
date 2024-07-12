<?php

namespace App\Http\Actions\Departments;
use App\Http\Resources\DepartmentResource;
use App\Models\Department;
use Illuminate\Http\Request;

class GetDepartments {

    public function handle( Request $request ) {
        
        return DepartmentResource::collection(Department::all());
    }
}