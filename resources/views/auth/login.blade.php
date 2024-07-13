<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('asset2/masjid.png') }}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('asset2/css/bootstrap.min.css') }}">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="{{ asset('asset2/css/typography.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('asset2/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('asset2/css/responsive.css') }}">
    
    <style>
        .form-control {
            font-size: 1.0rem;
            padding: 5px 10px;
            height: 50px;
            width: 500px;
        }
        .btn-primary {
            font-size: 1.2rem;
            padding: 10px 20px;
        }

        @media (max-width: 768px) {
            .form-control {
                max-width: 100%;
            }
        }
    </style>
</head>

<body>
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->

    <!-- Sign in Start -->
    <div style="text-align: center; margin-top:40px">
        By: Politeknik Negeri Padang Kampus Pelalawan
    </div>
    <section class="sign-in-page">
        <div class="container p-0" id="sign-in-page-box">
            <div class="bg-white form-container sign-in-container">
                <div class="sign-in-page-data">
                    <div class="sign-in-from w-100 m-auto">
                        <h1 class="mb-3 text-center">Sign in</h1>
                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        <form method="POST" action="{{ route('login-proses') }}" class="mt-4">
                            @csrf
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control mb-0" id="username" name="username"
                                       placeholder="Enter username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control mb-0" id="password" name="password"
                                       placeholder="Password">
                            </div>
                           
                            <div class="sign-info">
                                <button type="submit" class="btn btn-primary mb-2">Sign in</button>
                                <span class="text-dark dark-color d-block line-height-2">
                                    Don't have an account? <a href="#">Sign up</a>
                                </span>
                            </div>

                            
                        </form>
                    </div>
                </div>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-right">
                        <a class="sign-in-logo mb-5" href="#"><img src="{{ asset('asset2/masjid.png') }}" class="img-fluid" alt="logo" style="max-width: 100%;height: auto; width: 300px;"></a>
                        <h2 style="color: white">Sistem Informasi Kas Masjid Al-Jihad Pangkalan Kerinci</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Sign in END -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('asset2/js/jquery.min.js') }}"></script>
    <script src="{{ asset('asset2/js/popper.min.js') }}"></script>
    <script src="{{ asset('asset2/js/bootstrap.min.js') }}"></script>
    <!-- Appear JavaScript -->
    <script src="{{ asset('asset2/js/jquery.appear.js') }}"></script>
    <!-- Countdown JavaScript -->
    <script src="{{ asset('asset2/js/countdown.min.js') }}"></script>
    <!-- Counterup JavaScript -->
    <script src="{{ asset('asset2/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('asset2/js/jquery.counterup.min.js') }}"></script>
    <!-- Wow JavaScript -->
    <script src="{{ asset('asset2/js/wow.min.js') }}"></script>
    <!-- Apexcharts JavaScript -->
    <script src="{{ asset('asset2/js/apexcharts.js') }}"></script>
    <!-- lottie JavaScript -->
    <script src="{{ asset('asset2/js/lottie.js') }}"></script>
    <!-- Slick JavaScript -->
    <script src="{{ asset('asset2/js/slick.min.js') }}"></script>
    <!-- Select2 JavaScript -->
    <script src="{{ asset('asset2/js/select2.min.js') }}"></script>
    <!-- Owl Carousel JavaScript -->
    <script src="{{ asset('asset2/js/owl.carousel.min.js') }}"></script>
    <!-- Magnific Popup JavaScript -->
    <script src="{{ asset('asset2/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Smooth Scrollbar JavaScript -->
    <script src="{{ asset('asset2/js/smooth-scrollbar.js') }}"></script>
    <!-- Style Customizer -->
    <script src="{{ asset('asset2/js/style-customizer.js') }}"></script>
    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('asset2/js/chart-custom.js') }}"></script>
    <!-- Custom JavaScript -->
    <script src="{{ asset('asset2/js/custom.js') }}"></script>
</body>

</html>
