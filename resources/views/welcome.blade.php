@extends('layouts.home')

@section('title')
{{ config('app.name', 'Laravel') }} - Your Favourite Helpdesk!
@endsection

@section('content')

<div class="intro">
    <br><br>
    <br><br>
    <div class="cap">
    <h3 class='text-light text-center'>WELCOME TO WEREPORT<br> </h3>
    <a href="#explore" class="btn btn-rd btn-lg btn-primary">EXPLORE SERVICES</a>
    </div>
    </div>

        <div class="container">

              <br>
        <div class="maincontent">
            <div class="row text-center">
                <div class="col-md-4">
                        <h2><i class="fa fa-flash"></i></h2>
                    <p class='lead'>Superfast Helpdesk system</p><p class='text-justify'>
                        Wereport provides a super fast and highly optimised help desk interface that helps it's customers send messages related to the problems they are facing on the platform.
                    </p>
                    </div>
                <div class="col-md-4">
                        <h2><i class="fa fa-comments"></i></h2>
                    <p class='lead'>Supports Conversation</p><p class='text-justify'>
                        Wereports provides a medium that allows the users to communicate effectively. Users can send messages, reply messages and also get notified when their messages get replied.
                    </p></div>
                <div class="col-md-4">
                        <h2><i class="fa fa-info"></i></h2>
                    <p class='lead'>Simplified Interface</p><p class='text-justify'>
                        Wereport has one of the most simple, highly optimised and less complicated user interface that provides all the features required for effective communication and messaging.
                    </p></div>
            </div>

<br>

<div class="row" id="explore">
        <div class="col-xl-3 col-md-3 mb-3">
          <div class="card bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-paper-plane"></i>
              </div>
              <div class="mr-5">Send Message</div>
            </div>
            <a class="card-footer text-dark clearfix small z-1" href="/send">
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
              <div class="mr-5">My Messages</div>
            </div>
            <a class="card-footer text-dark clearfix small z-1" href="/dashboard">
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
              <div class="mr-5">My Account</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="/login">
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
                <i class="fa fa-info"></i>
              </div>
              <div class="mr-5">About Us</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="/about">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        </div>
<!--end of cards-->

</div>
@endsection
