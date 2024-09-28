<?php

namespace App\Repositories;

use App\Contracts\RepositoryInterface;

class EmployeesRepository implements RepositoryInterface
{
    protected $employee;

    public function __construct( $employee)
    {
        $this->employee = $employee;
    }

    public function all()
    {
        return $this->employee->all();
    }

    public function find($id)
    {
        return $this->employee->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->employee->create($data);
    }

    public function update($id, array $data)
    {
        $employee = $this->find($id);
        $employee->update($data);
        return $employee;
    }

    public function delete($id)
    {
        $employee = $this->find($id);
        return $employee->delete();
    }
}
