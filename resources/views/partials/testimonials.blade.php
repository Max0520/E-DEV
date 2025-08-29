<section class="relative py-20 px-6 bg-gradient-to-br from-gray-950 via-gray-900 to-gray-950 text-white overflow-visible rounded-3xl">

  <!-- Fond déformé avec SVG rempli semi-transparent -->
  <svg class="pointer-events-none absolute inset-0 w-full h-full z-0" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 400 400">
    <path fill="rgba(99,102,241,0.15)"  <!-- Indigo 600 à 15% d’opacité -->
          d="M10,40
             Q50,10 100,40
             T190,40
             T280,40
             T370,40
             L370,370
             Q320,400 270,370
             T180,370
             T90,370
             T10,370
             Z" />
  </svg>

  <!-- Contenu principal -->
  <div class="relative z-10 max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-12">

    <!-- Swiper slider -->
    <div class="w-full md:w-1/2">
      <div class="swiper mySwiper">
        <div class="swiper-wrapper">

          <!-- Slide 1 -->
          <div class="swiper-slide relative p-6 bg-white/5 backdrop-blur-lg shadow-xl border border-indigo-500 transition-transform duration-300 hover:scale-[1.03]"
               style="clip-path: polygon(0 0, 100% 0, 90% 100%, 0% 100%)">
            <p class="italic text-sm text-gray-300 mb-6 relative z-10">
              “E‑DEV a transformé notre entreprise en un mois !”
            </p>
            <span class="absolute top-0 left-0 w-full h-1 bg-indigo-500 opacity-50 rounded-t"></span>
            <div class="flex items-center gap-4 relative z-10">
              <img src="/images/avatar1.png" class="w-12 h-12 rounded-full border border-indigo-400" alt="Client Alex M." />
              <div>
                <h4 class="font-semibold text-white">Alex M.</h4>
                <p class="text-xs text-gray-400">CEO, CyberCorp</p>
              </div>
            </div>
            <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-indigo-500/20 rounded-full blur-2xl z-0"></div>
          </div>

          <!-- Slide 2 -->
          <div class="swiper-slide relative p-6 bg-white/5 backdrop-blur-lg shadow-xl border border-indigo-500 transition-transform duration-300 hover:scale-[1.03]"
               style="clip-path: polygon(0 0, 100% 0, 90% 100%, 0% 100%)">
            <p class="italic text-sm text-gray-300 mb-6 relative z-10">
              “Incroyablement rapide et professionnel.”
            </p>
            <span class="absolute top-0 left-0 w-full h-1 bg-indigo-500 opacity-50 rounded-t"></span>
            <div class="flex items-center gap-4 relative z-10">
              <img src="/images/avatar2.png" class="w-12 h-12 rounded-full border border-indigo-400" alt="Client Linda S." />
              <div>
                <h4 class="font-semibold text-white">Linda S.</h4>
                <p class="text-xs text-gray-400">Directrice, StartAI</p>
              </div>
            </div>
            <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-indigo-500/20 rounded-full blur-2xl z-0"></div>
          </div>

          <!-- Slide 3 -->
          <div class="swiper-slide relative p-6 bg-white/5 backdrop-blur-lg shadow-xl border border-indigo-500 transition-transform duration-300 hover:scale-[1.03]"
               style="clip-path: polygon(0 0, 100% 0, 90% 100%, 0% 100%)">
            <p class="italic text-sm text-gray-300 mb-6 relative z-10">
              “Un service haut de gamme. Je recommande !”
            </p>
            <span class="absolute top-0 left-0 w-full h-1 bg-indigo-500 opacity-50 rounded-t"></span>
            <div class="flex items-center gap-4 relative z-10">
              <img src="/images/avatar3.png" class="w-12 h-12 rounded-full border border-indigo-400" alt="Client Julien T." />
              <div>
                <h4 class="font-semibold text-white">Julien T.</h4>
                <p class="text-xs text-gray-400">Fondateur, DevUp</p>
              </div>
            </div>
            <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-indigo-500/20 rounded-full blur-2xl z-0"></div>
          </div>

        </div>

        <!-- Pagination -->
        <div class="swiper-pagination mt-4"></div>
      </div>
    </div>

    <!-- Texte à droite -->
    <div class="w-full md:w-1/2 text-right">
      <h2 class="text-4xl font-extrabold mb-6">Ce qu’ils disent de nous</h2>
      <p class="text-gray-400 text-sm md:text-base leading-relaxed">
        E‑DEV dépasse les attentes de ses clients. Découvrez comment nous transformons les idées en solutions de niveau élite.
      </p>
    </div>

  </div>

  <!-- Texte sous la ligne flex -->
  <div class="mt-12 max-w-4xl mx-auto text-center text-gray-400 text-lg px-4">
    <p>
      Plus qu’un simple prestataire, E‑DEV est un partenaire stratégique qui propulse votre business vers l’avenir.
    </p>
  </div>
  

  <!-- Swiper CSS + JS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <script>
    const swiper = new Swiper(".mySwiper", {
      slidesPerView: 1,
      spaceBetween: 30,
      loop: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      autoplay: {
        delay: 4000,
        disableOnInteraction: false,
      },
    });
  </script>
</section>
