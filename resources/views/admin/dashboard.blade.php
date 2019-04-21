@extends('layouts.app')
@section('title')
Dashboard - Admin
@endsection
@section('content')
<h4 class="text-primary">ADMIN DASHBOARD</h4>
<p>Hello {{Auth::user()->name}}, Welcome to the admin panel </p>
<hr>


<div class="row">
    <div class="col-xl-3 col-md-3 mb-3">
      <div class="card bg-primary o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fa fa-fw fa-paper-plane"></i>
          </div>
          <div class="mr-5">Unread Messages</div>
        </div>
        <a class="card-footer text-dark clearfix small z-1" href="admin/unread">
          <span class="float-left">View Details</span>
          <span class="float-right">
            <i class="fa fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-md-3 mb-3">
      <div class="card bg-warning o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fa fa-fw fa-envelope"></i>
          </div>
          <div class="mr-5">All Messages</div>
        </div>
        <a class="card-footer text-dark clearfix small z-1" href="admin/messages">
          <span class="float-left">View Details</span>
          <span class="float-right">
            <i class="fa fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-md-3 mb-3">
      <div class="card text-white bg-success o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fa fa-user"></i>
          </div>
          <div class="mr-5">All Users</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="admin/users">
          <span class="float-left">View Details</span>
          <span class="float-right">
            <i class="fa fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-md-3 mb-3">
      <div class="card text-white bg-danger o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fa fa-comments"></i>
          </div>
          <div class="mr-5">Replies</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="admin/replies">
          <span class="float-left">View Details</span>
          <span class="float-right">
            <i class="fa fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
    </div>
<!--end of cards-->

@endsection
