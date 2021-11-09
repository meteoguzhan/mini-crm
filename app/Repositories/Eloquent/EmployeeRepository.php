<?php

namespace App\Repositories\Eloquent;

use App\Models\Employee;
use App\Repositories\Interfaces\EmployeeRepositoryInterface;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    public function getAll()
    {
        return Employee::all();
    }

    public function create($data)
    {
        return Employee::create($data);
    }

    public function delete($id)
    {
        return Employee::destroy($id);
    }
}
