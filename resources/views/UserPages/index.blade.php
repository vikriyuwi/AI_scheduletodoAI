@extends('UserPages.template')

@section('main-content')
{{-- announcement modal --}}
{{-- <div class="modal fade" id="modal-announce" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content rounded-5">
          <div class="modal-header">
              <h1 class="modal-title fs-5 fw-bold display-1" id="staticBackdropLabel">Announcement</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" id="modalBody">
              <h1 class="fw-bold">Give away time! &#10024</h1>
              <p>We are absolutely thrilled to announce that, as a way of our appreciation for some loyal and awesome beta testers, we will be giving away some seriously <b class="text-primary">cool prizes</b> as </p>
              <h5>based on those who frequently use the website, provide constructive feedback, and lucky draw</h5>
              <p class="text-sm">The winners will be announced on our website and social media platforms at <b>Apr 8, 2023</b>. Good luck! &#127881</p>
              <br><a href="https://www.instagram.com/p/CpxXQL6hS3Z/?igshid=YmMyMTA2M2Y=" class="link link-primary" target="_blank">see terms & condition</a>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Close</button>
          </div>
      </div>
  </div>
</div> --}}
{{-- header section --}}
<section id="header" class="w-100 overflow-x-hidden">
  <div class="container-fluid py-md-0" id="header">
    <div class="row">
      <div class="col-1 d-block d-sm-none"></div>
      <div class="col-5 d-md-none">
        <div class="mt-3 mt-md-0"></div>
        <img src="{{ url('assets/element/widget1.png') }}" alt="widget1">
      </div>
      <div class="col-1 d-none d-sm-block d-md-none"></div>
      <div class="col-4 col-sm-4 d-md-none">
        <img src="{{ url('assets/element/widget2.png') }}" alt="widget2">
      </div>
    </div>
    <div class="row pt-5 pt-md-0">
      <div class="col-md-4 d-none d-md-block"></div>
      <div class="col-md-3 d-none d-md-block">
        <img src="{{ url('assets/element/widget1.png') }}" alt="widget1">
      </div>
    </div>
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-2 pt-0 pt-md-5 d-none d-md-block">
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
      <div class="col-md-2 d-none d-md-block"></div>
      <div class="col-md-4 d-none d-md-block">
        <img src="{{ url('assets/element/widget3.png') }}" alt="widget3">
      </div>
      <div class="col-md-1 d-none d-md-block"></div>
      <div class="col-md-3 pt-4 d-none d-md-block">
        <img src="{{ url('assets/element/widget4.png') }}" alt="widget4">
      </div>
      <div class="col-4 d-md-none">
        <img src="{{ url('assets/element/widget5.png') }}" alt="widget5">
      </div>
      <div class="col-8 d-md-none">
        <div class="row">
          <div class="col-3"></div>
          <div class="col-6">
            <img src="{{ url('assets/element/widget4.png') }}" alt="widget4">
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <img src="{{ url('assets/element/widget3.png') }}" alt="widget3">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
{{-- intro section --}}
<section id="about" class="overflow-x-hidden py-5">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-lg-6 px-4 px-md-0 d-flex align-items-center">
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
    <div class="row my-4 my-md-0">
      <div class="col-12 text-center">
        <iframe src="https://giphy.com/embed/oiLIk29tymDFNj3xdS" width="480" height="270" frameBorder="0" style="pointer-events: none;"  allowFullScreen></iframe>
        <h2 class="fw-bolder">Let me show you</h2>
        <p>Let's add a little magic to our productivity <br>
          and let AI be our trusty sidekick in managing tasks!</p>
      </div>
    </div>
    <div class="row howTo text-start m-4 m-md-5">
      <div class="col-lg-6 mb-4 mb-lg-5">
        <div class="row">
          <div class="col-2 d-flex justify-content-center align-items-center">
            1
          </div>
          <div class="col-10">
            <iframe src="https://giphy.com/embed/PJpIJDGSjA34VZODV2" width="480" height="270" frameBorder="0" style="pointer-events: none;" allowFullScreen></iframe>
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
            <iframe src="https://giphy.com/embed/mIu3W1O7xEdvHkw7g3" width="480" height="270" frameBorder="0" style="pointer-events: none;" allowFullScreen></iframe>
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
            <iframe src="https://giphy.com/embed/BKtqQHcnWwxtQzObBR" width="480" height="270" frameBorder="0" style="pointer-events: none;" allowFullScreen></iframe>
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
            <iframe src="https://giphy.com/embed/ZhdSAKqSirFG45jTfH" width="480" height="270" frameBorder="0" style="pointer-events: none;" allowFullScreen></iframe>
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
@endsection

@section('additionalScript')
<script>
  const modalAnnounce = new bootstrap.Modal('#modal-announce');
  modalAnnounce.show();
</script>
@endsection