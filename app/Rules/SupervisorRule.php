<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class SupervisorRule implements Rule
{
    public function passes($attribute, $value)
    {
        // Check if the user with the given ID has a role of 'lecturer' or 'professor'
        return DB::table('user_departments')
            ->where('user_id', $value)
            ->whereIn('role', ['lecturer', 'professor'])
            ->exists();
    }

    public function message()
    {
        return 'The selected supervisor must be a lecturer or professor.';
    }
}
