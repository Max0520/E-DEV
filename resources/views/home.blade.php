@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
<div class="relative overflow-hidden bg-gradient-to-br from-gray-950 via-gray-900 to-gray-950 text-white">

    <!-- SVG Background Glow -->
    <div class="absolute inset-0 -z-10 pointer-events-none">
        <svg class="w-full h-full" viewBox="0 0 800 800" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="400" cy="400" r="400" fill="url(#grad1)" />
            <defs>
                <radialGradient id="grad1" cx="50%" cy="50%" r="50%">
                    <stop offset="0%" stop-color="#6366f1" />
                    <stop offset="100%" stop-color="#0f172a" />
                </radialGradient>
            </defs>
        </svg>
    </div>

    <!-- Content -->
    <div class="relative z-10 max-w-7xl mx-auto flex flex-col-reverse md:flex-row items-center gap-12 py-20 px-6 md:px-12">
        <!-- Text Block -->
        <div class="md:w-1/2">
            <h2 class="text-5xl font-extrabold mb-6 leading-tight tracking-tight">
                Bienvenue chez <span class="text-indigo-500">E‑DEV</span>
            </h2>
            <p class="text-lg text-gray-300 mb-8">
                Nous ne suivons pas la technologie. <br>
                Nous la façonnons.
                <br>Cyber‑réseaux. IA. Automatisation. Bots.<br>
                E‑DEV est l’ultime standard que les autres tentent d’atteindre.
            </p>
            <a href="/services" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-full text-lg transition duration-300 shadow-lg hover:shadow-indigo-500/50">
                Explorer nos services
            </a>
        </div>

        <!-- Image Block with Glow and Clip -->
        <div class="md:w-1/2">
            <div class="relative w-full max-w-md mx-auto group">
                <!-- Glow background -->
                <div class="absolute inset-0 blur-2xl opacity-30 bg-indigo-500 rounded-3xl group-hover:scale-105 transition duration-700"></div>

                <!-- Image with clip-path -->
                <div class="clip-image overflow-hidden shadow-2xl rounded-3xl border border-indigo-600 relative z-10">
                    <img src="{{ asset('images/boy.jpg') }}"
                         alt="Cyber Network Technology"
                         class="w-full h-auto object-cover transition-all duration-700">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Clip-path Styles -->
<style>
.clip-image img {
    clip-path: polygon(0% 15%, 100% 0%, 100% 85%, 0% 100%);
}
.clip-image:hover img {
    transform: scale(1.05);
    clip-path: polygon(10% 0%, 100% 10%, 90% 100%, 0% 90%);
}
</style>
@endsection
