<?php

namespace App\Domain\Employee;

interface EmployeeRepositoryInterface
{
    public function all(): array;
    public function findById(string $id): ?Employee;
    public function delete(string $id): bool;
    public function createFromCsvRow(array $data);
}
