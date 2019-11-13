@extends('admin_layouts._admin_layout')
@section('title','company')
@section('content')



    <!-- Main Content -->

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Create company</li>
        </ol>
        @include('_msg')

    <div class="container mb-3 mt-10">
              <form class="row mb-3">
                  <div class="col-3">
                      <input autofocus value="{{request()['q']}}" type="text" class="form-control" placeholder="Enter your search" name="q" />
                  </div>

                  <div class="col-2">
                      <select name="active" class="form-control">
                          <option value="">Any status</option>
                          <option {{request()['active']=='1'?'selected':''}} value="1">Active</option>
                          <option {{request()['active']=='0'?'selected':''}} value="0">Inactive</option>
                      </select>
                  </div>




                  <div class="col-2">
                      <input type="submit" value="Search" class="btn btn-primary" />
                  </div>

            <div class="col-3">
                <a href="/companies/create" class="btn btn-success">Create New company</a>
            </div>
        </form>




        @if($com1->count()>0)
        <table class="table mt-10 table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Company Name</th>
              <th scope="col">Responsible Name</th>
              <th scope="col"> Email</th>
              <th scope="col"> Mobile Number</th>
              <th scope="col"> Section</th>
              <th scope="col"> Action</th>

              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($com1 as $com)
                <tr>
                  <td>{{$com->id}}</td>
                  <td>{{$com->company_name}}</td>
                  <td>{{$com->responsible_name}}</td>
                  <td>{{$com->email}}</td>
                  <td>{{$com->mobile_nom}}</td>
                  <td>{{$com->section->name ??''}}</td>


                  <td>
                    <a href='/companies/{{$com->id}}/edit' class='btn btn-sm btn-primary'>Edit</a>
                    <a href='/companies/{{$com->id}}' class='btn btn-sm btn-info'>Details</a>
                    <a onclick="return confirm('Are you sure dude?')" href='/companies/{{$com->id}}/delete' class='btn btn-sm btn-danger'>Delete</a>
                  </td>
                </tr>
            @endforeach

          </tbody>
        </table>
        {{$com1->links()}}
        @else
        <div class='alert mt-4 alert-info'>There is no items to show</div>
        @endif
      </div>

      @endsection()
