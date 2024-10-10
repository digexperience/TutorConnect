@extends('layouts.master')

@section('content')
<main id="homepage" class="homepage">
    <section class="section profile">
        <div class="row">
            <div class="col-xl-12 first-card">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <div class="profile-pic-wrapper">
                            <img class="rounded-circle mt-5 profilepic" width="150px" height="150px" 
                                @if (Auth()->user()->image == "") src="assets/images/profile.jpg" 
                                @elseif (Auth()->user()->image !== "") src="assets/images/{{Auth()->user()['image']}}" 
                                @endif>
                            <div class="media-icons">
                                <a href="#uploadpicture" data-toggle="modal" class="btn btn-sm btn-flat float-right">
                                    <i class="bi bi-camera-fill"></i>
                                </a>
                            </div>
                        </div>
                        <h2>{{ Auth()->user()->fname }} {{ Auth()->user()->mi }} {{ Auth()->user()->lname }}</h2>
                        <h3>Personal Account</h3>
                    </div>
                </div>
            </div>

            <div class="col-xl-12 second-card">
                <div class="card ">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered d-flex justify-content-between" role="tablist">
                            <li class="nav-item flex-fill text-center" role="presentation">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview" aria-selected="true" role="tab">
                                    Overview
                                </button>
                            </li>

                            <li class="nav-item flex-fill text-center" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit" aria-selected="false" tabindex="-1" role="tab">
                                    Edit Profile
                                </button>
                            </li>

                            <li class="nav-item flex-fill text-center" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password" aria-selected="false" tabindex="-1" role="tab">
                                    Change Password
                                </button>
                            </li>

                            <li class="nav-item flex-fill text-center" role="presentation">
                                <a href="/tutor" class="btn btn-outline-primary">
                                    <i class="bi bi-person-fill-up"></i> Become a Tutor
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview" role="tabpanel">
                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Full Name</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth()->user()->fname }} {{ Auth()->user()->mi }} {{ Auth()->user()->lname }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth()->user()->email }}</div>
                                </div>
                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit" role="tabpanel">
                                <!-- Profile Edit Form -->
                                <form action="{{ route('profile.update', Auth()->user()->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="text" class="form-control mb-2 @error('fname') is-invalid @enderror" placeholder="Enter a First Name" value="{{Auth()->user()->fname}}" id="fname" name="fname" required oninput="upvalidateNameFields()">
                                            <input type="text" class="form-control mb-2" placeholder="M.I." value="{{Auth()->user()->mi}}" id="mi" name="mi" required>
                                            <input type="text" class="form-control @error('lname') is-invalid @enderror" placeholder="Enter a Last Name" value="{{Auth()->user()->lname}}" id="lname" name="lname" required oninput="upvalidateNameFields()">
                                            <div id="name-error" class="invalid-feedback" role="alert" style="display: none;">
                                                Name fields must meet the required criteria.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{Auth()->user()->email}}" placeholder="Enter an Email" required autocomplete="email" autofocus oninput="upvalidateEmail()">
                                            <div id="email-error" class="invalid-feedback" role="alert" style="display: none;">
                                                Please enter a valid email address.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password" role="tabpanel">
                                <!-- Change Password Form -->
                                <form action="{{ route('profile.update', Auth()->user()->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="row mb-3">
                                        <label for="currentpassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="password" class="form-control" id="currentpassword" name="currentpassword" placeholder="Enter Current Password" minlength="8" oninput="validateCurrentPassword()" required>
                                            <div id="currentpassword-error" class="invalid-feedback" role="alert" style="display: none;">
                                                Password must be at least 8 characters long and contain no spaces.
                                            </div>
                                            @error('password')
                                            <div class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="Enter New Password" minlength="8" oninput="validateNewPassword()" required>
                                            <div id="newpassword-error" class="invalid-feedback" role="alert" style="display: none;">
                                                Password must be at least 8 characters long and contain no spaces.
                                            </div>
                                            @error('password')
                                            <div class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="password" class="form-control" id="renewpassword" name="renewpassword" placeholder="Re-enter New Password" minlength="8" oninput="validateReNewPassword()" required>
                                            <div id="renewpassword-error" class="invalid-feedback" role="alert" style="display: none;">
                                                Passwords do not match.
                                            </div>
                                            @error('password')
                                            <div class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form>
                            </div>
                        </div><!-- End Bordered Tabs -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
  function validateCurrentPassword() {
      const currentPasswordInput = document.getElementById('currentpassword');
      const currentPasswordError = document.getElementById('currentpassword-error');

      if (currentPasswordInput.value.length >= 8 && !/\s/.test(currentPasswordInput.value)) {
          currentPasswordError.style.display = 'none';
          currentPasswordInput.classList.remove('is-invalid');
      } else {
          currentPasswordError.style.display = 'block';
          currentPasswordInput.classList.add('is-invalid');
      }
  }

  function validateNewPassword() {
      const newPasswordInput = document.getElementById('newpassword');
      const newPasswordError = document.getElementById('newpassword-error');

      if (newPasswordInput.value.length >= 8 && !/\s/.test(newPasswordInput.value)) {
          newPasswordError.style.display = 'none';
          newPasswordInput.classList.remove('is-invalid');
      } else {
          newPasswordError.style.display = 'block';
          newPasswordInput.classList.add('is-invalid');
      }
  }

  function validateReNewPassword() {
      const newPasswordInput = document.getElementById('newpassword');
      const reNewPasswordInput = document.getElementById('renewpassword');
      const reNewPasswordError = document.getElementById('renewpassword-error');

      if (newPasswordInput.value === reNewPasswordInput.value) {
          reNewPasswordError.style.display = 'none';
          reNewPasswordInput.classList.remove('is-invalid');
      } else {
          reNewPasswordError.style.display = 'block';
          reNewPasswordInput.classList.add('is-invalid');
      }
  }
  function upvalidateNameFields() {
    const fnameInput = document.getElementById('fname');
    const lnameInput = document.getElementById('lname');
    const miInput = document.getElementById('mi');
    const errorSpan = document.getElementById('name-error');
    const regex = /^[\p{L}\s\-.]+$/u;
    let isValid = true;

    if (fnameInput.value.length < 3 || fnameInput.value.length > 255 || !regex.test(fnameInput.value)) {
        fnameInput.classList.add('is-invalid');
        isValid = false;
    } else {
        fnameInput.classList.remove('is-invalid');
    }

    if (lnameInput.value.length < 2 || lnameInput.value.length > 255 || !regex.test(lnameInput.value)) {
        lnameInput.classList.add('is-invalid');
        isValid = false;
    } else {
        lnameInput.classList.remove('is-invalid');
    }

    if (miInput.value.length > 2 || !regex.test(miInput.value)) {
        miInput.classList.add('is-invalid');
        isValid = false;
    } else {
        miInput.classList.remove('is-invalid');
    }

    errorSpan.style.display = isValid ? 'none' : 'block';
  }

  function upvalidateEmail() {
    const emailInput = document.getElementById('email');
    const errorSpan = document.getElementById('email-error');
    const emailValue = emailInput.value;

    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if (emailPattern.test(emailValue)) {
        errorSpan.style.display = 'none';
        emailInput.classList.remove('is-invalid');
    } else {
        errorSpan.style.display = 'block';
        emailInput.classList.add('is-invalid');
    }
  }

</script>

@include('includes.profilepicture')
@endsection
