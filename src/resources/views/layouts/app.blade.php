<!DOCTYPE html>
<html lang="en" class="__variable_e66fe9 __variable_829c8b">

<head>
  <meta charSet="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="preload" href="{{ asset('vendor/lara-care/schema-visualizr/media/162bf645eb375add-s.p.ttf') }}" as="font" crossorigin type="font/ttf" />
  <link rel="preload" href="{{ asset('vendor/lara-care/schema-visualizr/media/c9a5bc6a7c948fb0-s.p.woff2') }}" as="font" crossorigin
    type="font/woff2" />
  <link rel="stylesheet" href="{{ asset('vendor/lara-care/schema-visualizr/css/visualizr.css') }}" crossorigin data-precedence="next" />
  <link rel="preload" href="{{ asset('vendor/lara-care/schema-visualizr/js/webpack-b5efe19e8ee15463.js') }}" as="script" fetchPriority="low"
    crossorigin />
  <script src="{{ asset('vendor/lara-care/schema-visualizr/js/f42e5159-56eb28c3a582d27e.js') }}" async crossorigin></script>
  <script src="{{ asset('vendor/lara-care/schema-visualizr/js/83-9a28d55a570b8009.js') }}" async crossorigin></script>
  <script src="{{ asset('vendor/lara-care/schema-visualizr/js/main-app-9224f8e6676d9871.js') }}" async crossorigin></script>
  <script src="{{ asset('vendor/lara-care/schema-visualizr/js/beam.min.js') }}" data-token="e08d63f1-631b-4eeb-89b3-7799fedde74f"
    async></script>
  <title>chronark.com</title>
  <meta name="description" content="Co-founder of unkey.dev and founder of planetfall.io" />
  <meta name="robots" content="index, follow" />
  <meta name="googlebot" content="index, follow, max-video-preview:-1, max-image-preview:large, max-snippet:-1" />
  <meta property="og:title" content="chronark.com" />
  <meta property="og:description" content="Co-founder of unkey.dev and founder of planetfall.io" />
  <meta property="og:url" content="https://chronark.com" />
  <meta property="og:site_name" content="chronark.com" />
  <meta property="og:locale" content="en-US" />
  <meta property="og:image" content="https://chronark.com/og.png" />
  <meta property="og:image:width" content="1920" />
  <meta property="og:image:height" content="1080" />
  <meta property="og:type" content="website" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Chronark" />
  <meta name="twitter:description" content="Co-founder of unkey.dev and founder of planetfall.io" />
  <meta name="twitter:image" content="https://chronark.com/og.png" />
  <meta name="twitter:image:width" content="1920" />
  <meta name="twitter:image:height" content="1080" />
  <link rel="shortcut icon" href="/favicon.png" />
  <meta name="next-size-adjust" />
</head>

<body class="bg-black undefined">

    <div class="gradient-background">
        <div class="gradient-sphere sphere-1"></div>
        <div class="gradient-sphere sphere-2"></div>
        <div class="gradient-sphere sphere-3"></div>
        <div class="glow"></div>
        <div class="grid-overlay"></div>
        <div class="noise-overlay"></div>
        <div class="particles-container" id="particles-container"></div>
    </div>
  <div
    class="flex flex-col items-center justify-center w-screen h-screen overflow-hidden bg-gradient-to-tl from-black via-zinc-600/20 to-black">
    <nav class="my-16 animate-fade-in">
      <ul class="flex items-center justify-center gap-4"><a
          class="text-sm duration-500 text-zinc-500 hover:text-zinc-300" href="/projects">Projects</a><a
          class="text-sm duration-500 text-zinc-500 hover:text-zinc-300" href="/contact">Contact</a></ul>
    </nav>
    <div
      class="hidden w-screen h-px animate-glow md:block animate-fade-left bg-gradient-to-r from-zinc-300/0 via-zinc-300/50 to-zinc-300/0">
    </div>
    <div class="absolute inset-0 -z-10 animate-fade-in" aria-hidden="true">
      <canvas></canvas>
    </div>
     
    <h1
      class="z-10 text-4xl text-transparent duration-1000 bg-white cursor-default text-edge-outline animate-title font-display sm:text-6xl md:text-9xl whitespace-nowrap bg-clip-text ">
      chronark</h1>
    <div
      class="hidden w-screen h-px animate-glow md:block animate-fade-right bg-gradient-to-r from-zinc-300/0 via-zinc-300/50 to-zinc-300/0">
    </div>
    <div class="my-16 text-center animate-fade-in">
      <h2 class="text-sm text-zinc-500 ">I&#x27;m building<!-- --> <a target="_blank"
          class="underline duration-500 hover:text-zinc-300" href="https://unkey.dev">unkey.dev</a> to solve API
        authentication and authorization for developers.</h2>
    </div>
  </div>
    <script>
       // Create particle effect
        const particlesContainer = document.getElementById('particles-container');
        const particleCount = 80;
        
        // Create particles
        for (let i = 0; i < particleCount; i++) {
            createParticle();
        }
        
        function createParticle() {
            const particle = document.createElement('div');
            particle.className = 'particle';
            
            // Random size (small)
            const size = Math.random() * 3 + 1;
            particle.style.width = `${size}px`;
            particle.style.height = `${size}px`;
            
            // Initial position
            resetParticle(particle);
            
            particlesContainer.appendChild(particle);
            
            // Animate
            animateParticle(particle);
        }
        
        function resetParticle(particle) {
            // Random position
            const posX = Math.random() * 100;
            const posY = Math.random() * 100;
            
            particle.style.left = `${posX}%`;
            particle.style.top = `${posY}%`;
            particle.style.opacity = '0';
            
            return {
                x: posX,
                y: posY
            };
        }
        
        function animateParticle(particle) {
            // Initial position
            const pos = resetParticle(particle);
            
            // Random animation properties
            const duration = Math.random() * 10 + 10;
            const delay = Math.random() * 5;
            
            // Animate with GSAP-like timing
            setTimeout(() => {
                particle.style.transition = `all ${duration}s linear`;
                particle.style.opacity = Math.random() * 0.3 + 0.1;
                
                // Move in a slight direction
                const moveX = pos.x + (Math.random() * 20 - 10);
                const moveY = pos.y - Math.random() * 30; // Move upwards
                
                particle.style.left = `${moveX}%`;
                particle.style.top = `${moveY}%`;
                
                // Reset after animation completes
                setTimeout(() => {
                    animateParticle(particle);
                }, duration * 1000);
            }, delay * 1000);
        }
        
        // Mouse interaction
        document.addEventListener('mousemove', (e) => {
            // Create particles at mouse position
            const mouseX = (e.clientX / window.innerWidth) * 100;
            const mouseY = (e.clientY / window.innerHeight) * 100;
            
            // Create temporary particle
            const particle = document.createElement('div');
            particle.className = 'particle';
            
            // Small size
            const size = Math.random() * 4 + 2;
            particle.style.width = `${size}px`;
            particle.style.height = `${size}px`;
            
            // Position at mouse
            particle.style.left = `${mouseX}%`;
            particle.style.top = `${mouseY}%`;
            particle.style.opacity = '0.6';
            
            particlesContainer.appendChild(particle);
            
            // Animate outward
            setTimeout(() => {
                particle.style.transition = 'all 2s ease-out';
                particle.style.left = `${mouseX + (Math.random() * 10 - 5)}%`;
                particle.style.top = `${mouseY + (Math.random() * 10 - 5)}%`;
                particle.style.opacity = '0';
                
                // Remove after animation
                setTimeout(() => {
                    particle.remove();
                }, 2000);
            }, 10);
            
            // Subtle movement of gradient spheres
            const spheres = document.querySelectorAll('.gradient-sphere');
            const moveX = (e.clientX / window.innerWidth - 0.5) * 5;
            const moveY = (e.clientY / window.innerHeight - 0.5) * 5;
            
            spheres.forEach(sphere => {
                const currentTransform = getComputedStyle(sphere).transform;
                sphere.style.transform = `translate(${moveX}px, ${moveY}px)`;
            });
        });
    </script>
</body>

</html>