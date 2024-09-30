<?php

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\User as Employees;

class EmployeesRepository implements RepositoryInterface
{
    protected $employee;

    public function __construct(Employees $employee)
    {
        $this->employee = $employee;
    }

    public function all()
    {
        return $this->employee->with('company')->paginate(10);
    }

    public function find($id)
    {
        return $this->employee->findOrFail($id);
    }

    public function create( $data)
    {
        return $this->employee->create($data);
    }

    public function update($id,  $data)
    {
        $employee = $this->find($id);
        $employee->update($data);
        return $employee;
    }

    public function delete($employee)
    {
        return $employee->delete();
    }
}
