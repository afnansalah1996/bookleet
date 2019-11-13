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
          <li class="breadcrumb-item active">Edit Company</li>
        </ol>
        @include('_msg')


    <div class="container mt-10">
              <form method="post" action="/companies/{{$com1->id}}">
            @csrf
            @method('put')


            <div class="form-group row">
                <label for="company_name" class="col-sm-2 col-form-label">Company Name</label>
                <div class="col-sm-8">
                  <input value="{{$com1->company_name}}" autofocus  type="text" class="form-control" name="company_name" id="company_name">
                </div>
            </div>
            <div class="form-group row">
                <label for="responsible_name" class="col-sm-2 col-form-label">responsible Name</label>
                <div class="col-sm-8">
                  <input value="{{$com1->responsible_name}}" autofocus  type="text" class="form-control" name="responsible_name" id="responsible_name">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-8">
                  <input value="{{$com1->email}}" autofocus  type="email" class="form-control" name="email" id="email">
                </div>
            </div>
            <div class="form-group row">
                <label for="mobile_nom" class="col-sm-2 col-form-label">mobile number</label>
                <div class="col-sm-8">
                  <input value="{{$com1->mobile_nom}}" autofocus  type="text" class="form-control" name="mobile_nom" id="mobile_nom">
                </div>
            </div>


            <div class="form-group row">
                <div class="col-sm-8 offset-sm-2">
                    <input type='hidden' value='0' name='active'/>
                    <label><input {{$com1->active?"checked":""}} type="checkbox" value='1' name='active' id='active' /> Active</label>
                </div>
            </div>

              <div class="form-group row">
                  <label for="category_id" class="col-sm-2 col-form-label">companies</label>
                  <div class="col-sm-8">
                      <select id="companies_id" class="form-control" name="companies_id" >
                          <option value="">Select section</option>
                          @foreach($sec1 as $secc)
                              <option {{$companies->companies_id==$secc->id?"selected":""}} value='{{$secc->id}}'>{{$secc->name}} ({{$secc->company->count()}}) </option>

                          @endforeach
                      </select>
                  </div>
              </div>


            <div class="form-group row">
                <div class="col-sm-8 offset-sm-2">
                    <input type="submit" value="Update" class="btn btn-primary" />
                    <a class="btn btn-dark" href="/companies">Cancel</a>
                </div>
            </div>
        </form>
    </div>

@endsection()
