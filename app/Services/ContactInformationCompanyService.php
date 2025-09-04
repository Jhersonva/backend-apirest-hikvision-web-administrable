<?php

namespace App\Services;

use App\Models\ContactInformationCompany;
use Illuminate\Support\Facades\Storage;

class ContactInformationCompanyService
{
    public function getInfo()
    {
        return ContactInformationCompany::first(); 
    }

    public function updateInfo(array $data)
    {
        $company = ContactInformationCompany::first();

        if (!$company) {
            $company = ContactInformationCompany::create($data);
        } else {
            $company->update($data);
        }

        return $company;
    }

    public function updateLogo($file)
    {
        $company = ContactInformationCompany::first();

        if (!$company) {
            $company = new ContactInformationCompany();
        }

        // Eliminar logo anterior si existe
        if ($company->company_logo && Storage::disk('public')->exists($company->company_logo)) {
            Storage::disk('public')->delete($company->company_logo);
        }

        // Guardar nuevo logo
        $path = $file->store('contact_information_company', 'public');

        $company->company_logo = $path;
        $company->save();

        // Devolver URL completa
        return asset("storage/{$path}");
    }
}
