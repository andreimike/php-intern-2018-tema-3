<?php

namespace App\Http\Controllers;


use App\Models\Company;
use Illuminate\Http\Request;


class CompaniesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => [
            'createCompany',
            'updateCompany',
            'deleteCompany'
        ]
        ]);
    }

    /**
     * Return all companies
     */
    public function showAllCompanies()
    {
        $companies = Company::all();

        return response()->json($companies);
    }

    public function getCompanyById($id)
    {
        $company = Company::find($id);

        return response()->json($company);
    }

    public function getCompanyByType($type)
    {
        $companies = Company::where('type', $type)->get();

        return response()->json($companies);
    }

    public function createCompany(Request $request)
    {

        $company = Company::create($request->all());

        return response()->json($company);
    }

    public function updateCompany(Request $request, $id)
    {

        $company = Company::find($id);
        $updatedCompany = $company->update($request->all());

        return response()->json(['updatedCompany' => $updatedCompany]);
    }

    public function deleteCompany($id)
    {

        $count = Company::destroy($id);

        return response()->json(['deleted' => $count == 1]);
    }
}
