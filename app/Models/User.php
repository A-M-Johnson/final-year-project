<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'index_number'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function departments()
    {
        return $this->hasMany(UserDepartment::class);
    }

    /**
     * Retrieve all teachers of the user based on their departments.
     *
     * @return \Illuminate\Support\Collection
     */
    public function teachers()
    {
        $departmentIds = $this->departments()->pluck('department_id');

        // dd($departmentIds);

        // Retrieve all users who are teachers in any of the user's departments
        return User::whereHas('departments', function ($query) use ($departmentIds) {
            $query->whereIn('department_id', $departmentIds)->where('role', 'lecturer')->orWhere('role', 'professor');
        })->get();
    }
}
