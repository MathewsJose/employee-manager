<?php

namespace App\Domain\Employee;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees'; // Database table name

    protected $primaryKey = 'employee_id'; // Assuming Employee ID is primary key
    public $incrementing = false; // Because employee_id is not auto-incremented
    protected $keyType = 'string'; // employee_id is likely a string (can adjust)

    protected $fillable = [
        'employee_id',
        'user_name',
        'name_prefix',
        'first_name',
        'middle_initial',
        'last_name',
        'gender',
        'email',
        'date_of_birth',
        'time_of_birth',
        'age_in_years',
        'date_of_joining',
        'age_in_company_years',
        'phone_no',
        'place_name',
        'county',
        'city',
        'zip',
        'region',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'time_of_birth' => 'datetime:H:i:s',
        'date_of_joining' => 'date',
        'age_in_years' => 'integer',
        'age_in_company_years' => 'integer',
    ];
}
