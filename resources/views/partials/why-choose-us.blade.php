<section class="relative bg-gray-900 text-white py-20 overflow-hidden">
  <!-- Background SVG Circles -->
  <svg class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/3 opacity-20 w-[600px] h-[600px] pointer-events-none" viewBox="0 0 600 600" fill="none" xmlns="http://www.w3.org/2000/svg">
    <circle cx="300" cy="300" r="300" fill="url(#gradCircle1)" />
    <defs>
      <radialGradient id="gradCircle1" cx="50%" cy="50%" r="50%">
        <stop offset="0%" stop-color="#6366f1" />
        <stop offset="100%" stop-color="#0f172a" />
      </radialGradient>
    </defs>
  </svg>

  <div class="relative max-w-6xl mx-auto px-6 text-center">
    <h3 class="text-4xl md:text-5xl font-extrabold mb-12 tracking-tight">
      Pourquoi choisir <span class="text-indigo-500">E-DEV</span> ?
    </h3>

    <div class="grid gap-12 md:grid-cols-3">
      @php
        $items = [
          [
            'title' => 'Innovation constante',
            'desc' => 'Nous façonnons la technologie de demain grâce à une R&D permanente.',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="w-12 h-12 mx-auto mb-4 text-indigo-400"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>',
          ],
          [
            'title' => 'Expertise technique',
            'desc' => 'Une équipe d’experts maîtrisant les dernières technologies et standards.',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="w-12 h-12 mx-auto mb-4 text-indigo-400"><circle cx="12" cy="12" r="10" /><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2"/></svg>',
          ],
          [
            'title' => 'Résultats mesurables',
            'desc' => 'Nous livrons des solutions qui boostent réellement votre business.',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="w-12 h-12 mx-auto mb-4 text-indigo-400"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-6h6v6m-6 0l-3-3m12 3l-3-3"/></svg>',
          ],
        ];
      @endphp

      @foreach ($items as $item)
      <div
        class="service-card bg-gray-800 rounded-3xl p-8 shadow-lg cursor-default transform transition duration-500 hover:scale-105 hover:shadow-indigo-600/80"
        style="clip-path: polygon(15% 0%, 85% 0%, 100% 15%, 100% 85%, 85% 100%, 15% 100%, 0% 85%, 0% 15%)"
      >
        {!! $item['icon'] !!}
        <h4 class="text-2xl font-semibold mb-3">{{ $item['title'] }}</h4>
        <p class="text-gray-300 leading-relaxed">{{ $item['desc'] }}</p>
      </div>
      @endforeach
    </div>
  </div>

  <style>
    /* Fade in animation on scroll */
    .service-card {
      opacity: 0;
      transform: translateY(30px);
      animation: fadeInUp 0.7s forwards;
      animation-delay: 0.2s;
    }
    .service-card:nth-child(2) {
      animation-delay: 0.4s;
    }
    .service-card:nth-child(3) {
      animation-delay: 0.6s;
    }
    @keyframes fadeInUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</section>
