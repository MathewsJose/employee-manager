<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'employee_id', 'user_name', 'name_prefix', 'first_name', 'middle_initial', 'last_name', 'gender',
        'email', 'date_of_birth', 'time_of_birth', 'age_in_years', 'date_of_joining',
        'age_in_company_years', 'phone_no', 'place_name', 'county', 'city', 'zip', 'region'
    ];
}
