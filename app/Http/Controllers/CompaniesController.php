<?php

namespace App\Http\Controllers;
use App\Company;
use App\Section;
use Illuminate\Http\Request;
use  App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;

class CompaniesController extends Controller
{
    public function index(Request $request)
    {
        $q = $request['q'];
        $active = $request['active'];

        $company = Company::whereRaw('true');

         if($q)
         $company->whereRaw('(company_name like ? or responsible_name like ?  )',["%$q%","%$q%"]);
         if($active!='')
         $company->where('active',$active);

         $company = $company->paginate(5)
           ->appends(['q'=>$q, 'active'=>$active  ]);


          return view('Company.index')
          ->with('title','Company Table')
          ->with('com1',$company);
    }


    public function create()
    {
      $section = Section::all();
      return view('Company.create')->with('title','Create New Company')->with('sec1',$section);
    }


    public function store(CompanyStoreRequest $request)
    {
      Company::create($request->all());

          \Session::flash('msg','s:Company Created Successfully');
          return redirect('/companies/create');
    }


    public function show($id)
    {
       $section = Section::all();

      $company = Company::find($id);
      if(!$company){
          \Session::flash('msg','e:Invalid company ID');
          return redirect('/companies');
      }
      $company = Company::get();
      return view('company.edit')->with('title','Edit companies ')
          ->with('com1',$company)->with('sec1',$section);
    }

    public function edit($id)
    {
      $section = Section::all();

     $company = Company::find($id);
     if(!$company){
         \Session::flash('msg','e:Invalid company ID');
         return redirect('/companies');
     }
     $company = Company::get();
     return view('company.show')->with('title','Show companies ')
         ->with('com1',$company)->with('sec1',$section);
    }


    public function update(CompanyUpdateRequest $request, $id)
    {
      $company = Company::find($id);
      Company::update($request->all());

          \Session::flash('msg','s:Company updated Successfully');
          return redirect('/companies');
    }

    public function destroy($id)
    {
      $company = Company::find($id);
      $company->delete();
      \Session::flash('msg','w:company Deleted Successfully');
      return redirect('/companies');

    }
}
