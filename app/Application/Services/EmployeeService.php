<?php

namespace App\Application\Services;

use App\Domain\Employee\EmployeeRepositoryInterface;
use App\Infrastructure\Jobs\ImportEmployeesJob;
use App\Domain\Employee\Employee;

class EmployeeService
{
    public function __construct(private EmployeeRepositoryInterface $employeeRepository) {}

    public function importFromCsv(string $filePath): void
    {
        ImportEmployeesJob::dispatch($filePath);    
    }

    public function getAll(): array
    {
        return $this->employeeRepository->all();
    }

    public function getById(string $id): ?Employee
    {
        return $this->employeeRepository->findById($id);
    }

    public function delete(string $id): void
    {
        $this->employeeRepository->delete($id);
    }
}
