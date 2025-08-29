@extends('layouts.app')

@section('title', $project->title)

@section('content')
<div class="container mx-auto px-4 py-16">
    <div class="flex flex-col lg:flex-row bg-gray-900/80 backdrop-blur-lg rounded-3xl shadow-2xl border border-gray-700/30 overflow-hidden">

        {{-- Image à gauche --}}
        <div class="lg:w-1/2 relative">
            @if($project->image)
                <img src="{{ asset('storage/' . $project->image) }}"
                     alt="{{ $project->title }}"
                     class="w-full h-96 object-cover rounded-l-3xl">
                @if($project->category)
                    <span class="absolute top-4 left-4 px-4 py-1 bg-blue-600 text-white rounded-full text-sm shadow">
                        {{ $project->category->name }}
                    </span>
                @endif
            @endif
        </div>

        {{-- Texte à droite --}}
        <div class="lg:w-1/2 p-8 flex flex-col justify-between">
            <h1 class="text-4xl font-bold text-white mb-4">{{ $project->title }}</h1>

            <p class="text-gray-300 mb-6 leading-relaxed text-lg">
                {!! nl2br(e($project->description)) !!}
            </p>

            {{-- Prix + Bouton --}}
            <div class="items-center" style="display: flex; justify-content:space-between">
                <span class="text-xl font-bold text-green-400">
                    {{ number_format($project->price, 0, ',', ' ') }} €
                </span>

               <a href="{{ $project->buy_link ?? '#' }}"
   target="_blank"
   class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-xl shadow hover:opacity-90 transition">
    Acheter maintenant
</a>

            </div>
        </div>
    </div>
</div>
@endsection
