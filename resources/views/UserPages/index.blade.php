@extends('UserPages.template')

@section('main-content')
{{-- header section --}}
<section id="header" class="w-100 overflow-x-hidden">
  <div class="container-fluid py-5 py-md-0" id="header">
    <div class="row pt-5 pt-md-0">
      <div class="col-md-4"></div>
      <div class="col-md-3 d-none d-md-block">
        <img src="{{ url('assets/element/widget1.png') }}" alt="widget1">
      </div>
    </div>
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-2 pt-5 d-none d-md-block">
        <img src="{{ url('assets/element/widget2.png') }}" alt="widget1">
      </div>
      <div class="col-md-6 text-center" style="z-index: 10">
        <h1 class="fw-bold display-3">Get more done<br>in less time.</h1>
        <p>AI will help you with smart recommendation<br>to level up your productivity</p>
        <div class="row">
          <div class="col-12 text-center">
            <a href="{{ url('todo') }}" class="btn myButton mb-2 mb-md-0 me-0 me-md-4">start manage your task</a>
            <br class="d-block d-md-none">
            <a style="link link-primary"  href="#about">learn more</a>
          </div>
        </div>
      </div>
      <div class="col-md-2 d-none d-md-block">
        <img src="{{ url('assets/element/widget5.png') }}" alt="widget1">
      </div>
    </div>
    <div class="row pb-5 pb-md-0">
      <div class="col-md-2"></div>
      <div class="col-md-4 d-none d-md-block">
        <img src="{{ url('assets/element/widget3.png') }}" alt="widget1">
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-3 pt-4 d-none d-md-block">
        <img src="{{ url('assets/element/widget4.png') }}" alt="widget1">
      </div>
    </div>
  </div>
</section>
{{-- intro section --}}
<section id="about" class="overflow-x-hidden py-5">
  <div class="container-fluid">
    <div class="row justify-content-between">
      <div class="col-lg-6 px-5 d-flex align-items-center">
        <div class="px-lg-5 my-auto">
          <h2 class="mb-4 fw-bolder">
            Just list your task and see what <span class="text-primary">AI</span> can do for you
          </h2>
          <p>This website is using K-Means clustering to generate
            clustering for your todo list so AI will choose some of
            your task to be priorities recommendations</p>
        </div>
      </div>
      <div class="col-lg-6 px-5 d-flex">
        <img src="{{ url('assets/element/section2_picture.png') }}" alt="widget_section2" class="w-100 my-auto">
      </div>
    </div>
  </div>
</section>
{{-- howto section --}}
<section id="howto">
  <div class="container p-4">
    <div class="row">
      <div class="col-12 text-center">
        <h2 class="fw-bolder">Let me show you</h2>
        <p>Let's add a little magic to our productivity <br>
          and let AI be our trusty sidekick in managing tasks!</p>
      </div>
    </div>
    <div class="row howTo text-start m-5">
      <div class="col-lg-6 mb-4 mb-lg-5">
        <div class="row">
          <div class="col-2 d-flex justify-content-center align-items-center">
            1
          </div>
          <div class="col-10">
            <h5>
              Specify your todo
            </h5>
            <p>
              Let's tackle the "Epic Adventure" task together! Complete the todo details such as name, deadline, and difficulty level
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-6 mb-4 mb-lg-5">
        <div class="row">
          <div class="col-2 d-flex justify-content-center align-items-center">
            2
          </div>
          <div class="col-10">
            <h5>
              List all step on the task                  
            </h5>
            <p>
              We gotta get organized and create a list of every step(s) that needs to be done. Don't forget to take breaks to avoid burnout.                  
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-6 mb-4 mb-lg-5">
        <div class="row">
          <div class="col-2 d-flex justify-content-center align-items-center">
            3
          </div>
          <div class="col-10">
            <h5>
              Let AI works                  
            </h5>
            <p>
              Get ready for some AI-powered productivity fun! AI is here to save the day by recommending which task to prioritize first. No more struggling                  
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-6 mb-4 mb-lg-5">
        <div class="row">
          <div class="col-2 d-flex justify-content-center align-items-center">
            4
          </div>
          <div class="col-10">
            <h5>
              Monitoring                  
            </h5>
            <p>
              Let's give AI a front-row seat to our productivity journey and show it how it's done! As we complete each step, we'll update our progress                  
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
{{-- callback section --}}
<section id="callback">
  <div class="container pb-5 p-4">
    <div class="row">
      <div class="col-12 card4 d-flex justify-content-center align-items-center p-3">
        <div class="row">
          <div class="col-lg-12 text-center py-5">
            <h1 class="fw-bold display-3">So, are you ready?</h1>
            <p>Let's get that to-do list sorted and make it look like a work of art.</p>
            <div class="row">
              <div class="col-12 text-center">
                <a href="{{ url('todo') }}" class="btn myButton2 mb-2 mb-md-0 me-0 me-md-4">start manage your task</a>
                <br class="d-block d-md-none">
                <a style="link"  href="#about">learn more</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
{{-- footer section --}}
<section id="footer">
  <div class="myFooter">
    <div class="container">
      <footer class="py-5">
        <div class="row">
          <div class="col-md-3 mb-3">
            <ul class="nav flex-column">
              <a href="{{ url('/') }}" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
                <img src="{{ url('assets/logo/icon.png') }}" alt="Logo" height="70" class="d-inline align-text-top">
              </a>
              <p class="text-muted">&copy; 2023</p>
            </ul>
          </div>
    
          <div class="col-md-2 mb-3">
            <h5>Section</h5>
            <ul class="nav flex-column">
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
            </ul>
          </div>
    
          <div class="col-md-2 mb-3">
            <h5>About</h5>
            <ul class="nav flex-column">
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About us</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Contact us</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Terms & Prifacy</a></li>
            </ul>
          </div>
    
          <div class="col-md-5 mb-3">
            <form>
              <h5>Subscribe to our newsletter</h5>
              <p>Monthly digest of what's new and exciting from us.</p>
              <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                <label for="newsletter1" class="visually-hidden">Email address</label>
                <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                <button class="btn myButton" type="button">Subscribe</button>
              </div>
            </form>
          </div>
        </div>
      </footer>
    </div>
  </div>
</section>  
@endsection