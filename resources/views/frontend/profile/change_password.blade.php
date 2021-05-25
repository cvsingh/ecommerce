@extends('frontend.main_master')
@section('content')
<!--
@php
$user = DB::table('users')->where('id', Auth::user()->id)->first();
@endphp -->
<div class="body-content">
  <div class="container">
    <div class="row">
      <div class="col-md-2"><br>
        <img class="card-img-top" src="{{(!empty($user->profile_photo_path)) ? url('upload/user_images/'.$user->profile_photo_path) : url('upload/user_images/default.jpg')}}" style="border-radius: 50%" height="100%" width="100%"><br><br>
        <ul class="list-group list-group-flush">
          <a href="{{route('dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
          <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
          <a href="{{route('user.change.password')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>
          <a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>


        </ul>
      </div>
      <!--end col-->
      <div class="col-md-2">

      </div>
      <!--end col-->

      <div class="col-md-6">
        <div class="card">
          <h3 class="text-center"><span class="text-danger">Change Password</span></h3>
          <br>
          <div class="card-body">
            <form action="{{route('user.password.update')}}" method="post">
              @csrf
              <div class="form-group">
                <h5><strong> Current Password</strong><span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="password" id="current_password" name="oldpassword" class="form-control" required="">
                </div>
              </div>
              <div class="form-group">
                <h5><strong>New Password</strong><span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="password" id="password" name="password" class="form-control" required="">
                </div>
              </div>
              <div class="form-group">
                <h5><strong>Confirm Password</strong><span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required="">
                </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-danger">Change Password</button>
              </div>
            </form>
          </div>

        </div>
      </div>
      <!--end col-->
    </div>
    <!--end row-->
  </div>
</div>

@endsection
