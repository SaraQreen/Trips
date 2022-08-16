@extends('Admin')

@section('content')

<div class="m-5">
  <div href="#addModal" data-toggle="modal" data-target="#addModal" class="btn  btn-admin">Add a new user</div>
  <table class="pro_log">
    <thead>
      <tr>
        <th>User Name</th>
        <th>Full Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Operations</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <td>{{$user->user_name}}</td>
        <td>{{$user->full_name}}</td>
        <td>{{$user->phone}}</td>
        <td>{{$user->email}}</td>
        <td>
          <a href='#'>
            <i onclick="getUserDetails('{{$user->id}}')" data-target="#editModal" data-toggle="modal" class="fa fa-edit blue"></i>
          </a>
          /
          <a href="#delModal" data-toggle="modal">
            <i onclick="opendel('{{$user->id}}')" data-toggle="modal" class="fa fa-trash danger"></i>
          </a>

        </td>
      </tr>
    </tbody>
    @endforeach
  </table>
</div>


<!--Add Modal-->

<div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header ">

        <h2 class="modal-title" id="addModalLabel">Add New User</h2>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="name">{{ __('User Name') }}</label>
          <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required pattern="[A-z]{3,}" title="only letters are allowed" autocomplete="user_name" autofocus>

          @error('user_name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror


        </div>

        <div class="form-group">
          <label for="full_name">{{ __('Full Name') }}</label>
          <input id="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name') }}" required autocomplete="full_name" pattern="[A-z]{3,}" title="only letters are allowed" autofocus>

          @error('full_name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror

        </div>

        <div class="form-group">
          <label for="email">{{ __('Email Address') }}</label>

          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

          @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="form-group">
          <label for="phone">{{ __('Phone') }}</label>
          <input type="text" class="form-control" id="phone" name="phone" required pattern="[0-9]{6,}" value="{{ old('phone') }}" title="only numbers of six digits and above are allowed">


        </div>

        <div class="form-group">
          <label for="password">Password</label>

          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" title="Password should have at least 6 or more characters" required pattern=".{6,}" autocomplete="new-password">

          @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror

        </div>

        <div class="form-group">
          <label for="password-confirm">{{ __('Confirm Password') }}</label>


          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required pattern=".{6,}" title="Password should have at least 6 or more characters" autocomplete="new-password">

        </div>


        <div class="modal-footer justify-content-center">

          <a id="save_user" class="btn btn-admin-form">
            {{ __('Save') }}
          </a>

        </div>

      </div>
    </div>
  </div>
</div>
<!-- edit Modal -->
<div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header ">

        <h2 class="modal-title" id="addModalLabel">Edit User Information</h2>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="name">{{ __('User Name') }}</label>
          <input id="user_name_edit" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required pattern="[A-z]{3,}" title="only letters are allowed" autocomplete="user_name" autofocus>

          @error('user_name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror


        </div>
        <input type="hidden" name="id" id="id_edit" />
        <div class="form-group">
          <label for="full_name">{{ __('Full Name') }}</label>
          <input id="full_name_edit" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name') }}" required autocomplete="full_name" pattern="[A-z]{3,}" title="only letters are allowed" autofocus>

          @error('full_name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror

        </div>

        <div class="form-group">
          <label for="email">{{ __('Email Address') }}</label>

          <input id="email_edit" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

          @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="form-group">
          <label for="phone">{{ __('Phone') }}</label>
          <input type="text" class="form-control" id="phone_edit" name="phone" required pattern="[0-9]{6,}" value="{{ old('phone') }}" title="only numbers of six digits and above are allowed">


        </div>

        <div class="modal-footer justify-content-center">

          <a id="edit_user" class="btn btn-admin-form">
            {{ __('Edit') }}
          </a>
        </div>


      </div>
    </div>
  </div>
</div>

<!-- del Modal -->
<div id="delModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header ">

        <h4>Are you sure?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <p>Do you really want to delete this account? This process cannot be undone.</p>
      </div>
      <div class="modal-footer justify-content-center">
        <form>
          @csrf
          <input type="text" name="d_id" id="d_id" hidden>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button onclick="deleteUser()" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function() {
    $(document).on('click', '#save_user', function() {

      $.ajax({
        type: 'POST',
        url: "{{ route('ajax.user.store') }}",
        data: {
          '_token': "{{csrf_token()}}",
          'user_name': $("input[name='user_name']").val(),
          'full_name': $("input[name='full_name']").val(),
          'email': $("input[name='email']").val(),
          'password': $("input[name='password']").val(),
          'phone': $("input[name='phone']").val(),
          'password-confirm': $("input[name='password-confirm']").val(),

        },
        success: function(data) {
          location.reload();
        },
        error: function(rejest) {}

      });
    });


  });
</script>

<script>
  function getUserDetails($id) {
    var getUserURL = '{{ route("user.show","id") }}';
    getUserURL = getUserURL.replace("id", $id);
    console.log(getUserURL);
    $.ajax({
      type: 'GET',
      url: getUserURL,

      success: function(data) {
        $('#user_name_edit').val(data.user.user_name);
        $('#full_name_edit').val(data.user.full_name);
        $('#phone_edit').val(data.user.phone);
        $('#email_edit').val(data.user.email);
        $('#id_edit').val(data.user.id);

        // $('#editModal').modal('show');

      },
      error: function(rejest) {}

    });
  }
</script>

<script>
  $(document).ready(function() {
    $(document).on('click', '#edit_user', function() {

      $.ajax({
        type: 'POST',
        url: "{{ route('user.update') }}",
        data: {
          '_token': "{{csrf_token()}}",
          'id': $("#id_edit").val(),
          'user_name': $("#user_name_edit").val(),
          'full_name': $("#full_name_edit").val(),
          'email': $("#email_edit").val(),
          'phone': $("#phone_edit").val()

        },
        success: function(data) {
          location.reload();
        },
        error: function(rejest) {}

      });
    });


  });
</script>

<script>
  var id;

  function opendel($id) {
    document.getElementById('d_id').value = $id;
    id = $id;
    //alert(d_id);
  }

  function deleteUser() {
    var getUserURL = '{{ route("user.delete","id") }}';
    getUserURL = getUserURL.replace("id", id);
    console.log(getUserURL);
    $.ajax({
      type: 'GET',
      url: getUserURL,
      success: function(data) {
        location.reload();
      },
      error: function(rejest) {}

    });
  }
</script>

@endsection