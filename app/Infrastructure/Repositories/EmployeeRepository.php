<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Employee\Employee;
use App\Domain\Employee\EmployeeRepositoryInterface;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    public function all(): array
    {
        return Employee::all()->toArray();
    }

    public function findById(string $id): ?Employee
    {
        return Employee::find($id);
    }

    public function delete(string $id): bool
    {
        $employee = Employee::find($id);
        if ($employee) {
            return $employee->delete();
        }
        return false;
    }

    public function createFromCsvRow(array $data)
    {
        Employee::create([
            'employee_id' => $data[0],
            'user_name' => $data[1],
            'name_prefix' => $data[2],
            'first_name' => $data[3],
            'middle_initial' => $data[4],
            'last_name' => $data[5],
            'gender' => $data[6],
            'email' => $data[7],
            'date_of_birth' => $data[8],
            'time_of_birth' => $data[9],
            'age' => $data[10],
            'date_of_joining' => $data[11],
            'age_in_company' => $data[12],
            'phone' => $data[13],
            'place_name' => $data[14],
            'county' => $data[15],
            'city' => $data[16],
            'zip' => $data[17],
            'region' => $data[18],
        ]);
    }
}
