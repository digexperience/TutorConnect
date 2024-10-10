@extends('layouts.master')

@section('content')
<main id="homepage" class="homepage">
    <div class="container py-5">
      <!-- First Card -->
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-3">
                    <img src="assets/img/card.jpg" class="img-fluid rounded-start" alt="...">
                </div>
            <div class="col-md-9">
                <div class="card-body">
                    <h5 class="card-title">Tutor's Name</h5>
                    <div class="ratings">
                        <span>&#9733; &#9733; &#9733; &#9733; &#9734;</span>
                    </div>
                    <p class="card-text">
                        Specialties: Math, Science, English
                    </p>
                    <p class="card-text">
                        Bio: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed malesuada faucibus ex nec ultricies. Donec mattis egestas nisi non pretium.
                    </p>
                    <a href="#" class="btn btn-primary">View Profile</a>
                </div>
            </div>
        </div>
    </div>
  
      <!-- Second Card (Example) -->
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-3">
                <img src="assets/img/slides-3.jpg" class="img-fluid rounded-start" alt="...">
            </div>    
            <div class="col-md-9">
                <div class="card-body">
                <h5 class="card-title">Another Tutor's Name</h5>
                <div class="ratings">
                    <span>&#9733; &#9733; &#9733; &#9734; &#9734;</span>
                </div>
                <p class="card-text">
                    Specialties: History, Geography, Literature
                </p>
                <p class="card-text">
                    Bio: Fusce non diam sed nibh dignissim sagittis. Nullam ornare, sem id tristique bibendum, ipsum ipsum sodales augue, eu faucibus est velit nec risus.
                </p>
                <a href="#" class="btn btn-primary">View Profile</a>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-3">
            <img src="assets/img/slides-3.jpg" class="img-fluid rounded-start" alt="...">
            </div>    
            <div class="col-md-9">
                <div class="card-body">
                    <h5 class="card-title">Another Tutor's Name</h5>
                    <div class="ratings">
                    <span>&#9733; &#9733; &#9733; &#9734; &#9734;</span>
                    </div>
                    <p class="card-text">
                    Specialties: History, Geography, Literature
                    </p>
                    <p class="card-text">
                    Bio: Fusce non diam sed nibh dignissim sagittis. Nullam ornare, sem id tristique bibendum, ipsum ipsum sodales augue, eu faucibus est velit nec risus.
                    </p>
                    <a href="#" class="btn btn-primary">View Profile</a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection