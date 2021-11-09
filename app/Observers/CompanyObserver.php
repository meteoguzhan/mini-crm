<?php

namespace App\Observers;

use App\Models\Company;

class CompanyObserver
{
    /**
     * Handle the Company "deleted" event.
     *
     * @param \App\Models\Company $company
     * @return void
     */
    public function deleted(Company $company)
    {
        $company->employees()->delete();
    }
}
