@extends('Admin')

@section('content')

<div class="m-5">
<div href="#addModal" data-toggle="modal" data-target="#addModal" class="btn  btn-admin">Add a new admin</div>
  <table class="pro_log">
    <thead>
      <tr>
        <th>Admin Name</th>
        <th>Full Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Operations</th>
      </tr>
    </thead>
    <tbody>
      @foreach($admins as $admin)
      <tr>
        <td>{{$admin->user_name}}</td>
        <td>{{$admin->full_name}}</td>
        <td>{{$admin->phone}}</td>
        <td>{{$admin->email}}</td>
        <td>
          <a href='#'>
            <i  class="fa fa-edit blue"></i>
          </a>
          /
          <a href='#'>
            <i  class="fa fa-trash danger"></i>
          </a>
              
        </td>
      </tr>
    </tbody>
    @endforeach
  </table>
</div>

@endsection