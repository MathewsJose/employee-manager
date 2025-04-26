<?php

namespace App\Infrastructure\Jobs;

use App\Domain\Employee\EmployeeRepositoryInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class ImportEmployeesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(private string $path) {}

    public function handle(EmployeeRepositoryInterface $employeeRepository)
    {
        $file = Storage::path($this->path);

        if (!file_exists($file)) {
            return;
        }

        $handle = fopen($file, 'r');
        $header = true;

        while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
            if ($header) {
                $header = false;
                continue;
            }

            $employeeRepository->createFromCsvRow($data);
        }

        fclose($handle);
    }
}
