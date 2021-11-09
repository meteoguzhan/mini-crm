<?php

namespace App\Repositories\Eloquent;

use App\Models\Company;
use App\Repositories\Interfaces\CompanyRepositoryInterface;

class CompanyRepository implements CompanyRepositoryInterface
{
    public function getAll()
    {
        return Company::all();
    }

    public function create($data)
    {
        return Company::create($data);
    }

    public function delete($id)
    {
        return Company::destroy($id);
    }
}
