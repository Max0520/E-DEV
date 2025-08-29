<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>E-DEV | @yield('title', 'Accueil')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&family=Inter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3 { font-family: 'Orbitron', sans-serif; }
    </style>
</head>
<body class="bg-[#0f0f0f] text-gray-100">

    <!-- Header -->
    <header class="bg-[#111] border-b border-gray-800 shadow-sm pb-4">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-extrabold text-blue-500"><a href="/">E-DEV</a></h1>
            <nav class="space-x-6">
                <a href="/" class="text-gray-300 hover:text-blue-500 transition">Accueil</a>
                <a href="/services" class="text-gray-300 hover:text-blue-500 transition">Services</a>
                <a href="/projets" class="text-gray-300 hover:text-blue-500 transition">Projets</a>
                {{-- <a href="/solutions-premium" class="text-gray-300 hover:text-blue-500 transition">Solutions Premium</a> --}}
                <a href="/contact" class="text-gray-300 hover:text-blue-500 transition">Contact</a>
            </nav>
        </div>
    </header>

    <!-- Main content -->
    <main>
        @yield('content')

        @include('partials.why-choose-us')



        @include('partials.about')
        @include('partials.testimonials')
        @include('partials.contact-form')
    </main>

    <!-- Footer -->
    <footer class="bg-[#0d0d0d] text-gray-400 border-t border-gray-800 mt-20">
        <div class="max-w-7xl mx-auto px-6 py-12 flex flex-col md:flex-row justify-around gap-10">
            <div class="flex-1 max-w-xs">
                <h2 class="text-xl font-bold text-white mb-4">À propos</h2>
                <p class="text-sm leading-relaxed">
                    <span class="text-indigo-500 font-semibold">E‑DEV</span> est une entreprise technologique de nouvelle génération.
                    Nous concevons des solutions digitales puissantes : intelligence artificielle, automatisation, cybersécurité, et plus.
                </p>
            </div>

            <div class="flex-1 max-w-xs">
                <h2 class="text-xl font-bold text-white mb-4">Menu</h2>
                <ul class="space-y-2 text-sm">
                    <li><a href="/" class="hover:text-indigo-400 transition">Accueil</a></li>
                    <li><a href="/services" class="hover:text-indigo-400 transition">Nos services</a></li>
                    <li><a href="/projets" class="hover:text-indigo-400 transition">Nos projets</a></li>
                    {{-- <li><a href="/solutions-premium" class="hover:text-indigo-400 transition">Solutions Premium</a></li> --}}
                    <li><a href="/contact" class="hover:text-indigo-400 transition">Contact</a></li>
                </ul>
            </div>

            <div class="flex-1 max-w-xs">
                <h2 class="text-xl font-bold text-white mb-4">Contact</h2>
                <ul class="space-y-2 text-sm">
                    <li>Email : <a href="mailto:contact@e-dev.com" class="text-indigo-400 hover:underline">edevteamofficial@gmail.com</a></li>
                    <li>Téléphone : <span class="text-gray-300">+261 34 98 786 42</span></li>
                    <li>Adresse : <span class="text-gray-300">Antananarivo, Madagascar</span></li>
                    <li>
                        <div class="flex gap-4 mt-2">
                            <a href="https://www.facebook.com/profile.php?id=61558236483481" class="hover:text-indigo-400 transition">Facebook</a>
                            <a href="#" class="hover:text-indigo-400 transition">LinkedIn</a>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="flex-1 max-w-xs">
                <h2 class="text-xl font-bold text-white mb-4">Newsletter</h2>
                <p class="text-sm mb-4">Recevez nos dernières actualités et offres exclusives directement par email.</p>
                <form action="{{ route('newsletter.store') }}" method="POST" class="flex flex-col space-y-3">
                    @csrf
                    <input type="email" name="email" placeholder="Votre email" required
                           class="px-4 py-2 rounded bg-gray-800 text-gray-100 border border-gray-700 focus:outline-none focus:border-indigo-500">
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded font-semibold transition">S’abonner</button>
                </form>
                @if(session('success'))
                    <div class="text-green-500 text-sm mb-2">{{ session('success') }}</div>
                @endif
            </div>
        </div>

        <div class="border-t border-gray-800 text-xs text-gray-500 flex items-center justify-between py-4 px-6 max-w-7xl mx-auto">
            <div>© {{ date('Y') }} <span class="text-indigo-500 font-bold">E‑DEV</span> — L’élite du digital.</div>
            <div class="flex space-x-6 text-gray-400">
                <a href="https://www.facebook.com/profile.php?id=61558236483481" target="_blank" class="hover:text-indigo-500 transition"><i class="fab fa-facebook-f"></i></a>
                <a href="https://linkedin.com/in/tonprofil" target="_blank" class="hover:text-indigo-500 transition"><i class="fab fa-linkedin-in"></i></a>
                <a href="https://twitter.com/tonprofil" target="_blank" class="hover:text-indigo-500 transition"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body>
</html>
