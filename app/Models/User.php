<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'fname', 'lname', 'mi', 'email', 'password', 'pin_code', 'image', 
        'date_of_birth', 'region', 'province', 'municipality', 'about', 
        'specialties', 'specialties_description', 'highest_level_of_education', 
        'institution_name', 'field_of_study', 'education_start_date', 
        'graduation_date', 'job_title', 'company_name', 
        'job_start_date', 'job_end_date', 'job_description'
    ];

    protected $hidden = [
        'pin_code', 'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getNameAttribute()
    {
        return $this->fname . ' ' . $this->lname;
    }

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'role_users', 'user_id', 'role_id');
    }

    public function hasAnyRole($roles)
    {
        return $this->roles()->whereIn('role', (array) $roles)->exists();
    }

    public function hasRole($role)
    {
        return $this->roles()->where('role', $role)->exists();
    }
}
