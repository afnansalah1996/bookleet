@extends('admin_layouts._admin_layout')
@section('title','section')
@section('content')



    <!-- Main Content -->

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Create section</li>
        </ol>
        @include('_msg')

    <div class="container mt-10">
              <form class="row" enctype="multipart/form-data">
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
                <a href="/sections/create" class="btn btn-success">Create New Section</a>
            </div>
        </form>
        @if($section->count()>0)
        <table class="table mt-3 table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Section Name</th>

              <th scope="col">Active</th>

              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($section as $se)
                <tr>
                  <td>{{$se->id}}</td>

                  <td>{{$se->name}}</td>

                  <td> <input type="checkbox" disabled {{$se->active?"checked":""}} /> </td>
                  <td>
                    <a href='/sections/{{$se->id}}/edit' class='btn btn-sm btn-primary'>Edit</a>
                    <a href='/sections/{{$se->id}}' class='btn btn-sm btn-info'>Details</a>
                    <a onclick="return confirm('Are you sure dude?')" href='/sections/{{$se->id}}/delete' class='btn btn-sm btn-danger'>Delete</a>
                  </td>
                </tr>
            @endforeach

          </tbody>
        </table>
        {{$section->links()}}
        @else
        <div class='alert mt-4 alert-info'>There is no items to show</div>
        @endif
    </div>

@endsection()
