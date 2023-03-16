@extends('UserPages.template')

@section('main-content')
<section>
    <div class="container pb-5">
        @if (session('message'))
        <div class="row mt-4">
            <div class="col-xl-8 offset-xl-2">
                <div class="alert alert-{{ session('messageType') }} d-flex align-items-center alert-dismissible fade show" role="alert">
                    @if (session('messageType') == 'success')
                        <i class="fa-solid fa-circle-check"></i>
                    @else
                        <i class="fa-solid fa-circle-exclamation"></i>
                    @endif
                    <div>
                        {{ ' '.session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <div class="card rounded-5 border-0 bg-primary text-white">
                    <div class="card-body p-md-5">
                        <div class="row">
                            <div class="col-12">
                                <h1 class="fw-bold">User feed back form</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <form action="{{ url('contact-us') }}" method="POST">
                                    @method('POST')
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Your name</label>
                                        <input type="text" class="form-control" name="name" id="name" required>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="email" class="form-label">Email address</label>
                                                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" required>
                                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="phone" class="form-label">Phone number (optional)</label>
                                                <input type="text" class="form-control" name="phone" id="phone" aria-describedby="phoneHelp">
                                                <div id="phoneHelp" class="form-text">We'll never share your phone with anyone else.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="subject" class="form-label">Subject</label>
                                        <input type="text" class="form-control" name="subject" id="subject" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="message" class="form-label">Message</label>
                                        <textarea name="message" id="message" rows="5" class="form-control"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-light rounded-pill">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection