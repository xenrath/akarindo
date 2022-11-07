<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>E-Tiketing</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="keywords" />
  <meta content="" name="description" />

  <!-- Favicon -->
  <link href="{{ asset('insure/img/favicon.ico') }}" rel="icon" />

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Poppins:wght@600;700&display=swap"
    rel="stylesheet" />

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

  <!-- Libraries Stylesheet -->
  <link href="{{ asset('insure/lib/animate/animate.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('insure/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />

  <!-- Customized Bootstrap Stylesheet -->
  <link href="{{ asset('insure/css/bootstrap.min.css') }}" rel="stylesheet" />

  <!-- Template Stylesheet -->
  <link href="{{ asset('insure/css/style.css') }}" rel="stylesheet" />
</head>

<body>

  <!-- Spinner Start -->
  <div id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" role="status"></div>
  </div>
  <!-- Spinner End -->

  <!-- Topbar Start -->
  <div class="container-fluid bg-dark text-white-50 py-2 px-0 d-none d-lg-block">
    <div class="row gx-0 align-items-center">
      <div class="col-lg-9 px-5 text-start">
        <div class="h-100 d-inline-flex align-items-center me-4">
          <small class="fa fa-phone-alt me-2"></small>
          <small>(024) 76435498</small>
        </div>
        <div class="h-100 d-inline-flex align-items-center me-4">
          <small class="far fa-envelope-open me-2"></small>
          <small>ehrsistem@gmail.com</small>
        </div>
        <div class="h-100 d-inline-flex align-items-center me-4">
          <small class="far fa-clock me-2"></small>
          <small>Senin - Jumat : 08.00 - 16.00 | Sabtu : 08.00 - 13.00</small>
        </div>
      </div>
      <div class="col-lg-3 px-5 text-end">
        <div class="h-100 d-inline-flex align-items-center">
          <a class="text-white-50 ms-4" href=""><i class="fab fa-facebook-f"></i></a>
          <a class="text-white-50 ms-4" href=""><i class="fab fa-twitter"></i></a>
          <a class="text-white-50 ms-4" href=""><i class="fab fa-linkedin-in"></i></a>
          <a class="text-white-50 ms-4" href=""><i class="fab fa-instagram"></i></a>
        </div>
      </div>
    </div>
  </div>
  <!-- Topbar End -->

  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5">
    <a href="index.html" class="navbar-brand d-flex align-items-center">
      <h4 class="m-0">
        <img class="img-fluid" src="{{ asset('image/logo/cv-anugrahkaryaindonesia.png') }}" alt="" />
        CV Anugrah Karya Indonesia
      </h4>
    </a>
    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <div class="navbar-nav mx-auto bg-light rounded pe-4 py-3 py-lg-0">
        <a href="#home" class="nav-item nav-link active">Home</a>
        <a href="#about" class="nav-item nav-link">About Us</a>
        <a href="#service" class="nav-item nav-link">Our Services</a>
        <a href="#contact" class="nav-item nav-link">Contact Us</a>
      </div>
    </div>

    @if (auth()->check())
    <a href="{{ url('login') }}" class="btn btn-outline-primary px-3 d-none d-lg-block">{{ auth()->user()->name }}</a>
    @else
    <a href="{{ url('login') }}" class="btn btn-primary px-3 d-none d-lg-block">Login</a>
    @endif

  </nav>
  <!-- Navbar End -->

  <!-- Carousel Start -->
  <section id="home">
    <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-5">
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
            <h2 class="display-3 text-dark mb-4 animated slideInDown">
              Solusi Kebutuhan Teknologi Bisnis
            </h2>
            <div class="mb-5">
              <p class="fs-5 text-body">
                Perusahaan Software & Digital Agency. Akarindo.id hadir membantu merancang dan menerapkan
                teknologi
                digital tepat guna, efektif dan efisien.
              </p>
            </div>
            <a href="" class="btn btn-primary py-3 px-5">
              Konsultasikan Sekarang
            </a>
          </div>
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
            <img src="{{ asset('insure/img/complaint.png') }}" alt="Complaint" class="w-100">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Carousel End -->

  <!-- About Start -->
  <section id="about" style="padding-top: 80px">
    <div class="container-xxl py-5">
      <div class="container">
        <div class="text-center h-100 px-4 ps-lg-0">
          <h1 class="display-6 mb-3">
            Big Dream
          </h1>
          <p class="mb-5 fs-5">
            CV Anugrah Karya Indonesia berdiri sejak tahun 2021 merupakan transformasi Kudus Web dan Anoamedia yang
            sudah
            ada dari tahun 2007. Perjalanan yang panjang membuat kami terus untuk bermimpi besar mendampingi perusahaan
            anda dalam memberikan efektifitas pekerjaan dan efisiensi biaya dengan teknologi.
          </p>
        </div>
        <div class="row g-5">
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="position-relative overflow-hidden rounded ps-5 pt-5 h-100" style="min-height: 400px">
              <img class="position-absolute w-100 h-100" src="{{ asset('image/front/about.jpg') }}" alt=""
                style="object-fit: cover" />
              <div class="position-absolute top-0 start-0 bg-white rounded pe-3 pb-3"
                style="width: 200px; height: 200px">
                <div class="d-flex flex-column justify-content-center text-center bg-primary rounded h-100 p-3">
                  <h1 class="text-white mb-0">15</h1>
                  <h2 class="text-white">Tahun</h2>
                  <h5 class="text-white mb-0">Pengalaman</h5>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="h-100">
              <div class="d-flex align-items-center mb-3">
                <img class="flex-shrink-0 me-3" src="{{ asset('insure/img/icon/icon-04-primary.png') }}" alt=""
                  width="50px" />
                <h5 class="mb-0">
                  Visi
                </h5>
              </div>
              <p class="mb-4">
                Menjadi Perusahaan Professional dengan solusi dan layanan yang optimal serta memiliki daya saing.
                Memberikan Layanan dan Solusi yang terintegerasi mengikuti perkembangan dunia Teknologi Informasi dan
                menyiapkan SDM di era Industry 4.0 dan Society 5.0.
              </p>
              <div class="d-flex align-items-center mb-3">
                <img class="flex-shrink-0 me-3" src="{{ asset('insure/img/icon/icon-03-primary.png') }}" alt=""
                  width="50px" />
                <h5 class="mb-0">Misi</h5>
              </div>
              <p class="mb-4">
                Memberikan solusi digital dan efisiensi untuk pengembangan perusahaan dengan Mengedepankan
                professionalisme, kemampuan individu dan tim dalam merancang dan mengembangkan inovasi sistem.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- About End -->

  <!-- Our Services Start -->
  <section id="service" style="padding-top: 80px">
    <div class=" container-xxl py-5">
      <div class="container">
        <div class="text-center mx-auto" style="max-width: 500px">
          <h1 class="display-6 mb-5">
            Our Services
          </h1>
        </div>
        <div class="row g-4 justify-content-center">
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="service-item rounded h-100 p-5">
              <div class="d-flex align-items-center ms-n5 mb-4">
                <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                  <img class="img-fluid" src="{{ asset('image/front/web-development.png') }}" alt="" />
                </div>
                <h4 class="mb-0">Web Development</h4>
              </div>
              <p class="mb-4">
                Aliqu diam amet eos erat ipsum et lorem et sit, sed stet lorem
                sit clita duo justo erat amet
              </p>
              <a class="btn btn-light px-3" href="">
                Info Detail
                <i class="fas fa-chevron-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="service-item rounded h-100 p-5">
              <div class="d-flex align-items-center ms-n5 mb-4">
                <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                  <img class="img-fluid" src="{{ asset('image/front/android-development.png') }}" alt="" />
                </div>
                <h4 class="mb-0">Android Development</h4>
              </div>
              <p class="mb-4">
                Aliqu diam amet eos erat ipsum et lorem et sit, sed stet lorem
                sit clita duo justo erat amet
              </p>
              <a class="btn btn-light px-3" href="">
                Info Detail
                <i class="fas fa-chevron-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="service-item rounded h-100 p-5">
              <div class="d-flex align-items-center ms-n5 mb-4">
                <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                  <img class="img-fluid" src="{{ asset('image/front/software-development.png') }}" alt="" />
                </div>
                <h4 class="mb-0">Software Development</h4>
              </div>
              <p class="mb-4">
                Aliqu diam amet eos erat ipsum et lorem et sit, sed stet lorem
                sit clita duo justo erat amet
              </p>
              <a class="btn btn-light px-3" href="">
                Info Detail
                <i class="fas fa-chevron-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="service-item rounded h-100 p-5">
              <div class="d-flex align-items-center ms-n5 mb-4">
                <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                  <img class="img-fluid" src="{{ asset('image/front/digital-marketing.png') }}" alt="" />
                </div>
                <h4 class="mb-0">Digital Marketing</h4>
              </div>
              <p class="mb-4">
                Aliqu diam amet eos erat ipsum et lorem et sit, sed stet lorem
                sit clita duo justo erat amet
              </p>
              <a class="btn btn-light px-3" href="">
                Info Detail
                <i class="fas fa-chevron-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="service-item rounded h-100 p-5">
              <div class="d-flex align-items-center ms-n5 mb-4">
                <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                  <img class="img-fluid" src="{{ asset('image/front/courses.png') }}" alt="" />
                </div>
                <h4 class="mb-0">Courses</h4>
              </div>
              <p class="mb-4">
                Aliqu diam amet eos erat ipsum et lorem et sit, sed stet lorem
                sit clita duo justo erat amet
              </p>
              <a class="btn btn-light px-3" href="">
                Info Detail
                <i class="fas fa-chevron-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="service-item rounded h-100 p-5">
              <div class="d-flex align-items-center ms-n5 mb-4">
                <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                  <img class="img-fluid" src="{{ asset('image/front/curriculum-vitae.png') }}" alt="" />
                </div>
                <h4 class="mb-0">Digital Curriculum Vitae (CV)</h4>
              </div>
              <p class="mb-4">
                Aliqu diam amet eos erat ipsum et lorem et sit, sed stet lorem
                sit clita duo justo erat amet
              </p>
              <a class="btn btn-light px-3" href="">
                Info Detail
                <i class="fas fa-chevron-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="service-item rounded h-100 p-5">
              <div class="d-flex align-items-center ms-n5 mb-4">
                <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                  <img class="img-fluid" src="{{ asset('image/front/company.png') }}" alt="" />
                </div>
                <h4 class="mb-0">Pendirian PT (Perusahaan)</h4>
              </div>
              <p class="mb-4">
                Aliqu diam amet eos erat ipsum et lorem et sit, sed stet lorem
                sit clita duo justo erat amet
              </p>
              <a class="btn btn-light px-3" href="">
                Info Detail
                <i class="fas fa-chevron-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="service-item rounded h-100 p-5">
              <div class="d-flex align-items-center ms-n5 mb-4">
                <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                  <img class="img-fluid" src="{{ asset('image/front/design-graph.png') }}" alt="" />
                </div>
                <h4 class="mb-0">Desain Grafis</h4>
              </div>
              <p class="mb-4">
                Aliqu diam amet eos erat ipsum et lorem et sit, sed stet lorem
                sit clita duo justo erat amet
              </p>
              <a class="btn btn-light px-3" href="">
                Info Detail
                <i class="fas fa-chevron-right"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Our Services End -->

  <!-- Footer Start -->
  <section id="contact">
    <div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
      <div class="container py-5">
        <div class="row g-5">
          <div class="col-lg-4 col-md-6">
            <h2 class="text-white mb-4">
              Akarindo.id
            </h2>
            <p>
              Follow social media kami untuk melihat update terbaru dari produk kami.
            </p>
            <div class="d-flex pt-2">
              <a class="btn btn-square me-1" href=""><i class="fab fa-twitter"></i></a>
              <a class="btn btn-square me-1" href=""><i class="fab fa-facebook-f"></i></a>
              <a class="btn btn-square me-1" href=""><i class="fab fa-youtube"></i></a>
              <a class="btn btn-square me-0" href=""><i class="fab fa-linkedin-in"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <h5 class="text-light mb-4">Alamat</h5>
            <p>
              <i class="fa fa-map-marker-alt me-3"></i>Jl. Jenderal Sudirman No. 354, Gisikdrono, Kec. Semarang Barat,
              Kota Semarang, Jawa Tengah 50149
            </p>
            <p><i class="fa fa-phone-alt me-3"></i>(024) 76435498</p>
            <p><i class="fa fa-envelope me-3"></i>ehrsistem@gmail.com</p>
          </div>
          <div class="col-lg-4 col-md-6">
            <h5 class="text-light mb-4">Lihat Selengkapnya</h5>
            <a class="btn btn-link" href="">About Us</a>
            <a class="btn btn-link" href="">Our Services</a>
            <a class="btn btn-link" href="">Products</a>
            <a class="btn btn-link" href="">Contact Us</a>
          </div>
          <!-- <div class="col-lg-3 col-md-6">
            <h5 class="text-light mb-4">Newsletter</h5>
            <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
            <div class="position-relative mx-auto" style="max-width: 400px">
              <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email" />
              <button type="button" class="btn btn-secondary py-2 position-absolute top-0 end-0 mt-2 me-2">
                SignUp
              </button>
            </div>
          </div> -->
        </div>
      </div>
      <div class="container-fluid copyright">
        <div class="container">
          <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
              &copy; <a href="#">Akarindo.id</a>, Hak Cipta Dilindungi Undang-Undang.
            </div>
            <div class="col-md-6 text-center text-md-end">
              <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
              Designed By: <a href="https://htmlcodex.com">Mahasiswa KP PHB</a>
              <br />Distributed By:
              <a href="https://themewagon.com" target="_blank">AkarindoID</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Footer End -->

  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('insure/lib/wow/wow.min.js') }}"></script>
  <script src="{{ asset('insure/lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('insure/lib/waypoints/waypoints.min.js') }}"></script>
  <script src="{{ asset('insure/lib/owlcarousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('insure/lib/counterup/counterup.min.js') }}"></script>

  <!-- Template Javascript -->
  <script src="{{ asset('insure/js/main.js') }}"></script>
  <script>
    $(document).ready(function(){ 
      $('.nav-item').on("click", function(){
        $('.nav-item').removeClass('active');
        $(this).addClass('active');
      });
    });
  </script>
</body>
</html>