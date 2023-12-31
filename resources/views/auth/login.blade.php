<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />

        <title>Login - Persagi Karawang</title>
        <meta content="" name="description" />
        <meta content="" name="keywords" />

        <!-- Favicons -->
        <link href="assets/img/favicon.png" rel="icon" />
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect" />
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
            rel="stylesheet"
        />

        <!-- Vendor CSS Files -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link
            href="{{  asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}"
            rel="stylesheet"
        />
        <link
            href="{{  asset('assets/vendor/boxicons/css/boxicons.min.css')}}"
            rel="stylesheet"
        />
        <link href="{{  asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet" />
        <link href="{{  asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet" />
        <link href="{{  asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet" />
        <link
            href="{{  asset('assets/vendor/simple-datatables/style.css')}}"
            rel="stylesheet"
        />

        <!-- Template Main CSS File -->
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    </head>

    <body>
        {{-- main  --}}
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
              <div class="container">
                <div class="row justify-content-center">
                  <div class="col-sm-12 col-md-6 d-flex flex-column align-items-center justify-content-center">
      
                    <div class="d-flex justify-content-center py-4">
                      <a href="index.html" class="logo d-flex align-items-center w-auto">
                        <img src="assets/img/logo.png" alt="">
                        <span class="d-none d-lg-block">Persagi Karawang</span>
                      </a>
                    </div><!-- End Logo -->
                    {{-- error login  --}}
                    @if (Session::has('login'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ Session::get('login') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
      
                    <div class="card mb-3">
      
                      <div class="card-body">
      
                        <div class="pt-4 pb-2">
                          <h5 class="card-title text-center pb-0 fs-4">Login  untuk Masuk Kedalam Akun</h5>
                          <p class="text-center small">Masukan Email dan Password</p>
                        </div>
      
                        <form action="{{ route('login.store') }}" method="POST" class="row g-3 needs-validation" novalidate>
                            @csrf
                          <div class="col-12">
                            <label for="yourUsername" class="form-label">Email</label>
                            <div class="input-group has-validation">
                              <span class="input-group-text" id="inputGroupPrepend">@</span>
                              <input type="email" name="email" class="form-control" id="yourUsername" required>
                              <div class="invalid-feedback">Please enter your Email.</div>
                            </div>
                          </div>
      
                          <div class="col-12">
                            <label for="yourPassword" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="yourPassword" required>
                            <div class="invalid-feedback">Please enter your password!</div>
                          </div>
                          <div class="col-12 pt-2">
                            <button class="btn btn-primary w-100" type="submit">Login</button>
                          </div>
                          <div class="col-12">
                            <p class="small mb-0">Belum punya akun Anggota ? <a href="{{ route('register.index') }}">Buat Akun</a></p>
                          </div>
                        </form>
      
                      </div>
                    </div>
                  </div>
                </div>
              </div>
      
            </section>
      
          </div>
        {{-- end main  --}}

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <!-- Vendor JS Files -->
        <script src="{{  asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
        <script src="{{  asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{  asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
        <script src="{{  asset('assets/vendor/echarts/echarts.min.js')}}"></script>
        <script src="{{  asset('assets/vendor/quill/quill.min.js')}}"></script>
        <script src="{{  asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
        <script src="{{  asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
        <script src="{{  asset('assets/vendor/php-email-form/validate.js')}}"></script>

        <!-- Template Main JS File -->
        <script src="{{ asset('assets/js/app.js') }}"></script>
    </body>
</html>
