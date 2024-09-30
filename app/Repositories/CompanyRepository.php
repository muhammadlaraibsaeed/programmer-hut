<?php

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Models\Company;
use App\Traits\Helper;

class CompanyRepository implements RepositoryInterface
{
    use Helper;

    protected $company;

    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    public function all()
    {
        return $this->company::paginate(10);
    }

    public function find($id)
    {
        return $this->company->findOrFail($id);
    }

    public function create($request)
    {
        
        if ($request->hasFile('logo')) {
            $logo = $this->uploadImage($request);
            $data = $request->except('logo');
            $data['logo'] = preg_replace('/^public/', 'storage',  $logo);
        } else {
            $data = $request->except('logo');
            $data['logo'] = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQCRRdvpS3KRcG9a43mI5-vbU2kysPylGtfHw&s"; 
        }


        return $this->company->create($data);
    }

    public function update($company,$request)
    {
        
        $logo = $this->uploadImage($request);
        $data = $request->except('logo');
        $data['logo'] = preg_replace('/^public/', 'storage',  $logo);
        $company->update($data);
        return $company;
    }

    public function delete($id)
    {
        $company = $this->find($id);
        return $company->delete();
    }

    public function getAll(){
        return $this->company->all();
    }
}
