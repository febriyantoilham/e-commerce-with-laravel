<div class="container-fluid ">
  <div class="card card-carousel overflow-hidden h-100 p-0">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner rounded-5">
        <div class="carousel-item active">
          <img src="{{ asset('assets/img/slider-1.jpg') }}" class="d-block vh-100 vw-100 fit-cover" alt="...">
        </div>
        <div class="carousel-item">
          <img src="{{ asset('assets/img/slider-2.jpg') }}" class="d-block vh-100 vw-100 fit-cover" alt="...">
        </div>
        <div class="carousel-item">
          <img src="{{ asset('assets/img/slider-3.jpg') }}" class="d-block vh-100 vw-100 fit-cover" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</div>
