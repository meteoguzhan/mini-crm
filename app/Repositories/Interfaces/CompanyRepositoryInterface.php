<?php

namespace App\Repositories\Interfaces;

interface CompanyRepositoryInterface{

    public function getAll();

    public function create($data);

    public function delete($id);
}
