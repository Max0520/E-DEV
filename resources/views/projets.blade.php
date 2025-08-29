@extends('layouts.app')

@section('title', 'Nos Projets')

@section('content')
<section class="bg-[#0f0f0f] text-white pt-20 pb-28">
  <div class="max-w-7xl mx-auto px-6">
    <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-4 uppercase tracking-wide text-center">Nos Projets</h2>
    <p class="text-gray-400 text-lg text-center mb-12">Explorez notre univers technologique. Chaque projet est une preuve de notre supériorité digitale.</p>

    <!-- Formulaire de recherche / filtre -->
    <form method="GET" action="{{ route('projects.index') }}" class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
      <input
        name="search"
        type="text"
        placeholder="Rechercher un projet..."
        value="{{ request('search') }}"
        class="w-full md:w-1/3 px-4 py-2 rounded bg-gray-800 text-white border border-gray-700 focus:outline-none focus:border-indigo-500"
      />

      <select
        name="category"
        onchange="this.form.submit()"
        class="w-full md:w-1/4 px-4 py-2 rounded bg-gray-800 text-white border border-gray-700 focus:outline-none focus:border-indigo-500">
        <option value="">Toutes catégories</option>
        @foreach($categories as $category)
          <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
          </option>
        @endforeach
      </select>


    </form>

    <!-- Grille projets -->
    <div id="projectsGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
      @forelse($projects as $project)
        <div class="bg-[#1a1a1a] rounded-2xl overflow-hidden shadow-xl hover:scale-[1.02] transition transform duration-300 flex flex-col">
          <div class="relative group">
            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-48 object-cover group-hover:opacity-80 transition">
            <div class="absolute bottom-0 left-0 bg-gradient-to-t from-black via-transparent to-transparent w-full p-4">
              <span class="bg-blue-600 px-3 py-1 text-xs font-semibold rounded-full">
                {{ $project->category->name ?? 'Sans catégorie' }}
              </span>
            </div>
          </div>
          <div class="p-6 flex flex-col flex-grow">
            <h3 class="text-2xl font-bold mb-2">{{ $project->title }}</h3>
            <p class="text-gray-400 text-sm flex-grow">{{ Str::limit($project->description, 120) }}</p>
            <div class="mt-4 flex items-center justify-between">
              <span class="text-xl font-semibold text-blue-500">{{ number_format($project->price, 0, ',', ' ') }} €</span>
             <a href="{{ $project->buy_link ?? '#' }}"
   target="_blank"
   class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-xl shadow hover:opacity-90 transition">
    Voir les details
</a>
            </div>
          </div>
        </div>
      @empty
        <p class="text-center text-gray-500 col-span-3">Aucun projet trouvé.</p>
      @endforelse
    </div>

    <!-- Pagination -->
    <div class="flex justify-center mt-12 space-x-3">
      {{ $projects->appends(request()->query())->links() }}
    </div>
  </div>
</section>
@endsection
