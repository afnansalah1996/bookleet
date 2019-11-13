@extends('admin_layouts._admin_layout')
@section('title','Section')
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
        <form method="post" action="/sections">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label"> Section Name </label>
                <div class="col-sm-8">
                  <input autofocus value="{{old('name')}}" type="text" class="form-control" name="name" id="name" >
                </div>
            </div>




            <div class="form-group row">
                <div class="col-sm-8 offset-sm-2">
                    <input type='hidden' value='0' name='active'/>
                    <label><input  {{old('active')?"checked":""}} type="checkbox" value='1' name='active' id='active' /> Active</label>

                </div>
            </div>





            <div class="form-group row">
                <div class="col-sm-8 offset-sm-2">
                    <input type="submit" value="Create" class="btn btn-primary" />
                    <a class="btn btn-dark" href="/sections">Cancel</a>
                </div>
            </div>
        </form>
    </div>

@endsection()
