<?php

namespace App\Http\Controllers\Api\ContactInformationCompany;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactInformationCompany\UpdateContactInformationRequest;
use App\Services\ContactInformationCompanyService;
use Illuminate\Http\JsonResponse;

class ContactInformationCompanyController extends Controller
{
    protected $service;

    public function __construct(ContactInformationCompanyService $service)
    {
        $this->service = $service;
    }

    // Obtener información
    public function index(): JsonResponse
    {
        $data = $this->service->getInfo();

        if ($data && $data->company_logo) {
            $data->company_logo = asset("storage/{$data->company_logo}");
        }

        return response()->json($data, 200);
    }

    // Actualizar información
    public function update(UpdateContactInformationRequest $request): JsonResponse
    {
        $data = $request->validated();

        // Si viene archivo
        if ($request->hasFile('company_logo')) {
            $logoUrl = $this->service->updateLogo($request->file('company_logo'));
            $data['company_logo'] = str_replace(asset("storage/"), '', $logoUrl); // guardamos solo el path relativo
        }

        $company = $this->service->updateInfo($data);

        if ($company->company_logo) {
            $company->company_logo = asset("storage/{$company->company_logo}");
        }

        return response()->json($company, 200);
    }
}
