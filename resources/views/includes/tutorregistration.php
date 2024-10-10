<div class="modal fade" id="tutorregistration">
    <div class="modal-dialog">
        <div class="modal-content s-modal">
            <div class="modal-body d-flex flex-column align-items-center">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-center py-4">
                            <a class="logo d-flex align-items-center w-auto">
                            <span class="d-none d-lg-block">Tutor Sign Up</span>
                            </a>
                        </div>
                        <!-- Default Tabs -->
                        <ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">
                            <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link w-100 active" id="personal-info-tab" data-bs-toggle="tab" data-bs-target="#personal-info-justified" type="button" role="tab" aria-controls="personal-info" aria-selected="true">Personal Information</button>
                            </li>
                            <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link w-100" id="specialties-tab" data-bs-toggle="tab" data-bs-target="#specialties-justified" type="button" role="tab" aria-controls="specialties" aria-selected="false" tabindex="-1">Specialties</button>
                            </li>
                            <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link w-100" id="education-tab" data-bs-toggle="tab" data-bs-target="#education-justified" type="button" role="tab" aria-controls="education" aria-selected="false" tabindex="-1">Education</button>
                            </li>
                            <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link w-100" id="experience-tab" data-bs-toggle="tab" data-bs-target="#experience-justified" type="button" role="tab" aria-controls="experience" aria-selected="false" tabindex="-1">Experience</button>
                            </li>
                        </ul>

                        <div class="tab-content pt-2" id="myTabjustifiedContent">

                            <!-- Personal Information Tab -->
                            <div class="tab-pane fade show active" id="personal-info-justified" role="tabpanel" aria-labelledby="personal-info-tab">
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Enter your Personal Information</h5>
                                    </div>
                                    <form class="row g-3 needs-validation" novalidate>
                                    <div class="col-md-4">
                                        <label for="firstName" class="form-label">First Name</label>
                                        <input type="text" name="firstName" class="form-control" id="firstName" required />
                                        <div class="invalid-feedback">Please enter your first name!</div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="lastName" class="form-label">Last Name</label>
                                        <input type="text" name="lastName" class="form-control" id="lastName" required />
                                        <div class="invalid-feedback">Please enter your last name!</div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="middleInitial" class="form-label">M.I</label>
                                        <input type="text" name="middleInitial" class="form-control" id="middleInitial" />
                                    </div>
                                    <div class="col-md-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" required />
                                        <div class="invalid-feedback">Please enter a valid email address!</div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="password" required />
                                        <div class="invalid-feedback">Please enter your password!</div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                                        <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" required />
                                        <div class="invalid-feedback">Please confirm your password!</div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="dob" class="form-label">Date of Birth</label>
                                        <input type="date" name="dob" class="form-control" id="dob" required />
                                        <div class="invalid-feedback">Please enter your date of birth!</div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="region" class="form-label">Region</label>
                                        <select name="region" class="form-control" id="region" required>
                                        <option value="">Select Region</option>
                                        <!-- Add region options here -->
                                        </select>
                                        <div class="invalid-feedback">Please select your region!</div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="province" class="form-label">Province</label>
                                        <select name="province" class="form-control" id="province" required>
                                        <option value="">Select Province</option>
                                        </select>
                                        <div class="invalid-feedback">Please select your province!</div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="municipality" class="form-label">Municipality</label>
                                        <select name="municipality" class="form-control" id="municipality" required>
                                        <option value="">Select Municipality</option>
                                        </select>
                                        <div class="invalid-feedback">Please select your municipality!</div>
                                    </div>
                                    <div class="col-12">
                                        <label for="about" class="form-label">About</label>
                                        <textarea name="about" class="form-control" id="about" rows="3" required></textarea>
                                        <div class="invalid-feedback">Please tell us about yourself!</div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required />
                                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="terms-condition.html">terms and conditions</a></label>
                                        <div class="invalid-feedback">You must agree before submitting.</div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="button" class="btn btn-success">Next</button>
                                    </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Specialties Tab -->
                            <div class="tab-pane fade" id="specialties-justified" role="tabpanel" aria-labelledby="specialties-tab">
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Specialties</h5>
                                    </div>
                                    <form class="row g-3 needs-validation" novalidate>
                                    <div class="col-md-8">
                                        <label for="specialty" class="form-label">Specialties</label>
                                        <input type="text" name="specialty" class="form-control" id="specialty" required />
                                        <div class="invalid-feedback">Please enter your specialties!</div>
                                    </div>
                                    <div class="col-12">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea name="description" class="form-control" id="description" rows="3" required></textarea>
                                        <div class="invalid-feedback">Please describe your specialties!</div>
                                    </div>
                                    <div class="col-12">
                                        <button type="button" class="btn btn-danger">Back</button>
                                        <button type="button" class="btn btn-success">Next</button>
                                    </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Education Tab -->
                            <div class="tab-pane fade" id="education-justified" role="tabpanel" aria-labelledby="education-tab">
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Education</h5>
                                    </div>
                                    <form class="row g-3 needs-validation" novalidate>
                                    <div class="col-md-6">
                                        <label for="highestEducation" class="form-label">Highest Level of Education</label>
                                        <select name="highestEducation" class="form-control" id="highestEducation" required>
                                        <option value="">Select Level</option>
                                        <option value="High School">High School</option>
                                        <option value="Associate Degree">Associate Degree</option>
                                        <option value="Bachelor's Degree">Bachelor's Degree</option>
                                        <option value="Master's Degree">Master's Degree</option>
                                        <option value="Doctorate">Doctorate</option>
                                        </select>
                                        <div class="invalid-feedback">Please select your highest level of education!</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="school" class="form-label">School</label>
                                        <input type="text" name="school" class="form-control" id="school" required />
                                        <div class="invalid-feedback">Please enter your school name!</div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="button" class="btn btn-danger">Back</button>
                                        <button type="button" class="btn btn-success">Next</button>
                                    </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Experience Tab -->
                            <div class="tab-pane fade" id="experience-justified" role="tabpanel" aria-labelledby="experience-tab">
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Experience</h5>
                                    </div>
                                    <form class="row g-3 needs-validation" novalidate>
                                    <div class="col-md-6">
                                        <label for="yearsExperience" class="form-label">Years of Experience</label>
                                        <input type="number" name="yearsExperience" class="form-control" id="yearsExperience" required />
                                        <div class="invalid-feedback">Please enter your years of experience!</div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
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
        </div>
    </div>
</div>