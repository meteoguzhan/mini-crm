<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\StoreCompanyRequest;
use App\Repositories\Eloquent\CompanyRepository;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class IndexCTRL extends Controller
{
    private $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function index()
    {
        return view('pages.company.index')
            ->with('companies', $this->companyRepository->getAll());
    }

    public function create()
    {
        return view('pages.company.create');
    }

    public function store(Request $request, StoreCompanyRequest $storeCompanyRequest): RedirectResponse
    {
        $storeCompanyRequest->validated();

        $input = $request->all();
        if ($request->hasFile('logo')) {
            $request->logo->store('logos', 'public');
            $input['logo'] = $request->logo->hashName();
        }

        $is_store = $this->companyRepository->create($input);
        if (!$is_store) {
            return redirect()->route('company.index')
                ->withErrors(['msg' => 'The worker could not be successfully created']);
        }

        return redirect()->route('company.index');
    }

    public function destroy($id): RedirectResponse
    {
        $is_delete = $this->companyRepository->delete($id);
        if (!$is_delete) {
            return redirect()->route('company.index')
                ->withErrors(['msg' => 'Failed to delete company successfully']);
        }

        return redirect()->route('company.index')
            ->with('success', 'Company deleted successfully.');
    }
}
