<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Employee\Employee;

interface EmployeeRepositoryInterface
{
    public function all(): array;
    public function findById(string $id): ?Employee;
    public function delete(string $id): bool;
    public function createFromCsvRow(array $data);
}
