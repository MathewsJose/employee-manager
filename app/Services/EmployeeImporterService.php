<?php

namespace App\Services;

use App\Infrastructure\Repositories\EmployeeRepositoryInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;

class EmployeeImporterService
{
    private EmployeeRepositoryInterface $employeeRepository;

    public function __construct(EmployeeRepositoryInterface $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function import(UploadedFile $file): void
    {
        $csv = Reader::createFromPath($file->getRealPath(), 'r');
        $csv->setHeaderOffset(0); // Use first row as header

        DB::beginTransaction();
        try {
            foreach ($csv->getRecords() as $record) {
                $this->employeeRepository->createFromCsvRow([
                    'employee_id'           => $record['Employee ID'],
                    'user_name'             => $record['User Name'],
                    'name_prefix'           => $record['Name Prefix'],
                    'first_name'            => $record['First Name'],
                    'middle_initial'        => $record['Middle Initial'],
                    'last_name'             => $record['Last Name'],
                    'gender'                => $record['Gender'],
                    'email'                 => $record['E-Mail'],
                    'date_of_birth'         => $record['Date of Birth'],
                    'time_of_birth'         => $record['Time of Birth'],
                    'age_in_years'          => $record['Age in Yrs.'],
                    'date_of_joining'       => $record['Date of Joining'],
                    'age_in_company_years'  => $record['Age in Company (Years)'],
                    'phone_no'              => $record['Phone No.'],
                    'place_name'            => $record['Place Name'],
                    'county'                => $record['County'],
                    'city'                  => $record['City'],
                    'zip'                   => $record['Zip'],
                    'region'                => $record['Region'],
                ]);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e; // Bubble up for controller to catch
        }
    }
}
