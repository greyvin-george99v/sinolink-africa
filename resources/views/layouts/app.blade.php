<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sinolink - Vehicle ATV & Sourcing @yield('title')</title>
    
    <!-- Fonts -->
     <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lity/2.4.1/lity.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    @stack('styles')
</head>
<body>

   <!-- Top Bar -->
  <!-- TOP HEADER -->
  <header class="main-header">
    <div class="header__inner">
        
        <div class="header__left">
            <div class="header__logo">
                <a href="{{ url('/') }}">
                <img src="{{ asset('images/Sinolink-Logo-White.png') }}" alt="Sinolink Logo">
                </a>
            </div>

            <div class="header__info">
                <div class="info-item">
                    <div class="info-icon"><i class="fa-solid fa-envelope"></i></div>
                    <div class="info-text">
                        <span class="info-label">SUPPORT INQUIRIES</span>
                        <span class="info-value">info@sinolink.africa</span>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon"><i class="fa-solid fa-phone"></i></div>
                    <div class="info-text">
                       <span class="info-label">CALL US</span>
                        <div class="mobile-numbers">
                            <a href="tel:+254713688640" class="info-value">+254 713 688 640</a>
                            <a href="tel:+8613073059539" class="info-value">+86 130 7305 9539</a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header__socials">
            <a href="https://web.facebook.com/profile.php?id=61584158585251"><i class="fa-brands fa-facebook"></i></a>
            <a href="https://www.tiktok.com/@sinolink3"><i class="fa-brands fa-tiktok"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
        </div>

    </div>
</header>

<nav class="main-nav">
    <div class="nav__inner">
        <div class="mobile-logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/sinolink-dark-logo.png') }}" alt="Sinolink Logo">
            </a>
        </div>

        <div class="close-menu" id="close-menu">
            <i class="fa-solid fa-xmark"></i>
        </div>

        <ul class="nav-links" id="nav-list">
            <li><a href="{{ url('/') }}">HOME</a></li>
            <li><a href="{{ url('/about') }}" class="{{ Request::is('about') ? 'active' : '' }}">ABOUT US</a></li>
            <li><a href="{{ url('/catalogue') }}" class="{{ Request::is('catalogue') ? 'active' : '' }}">CATALOGUE</a></li>
            <li><a href="{{ url('/services') }}" class="{{ Request::is('services') ? 'active' : '' }}">SERVICES</a></li>
            <li><a href="{{ url('/media') }}" class="{{ Request::is('media') ? 'active' : '' }}">MEDIA</a></li>
            <li><a href="{{ url('/coverage') }}" class="{{ Request::is('coverage') ? 'active' : '' }}">COVERAGE</a></li>
            <li><a href="{{ url('/contact') }}" class="{{ Request::is('contact') ? 'active' : '' }}">CONTACTS</a></li>
            <li><a href="{{ url('/details') }}" class="{{ Request::is('details') ? 'active' : '' }}">DETAILS</a></li>
            
            <li class="mobile-quote-container">
                <a href="{{ url('/contact') }}" class="btn-quote-mobile">REQUEST A QUOTE</a>
            </li>
        </ul>

        <a href="{{ url('/contact') }}" class="btn-quote">REQUEST A QUOTE</a>

        <div class="menu-toggle" id="mobile-menu">
            <i class="fa-solid fa-bars"></i>
        </div>
    </div>
</nav>
<div id="menu-overlay" class="menu-overlay"></div>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
    <div class="footer__inner">
        
        <div class="footer-col branding">
            <a href="{{ url('/') }}">
            <img class="footer-logo" src="images/Sinolink-Logo-White.png" alt="Sinolink Logo">
</a>
            <p class="footer-desc">Your trusted partner for Pan-African vehicle and ATV sourcing from China.</p>
        <div class="footer-contact-info">
        <div class="contact-item">
            <i class="fa-solid fa-clock footer-icon"></i>
            <span>
                Mon - Fri: 8:00 to 17:00<br>
                <small class="closed-text">(Saturday & Sunday Closed)</small>
            </span>
        </div>
    </div>
        </div>

        <div class="footer-col">
            <h3 class="footer-title">Quick Links</h3>
            <ul class="footer-links">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/about') }}" class="{{ Request::is('about') ? 'active' : '' }}">About Us</a></li>
                <li><a href="{{ url('/services') }}" class="{{ Request::is('services') ? 'active' : '' }}">Services</a></li>
                <li><a href="{{ url('/media') }}" class="{{ Request::is('media') ? 'active' : '' }}">Media</a></li>
                <li><a href="{{ url('/coverage') }}" class="{{ Request::is('coverage') ? 'active' : '' }}">Coverage</a></li>
                <li><a href="{{ url('/contact') }}" class="{{ Request::is('contact') ? 'active' : '' }}">Contacts</a></li>
            </ul>
        </div>

        <div class="footer-col">
            <h3 class="footer-title">Countries Served</h3>
            <ul class="footer-countries">
                <li><i class="fa-solid fa-location-dot footer-icon"></i> Kenya</li>
                <li><i class="fa-solid fa-location-dot footer-icon"></i> DRC</li>
                <li><i class="fa-solid fa-location-dot footer-icon"></i> Tanzania</li>
                <li><i class="fa-solid fa-location-dot footer-icon"></i> Angola</li>
                <li><i class="fa-solid fa-location-dot footer-icon"></i> Zambia</li>
            </ul>
        </div>

        <div class="footer-col">
            <h3 class="footer-title">Contact</h3>
            <div class="footer-contact-info">
                <div class="contact-item">
                    <i class="fa-solid fa-phone footer-icon"></i>
                    <span>+254 713 688640<br>+86 130 7305 9539</span>
                </div>
                <div class="contact-item">
                    <i class="fa-solid fa-envelope footer-icon"></i>
                    <span>info@sinolink.africa</span>
                </div>
                <div class="contact-item">
                    <i class="fa-solid fa-map-pin footer-icon"></i>
                    <span>NO 10 Maizhuan Road, Lishui Town, Foshan China</span>
                </div>
            </div>

            <div class="footer-socials">
                <h4 class="socials-title">FOLLOW US</h4>
                <div class="social-icons">
                    <a href="https://web.facebook.com/profile.php?id=61584158585251"><i class="fa-brands fa-facebook-f"></i></a> 
                    <a href="https://www.tiktok.com/@sinolink3"><i class="fa-brands fa-tiktok"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                </div>
            </div>
        </div>

    </div>

    <div class="footer-bottom">
        <p>© 2026 SINOLINK. All rights reserved. &nbsp; <a href="{{ route('privacy') }}">Privacy Policy</a> &nbsp; <a href="{{ route('terms') }}">Terms of Service</a>
    </div>
</footer>

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lity/2.4.1/lity.min.js"></script>

<div id="cookie-banner" class="cookie-container">
    <div class="cookie-content">
        <p>This website uses cookies to ensure you get the best experience on our website. 
           By continuing, you agree to our <a href="{{ route('privacy') }}">Privacy Policy</a>.</p>
        <button id="accept-cookies" class="btn-accept">Accept & Close</button>
    </div>
</div>

<a href="https://wa.me/254713688640" class="whatsapp-float" target="_blank">
        <span>Chat with us</span>
        <i class="fa-brands fa-whatsapp"></i>
    </a>

        @stack('scripts')
    
</body>
</html>