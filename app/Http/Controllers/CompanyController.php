<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     private $companyRepository;

     public function __construct(CompanyRepository $companyRepository) {
        $this->companyRepository = $companyRepository;
        // Other initialization code can go here
    }


    public function index()
    {
        $companies = $this->companyRepository->all();
        return Inertia::render('Company/ListCompany',compact('companies'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Company/CreateCompany');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {     
        $this->companyRepository->create($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return Inertia::render('Company/EditCompany',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $this->companyRepository->update($company, $request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
    }
}
