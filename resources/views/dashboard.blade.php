@extends('frontend.main_master')
@section('content')
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
          <h3 class="text-centre"><span class="text-danger">Hi...</span><strong>&nbsp;{{Auth::user()->name}}</strong>&nbsp; Welcome To Online Shop</h3>
        </div>
      </div>
      <!--end col-->
    </div>
    <!--end row-->
  </div>
</div>

@endsection
