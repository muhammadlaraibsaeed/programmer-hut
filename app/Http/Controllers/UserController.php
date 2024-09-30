<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Models\User as Employee;
use App\Repositories\CompanyRepository;
use App\Repositories\EmployeesRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    private $employeesRepository;
    private $companyRepository;
    public function __construct(
        EmployeesRepository $employeesRepository,
        CompanyRepository $companyRepository
        
    )
    {
        $this->companyRepository = $companyRepository;
        $this->employeesRepository = $employeesRepository;
    }

    public function index()
    {
        $employees = $this->employeesRepository->all();
        return Inertia::render('Employee/ListEmployee',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $companies = $this->companyRepository->getAll();
        return Inertia::render('Employee/CreateEmployee',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $this->employeesRepository->create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
            $companies = $this->companyRepository->getAll();
            return Inertia::render('Employee/EditEmployee',compact('employee','companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->employeesRepository->update($id,$request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $this->employeesRepository->delete($employee);
    }
}
