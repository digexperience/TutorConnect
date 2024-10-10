@extends('layouts.master')

@section('content')
<main id="homepage" class="homepage">
    <section class="section profile">
        <div class="row">
            <div class="col-xl-12 tutor-signup-card">
              <div class="card">
                <div class="d-flex justify-content-center py-4">
                  <a class="logo d-flex align-items-center w-auto">
                    <span class="d-none d-lg-block">Tutor Sign Up</span>
                  </a>
                </div>
                <!-- Default Tabs -->
                <ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100 {{ session('next') || session('next') == 1 ? '' : 'active' }}" id="personal-info-tab" data-bs-toggle="tab" data-bs-target="#personal-info-justified" type="button" role="tab" aria-controls="personal-info" aria-selected="true" disabled>Personal Information</button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100 {{ session('next') == 2 ? 'active' : '' }}" id="specialties-tab" data-bs-toggle="tab" data-bs-target="#specialties-justified" type="button" role="tab" aria-controls="specialties" aria-selected="false" tabindex="-1" disabled>Specialties</button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100 {{ session('next') == 3 ? 'active' : '' }}" id="education-tab" data-bs-toggle="tab" data-bs-target="#education-justified" type="button" role="tab" aria-controls="education" aria-selected="false" tabindex="-1" disabled>Education</button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100 {{ session('next') == 4 ? 'active' : '' }}" id="experience-tab" data-bs-toggle="tab" data-bs-target="#experience-justified" type="button" role="tab" aria-controls="experience" aria-selected="false" tabindex="-1" disabled>Experience</button>
                    </li>
                </ul>
                <div class="tab-content p-4" id="myTabjustifiedContent">
                  <div class="tab-pane fade {{ session('next') || session('next') == 1 ? '' : 'show active' }}" id="personal-info-justified" role="tabpanel" aria-labelledby="personal-info-tab">
                    <div class="card-body">
                      <div class="pt-4 pb-4">
                        <h5 class="card-title text-center pb-0 fs-4">Enter your Personal Information</h5>
                      </div>
                      <!-- Personal Information -->
                      <form class="row g-3 needs-validation" action="{{ route('profile.update', Auth()->user()->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                          <div class="col-md-5">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control mb-2 @error('firstName') is-invalid @enderror" placeholder="Enter a First Name" value="{{Auth()->user()->fname}}" id="firstName" name="firstName" required oninput="upvalidateNameFields2()">
                            <div class="invalid-feedback">Please enter your first name!</div>
                          </div>
                          <div class="col-md-5">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control mb-2 @error('lastName') is-invalid @enderror" placeholder="Enter a Last Name" value="{{Auth()->user()->lname}}" id="lastName" name="lastName" required oninput="upvalidateNameFields2()">
                            <div class="invalid-feedback">Please enter your last name!</div>
                          </div>
                          <div class="col-md-2">
                            <label for="middleInitial" class="form-label">M.I (Optional)</label>
                            <input type="text" class="form-control mb-2 @error('middleInitial') is-invalid @enderror" placeholder="Enter a Last Name" value="{{Auth()->user()->mi}}" id="middleInitial" name="middleInitial" required oninput="upvalidateNameFields2()">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <label for="Temail" class="form-label">Email</label>
                            <input type="text" class="form-control mb-2 @error('Temail') is-invalid @enderror" placeholder="Enter a Last Name" value="{{Auth()->user()->email}}" id="Temail" name="Temail" required oninput="upvalidateEmail2()">
                            <div class="invalid-feedback">Please enter a valid email address!</div>
                          </div>
                        </div>
                        <div class="row">
                        <?php
                        $maxDate = date('Y-m-d', strtotime('-5 years'));
                        ?>
                        <div class="col-md-6">
                            <label for="Tdob" class="form-label">Date of Birth</label>
                            <input type="date" name="Tdob" class="form-control @error('Tdob') is-invalid @enderror" id="Tdob" value="{{Auth()->user()->date_of_birth}}" max="<?= $maxDate ?>" required oninput="validateDOB()" />
                            <div class="invalid-feedback">Please enter your date of birth!</div>
                        </div>
                        <div class="col-md-6">
                            <label for="region" class="form-label">Region</label>
                            <select name="region" class="form-control @error('region') is-invalid @enderror" id="region" required onchange="updateProvinces()">
                                <option value="">Select Region</option>
                                <option value="NCR" {{ Auth::user()->region == 'NCR' ? 'selected' : '' }}>National Capital Region (NCR)</option>
                                <option value="CAR" {{ Auth::user()->region == 'CAR' ? 'selected' : '' }}>Cordillera Administrative Region (CAR)</option>
                                <option value="Region I" {{ Auth::user()->region == 'Region I' ? 'selected' : '' }}>Ilocos Region (Region I)</option>
                                <option value="Region II" {{ Auth::user()->region == 'Region II' ? 'selected' : '' }}>Cagayan Valley (Region II)</option>
                                <option value="Region III" {{ Auth::user()->region == 'Region III' ? 'selected' : '' }}>Central Luzon (Region III)</option>
                                <option value="Region IV-A" {{ Auth::user()->region == 'Region IV-A' ? 'selected' : '' }}>CALABARZON (Region IV-A)</option>
                                <option value="Region IV-B" {{ Auth::user()->region == 'Region IV-B' ? 'selected' : '' }}>MIMAROPA (Region IV-B)</option>
                                <option value="Region V" {{ Auth::user()->region == 'Region V' ? 'selected' : '' }}>Bicol Region (Region V)</option>
                                <option value="Region VI" {{ Auth::user()->region == 'Region VI' ? 'selected' : '' }}>Western Visayas (Region VI)</option>
                                <option value="Region VII" {{ Auth::user()->region == 'Region VII' ? 'selected' : '' }}>Central Visayas (Region VII)</option>
                                <option value="Region VIII" {{ Auth::user()->region == 'Region VIII' ? 'selected' : '' }}>Eastern Visayas (Region VIII)</option>
                                <option value="Region IX" {{ Auth::user()->region == 'Region IX' ? 'selected' : '' }}>Zamboanga Peninsula (Region IX)</option>
                                <option value="Region X" {{ Auth::user()->region == 'Region X' ? 'selected' : '' }}>Northern Mindanao (Region X)</option>
                                <option value="Region XI" {{ Auth::user()->region == 'Region XI' ? 'selected' : '' }}>Davao Region (Region XI)</option>
                                <option value="Region XII" {{ Auth::user()->region == 'Region XII' ? 'selected' : '' }}>SOCCSKSARGEN (Region XII)</option>
                                <option value="Region XIII" {{ Auth::user()->region == 'Region XIII' ? 'selected' : '' }}>Caraga (Region XIII)</option>
                                <option value="BARMM" {{ Auth::user()->region == 'BARMM' ? 'selected' : '' }}>Bangsamoro Autonomous Region in Muslim Mindanao (BARMM)</option>
                            </select>
                            <div class="invalid-feedback">Please select your region!</div>
                        </div>

                        <div class="col-md-6">
                            <label for="province" class="form-label">Province</label>
                            <select name="province" class="form-control @error('province') is-invalid @enderror" id="province" required onchange="updateMunicipalities()">
                                <option value="">Select Province</option>
                                <!-- Provinces will be populated based on the selected region -->
                            </select>
                            <div class="invalid-feedback">Please select your province!</div>
                        </div>


                      <div class="col-md-6">
                          <label for="municipality" class="form-label">Municipality</label>
                          <select name="municipality" class="form-control @error('municipality') is-invalid @enderror" id="municipality" required>
                              <option value="">Select Municipality</option>
                          </select>
                          <div class="invalid-feedback">Please select your municipality!</div>
                      </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="about" class="form-label">About</label>
                                <textarea name="about" class="form-control @error('about') is-invalid @enderror" placeholder="Please tell us about yourself" id="about" rows="3" required oninput="upvalidateAbout()">{{ Auth::user()->about }}</textarea>
                                <div class="invalid-feedback">Please tell us about yourself! Minimum 20 characters and maximum of 500 characters.</div>
                            </div>
                        </div>

                        <div class="row">
                          <div class="col-12 m-4">
                            <a href="/profile" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-success">Next</button>
                          </div>
                        </div>
                      </form>

                      <!-- End of Personal Information -->
                    </div>
                  </div>
                  <div class="tab-pane fade {{ session('next') == 2 ? 'show active' : '' }}" id="specialties-justified" role="tabpanel" aria-labelledby="specialties-tab">
                    <div class="card-body">
                      <div class="pt-4 pb-0">
                        <h5 class="card-title text-center pb-2 fs-4">Specialties</h5>
                      </div>
                      <!-- Specialties -->
                      <form class="row g-3 needs-validation" action="{{ route('profile.update', Auth()->user()->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="col-md-12">
                            <label for="specialty" class="form-label">Specialties</label>
                            <input type="text" name="specialty" class="form-control @error('specialty') is-invalid @enderror" id="specialty" value="{{ Auth()->user()->specialties }}" required oninput="validateSpecialty()" />
                            <div class="invalid-feedback">Please enter your Specialties!</div>
                        </div>
                        <div class="col-12">
                            <label for="specialties_description" class="form-label">Description</label>
                            <textarea name="specialties_description" class="form-control @error('specialties_description') is-invalid @enderror" id="specialties_description" rows="3" required oninput="validateDescription()"> {{ Auth()->user()->specialties_description }} </textarea>
                            <div class="invalid-feedback">Minimum 10 and Maximum 500 characters</div>
                        </div>
                        <div class="col-12">
                          <button type="button" class="btn btn-danger">Back</button>
                          <button type="submit" class="btn btn-success">Next</button>
                        </div>
                      </form>

                      <!-- End of Specialties -->
                    </div>
                  </div>
                  <div class="tab-pane fade {{ session('next') == 3 ? 'show active' : '' }}" id="education-justified" role="tabpanel" aria-labelledby="education-tab">
                    <div class="card-body">
                      <div class="pt-4 pb-2">
                        <h5 class="card-title text-center pb-0 fs-4">Education</h5>
                      </div>
                      <form class="row g-3 needs-validation" action="{{ route('profile.update', Auth()->user()->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                      <div class="col-md-6">
                            <label for="highestEducation" class="form-label">Highest Level of Education</label>
                            <select name="highestEducation" class="form-control @error('highestEducation') is-invalid @enderror" id="highestEducation" required>
                                <option value="">Select Level</option>
                                <option value="High School" {{ auth()->user()->highest_level_of_education === 'High School' ? 'selected' : '' }}>High School</option>
                                <option value="Associate Degree" {{ auth()->user()->highest_level_of_education === 'Associate Degree' ? 'selected' : '' }}>Associate Degree</option>
                                <option value="Bachelor's Degree" {{ auth()->user()->highest_level_of_education === "Bachelor's Degree" ? 'selected' : '' }}>Bachelor's Degree</option>
                                <option value="Master's Degree" {{ auth()->user()->highest_level_of_education === "Master's Degree" ? 'selected' : '' }}>Master's Degree</option>
                                <option value="Doctorate" {{ auth()->user()->highest_level_of_education === 'Doctorate' ? 'selected' : '' }}>Doctorate</option>
                            </select>
                            <div class="invalid-feedback">Please select your highest level of education!</div>
                        </div>
                        <div class="col-md-6">
                            <label for="institutionName" class="form-label">Institution Name</label>
                            <input type="text" name="institutionName" class="form-control @error('institutionName') is-invalid @enderror" id="institutionName" value="{{ Auth()->user()->institution_name }}" required oninput="validateInstitutionName()" />
                            <div class="invalid-feedback">Please enter the name of your institution!</div>
                        </div>
                        <div class="col-md-6">
                            <label for="fieldOfStudy" class="form-label">Field of Study</label>
                            <input type="text" name="fieldOfStudy" class="form-control @error('fieldOfStudy') is-invalid @enderror" id="fieldOfStudy" value="{{ Auth()->user()->field_of_study }}" required oninput="validateFieldOfStudy()" />
                            <div class="invalid-feedback">Please enter your field of study!</div>
                        </div>

                        <div class="col-md-6">
                            <label for="TstartDate" class="form-label">Start Date</label>
                            <input type="date" name="TstartDate" class="form-control @error('TstartDate') is-invalid @enderror" id="TstartDate" value="{{ Auth()->user()->education_start_date }}" required oninput="validateStartDate()" />
                            <div class="invalid-feedback">Please enter your start date!</div>
                        </div>

                        <div class="col-md-6">
                            <label for="graduationDate" class="form-label">Graduation Date</label>
                            <input type="date" name="graduationDate" class="form-control @error('graduationDate') is-invalid @enderror" id="graduationDate" value="{{ Auth()->user()->graduation_date }}" required oninput="validateGraduationDate()" />
                            <div class="invalid-feedback">Please enter your graduation date!</div>
                        </div>

                        <div class="col-12">
                          <button type="button" class="btn btn-danger">Back</button>
                          <button type="submit" class="btn btn-success">Next</button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="tab-pane fade {{ session('next') == 4 ? 'show active' : '' }}" id="experience-justified" role="tabpanel" aria-labelledby="experience-tab">
                    <div class="card-body">
                      <div class="pt-4 pb-2">
                        <h5 class="card-title text-center pb-0 fs-4">Experience</h5>
                        <p class="text-center small">This is Optional</p>
                      </div>

                      <form class="row g-3 needs-validation" action="{{ route('tutor.update', Auth()->user()->id) }}" method="POST" novalidate onsubmit="return validateForm()">
                            @csrf
                            @method('PUT')
                            
                            <div class="col-md-6">
                                <label for="jobTitle" class="form-label">Job Title</label>
                                <input type="text" name="jobTitle" class="form-control" id="jobTitle" value="{{ Auth()->user()->job_title }}" oninput="toggleJobFields()" />
                            </div>

                            <div class="col-md-6">
                                <label for="companyName" class="form-label">Company Name</label>
                                <input type="text" name="companyName" class="form-control" id="companyName" value="{{ Auth()->user()->company_name }}" {{Auth()->user()->job_title ? '' : 'disabled'}} />
                            </div>

                            <div class="col-md-6">
                                <label for="startDate" class="form-label">Start Date</label>
                                <input type="date" name="startDate" class="form-control" id="startDate" value="{{ Auth()->user()->job_start_date }}" {{Auth()->user()->job_title ? '' : 'disabled'}}/>
                            </div>

                            <div class="col-md-6">
                                <label for="endDate" class="form-label">End Date</label>
                                <input type="date" name="endDate" class="form-control" id="endDate" value="{{ Auth()->user()->job_end_date }}" {{Auth()->user()->job_title ? '' : 'disabled'}}/>
                            </div>

                            <div class="col-12">
                                <label for="jobDescription" class="form-label">Description</label>
                                <textarea name="jobDescription" class="form-control" id="jobDescription" rows="3" {{Auth()->user()->job_title ? '' : 'disabled'}}>{{ Auth()->user()->job_description }}</textarea>
                            </div>

                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required />
                                    <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="terms-condition.html">terms and conditions</a></label>
                                    <div class="invalid-feedback">You must agree before submitting.</div>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="button" class="btn btn-danger">Back</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </section>
</main>

<script>
  function upvalidateNameFields2() {
    const fnameInput = document.getElementById('firstName');
    const lnameInput = document.getElementById('lastName');
    const miInput = document.getElementById('middleInitial');
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
  }

  function upvalidateEmail2() {
    const emailInput = document.getElementById('Temail');
    const emailValue = emailInput.value;

    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if (emailPattern.test(emailValue)) {
        emailInput.classList.remove('is-invalid');
    } else {
        emailInput.classList.add('is-invalid');
    }
  }
  function validateDOB() {
        const dobInput = document.getElementById('Tdob');
        const dobValue = new Date(dobInput.value);
        const today = new Date();
        const age = today.getFullYear() - dobValue.getFullYear();
        const monthDiff = today.getMonth() - dobValue.getMonth();

        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dobValue.getDate())) {
            age--;
        }

        if (age < 5 || dobInput.value === "") {
            dobInput.classList.add('is-invalid');
        } else {
            dobInput.classList.remove('is-invalid');
        }
    }
    function upvalidateAbout() {
        const aboutInput = document.getElementById('about');
        const aboutValue = aboutInput.value;

        if (aboutValue.length < 20 || aboutValue.length > 500) {
            aboutInput.classList.add('is-invalid');
        } else {
            aboutInput.classList.remove('is-invalid');
        }
    }
    function validateSpecialty() {
        const specialtyInput = document.getElementById('specialty');
        const specialtyValue = specialtyInput.value;

        if (specialtyValue.trim() === '') {
            specialtyInput.classList.add('is-invalid');
        } else {
            specialtyInput.classList.remove('is-invalid');
        }
    }
    function validateDescription() {
        const descriptionInput = document.getElementById('specialties_description');
        const descriptionValue = descriptionInput.value;

        if (descriptionValue.trim().length < 10 || descriptionValue.trim().length > 500) {
            descriptionInput.classList.add('is-invalid');
        } else {
            descriptionInput.classList.remove('is-invalid');
        }
    }
    function validateInstitutionName() {
        const institutionInput = document.getElementById('institutionName');
        const institutionValue = institutionInput.value;

        if (institutionValue.trim().length > 0) {
            institutionInput.classList.remove('is-invalid');
        } else {
            institutionInput.classList.add('is-invalid');
        }
    }
    function validateFieldOfStudy() {
        const fieldOfStudyInput = document.getElementById('fieldOfStudy');
        const fieldOfStudyValue = fieldOfStudyInput.value;

        if (fieldOfStudyValue.trim().length > 0) {
            fieldOfStudyInput.classList.remove('is-invalid');
        } else {
            fieldOfStudyInput.classList.add('is-invalid');
        }
    }
    function validateStartDate() {
        const startDateInput = document.getElementById('TstartDate');
        const startDateValue = startDateInput.value;

        if (startDateValue) {
            startDateInput.classList.remove('is-invalid');
        } else {
            startDateInput.classList.add('is-invalid');
        }
    }
    function validateGraduationDate() {
        const graduationDateInput = document.getElementById('graduationDate');
        const graduationDateValue = graduationDateInput.value;

        if (graduationDateValue) {
            graduationDateInput.classList.remove('is-invalid');
        } else {
            graduationDateInput.classList.add('is-invalid');
        }
    }

    function toggleJobFields() {
        const jobTitleInput = document.getElementById('jobTitle');
        const companyNameInput = document.getElementById('companyName');
        const startDateInput = document.getElementById('startDate');
        const endDateInput = document.getElementById('endDate');
        const jobDescriptionInput = document.getElementById('jobDescription');

        const isJobTitleFilled = jobTitleInput.value.trim() !== '';

        companyNameInput.required = isJobTitleFilled;
        startDateInput.required = isJobTitleFilled;
        endDateInput.required = isJobTitleFilled;
        jobDescriptionInput.required = isJobTitleFilled;

        companyNameInput.disabled = !isJobTitleFilled;
        startDateInput.disabled = !isJobTitleFilled;
        endDateInput.disabled = !isJobTitleFilled;
        jobDescriptionInput.disabled = !isJobTitleFilled;

        if (!isJobTitleFilled) {
            companyNameInput.classList.remove('is-invalid');
            startDateInput.classList.remove('is-invalid');
            endDateInput.classList.remove('is-invalid');
            jobDescriptionInput.classList.remove('is-invalid');
        }
    }

    function validateForm() {
        toggleJobFields();
        
        const companyNameInput = document.getElementById('companyName');
        const startDateInput = document.getElementById('startDate');
        const endDateInput = document.getElementById('endDate');
        const jobDescriptionInput = document.getElementById('jobDescription');

        if (companyNameInput.required && !companyNameInput.value.trim()) {
            companyNameInput.classList.add('is-invalid');
            return false;
        }

        if (startDateInput.required && !startDateInput.value) {
            startDateInput.classList.add('is-invalid');
            return false;
        }

        if (endDateInput.required && !endDateInput.value) {
            endDateInput.classList.add('is-invalid');
            return false;
        }

        if (jobDescriptionInput.required && !jobDescriptionInput.value.trim()) {
            jobDescriptionInput.classList.add('is-invalid');
            return false;
        }

        return true;
    }

    function validateForm() {
        const termsCheckbox = document.getElementById('acceptTerms');
        if (!termsCheckbox.checked) {
            termsCheckbox.classList.add('is-invalid');
            return false;
        }
        termsCheckbox.classList.remove('is-invalid');
        return true;
    }

</script>

<script>
    const provincesByRegion = {
      "NCR": ["Metro Manila"],
      "CAR": ["Abra", "Apayao", "Benguet", "Ifugao", "Kalinga", "Mountain Province"],
      "Region I": ["Ilocos Norte", "Ilocos Sur", "La Union", "Pangasinan"],
      "Region II": ["Batanes", "Cagayan", "Isabela", "Nueva Vizcaya", "Quirino"],
      "Region III": ["Aurora", "Bataan", "Bulacan", "Nueva Ecija", "Pampanga", "Tarlac", "Zambales"],
      "Region IV-A": ["Batangas", "Cavite", "Laguna", "Quezon", "Rizal"],
      "Region IV-B": ["Marinduque", "Occidental Mindoro", "Oriental Mindoro", "Palawan", "Romblon"],
      "Region V": ["Albay", "Camarines Norte", "Camarines Sur", "Catanduanes", "Masbate", "Sorsogon"],
      "Region VI": ["Aklan", "Antique", "Capiz", "Iloilo", "Negros Occidental"],
      "Region VII": ["Bohol", "Cebu", "Negros Oriental", "Siquijor"],
      "Region VIII": ["Biliran", "Eastern Samar", "Leyte", "Northern Samar", "Samar", "Southern Leyte"],
      "Region IX": ["Zamboanga del Norte", "Zamboanga del Sur", "Zamboanga Sibugay"],
      "Region X": ["Bukidnon", "Camiguin", "Lanao del Norte", "Misamis Occidental", "Misamis Oriental"],
      "Region XI": ["Davao del Norte", "Davao del Sur", "Davao Occidental", "Davao Oriental"],
      "Region XII": ["Cotabato", "Sultan Kudarat", "South Cotabato", "General Santos"],
      "Region XIII": ["Agusan del Norte", "Agusan del Sur", "Dinagat Islands", "Surigao del Norte", "Surigao del Sur"],
      "BARMM": ["Basilan", "Lanao del Sur", "Maguindanao", "Sulu", "Tawi-Tawi"]
    };


    const municipalitiesByProvince = {
        "Metro Manila": [
            "Quezon City", "Manila", "Caloocan", "Pasig", "Makati", 
            "Taguig", "Mandaluyong", "San Juan", "Pateros", 
            "Valenzuela", "Malabon", "Navotas", "Las Piñas", 
            "Parañaque", "Muntinlupa"
        ],
        "Abra": [
            "Bangued", "Bucloc", "Dolores", "Lagangilang", 
            "Lagayan", "Langiden", "Peñarrubia", "San Isidro", 
            "San Juan", "Tubo"
        ],
        "Apayao": [
            "Conner", "Flora", "Kabugao", "Luna", "Santa Marcela"
        ],
        "Benguet": [
            "La Trinidad", "Itogon", "Tuba", "Bokod", 
            "Mankayan", "Buguias", "Kabayan", "Kapangan", 
            "Sablan", "Atok", "Tublay"
        ],
        "Ifugao": [
            "Lamut", "Hungduan", "Mayoyao", "Kiangan", 
            "Tinoc", "Asipulo", "Natonin"
        ],
        "Kalinga": [
            "Tabuk", "Pasil", "Balbalan", "Rizal", 
            "Lubuagan", "Pinukpuk", "Tanudan"
        ],
        "Mountain Province": [
            "Bontoc", "Sabangan", "Tadian", "Natonin", 
            "Bauko", "Besao", "Sadanga", "Sagada", "Barlig"
        ],
        "Ilocos Norte": [
            "Laoag", "Batac", "Paoay", "Pagudpud", 
            "Dingras", "Sarrat", "Bacarra", "Pasuquin", 
            "Vintar", "Badoc", "Currimao", "Pinili", 
            "San Nicolas"
        ],
        "Ilocos Sur": [
            "Vigan", "Candon", "Santiago", "Sinait", 
            "Bacnotan", "Narvacan", "Santa", "Cabugao", 
            "Tagudin", "Santa Lucia", "Quirino", "San Juan"
        ],
        "La Union": [
            "San Fernando", "Agoo", "Bacnotan", "Bauang", 
            "Caba", "Naguilian", "Rosario", "Tubao", 
            "San Juan"
        ],
        "Pangasinan": [
            "Lingayen", "Dagupan", "San Carlos", "Umingan", 
            "Alaminos", "Binalonan", "Binmaley", "Dasol", 
            "Infanta", "Labrador", "Manaoag", "San Fabian", 
            "San Jacinto", "Sual", "Urduja"
        ],
        "Batanes": [
            "Basco", "Itbayat", "Ivana", "Mahatao", "Sabtang", "Uyugan"
        ],
        "Cagayan": [
            "Tuguegarao City", "Abulug", "Aparri", "Baggao", 
            "Ballesteros", "Buguey", "Calayan", "Camalaniugan", 
            "Claveria", "Enrile", "Gonzaga", "Lasam", 
            "Lal-lo", "Pamplona", "Peñablanca", "Piat", 
            "Rizal", "Sanchez Mira", "Santa Ana", 
            "Santa Praxedes", "Santo Niño", "Tuao", 
            "Yugad"
        ],
        "Isabela": [
            "Ilagan", "Santiago City", "Alicia", "Angadanan", 
            "Aurora", "Benito Soliven", "Cabagan", "Cauayan City", 
            "Chelong", "Dinapigue", "Gamu", "Jones", 
            "Luna", "Mallig", "San Agustin", "San Guillermo", 
            "San Isidro", "San Manuel", "San Mateo", 
            "Santo Tomas", "Tumauini"
        ],
        "Nueva Vizcaya": [
            "Bayombong", "Solano", "Aritao", "Dupax del Norte", 
            "Dupax del Sur", "Quezon", "Santa Fe", 
            "Villaverde"
        ],
        "Quirino": [
            "Cabarroguis", "Aglipay", "Saguday", "Maddela", 
            "Nagtipunan", "Diffun", "Quirino"
        ],
        "Aurora": [
            "Baler", "Casiguran", "Dilasag", "Dinalungan", 
            "Dipaculao", "Maria Aurora", "San Luis", 
            "San Onofre", "Sterling"
        ],
        "Bataan": [
            "Balanga", "Orani", "Mariveles", "Limay", 
            "Hermosa", "Samal", "Abucay", "Dinalupihan", 
            "Morong", "Bagac"
        ],
        "Bulacan": [
            "Malolos", "Meycauayan", "San Jose del Monte", 
            "Baliwag", "Santa Maria", "Hagonoy", "Balagtas", 
            "Pandi", "San Miguel", "San Ildefonso", 
            "Guiguinto", "Bustos", "Norzagaray", "Angat", 
            "Obando"
        ],
        "Nueva Ecija": [
            "Cabanatuan", "Gapan", "San Jose City", 
            "Palayan", "Muñoz", "Guimba", "Bongabon", 
            "Bustos", "Cabiao", "Jaen"
        ],
        "Pampanga": [
            "San Fernando", "Angeles", "Mabalacat", 
            "Apalit", "Bacolor", "Candaba", "Floridablanca", 
            "Guagua", "Mexico", "Porac", "San Luis", 
            "San Simon", "Sasmuan"
        ],
        "Tarlac": [
            "Tarlac City", "Concepcion", "La Paz", 
            "Paniqui", "San Jose", "Victoria", "Capas", 
            "Moncada"
        ],
        "Zambales": [
        "Iba", "Olongapo", "Castillejos", "San Marcelino", 
        "San Antonio", "Subic", "Botolan"
        ],
        "Batangas": [
            "Batangas City", "Lipa", "San Jose", "Tanauan", 
            "Nasugbu", "Balayan", "Lemery", "Taal", 
            "San Juan", "Bauan", "Alitagtag", "Calaca", 
            "Talisay", "Mabini", "San Luis", "Laurel"
        ],
        "Cavite": [
            "Kawit", "Noveleta", "Rosario", "Cavite City", 
            "Tagaytay", "Silang", "Gen. Trias", "Tanza", 
            "Imus", "Dasmariñas", "Alfonso", "Mendez", 
            "Bacoor", "Carmona", "Gen. Mariano Alvarez"
        ],
        "Laguna": [
            "Santa Cruz", "San Pablo", "Calamba", "Biñan", 
            "San Pedro", "Los Baños", "Cabuyao", "Laguna", 
            "Victoria", "Famy", "Pagsanjan", "Lumban", 
            "Nagcarlan", "Luisiana", "Kalayaan"
        ],
        "Quezon": [
            "Lucena", "Tayabas", "Sariaya", "Candelaria", 
            "Mauban", "Infanta", "General Nakar", "Tiaong", 
            "Plaridel", "Quezon", "Gumaca", "Tagkawayan", 
            "Unisan", "Agdangan", "Mulanay", "Pitogo"
        ],
        "Rizal": [
            "Antipolo", "Rodriguez", "Taytay", "Cainta", 
            "Binangonan", "San Mateo", "Angono", "Morong", 
            "Teresa", "Baras"
        ],
        "Marinduque": [
            "Boac", "Mogpog", "Gasan", "Buan", 
            "Santa Cruz", "Torrijos"
        ],
        "Occidental Mindoro": [
            "Mamburao", "Sablayan", "Paluan", "Looc", 
            "Rizal", "Santa Cruz", "Lubang"
        ],
        "Oriental Mindoro": [
            "Calapan", "Baco", "Gloria", "San Teodoro", 
            "Naujan", "Pola", "Victoria", "Socorro", 
            "Bongabong", "Mansalay", "Bulalacao"
        ],
        "Palawan": [
            "Puerto Princesa", "El Nido", "Coron", "San Vicente", 
            "Roxas", "Narra", "Quezon", "Brookes Point", 
            "Bataraza", "Cuyo", "Dumaran", "Araceli"
        ],
        "Romblon": [
            "Romblon", "San Agustin", "Ferrol", "Odiongan", 
            "Tobias Fornier", "Calatrava", "Concepcion", 
            "Santa Maria", "Magdiwang", "Alcantara", "San Andres"
        ],
        "Albay": [
            "Legazpi", "Tabaco", "Ligao", "Sorsogon", 
            "Daraga", "Camalig", "Guinobatan", "Malilipot", 
            "Oas", "Polangui", "Rapu-Rapu", "Santo Domingo", 
            "Bacacay", "Viga"
        ],
        "Camarines Norte": [
            "Daet", "Basud", "Capalonga", "Labo", 
            "Mercedes", "San Lorenzo Ruiz", "Talisay", 
            "Vinzons", "Jose Panganiban", "Paracale"
        ],
        "Camarines Sur": [
            "Naga", "Iriga", "Caramoan", "Bula", 
            "Buhi", "Camaligan", "Canaman", "Garchitorena", 
            "Ginaun", "Milaor", "Pili", "Sagnay", 
            "Sipocot", "Tigaon", "Baao", "Bombon"
        ],
        "Catanduanes": [
            "Virac", "Bato", "Pandan", "San Andres", 
            "Caramoran", "Bagamanoc", "Payo", "Viga"
        ],
        "Masbate": [
            "Masbate City", "Mobo", "Monreal", "San Fernando", 
            "Cawayan", "Dimasalang", "Palanas", "Pio V. Corpuz", 
            "San Pascual", "Uson", "Ticao"
        ],
        "Sorsogon": [
            "Sorsogon City", "Bacon", "Bulusan", "Casiguran", 
            "Donsol", "Gubat", "Irosin", "Matnog", 
            "Pto. Princesa", "Prieto Diaz", "Sorsogon"
        ],
        "Aklan": [
            "Kalibo", "Lezo", "Libacao", "Madalag", 
            "Makato", "Malay", "Malinao", "New Washington", 
            "Numancia", "Tangalan"
        ],
        "Antique": [
            "San Jose de Buenavista", "Sibalom", "Hamtic", "Bandoangan", 
            "Anini-y", "Bugasong", "Patnongon", "San Remigio", 
            "Sebaste", "Valderrama", "Hamtic", "San Pedro"
        ],
        "Capiz": [
            "Roxas City", "Panay", "Pilar", "Ivisan", 
            "Mambusao", "Maayon", "Dumalag", "Dumarao", 
            "Pontevedra", "Tapaz", "Sigma", "Culasi"
        ],
        "Iloilo": [
            "Iloilo City", "Bacolod City", "Passi City", "San Miguel", 
            "San Enrique", "Pototan", "New Lucena", "Janiuay", 
            "Lambunao", "Guimbal", "Tubungan", "Alimodian", 
            "Dingle", "Zarraga", "Leganes", "Pavia"
        ],
        "Negros Occidental": [
            "Bacolod", "La Carlota", "Silay", "San Carlos", 
            "Victorias", "Talisay", "Bago", "Himamaylan", 
            "Hinoba-an", "Kabankalan", "La Castellana", "Moises Padilla", 
            "Sagay", "San Enrique"
        ],
        "Bohol": [
            "Tagbilaran City", "Dumaguete", "Carmen", "Sikatuna",
            "Loon", "Baclayon", "Panglao", "Maribojoc",
            "Corella", "Balilihan", "Calape", "Clarin",
            "Inabanga", "Loay", "Loboc", "Pilar",
            "San Isidro", "Sierra Bullones", "Tubigon"
        ],
        "Cebu": [
            "Cebu City", "Mandaue City", "Lapu-Lapu City", "Toledo",
            "Talisay", "Carcar", "Danao", "Bogo",
            "Samboan", "Sogod", "Naga", "Minglanilla",
            "Cordova", "Bantayan", "Malabuyoc", "Bogo City"
        ],
        "Negros Oriental": [
            "Dumaguete City", "Bayawan City", "Tanjay City", "Bacong",
            "Amlan", "Siaton", "Zamboanguita", "San Jose",
            "Sikatuna", "Jimalalud", "La Libertad", "Canlaon"
        ],
        "Siquijor": [
            "Siquijor", "Larena", "Maria", "San Juan",
            "Lazi", "Enrique Villanueva", "Salagdoong"
        ],
        "Biliran": [
            "Biliran", "Cabucgayan", "Caibiran", "Culaba",
            "Kawayan", "Maripipi", "Naval"
        ],
        "Eastern Samar": [
            "Borongan", "Guiuan", "Hernani", "Maydolong",
            "Balay ni Mayang", "Salcedo", "San Julian", "General MacArthur",
            "Mercedes", "Quinapondan", "Balay ni Mayang"
        ],
        "Leyte": [
            "Tacloban City", "Baybay City", "Ormoc City", "Hilongos",
            "Matalom", "Pawing", "Bato", "Merida",
            "Albuera", "CanAvid", "Mahaplag", "Tanauan"
        ],
        "Northern Samar": [
            "Catarman", "Bobon", "San Antonio", "San Isidro",
            "Laoang", "Lapinig", "Gamay", "Santo Niño",
            "Silvino Lobos", "San Vicente"
        ],
        "Samar": [
            "Catbalogan", "Calbayog", "Basey", "San Jorge",
            "San Jose de Buan", "Marabut", "Motiong", "Pinabacdao",
            "Santa Margarita", "Talalora", "Tagapul-an", "Gandara"
        ],
        "Southern Leyte": [
            "Maasin City", "Sogod", "Bontoc", "San Juan",
            "Hinunangan", "Libagon", "San Francisco", "Limasawa"
        ],
        "Zamboanga del Norte": [
            "Dipolog", "Dapitan", "Jose Dalman", "Sergio Osmeña Sr.", 
            "Kalawit", "Godod", "Rizal", "Siayan", 
            "Sindangan", "Labason", "Manukan", "Polanco", 
            "Salug", "Tampilisan"
        ],
        "Zamboanga del Sur": [
            "Pagadian", "Aurora", "Bayog", "Dimataling", 
            "Dinas", "Gutab", "Lakewood", "Labangan", 
            "Mahayag", "Midsalip", "Sominot", "Vinland", 
            "Ramon Magsaysay"
        ],
        "Zamboanga Sibugay": [
            "Ipil", "Naga", "Mabay", "Malangas", 
            "Payao", "Rosario", "Siay", "Talusan", 
            "Tinago", "Zamboanga City"
        ],
        "Bukidnon": [
            "Malaybalay", "Valencia", "Manolo Fortich", 
            "Cabanglasan", "Impasug-ong", "Sumilao", 
            "Lantapan", "Baungon", "Talakag"
        ],
        "Camiguin": [
            "Mambajao", "Mahinog", "Guinsiliban", 
            "Sagay", "Catarman"
        ],
        "Lanao del Norte": [
            "Tubod", "Bacolod", "Kapatagan", "Maigo", 
            "Linamon", "Sultan Naga Dimaporo", "Iligan"
        ],
        "Misamis Occidental": [
            "Oroquieta", "Ozamis", "El Salvador", "Tangub", 
            "Don Victoriano Chiongbian", "Concepcion", 
            "Jimenez", "Plaridel", "Sinacaban", "Tudela"
        ],
        "Misamis Oriental": [
            "Cagayan de Oro", "Gingoog", "Jasaan", 
            "Kinoguitan", "Villanueva", "Tagoloan", 
            "Libertad", "Opol", "Initao"
        ],
        "Davao del Norte": [
            "Tagum", "Asuncion", "Braulio E. Dujali", 
            "Carmen", "New Corella", "San Isidro", "Panabo"
        ],
        "Davao del Sur": [
            "Digos", "Matanao", "Bansalan", "Hagonoy", 
            "Kiblawan", "Magsaysay", "Sta. Cruz", "Don Marcelino", 
            "Sulop"
        ],
        "Davao Occidental": [
            "Malita", "Don Marcelino", "Jose Abad Santos", 
            "Santiago", "Santa Maria"
        ],
        "Davao Oriental": [
            "Mati", "Baganga", "Banaybanay", "Caraga", 
            "Governor Generoso", "San Isidro", "Sitio Magsaysay"
        ],
        "Cotabato": [
            "Kidapawan", "Midsayap", "Makilala", 
            "Pikit", "Libungan", "Alamada", "Antipas", 
            "Arakan", "Magpet"
        ],
        "Sultan Kudarat": [
            "Isulan", "Lambayong", "Lutayan", 
            "Palimbang", "Sarangani", "Senator Ninoy Aquino", 
            "Tacurong"
        ],
        "South Cotabato": [
            "Koronadal", "General Santos", "Polomolok", 
            "Tupi", "Tantangan", "Lake Sebu", "Banga"
        ],
        "General Santos": [
            "General Santos"
        ],
        "Agusan del Norte": [
            "Butuan", "Nasipit", "Cabadbaran", "Las Nieves", 
            "Remedios T. Romualdez", "Santiago"
        ],
        "Agusan del Sur": [
            "Bunawan", "Esperanza", "La Paz", 
            "San Francisco", "Trento", "Veruela"
        ],
        "Dinagat Islands": [
            "San Jose", "Basilisa", "Cagdianao", 
            "Dinagat", "Libjo", "Tubajon"
        ],
        "Surigao del Norte": [
            "Surigao City", "Bislig", "Cagdianao", "Gigaquit", 
            "Claver", "Madrid", "Mainit", "Sison", 
            "San Francisco", "Tubod", "Placer", "Bacnotan", 
            "Malimono", "Tagana-an"
        ],
        "Surigao del Sur": [
            "Tandag City", "Bislig City", "Carmen", "Cagwait", 
            "Madrid", "San Miguel", "Tagbina", "Tagnipa", 
            "Lianga", "Barobo", "San Agustin", "Lanuza", 
            "Veruela", "San Luis"
        ],
        "Basilan": [
            "Isabela City", "Lamitan City", "Maluso", "Sumisip", 
            "Tipo-Tipo", "Al-Barka", "Hadji Muhtamad", 
            "Mohammad AJ Maruhom", "Ungkaya Pukan"
        ],
        "Lanao del Sur": [
            "Marawi City", "Balaoan", "Bayan", "Bongao", 
            "Buadiposo-Buntong", "Ganassi", "Kapai", 
            "Kapatagan", "Lumbatan", "Maguing", 
            "Malabang", "Marantao", "Mulondo", 
            "Piagapo", "Pualas", "Saguiaran", 
            "Sultan Dumalondong", "Taraka", "Tubaran"
        ],
        "Maguindanao": [
            "Cotabato City", "Datu Odin Sinsuat", "Datu Saudi-Ampatuan", 
            "Datu Unsay", "Guindulungan", "Mamasapano", 
            "Matanog", "North Upi", "Paglat", 
            "Shariff Aguak", "Sultan Kudarat", "Talayan"
        ],
        "Sulu": [
            "Jolo", "Banguingui", "Indanan", "Parang", 
            "Patikul", "Talipao", "Maimbung", "Sulu", 
            "Old Panamao", "New Panamao", "Panglima Estino"
        ],
        "Tawi-Tawi": [
            "Bongao", "Languyan", "Mapun", "Panglima Sugala", 
            "Simunul", "Sapa-Sapa", "Tandubas", "Sitangkai"
        ]

    };


    function updateProvinces() {
        const regionSelect = document.getElementById('region');
        const provinceSelect = document.getElementById('province');
        const selectedRegion = regionSelect.value;

        provinceSelect.innerHTML = '<option value="">Select Province</option>';
        document.getElementById('municipality').innerHTML = '<option value="">Select Municipality</option>';

        if (provincesByRegion[selectedRegion]) {
            provincesByRegion[selectedRegion].forEach(province => {
                const option = document.createElement('option');
                option.value = province;
                option.textContent = province;
                provinceSelect.appendChild(option);
            });
        }

        const userProvince = "{{ Auth::user()->province }}";
        if (userProvince && provinceSelect.querySelector(`option[value="${userProvince}"]`)) {
            provinceSelect.value = userProvince;
            updateMunicipalities();
        }
    }



    function updateMunicipalities() {
        const provinceSelect = document.getElementById('province');
        const municipalitySelect = document.getElementById('municipality');
        const selectedProvince = provinceSelect.value;

        municipalitySelect.innerHTML = '<option value="">Select Municipality</option>';

        if (municipalitiesByProvince[selectedProvince]) {
            municipalitiesByProvince[selectedProvince].forEach(municipality => {
                const option = document.createElement('option');
                option.value = municipality;
                option.textContent = municipality;
                municipalitySelect.appendChild(option);
            });
        }

        const userMunicipality = "{{ Auth::user()->municipality }}";
        if (userMunicipality && municipalitySelect.querySelector(`option[value="${userMunicipality}"]`)) {
            municipalitySelect.value = userMunicipality;
        }
    }


    window.onload = function() {
        updateProvinces();
        updateMunicipalities();
    };

</script>

@include('includes.profilepicture')
@endsection
