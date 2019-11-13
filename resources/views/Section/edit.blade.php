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
          <li class="breadcrumb-item active">Edit Section</li>
        </ol>
        @include('_msg')


    <div class="container mt-10">
              <form method="post" action="/sections/{{$section->id}}">
          @csrf
      <!-- <input type="hidden" name="_token" value="{{csrf_token()}}" >  -->
            @method('put')


            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">section Name</label>
                <div class="col-sm-8">
                  <input value="{{$section->name}}" autofocus  type="text" class="form-control" name="name" id="name">
                </div>
            </div>



            <div class="form-group row">
                <div class="col-sm-8 offset-sm-2">
                    <input type='hidden' value='0' name='active'/>
                    <label><input {{$section->active?"checked":""}} type="checkbox" value='1' name='active' id='active' /> Active</label>
                </div>
            </div>



            <div class="form-group row">
                <div class="col-sm-8 offset-sm-2">
                    <input type="submit" value="Update" class="btn btn-primary" />
                    <a class="btn btn-dark" href="/sections">Cancel</a>
                </div>
            </div>
        </form>
    </div>

@endsection()
