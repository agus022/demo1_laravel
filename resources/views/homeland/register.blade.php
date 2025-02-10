@extends('layouts.homeland')

@section('content')
<div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12" data-aos="fade-up" data-aos-delay="100">
          <h3 class="h4 text-black widget-title mb-3">Register</h3>
          <form action="" class="form-contact-agent">

          <div class="form-group">
              <label for="email">Username</label>
              <input type="username" id="username" class="form-control">
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" id="email" class="form-control">
          </div>
          <div class="form-group">
              <label for="password">Password</label>
              <input type="password" id="password" class="form-control">
          </div>
          <div class="form-group">
              <input type="submit" id="phone" class="btn btn-primary" value="Register">
          </div>
          </form>
        </div>

      </div>
    </div>
  </div>

@endsection
