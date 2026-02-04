
@extends('layouts.app')

@section('title', 'Dashboard')
@section('content')

    <div class="page-wrapper">

  

    <!-- HERO / LANDING SECTION -->
    <section class="hero-slider">
    <div class="slide active">
        <div class="slide-bg" style="background-image: linear-gradient(224deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0.8) 100%), url('{{ asset('images/landing-page.jpg') }}');"></div>
        
        <div class="hero__inner">
            <div class="trusted-badge">
                <span>{{ __('CERTIFIED SOURCING') }}</span>
            </div>

            <div class="hero-text">
                <h1>{!! __('Reliable Vehicle Sourcing <br> From China to Africa') !!}</h1>
                <p>{{ __('We simplify the entire process of getting ATVs, motorbikes, and utility vehicles delivered to your doorstep.') }}</p>
            </div>

             <div class="hero-actions">
                <a href="{{ url('/contact') }}" class="hero-btn-red">{{ __('Learn More') }}</a>
                <a href="https://www.youtube.com/embed/W7vL49sO68I?autoplay=1" class="watch-video" data-lity>
                    <div class="play-btn-wrapper">
                        <div class="play-circle"><i class="fa-solid fa-play"></i></div>
                        <div class="ripple"></div><div class="ripple"></div><div class="ripple"></div>
                    </div>
                    <span> {{ __('Watch Video') }}</span>
                </a>
            </div>
        </div>
    </div>

    <div class="slide">
        <div class="slide-bg" style="background-image: linear-gradient(224deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0.8) 100%), url('{{ asset('images/mdel.jpg') }}');"></div>
        <div class="hero__inner">
            <div class="trusted-badge">
                <span>{{ __('REGIONAL EXPERTISE') }}</span>
            </div>

            <div class="hero-text">
                <h1>{!! __('Pan-African Logistics <br> & Smart Delivery') !!}</h1>
                <p>{{ __('Operating through regional offices and trusted partners to deliver vehicles efficiently across multiple African cities.') }}</p>
            </div>
          <div class="hero-actions">
                <a href="{{ url('/services') }}" class="hero-btn-red">{{ __('OUR SERVICES') }}</a>
                <a href="https://www.youtube.com/embed/9X5eL_pW8lA?autoplay=1" class="watch-video" data-lity>
                    <div class="play-btn-wrapper">
                        <div class="play-circle"><i class="fa-solid fa-play"></i></div>
                        <div class="ripple"></div><div class="ripple"></div><div class="ripple"></div>
                    </div>
                    <span>{{ __('Watch Video') }}</span>
                </a>
            </div>
        </div>
    </div>

    <div class="slide">
        <div class="slide-bg" style="background-image: linear-gradient(224deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0.8) 100%), url('{{ asset('images/truck-1.jpg') }}');"></div>
        <div class="hero__inner">
            <div class="trusted-badge">
                <span>{{ __('FACTORY INSPECTED') }}</span>
            </div>

            <div class="hero-text">
                <h1>{!! __('Quality Assurance <br> At Every Step') !!}</h1>
                <p>{{ __('From factory inspection to customs clearance, we ensure your vehicles arrive safely with full documentation.') }}</p>
            </div>

            <div class="hero-actions">
                <a href="{{ url('/catalogue') }}" class="hero-btn-red">{{ __('View Catalogue') }}</a>
                <a href="https://www.youtube.com/embed/r6p60mXqfEw?autoplay=1" class="watch-video" data-lity>
                    <div class="play-btn-wrapper">
                        <div class="play-circle"><i class="fa-solid fa-play"></i></div>
                        <div class="ripple"></div><div class="ripple"></div><div class="ripple"></div>
                    </div>
                    <span>{{ __('Watch Video') }}</span>
                </a>
            </div>
        </div>
    </div>

    <button class="slider-arrow prev" id="prevSlide"><i class="fa-solid fa-chevron-left"></i></button>
    <button class="slider-arrow next" id="nextSlide"><i class="fa-solid fa-chevron-right"></i></button>
    <div class="slider-dots" id="sliderDots"></div>
</section>

    <!-- ABOUT US -->
<section class="about reveal">
    <div class="about__inner">
  
      <!-- Text Content -->
      <div class="about-content">
  
        <div class="about-heading">
          <span class="about-tag">{{ __('About Us') }}</span>
  
          <h2>
            {!! __('Your Trusted partner<br> for Pan-African Vehicle<br> Sourcing') !!}
          </h2>
        </div>
  
        <p class="about-text">
          {!! __('Sinolink is a turnkey vehicle sourcing and shipping company specializing in ATVs and vehicles sourced directly from China. We handle everything from procurement to final delivery at your doorstep.<br><br>With offices across Kenya, DRC, Congo, Tanzania, and Zambia, we ensure seamless logistics and customs clearance for businesses and individual buyers alike.') !!}
        </p>
  
        <a href="{{ url('/about') }}" class="about-btn">{{ __('Read More') }}</a>
        
      </div>
  
      <!-- Image -->
      <img src="{{ asset('images/about-us.jpg') }}" alt="About Us" class="about-image">
  
    </div>
  </section>

  <section class="services">
    <div class="services__inner">
        
        <div class="services-header">
            <div class="services-tag-box">
                <span class="services-tag">{{ __('Our Services') }}</span>
            </div>
            <h2>{{ __('What We Offer') }}</h2>
            <p class="services-subtitle">{{ __('Comprehensive end-to-end solutions for your vehicle sourcing needs') }}</p>
        </div>

        <div class="services-grid">
            
            <div class="service-card reveal">
                <div class="service-card__icon-box">
                    <i class="fa-solid fa-car-side service-icon"></i>
                </div>
                <h3 class="service-card__title">{{ __('ATV & Vehicle Sourcing') }}</h3>
                <p class="service-card__text">{{ __('Direct procurement from verified Chinese manufacturers with competitive pricing and quality assurance.') }}</p>
            </div>

            <div class="service-card reveal">
                <div class="service-card__icon-box">
                    <i class="fa-solid fa-clipboard-check service-icon"></i>
                </div>
                <h3 class="service-card__title">{{ __('Quality Inspection') }}</h3>
                <p class="service-card__text">{{ __('Rigorous pre-shipment inspections to ensure every vehicle meets your specifications and standards.') }}</p>
            </div>

            <div class="service-card reveal">
                <div class="service-card__icon-box">
                    <i class="fa-solid fa-ship service-icon"></i>
                </div>
                <h3 class="service-card__title">{{ __('Shipping & Logistics') }}</h3>
                <p class="service-card__text">{{ __('Seamless sea and air freight solutions with real-time tracking from China to African ports.') }}</p>
            </div>

            <div class="service-card reveal">
                <div class="service-card__icon-box">
                    <i class="fa-solid fa-truck-ramp-box service-icon"></i>
                </div>
                <h3 class="service-card__title">{{ __('Bulk & Fleet Orders') }}</h3>
                <p class="service-card__text">{{ __('Custom sourcing solutions for businesses, government agencies, NGOs, and resellers requiring bulk orders.') }}</p>
            </div>

            <div class="service-card reveal">
                <div class="service-card__icon-box">
                    <i class="fa-solid fa-passport service-icon"></i>
                </div>
                <h3 class="service-card__title">{{ __('Customs Clearance') }}</h3>
                <p class="service-card__text">{{ __('Handling customs documentation, duties, and regulatory compliance at destination ports.') }}</p>
            </div>

            <div class="service-card reveal">
                <div class="service-card__icon-box">
                    <i class="fa-solid fa-comments-dollar service-icon"></i>
                </div>
                <h3 class="service-card__title">{{ __('Pricing Consultation') }}</h3>
                <p class="service-card__text">{{ __('Expert advice on market trends and total landed costs to ensure you get the best value for your investment.') }}</p>
            </div>

        </div>

        <div class="services-footer">
            <a href="{{ url('/services') }}" class="btn-services">{{ __('View Services') }}</a>

    </div>
</section>

<section class="advantage">
    <div class="advantage__inner">
        
        <div class="advantage-image-container reveal">
            <img src="images/why-us.jpg" alt="The Sinolink Advantage" class="advantage-image">
        </div>

        <div class="advantage-content reveal">
            <div class="advantage-header">
                <div class="advantage-tag-box">
                    <span class="advantage-tag">{{ __('Why Choose Us') }}</span>
                </div>
               <h2 class="advantage-title">{!! __('The Sinolink <span class="text-red">Advantage</span>') !!}</h2>
            </div>

            <p class="advantage-description">
                {{ __('We\'ve built our reputation on reliability, transparency, and delivering results. When you partner with Sinolink, you get more than a service provider, you get a dedicated team committed to your success.') }}
                <br><br>
                {{ __('By combining local expertise with strong supplier relationships in China, we ensure every transaction is handled with precision and care.') }}
            </p>

            <div class="advantage-features">
                <div class="feature-column">
                    <div class="feature-item">
                        <div class="feature-icon-box">
                            <i class="fa-solid fa-ship advantage-icon"></i>
                        </div>
                        <span class="feature-label">{{ __('Direct sourcing from China') }}</span>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon-box">
                            <i class="fa-solid fa-earth-africa advantage-icon"></i>
                        </div>
                        <span class="feature-label">{{ __('Pan-African Presence') }}</span>
                    </div>
                </div>
                
                <div class="feature-column">
                    <div class="feature-item">
                        <div class="feature-icon-box">
                            <i class="fa-solid fa-hand-holding-dollar advantage-icon"></i>
                        </div>
                        <span class="feature-label">{{ __('Transparent Pricing') }}</span>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon-box">
                            <i class="fa-solid fa-boxes-packing advantage-icon"></i>
                        </div>
                        <span class="feature-label">{{ __('End-to-End Handling') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="process">
    <div class="process__inner">
        
        <div class="process-header reveal">
            <div class="process-tag-box">
                <span class="process-tag">{{ __('Our Process') }}</span>
            </div>
            <h2 class="process-title">{{ __('How It Works') }}</h2>
            <p class="process-subtitle">{{ __('Simple, transparent, and efficient, from your inquiry to delivery') }}</p>
        </div>

        <div class="process-grid">
            <div class="process-step reveal">
                <div class="icon-container">
                    <div class="icon-circle">
                        <i class="fa-solid fa-envelope-open-text process-icon"></i>
                    </div>
                    <div class="step-badge">01</div>
                </div>
                <h3 class="step-title">{{ __('Send Your Request') }}</h3>
                <p class="step-text">{{ __('Tell us your city and the type of vehicle or ATV you need.') }}</p>
            </div>
        
            <div class="process-step reveal">
                <div class="icon-container">
                    <div class="icon-circle">
                        <i class="fa-solid fa-file-invoice-dollar process-icon"></i>
                    </div>
                    <div class="step-badge">02</div>
                </div>
                <h3 class="step-title">{{ __('Get Pricing') }}</h3>
                <p class="step-text">{{ __('Receive detailed pricing and sourcing options within 24-48 hours') }}</p>
            </div>
        
            <div class="process-step reveal">
                <div class="icon-container">
                    <div class="icon-circle">
                        <i class="fa-solid fa-ship process-icon"></i>
                    </div>
                    <div class="step-badge">03</div>
                </div>
                <h3 class="step-title">{{ __('Shipping & Clearance') }}</h3>
                <p class="step-text">{{ __('We handle shipping from China and all customs clearance procedures.') }}</p>
            </div>
        
            <div class="process-step reveal">
                <div class="icon-container">
                    <div class="icon-circle">
                        <i class="fa-solid fa-truck-ramp-box process-icon"></i>
                    </div>
                    <div class="step-badge">04</div>
                </div>
                <h3 class="step-title">{{ __('Delivery') }}</h3>
                <p class="step-text">{{ __('Your vehicle is delivered directly to your location in your city.') }}</p>
            </div>
        </div>
    </div>
</section>

<section class="coverage reveal">
    <div class="coverage__inner">
        
        <div class="coverage-header">
            <div class="coverage-tag-box">
                <span class="coverage-tag">{{ __('Coverage') }}</span>
            </div>
            <h2 class="coverage-title">{{ __('Where We Deliver') }}</h2>
            <p class="coverage-subtitle">{{ __('Pan-African presence with offices and delivery networks across East and Central Africa') }}</p>
        </div>

        <div class="coverage-grid">
            <div class="country-card reveal">
                <img class="country-flag" src="https://flagcdn.com/w80/ke.png" alt="Kenya">
                <h3 class="country-name">Kenya</h3>
                <div class="city-list">
                    <div class="city-item"><span class="city-dot"></span>Nairobi</div>
                    <div class="city-item"><span class="city-dot"></span>Mombasa</div>
                </div>
            </div>
        
            <div class="country-card reveal">
                <img class="country-flag" src="https://flagcdn.com/w80/cd.png" alt="DRC">
                <h3 class="country-name">DRC</h3>
                <div class="city-list">
                    <div class="city-item"><span class="city-dot"></span>Kinshasa</div>
                    <div class="city-item"><span class="city-dot"></span>Lubumbashi</div>
                </div>
            </div>
        
           <div class="country-card reveal">
                <img class="country-flag" src="https://flagcdn.com/w80/tz.png" alt="Tanzania">
                <h3 class="country-name">Tanzania</h3>
                <div class="city-list">
                    <div class="city-item"><span class="city-dot"></span>Dar es Salaam</div>
                </div>
            </div>
        
            <div class="country-card reveal">
                <img class="country-flag" src="https://flagcdn.com/w80/ao.png" alt="Angola">
                <h3 class="country-name">Angola</h3>
                <div class="city-list">
                    <div class="city-item"><span class="city-dot"></span>Luanda</div>
                </div>
            </div>
        
            <div class="country-card reveal">
                <img class="country-flag" src="https://flagcdn.com/w80/zm.png" alt="Zambia">
                <h3 class="country-name">Zambia</h3>
                <div class="city-list">
                    <div class="city-item"><span class="city-dot"></span>Lusaka</div>
                    <div class="city-item"><span class="city-dot"></span>Ndola</div>
                </div>
            </div>
        </div>

        <div class="coverage-cta-banner">
            <h2 class="cta-title">{{ __('Don\'t see your City?') }}</h2>
            <p class="cta-text">{{ __('Send us your location and we\'ll provide custom pricing for delivery to your area.') }}</p>
            <a href="{{ url('/contact') }}" class="btn-coverage">{{ __('Send Your City for Price') }}</a>
        </div>

    </div>
</section>
<section class="cta-section">
    
    <div class="cta__inner">
        
        <div class="cta-content">
            <h2 class="cta-heading">{!! __('Ready to Source Your<br/>Next Vehicle or ATV?') !!}</h2>
            <p class="cta-description">
                {{ __('Get started today with a free quote. Our team is ready to help<br/>you source, ship, and deliver your vehicles anywhere in East and Central Africa.') }}
            </p>
        </div>

        <div class="cta-buttons">
            <a href="{{ url('/contact') }}" class="btn-primary">
             {{ __('Contact an Agent') }}
                <i class="fa-solid fa-arrow-up-right-from-square btn-icon"></i>
            </a>

            <a href="{{ url('/services') }}" class="btn-outline">
            {{ __('View Services') }}
            </a>
        </div>

    </div>
</section>
</div>


@endsection

