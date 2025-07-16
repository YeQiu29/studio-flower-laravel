<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Studio Flower Admin</title>

        <!-- Favicon -->
        <link rel="icon" href="{{ asset('images/main-logo.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        <style>
            @keyframes float {
                0% {
                    transform: translateY(0px);
                }
                50% {
                    transform: translateY(-10px);
                }
                100% {
                    transform: translateY(0px);
                }
            }

            .floating-logo {
                animation: float 3s ease-in-out infinite;
                max-width: 150px;
            }

            /* Styling for the cursor trail particles */
            .cursor-trail {
                position: absolute;
                width: 6px;
                height: 6px;
                background-color: #ff3f81; /* Match Vanta color */
                border-radius: 50%;
                pointer-events: none;
                transform: translate(-50%, -50%);
                transition: opacity 0.5s ease-out, transform 0.5s ease-out;
                z-index: 9999;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>

        <!-- Vanta.js Background Animation -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.net.min.js"></script>
        <script>
        // Vanta.js background (non-interactive)
        VANTA.NET({
          el: "body",
          mouseControls: false, // Disabled mouse interaction for the main net
          touchControls: false,
          gyroControls: false,
          minHeight: 200.00,
          minWidth: 200.00,
          scale: 1.00,
          scaleMobile: 1.00,
          color: 0xff3f81,
          backgroundColor: 0x201528,
          points: 12.00,
          maxDistance: 22.00,
          spacing: 18.00
        });

        // Cursor trail script
        document.addEventListener('mousemove', function(e) {
            let trail = document.createElement('div');
            trail.className = 'cursor-trail';
            document.body.appendChild(trail);

            trail.style.left = e.pageX + 'px';
            trail.style.top = e.pageY + 'px';

            // Randomize the fade-out path slightly
            let randomX = (Math.random() - 0.5) * 50;
            let randomY = (Math.random() - 0.5) * 50;

            setTimeout(() => {
                trail.style.transform = `translate(${randomX}px, ${randomY}px)`;
                trail.style.opacity = '0';
            }, 100);

            setTimeout(() => {
                document.body.removeChild(trail);
            }, 600); // Remove from DOM after fade out
        });
        </script>
    </body>
</html>
