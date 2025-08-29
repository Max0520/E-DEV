<section class="bg-gray-800 text-white py-20">
  <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-16 items-center">

    <!-- Texte -->
    <div>
      <h3 class="text-4xl font-extrabold mb-6">À propos de <span class="text-indigo-500">E-DEV</span></h3>
      <p class="text-gray-300 mb-6 leading-relaxed text-lg">
        Chez E-DEV, nous sommes bien plus qu'une simple entreprise tech.
        Nous sommes des artisans du numérique, façonnant l'avenir grâce à l'innovation,
        l'expertise et une passion sans compromis pour la perfection.
      </p>
      <p class="text-gray-400 mb-8">
        Notre équipe rassemble des talents exceptionnels en développement web, mobile, automatisation, et design graphique.
        Chaque projet est une nouvelle occasion de repousser les limites et de délivrer une expérience unique à nos clients.
      </p>
      <a href="/contact" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-full font-semibold transition shadow-lg hover:shadow-indigo-500/50">
        Contactez-nous
      </a>
    </div>

    <!-- Image -->
    <div class="relative rounded-3xl overflow-hidden shadow-2xl border-4 border-indigo-600 max-w-md mx-auto">
      <img src="{{ asset('images/logo.png') }}" alt="Photo à propos E-DEV" class="w-full h-auto object-cover transition-transform duration-500 hover:scale-105">
      <!-- Optionnel: un petit SVG décoratif en coin -->
      <svg class="absolute bottom-4 right-4 w-16 h-16 opacity-50" fill="none" stroke="#6366f1" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 2v20m10-10H2"></path>
      </svg>
    </div>

  </div>
</section>
