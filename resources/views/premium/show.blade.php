@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <img src="{{ $premium->image }}" alt="{{ $premium->title }}" class="w-full h-64 object-cover rounded mb-6">
        <h2 class="text-3xl font-bold mb-4">{{ $premium->title }}</h2>
        <p class="text-gray-700 mb-6">{{ $premium->description }}</p>
        <p class="text-blue-600 font-bold text-xl mb-6">{{ $premium->price }} Ar</p>

        <a href="{{ route('premium.index') }}"
           class="inline-block px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 transition">
           Retour aux solutions
        </a>
    </div>
</div>
@endsection
