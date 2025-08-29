@extends('layouts.app')

@section('title', 'Nos Services')

@section('content')
<section class="bg-[#0f0f0f] text-gray-100 py-16">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-6 uppercase tracking-wide">
            Nos Domaines de Maîtrise
        </h2>
        <p class="text-gray-400 text-lg mb-12">
            Chez <span class="text-blue-500 font-semibold">E-DEV</span>, nous ne proposons pas des services. <br class="hidden md:block">Nous imposons des standards. Voici ce que nous faisons mieux que quiconque.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
           @foreach($services as $service)
    <div class="bg-[#1a1a1a] p-8 rounded-2xl hover:shadow-blue-500/30 hover:shadow-xl transition">
        <h3 class="text-2xl font-bold text-white mb-4">{{ $service->title }}</h3>
        <p class="text-gray-400">{{ $service->description }}</p>
    </div>
@endforeach

        </div>

        <!-- Call to action -->
        <div class="mt-16 text-center">
            <h3 class="text-3xl font-semibold text-white mb-4">Vous avez un projet ?</h3>
            <p class="text-gray-400 mb-6">Parlons technologie, innovation… et domination.</p>
            <a href="/contact" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl text-lg transition">
                Contactez-nous
            </a>
        </div>
    </div>
</section>
@endsection
