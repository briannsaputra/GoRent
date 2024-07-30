<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoRent - Rental Mobil</title>

    <link rel="icon" href="{{ asset('/home/images/icon.png') }}">
    <link rel="stylesheet" href="{{ asset('home/css/style.css') }}">
    <link rel="preconnect" href="{{ asset('https://fonts.googleapis.com') }}">
    <link rel="preconnect" href="{{ asset('https://fonts.gstatic.com') }}" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Open+Sans&display=swap"
        rel="stylesheet">
</head>

<body>

    <header class="header" data-header>
        <div class="container">

            <div class="overlay" data-overlay></div>

            <a href="#" class="logo">
                <img src="{{ asset('/home/images/logogorent.png') }}" alt="Ridex logo" style="width: 150px">
            </a>

            <nav class="navbar" data-navbar>
                <ul class="navbar-list">

                    <li>
                        <a href="/" class="navbar-link" data-nav-link>Home</a>
                    </li>

                    <li>
                        <a href="#featured-car" class="navbar-link" data-nav-link>Explore cars</a>
                    </li>

                    <li>
                        <a href="#home" class="navbar-link" data-nav-link>About us</a>
                    </li>

                    <li>
                        <a href="#kategori" class="navbar-link" data-nav-link>Category</a>
                    </li>

                </ul>
            </nav>

            <div class="header-actions">

                <div class="header-contact">
                    <a href="tel:88002345678" class="contact-link">0821 5082 3194</a>

                    <span class="contact-time">Senin - Sabtu: 9:00 am - 6:00 pm</span>
                </div>

                <a href="/register" class="btn" aria-labelledby="aria-label-txt">
                    <ion-icon name="person-add"></ion-icon>

                    <span id="aria-label-txt">Register</span>
                </a>

                <a href="/login" class="btn user-btn" aria-label="Profile">
                    <ion-icon name="person-outline"></ion-icon>
                </a>

                <button class="nav-toggle-btn" data-nav-toggle-btn aria-label="Toggle Menu">
                    <span class="one"></span>
                    <span class="two"></span>
                    <span class="three"></span>
                </button>

            </div>

        </div>
    </header>

    <main>
        <article>
            <section class="section hero" id="home">
                <div class="container">
                    <div class="hero-content">
                        <h2 class="h1 hero-title">Rental mobil berkualitas dengan harga terjangkau</h2>
                        <p class="hero-text">
                            Layanan profesional untuk perjalanan bisnis dan liburan.<br> 
                            Dan proses penyewaan mudah. Hubungi kami sekarang!
                        </p>
                    </div>

                    <div class="hero-banner"></div>

                    <form action="" method="GET" class="hero-form">
                        <div class="input-wrapper">
                            <label for="input-1" class="input-label">Cari Model Kendaraan</label>
                            <input type="text" name="model" id="input-1" class="input-field"
                                placeholder="Search">
                        </div>
                        <button type="submit" class="btn">Search</button>
                    </form>

                </div>
            </section>
            <section class="section featured-car" id="featured-car">
                <div class="container">
                    <div class="title-wrapper">
                        <h2 class="h2 section-title">Mobil unggulan</h2>

                        <a href="/" class="featured-car-link">
                            <span>View more</span>

                            <ion-icon name="arrow-forward-outline"></ion-icon>
                        </a>
                    </div>
                    
                        
                    
                    <ul class="featured-car-list">
                        @foreach ($cars  as $item)
                        <li>
                            <div class="featured-car-card">
                                <figure class="card-banner">
                                    <img class="card-img-top" src="{{ $item->foto != null ?  asset('storage/foto/'.$item->foto) :
                                asset('img/foto-tidak-ada.png')}}" alt="Card image cap" />
                                </figure>
                                <div class="card-content">
                                    <div class="card-title-wrapper">
                                        <h3 class="h3 card-title">
                                            {{ $item->model }}
                                        </h3>
                                        <data class="year" value="2021">{{ $item->tahun }}</data>
                                    </div>
                                    <ul class="card-list">
                                        <li class="card-list-item">
                                            <ion-icon name="people-outline"></ion-icon>
                                            <span class="card-item-text">{{ $item->jok }}</span>
                                        </li>
                                        <li class="card-list-item">
                                            <ion-icon name="flash-outline"></ion-icon>
                                            <span class="card-item-text">{{ $item->bbm }}</span>
                                        </li>
                                        <li class="card-list-item">
                                            <ion-icon name="speedometer-outline"></ion-icon>
                                            <span class="card-item-text">{{ $item->odometer }}</span>
                                        </li>
                                        <li class="card-list-item">
                                            <ion-icon name="hardware-chip-outline"></ion-icon>
                                            <span class="card-item-text">{{ $item->transmisi }}</span>
                                        </li>
                                    </ul>
                                    <div class="card-price-wrapper">
                                        <p class="card-price">
                                            <strong>Rp.{{ $item->harga }}</strong> Rb / Hari
                                        </p>
                                        <button class="btn fav-btn" aria-label="Add to favourite list">
                                            <ion-icon name="heart-outline"></ion-icon>
                                        </button>
                                        <button class="btn {{$item->status == 'in stock' ? 'text-success' : 'btn-danger'}}">{{ $item->status}}</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </section>
            <section class="section get-start">
                <div class="container">

                    <h2 class="h2 section-title">4 langkah sederhana</h2>

                    <ul class="get-start-list">

                        <li>
                            <div class="get-start-card">

                                <div class="card-icon icon-1">
                                    <ion-icon name="person-add-outline"></ion-icon>
                                </div>

                                <h3 class="card-title">Profile</h3>

                                <p class="card-text">
                                    Gorent Mobil menawarkan kendaraan berkualitas dengan harga terjangkau. Layanan profesional untuk perjalanan bisnis dan liburan. Reservasi mudah, kepuasan Anda prioritas kami.
                                </p>

                                <a href="https://www.whatsapp.com/" class="card-link" target="balnk">Whatsapp</a>

                            </div>
                        </li>

                        <li>
                            <div class="get-start-card">

                                <div class="card-icon icon-2">
                                    <ion-icon name="car-outline"></ion-icon>
                                </div>

                                <h3 class="card-title">Beritahu kami mobil apa yang Anda inginkan</h3>

                                <p class="card-text">
                                    dan kami akan menyediakan kendaraan terbaik untuk Anda! Dengan pilihan kendaraan yang beragam dan layanan profesional, kami siap memenuhi kebutuhan transportasi Anda.
                                </p>

                            </div>
                        </li>

                        <li>
                            <div class="get-start-card">

                                <div class="card-icon icon-3">
                                    <ion-icon name="person-outline"></ion-icon>
                                </div>

                                <h3 class="card-title">Cocokkan Pilihan Anda</h3>

                                <p class="card-text">
                                    dan kami akan mencocokkannya dengan penjual terbaik! Dengan pilihan kendaraan yang beragam dan layanan profesional, kami siap memenuhi kebutuhan transportasi Anda.
                                </p>

                            </div>
                        </li>

                        <li>
                            <div class="get-start-card">

                                <div class="card-icon icon-4">
                                    <ion-icon name="card-outline"></ion-icon>
                                </div>

                                <h3 class="card-title">Membuat kesepakatan</h3>

                                <p class="card-text">
                                    dan kami akan mencocokkannya dengan penjual terbaik! Kami siap membantu Anda membuat kesepakatan terbaik dengan layanan profesional dan pilihan kendaraan yang beragam.
                                </p>

                            </div>
                        </li>

                    </ul>

                </div>
            </section>

            <section class="section blog" id="kategori">
                <div class="container">

                    <h2 class="h2 section-title">Category</h2>

                    <ul class="blog-list has-scrollbar">

                        <li>
                            <div class="blog-card">

                                <figure class="card-banner">

                                    <a href="#">
                                        <img src="{{ asset('/home/images/Logo-mitsubishi.png')}}"
                                            alt="Opening of new offices of the company" loading="lazy"
                                            class="w-100">
                                    </a>
                                </figure>
                                <div class="card-content">
                                    <h3 class="h3 card-title">
                                        <h1 href="">MITSUBISHI</h1>
                                    </h3>
                                </div>

                            </div>
                        </li>
                        <li>
                            <div class="blog-card">

                                <figure class="card-banner">

                                    <a href="#">
                                        <img src="{{ asset('/home/images/Logo-toyota.png')}}"
                                            alt="Opening of new offices of the company" loading="lazy"
                                            class="w-100">
                                    </a>
                                </figure>
                                <div class="card-content">
                                    <h3 class="h3 card-title">
                                        <h1 href="">TOYOTA</h1>
                                    </h3>
                                </div>

                            </div>
                        </li>
                        <li>
                            <div class="blog-card">

                                <figure class="card-banner">

                                    <a href="#">
                                        <img src="{{ asset('/home/images/Logo-honda1.png')}}"
                                            alt="Opening of new offices of the company" loading="lazy"
                                            class="w-100">
                                    </a>
                                </figure>
                                <div class="card-content">
                                    <h3 class="h3 card-title">
                                        <h1 href="">HONDA</h1>
                                    </h3>
                                </div>

                            </div>
                        </li>
                        <li>
                            <div class="blog-card">
                                <figure class="card-banner">
                                    <a href="#">
                                        <img src="{{ asset('/home/images/Logo-bmw.png')}}"
                                            alt="Opening of new offices of the company" loading="lazy"
                                            class="w-100">
                                    </a>
                                </figure>
                                <div class="card-content">
                                    <h3 class="h3 card-title">
                                        <h1 href="">BMW</h1>
                                    </h3>
                                </div>

                            </div>
                        </li>
                        <li>
                            <div class="blog-card">

                                <figure class="card-banner">

                                    <a href="#">
                                        <img src="{{ asset('/home/images/Logo-Suzuki.png')}}"
                                            alt="Opening of new offices of the company" loading="lazy"
                                            class="w-100">
                                    </a>
                                </figure>
                                <div class="card-content">
                                    <h3 class="h3 card-title">
                                        <h1 href="">SUZUKI</h1>
                                    </h3>
                                </div>

                            </div>
                        </li>
                    </ul>

                </div>
            </section>

        </article>
    </main>





    <!--
    - #FOOTER
  -->

    <footer class="footer">
        <div class="container">

            <div class="footer-top">

                <div class="footer-brand">
                    <a href="#" class="logo">
                        <img src="{{ asset('/home/images/logogorent.png') }}" alt="Ridex logo" style="width: 220px">
                    </a>

                    <p class="footer-text">
                        Cari mobil sewaan murah di Banjarmasin. Dengan armada beragam sebanyak 19.000 kendaraan, GoRent menawarkan pilihan yang menarik dan menyenangkan kepada konsumennya.
                    </p>
                </div>

                <ul class="footer-list">

                    <li>
                        <p class="footer-list-title">Company</p>
                    </li>

                    <li>
                        <a href="#" class="footer-link">About us</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Pricing plans</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Our blog</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Contacts</a>
                    </li>

                </ul>

                <ul class="footer-list">

                    <li>
                        <p class="footer-list-title">Support</p>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Help center</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Ask a question</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Privacy policy</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Terms & conditions</a>
                    </li>

                </ul>

                <ul class="footer-list">

                    <li>
                        <p class="footer-list-title">Neighborhoods in Indonesia</p>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Jakarta</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Bali</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Kalimantan Selatan</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Kalimantan Tengah</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Yogyakarta</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Nusantara</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Bandung</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Surabaya</a>
                    </li>

                </ul>

            </div>

            <div class="footer-bottom">

                <ul class="social-list">

                    <li>
                        <a href="#" class="social-link">
                            <ion-icon name="logo-facebook"></ion-icon>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="social-link">
                            <ion-icon name="logo-instagram"></ion-icon>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="social-link">
                            <ion-icon name="logo-twitter"></ion-icon>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="social-link">
                            <ion-icon name="logo-linkedin"></ion-icon>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="social-link">
                            <ion-icon name="logo-skype"></ion-icon>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="social-link">
                            <ion-icon name="mail-outline"></ion-icon>
                        </a>
                    </li>

                </ul>

                <p class="copyright">
                    &copy; 2024 <a href="#">Brian Saputra</a>. All Rights Reserved
                </p>

            </div>

        </div>
    </footer>





    <!--
    - custom js link
  -->
    <script src="{{ asset('home/js/script.js') }}"></script>

    <!--
    - ionicon link
  -->
    <script type="module" src="{{ asset('https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js') }}"></script>
    <script nomodule src="{{ asset('https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js') }}"></script>

</body>

</html>
