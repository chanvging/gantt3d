<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaveCompanyRequest;
use App\Company;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    protected $company_mdl;

    public function __construct(Company $company_mdl) {
        $this->middleware('auth');
        $this->company_mdl = $company_mdl;
    }

    public function index(){
        $user = Auth::user();
        $companys = [];
        foreach ($user->companys as $company) {
            $companys[] = [
                'id'=>$company->id,
                'name'=>$company->name,
            ];
        }
        return $companys;
    }
    
    public function add_form(){
        return view('company.add');
    }

    public function save(SaveCompanyRequest $request){
        $company = Company::create($request->getFillData());
        $company->members()->save(Auth::user(), ['role'=>'creator']);
        return [
            'code'=>'SUCC',
            'company_id'=>$company->id,
        ];
    }
    
    public function detail(Company $company){
        return view('company.detail', ['company'=>$company]);
    }
}
