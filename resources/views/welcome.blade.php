<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tourisme & Guides</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      /* Slideshow container en full screen */
      .slideshow {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        z-index: -1;
        overflow: hidden;
      }
      .slideshow img {
        position: absolute;
        width: 100%;
        height: 100%;
        object-fit: cover;
        animation: slide 15s infinite;
        opacity: 0;
      }
      .slideshow img:nth-child(1) {
        animation-delay: 0s;
      }
      .slideshow img:nth-child(2) {
        animation-delay: 5s;
      }
      .slideshow img:nth-child(3) {
        animation-delay: 10s;
      }
      @keyframes slide {
        0% { opacity: 0; }
        10% { opacity: 1; }
        30% { opacity: 1; }
        40% { opacity: 0; }
        100% { opacity: 0; }
      }
    </style>
  </head>
  <body class="h-screen w-screen flex items-center justify-center">
    <!-- Slideshow en arrière-plan -->
    <div class="slideshow">
      <img src="{{ asset('images/image1.jpg') }}" alt="Image 1">
      <img src="{{ asset('images/image2.jpg') }}" alt="Image 2">
      <img src="{{ asset('images/image3.jpg') }}" alt="Image 3">
    </div>

    <!-- Contenu centré -->
    <div class="text-center text-white px-4 relative z-10">
      <h1 class="text-4xl md:text-6xl font-bold mb-4 drop-shadow-lg">Tourisme & Guides</h1>
      <p class="text-lg md:text-xl mb-8 drop-shadow-lg">Découvrez et gérez vos images touristiques</p>
      <a
        href="admin/login"
        class="px-6 py-3 bg-white text-blue-600 font-semibold rounded-full shadow-lg hover:bg-gray-100 transition duration-300"
      >
        Se connecter
      </a>
    </div>
  </body>
</html>
