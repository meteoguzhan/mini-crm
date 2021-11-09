<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\StoreEmployeeRequest;
use App\Repositories\Eloquent\CompanyRepository;
use App\Repositories\Eloquent\EmployeeRepository;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class IndexCTRL extends Controller
{
    private $employeeRepository;
    private $companyRepository;

    public function __construct(EmployeeRepository $employeeRepository, CompanyRepository $companyRepository)
    {
        $this->employeeRepository = $employeeRepository;
        $this->companyRepository = $companyRepository;
    }

    public function index()
    {
        return view('pages.employee.index')
            ->with('employees', $this->employeeRepository->getAll());
    }

    public function create()
    {
        return view('pages.employee.create')->with('companies', $this->companyRepository->getAll());
    }

    public function store(Request $request, StoreEmployeeRequest $storeEmployeeRequest): RedirectResponse
    {
        $storeEmployeeRequest->validated();

        $is_store = $this->employeeRepository->create($request->all());
        if (!$is_store) {
            return redirect()->route('employee.index')
                ->withErrors(['msg' => 'The worker could not be successfully created']);
        }

        return redirect()->route('employee.index')
            ->with('success', 'Employee created successfully.');
    }

    public function destroy($id): RedirectResponse
    {
        $is_delete = $this->employeeRepository->delete($id);
        if (!$is_delete) {
            return redirect()->route('employee.index')
                ->withErrors(['msg' => 'Failed to delete employee successfully']);
        }

        return redirect()->route('employee.index')
            ->with('success', 'Employee deleted successfully.');
    }
}
