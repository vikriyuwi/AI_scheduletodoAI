@extends('../template')

@section('main-content')
<section id="updateinfo">
    <div class="container pt-5">
        @if (session('message'))
            <div class="alert alert-{{ session('messageType') }} d-flex align-items-center alert-dismissible fade show" role="alert">
                @if (session('type') == 'success')
                    <i class="fa-solid fa-circle-check"></i>
                @else
                    <i class="fa-solid fa-circle-exclamation"></i>
                @endif
                <div>
                    {{ ' '.session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        <div class="row py-5">
            <div class="col-md-3">
                <h2>Account</h2>
                {{ session('message') }}
                <div class="row">
                    <div class="col-12">
                        <img src="{{ $userData->user_picture }}" class="rounded-circle" alt="{{ $userData->user_name }}"><br><br>
                        <b>{{ $userData->user_name }}</b><br>
                        <span>
                            {{ $userData->user_gmail }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <h2>Profile Detail</h2>
                <div class="row">
                    <div class="col-12">
                        <form action="{{ url('profile/'.$userData->user_id.'/update') }}" method="POST">
                            @method('PATCH')
                            @csrf
                            <div class="mb-3">
                                <label for="user_name" class="form-label">Your name</label>
                                <input type="text" class="form-control" id="user_name" disabled value="{{ $userData->user_name }}">
                            </div>
                            <div class="mb-3">
                                <label for="user_email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="user_email" aria-describedby="emailHelp" disabled value="{{ $userData->user_gmail }}">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label for="user_pronounce" class="form-label">Pronounce</label>
                                <select class="form-select" name="user_pronounce" id="user_pronounce" aria-label="Select your pronounce">
                                    @if ($userData->user_pronounce == 'He/Him')
                                        <option value="0" selected disabled>He/Him</option>
                                        <option value="2">She/Her</option>
                                        <option value="3">They/Them</option>
                                    @elseif ($userData->user_pronounce == 'She/Her')
                                        <option value="1">He/Him</option>
                                        <option value="0" selected disabled>She/Her</option>
                                        <option value="3">They/Them</option>
                                    @elseif ($userData->user_pronounce == 'They/Them')
                                        <option value="1">He/Him</option>
                                        <option value="2">She/Her</option>
                                        <option value="0" selected disabled>They/Them</option>
                                    @else
                                        <option value="0" selected>Select your pronounce..</option>
                                        <option value="1">He/Him</option>
                                        <option value="2">She/Her</option>
                                        <option value="3">They/Them</option>
                                    @endif
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="user_phone">Phone</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">+62</span>
                                    <input type="text" class="form-control" placeholder="your phone number" aria-label="Phone number" name="user_phone" value="{{ substr($userData->user_phone, 2) }}">
                                  </div>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="enableNotification">
                                <label class="form-check-label" for="enableNotification">Send me notification on email</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Update profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection