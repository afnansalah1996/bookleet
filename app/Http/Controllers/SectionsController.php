<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use  App\Http\Requests\SectionRequest;

class SectionsController extends Controller
{

    public function index(Request $request)
    {

          $q = $request['q'];
          $active = $request['active'];

          $section = Section::whereRaw('true');

           if($q)
           $section->whereRaw('(name like ?  )',["%$q%"]);
           if($active!='')
           $section->where('active',$active);

           $section = $section->paginate(5)
             ->appends(['q'=>$q, 'active'=>$active  ]);


            return view('Section.index')
            ->with('title','section Table')
            ->with('section',$section);
    }


    public function create()
    {
      return view('Section.create')->with('title','Create New section');
    }


    public function store(SectionRequest $request)
    {
      Section::create($request->all());

          \Session::flash('msg','s:section Created Successfully');
          return redirect('/sections/create');
    }


    public function show($id)
    {
        $section = Section::find($id);
        if(!$section){
            \Session::flash('msg','e:Invalid section ID');
            return redirect('/sections');
          }
            $section = Section::get();
            return view('Section.show')->with('title','Show sections ')
                ->with('section',$section);


    }
    public function edit($id)
    {

          $section = Section::find($id);
          if(!$section){
              \Session::flash('msg','e:Invalid section ID');
              return redirect('/sections');
            }
              $section = Section::get();
              return view('Section.edit')->with('title','Edit sections ')
                  ->with('section',$section);
    }

    public function update(SectionRequest $request, $id)
    {
      $section = Section::find($id);
      Section::update($request->all());

          \Session::flash('msg','s:Section updated Successfully');
          return redirect('/sections');
    }

    public function destroy($id)
    {
      $section = Section::find($id);
      $section->delete();
      \Session::flash('msg','w:Section Deleted Successfully');
      return redirect('/sections');
    }
}
