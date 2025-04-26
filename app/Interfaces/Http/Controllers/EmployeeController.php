<?php

namespace App\Interfaces\Http\Controllers;

use App\Application\Services\EmployeeService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    public function __construct(private EmployeeService $employeeService) {}

    public function import(Request $request): JsonResponse
    {
        $content = $request->getContent();

        // Define a filename and path
        $fileName = 'employee_import_' . time() . '.csv';
        $filePath = storage_path('app/imports/' . $fileName);

        // Make sure the "imports" folder exists
        if (!file_exists(storage_path('app/imports'))) {
            mkdir(storage_path('app/imports'), 0755, true);
        }

        // Save the raw content to a file
        file_put_contents($filePath, $content);        
        $this->employeeService->importFromCsv($filePath);
        return response()->json(['message' => 'File uploaded successfully. Importing started.'], 200);
    }

    public function index()
    {
        $employees = $this->employeeService->getAll();
        return response()->json($employees);
    }

    public function show(string $id): JsonResponse
    {
        $employee = $this->employeeService->getById($id);
        if (!$employee) {
            return response()->json(['error' => 'Employee not found'], 404);
        }
        return response()->json($employee);
    }

    public function destroy(string $id): JsonResponse
    {
        $this->employeeService->delete($id);
        return response()->json(['message' => 'Employee deleted successfully']);
    }
}
