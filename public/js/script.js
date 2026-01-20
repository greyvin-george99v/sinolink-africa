document.addEventListener("DOMContentLoaded", function() {
    const banner = document.getElementById("cookie-banner");
    const acceptBtn = document.getElementById("accept-cookies");

    // Only show if they haven't accepted before
    if (!localStorage.getItem("cookieAccepted")) {
        setTimeout(() => {
            banner.classList.add("show");
        }, 2000);
    } else {
        banner.style.display = "none"; // Safety: hide if already accepted
    }

    acceptBtn.onclick = function() {
        // 1. Save to browser memory
        localStorage.setItem("cookieAccepted", "true");
        
        // 2. Animate out
        banner.classList.remove("show");
        
        // 3. Remove from layout entirely after animation
        setTimeout(() => {
            banner.style.display = "none";
        }, 600);
    };
});

document.addEventListener('DOMContentLoaded', () => {
    const slides = document.querySelectorAll('.slide');
    const dotsContainer = document.getElementById('sliderDots');
    const nextBtn = document.getElementById('nextSlide');
    const prevBtn = document.getElementById('prevSlide');
    let currentSlide = 0;

    if (!slides.length) return;

    // Create unique progress bars
    slides.forEach((_, i) => {
        const dot = document.createElement('div');
        dot.classList.add('dot');
        if (i === 0) dot.classList.add('active');
        dot.addEventListener('click', () => updateSlider(i));
        dotsContainer.appendChild(dot);
    });

    const dots = document.querySelectorAll('.dot');

    function updateSlider(index) {
        slides.forEach(s => s.classList.remove('active'));
        dots.forEach(d => d.classList.remove('active'));

        currentSlide = (index + slides.length) % slides.length;

        slides[currentSlide].classList.add('active');
        dots[currentSlide].classList.add('active');
    }

    // Manual triggers only
    if (nextBtn) nextBtn.addEventListener('click', () => updateSlider(currentSlide + 1));
    if (prevBtn) prevBtn.addEventListener('click', () => updateSlider(currentSlide - 1));
});

const menuBtn = document.getElementById('mobile-menu');
const closeBtn = document.getElementById('close-menu');
const navList = document.getElementById('nav-list');
const overlay = document.getElementById('menu-overlay');

// 1. Function to OPEN (Hamburger Click)
menuBtn.addEventListener('click', () => {
    navList.classList.add('active');
    overlay.classList.add('active'); // Shows the dark tint
    document.body.classList.add('menu-open'); // Swaps icons
    document.body.style.overflow = 'hidden';
});

// 2. Function to CLOSE (X or Overlay Click)
const closeEverything = () => {
    navList.classList.remove('active');
    overlay.classList.remove('active'); // REMOVES THE DARKNESS
    document.body.classList.remove('menu-open');
    document.body.style.overflow = 'auto';
};

closeBtn.addEventListener('click', closeEverything);
overlay.addEventListener('click', closeEverything);


function openLightbox(src) {
    const lightbox = document.getElementById('galleryLightbox');
    const lightboxImg = document.getElementById('lightboxImg');
    
    lightboxImg.src = src;
    lightbox.style.display = 'flex';
    document.body.style.overflow = 'hidden'; // Stop background scroll
}

function closeLightbox() {
    document.getElementById('galleryLightbox').style.display = 'none';
    document.body.style.overflow = 'auto'; // Resume scroll
}

function reveal() {
    var reveals = document.querySelectorAll(".reveal");

    for (var i = 0; i < reveals.length; i++) {
        var windowHeight = window.innerHeight;
        var elementTop = reveals[i].getBoundingClientRect().top;
        var elementVisible = 150; // Triggers when element is 150px into view

        if (elementTop < windowHeight - elementVisible) {
            reveals[i].classList.add("active");
        }
    }
}

window.addEventListener("scroll", reveal);

// Run once on load to show elements already in view
reveal();

let mybutton = document.getElementById("backToTop");

window.onscroll = function() {
    if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
};

mybutton.onclick = function() {
    window.scrollTo({top: 0, behavior: 'smooth'});
};

function reveal() {
  var reveals = document.querySelectorAll(".reveal");

  for (var i = 0; i < reveals.length; i++) {
    var windowHeight = window.innerHeight;
    var elementTop = reveals[i].getBoundingClientRect().top;
    var elementVisible = 150; // Triggers when the element is 150px into view

    if (elementTop < windowHeight - elementVisible) {
      reveals[i].classList.add("active");
    }
  }
}

// Check on scroll
window.addEventListener("scroll", reveal);

// Run once on load to catch elements already at the top of the page
reveal();

window.onscroll = function() {
    const nav = document.querySelector('.main-nav');
    if (window.pageYOffset > 50) {
        nav.style.padding = "5px 0"; // Shrinks the height slightly
        nav.style.backgroundColor = "rgba(253, 201, 51, 0.95)"; // Adds slight transparency to the yellow
    } else {
        nav.style.padding = "10px 0";
        nav.style.backgroundColor = "#FDC933";
    }
};

