<?php

namespace App\Infrastructure\Jobs;

use App\Domain\Employee\EmployeeRepositoryInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use League\Csv\Reader;

class ImportEmployeesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(private string $path) {}

    public function handle(EmployeeRepositoryInterface $employeeRepository)
    {
        $csv = Reader::createFromPath(storage_path('app/' . $this->path), 'r');
        $csv->setHeaderOffset(0);

        foreach ($csv as $record) {
            $employeeRepository->createFromCsvRow([
                'employee_id' => $record['Employee ID'],
                'user_name' => $record['User Name'],
                'name_prefix' => $record['Name Prefix'],
                'first_name' => $record['First Name'],
                'middle_initial' => $record['Middle Initial'],
                'last_name' => $record['Last Name'],
                'gender' => $record['Gender'],
                'email' => $record['E-Mail'],
                'date_of_birth' => $record['Date of Birth'],
                'time_of_birth' => $record['Time of Birth'],
                'age_in_years' => $record['Age in Yrs.'],
                'date_of_joining' => $record['Date of Joining'],
                'age_in_company_years' => $record['Age in Company (Years)'],
                'phone_no' => $record['Phone No.'],
                'place_name' => $record['Place Name'],
                'county' => $record['County'],
                'city' => $record['City'],
                'zip' => $record['Zip'],
                'region' => $record['Region'],
            ]);
        }
    }
}
