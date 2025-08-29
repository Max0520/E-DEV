@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<section class="bg-[#0f0f0f] text-white py-20 px-6 max-w-3xl mx-auto">

  <h2 class="text-4xl font-extrabold mb-8 text-center">Contactez-nous</h2>
  <p class="text-gray-400 mb-12 text-center">
    Remplissez ce formulaire pour toute demande, question ou achat de projet.
  </p>

  <!-- Contact Info -->
  <div class="mb-12 grid grid-cols-1 sm:grid-cols-2 gap-8 text-gray-300 text-sm">
    <div class="space-y-4">
      <div class="flex items-center gap-3">
        <i class="fas fa-envelope text-indigo-500 w-6"></i>
        <a href="mailto:edevteamofficial@gmail.com" class="hover:text-indigo-400 transition">edevteamofficial@gmail.com</a>
      </div>
      <div class="flex items-center gap-3">
        <i class="fas fa-phone text-indigo-500 w-6"></i>
        <span>+261 34 98 786 42</span>
      </div>
      <div class="flex items-center gap-3">
        <i class="fas fa-map-marker-alt text-indigo-500 w-6"></i>
        <span>Antananarivo, Madagascar</span>
      </div>
    </div>

    <div class="space-y-4">
      <div class="flex items-center gap-3">
        <i class="fab fa-facebook-f text-indigo-500 w-6"></i>
        <a href="https://www.facebook.com/profile.php?id=61558236483481" target="_blank" rel="noopener" class="hover:text-indigo-400 transition">Facebook</a>
      </div>
      <div class="flex items-center gap-3">
        <i class="fab fa-github text-indigo-500 w-6"></i>
        <a href="https://github.com/tonprofil" target="_blank" rel="noopener" class="hover:text-indigo-400 transition">GitHub</a>
      </div>
      <div class="flex items-center gap-3">
        <i class="fab fa-linkedin-in text-indigo-500 w-6"></i>
        <a href="https://linkedin.com/in/tonprofil" target="_blank" rel="noopener" class="hover:text-indigo-400 transition">LinkedIn</a>
      </div>
    </div>
  </div>

  <!-- Contact Form -->
  <form action="{{ route('contact.store') }}" method="POST" class="space-y-6 bg-[#1a1a1a] p-8 rounded-xl shadow-lg">
    @csrf

    <!-- Message de succès -->
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-600 text-white rounded">
            {{ session('success') }}
        </div>
    @endif

    <label class="block">
      <span class="text-gray-300">Nom complet</span>
      <input type="text" name="name" required
             class="mt-1 block w-full rounded border border-gray-700 bg-gray-900 text-white px-3 py-2 focus:outline-none focus:border-indigo-500" />
    </label>

    <label class="block">
      <span class="text-gray-300">Email</span>
      <input type="email" name="email" required
             class="mt-1 block w-full rounded border border-gray-700 bg-gray-900 text-white px-3 py-2 focus:outline-none focus:border-indigo-500" />
    </label>

    <label class="block">
      <span class="text-gray-300">Message</span>
      <textarea name="message" rows="5" required
                class="mt-1 block w-full rounded border border-gray-700 bg-gray-900 text-white px-3 py-2 focus:outline-none focus:border-indigo-500"></textarea>
    </label>

    <button type="submit"
            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded transition">
      Envoyer
    </button>
  </form>

</section>

<script>
  // Récupère le paramètre project dans l'URL
  const urlParams = new URLSearchParams(window.location.search);
  const projectName = urlParams.get('project');

  if(projectName) {
    const projectInput = document.getElementById('projectInput');
    projectInput.value = decodeURIComponent(projectName);
  }
</script>
@endsection
