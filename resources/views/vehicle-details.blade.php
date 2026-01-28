@extends('layouts.app')

@section('title', 'About Us - Sinolink')

@section('content')

<div class="vehicle-details-page">
    <nav class="breadcrumb-container">
        <a href="/">Home</a>
        <i class="fa-solid fa-chevron-right"></i>
        <a href="/catalogue" class="bold">Catalogue</a>
        <i class="fa-solid fa-chevron-right"></i>
        <span class="active-item">Toyota Highlander 2009 2.7L 2WD 5 Seater Elite Edition</span>
    </nav>

    <div class="details-grid">
        <div class="main-content">
            <div class="hero-image-wrapper">
                <img src="https://placehold.co/760x578" alt="Vehicle Image">
            </div>

            <div class="info-section">
                <div class="content-block">
                    <div class="section-label">Description</div>
                    <p class="description-text">
                        5-seater luxury SUV equipped with airbags, tire pressure monitoring, ISOFIX, ABS and EBD anchors. Euro IV emission standard.
                    </p>
                </div>

                <div class="content-block">
                    <div class="section-label">Overview</div>
                    <div class="overview-items">
                        <div class="ov-item">
                            <label>Year</label>
                            <span>2015</span>
                        </div>
                        <div class="ov-item">
                            <label>Color</label>
                            <span>BLACK</span>
                        </div>
                        <div class="ov-item">
                            <label>Mileage</label>
                            <span>200,000 km</span>
                        </div>
                        <div class="ov-item">
                            <label>Fuel</label>
                            <span>Essence</span>
                        </div>
                        <div class="ov-item">
                            <label>Transmission</label>
                            <span>Automatic</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <aside class="sidebar">
            <div class="sidebar-card price-card">
                <div class="year-badge">2017</div>
                <h2 class="vehicle-title">Toyota Highlander 2009 2.7L 2WD 5 Seater Elite Edition</h2>
                <div class="price-container">
                    <label>Car Price</label>
                    <div class="price-value">$2,915</div>
                </div>
            </div>

            <div class="sidebar-card action-card">
                <h3 class="card-title">Speak with an Agent</h3>
                <a href="#" class="btn-whatsapp">
                    <i class="fa-brands fa-whatsapp"></i> Order on Whatsapp
                </a>
                <a href="#" class="btn-outline-yellow">Return to Catalogue</a>
            
                <div class="contact-info">
                    <h3 class="card-title mt-4">Quick Contact</h3>
                    <div class="contact-row">
                        <div class="icon-circle"><i class="fa-solid fa-phone"></i></div>
                        <div class="text-group">
                            <p>(+254) 713 688 640</p>
                            <p>(+86) 130 7305 9539</p>
                            <a href="mailto:info@sinolink.africa">info@sinolink.africa</a>
                        </div>
                    </div>
                    <div class="contact-row">
                        <div class="icon-circle"><i class="fa-solid fa-clock"></i></div>
                        <div class="text-group">
                            <p>Mon - Fri: 8:00 to 17:00</p>
                            <p>(Saturday & Sunday Closed)</p>
                        </div>
                    </div>
                </div>   
            </div>
        </aside>
    </div>
</div>

@endsection