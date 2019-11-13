@extends('admin_layouts._admin_layout')
@section('title','Company')
@section('content')



    <!-- Main Content -->

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Create Companies</li>
        </ol>
        @include('_msg')

    <div class="container mt-10">
        <form method="post" action="/companies">
            @csrf
            <div class="form-group row">
                <label for="company_name" class="col-sm-2 col-form-label">company name</label>
                <div class="col-sm-8">
                  <input autofocus value="{{old('company_name')}}" type="text" class="form-control" name="company_name" id="company_name" >
                </div>
            </div>

            <div class="form-group row">
                <label for="responsible_name" class="col-sm-2 col-form-label">responsible name</label>
                <div class="col-sm-8">
                  <input autofocus value="{{old('responsible_name')}}" type="text" class="form-control" name="responsible_name" id="company_name" >
                </div>
            </div>

            <div class="form-group row">
             <label for="example-email-input" class="col-2 col-form-label">Email</label>
                 <div class="col-8">
                      <input class="form-control"  autofocus value="{{old('email')}}" type="email" name="email" id="email">
                 </div>
             </div>

            <div class="form-group row">
                <div class="col-sm-8 offset-sm-2">
                    <input type='hidden' value='0' name='active'/>
                    <label><input  {{old('active')?"checked":""}} type="checkbox" value='1' name='active' id='active' /> Active</label>

                </div>
            </div>
            <div class="form-group row">
              <label for="example-tel-input" class="col-2 col-form-label">mobile number</label>
              <div class="col-8">
                <input class="form-control" type="tel" name="mobile_nom" value="(059)-6789543" id="mobile_nom">
              </div>
            </div>

            <div class="form-group row">
                <label for="sections_id" class="col-sm-2 col-form-label">Section</label>
                <div class="col-sm-8">
                    <select id="sections_id" class="form-control" name="sections_id" >
                        <option value="">Select Section</option>
                        @foreach($sec1 as $secc)
                            <option {{old('sections_id')==$secc->id?"selected":""}} value='{{$secc->id}}'>{{$secc->name}}  </option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="form-group row">
                <div class="col-sm-8 offset-sm-2">
                    <input type="submit" value="Create" class="btn btn-primary" />
                    <a class="btn btn-dark" href="/companies">Cancel</a>
                </div>
            </div>
        </form>
    </div>

@endsection()
