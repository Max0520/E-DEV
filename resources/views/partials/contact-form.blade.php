<section class="relative py-20 bg-gray-900 text-white">
    <!-- Background Image -->
    <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image: url('{{ asset('images/contact-bg.jpg') }}');"></div>
    <div class="absolute inset-0 bg-black bg-opacity-70"></div>

    <div class="relative max-w-6xl mx-auto px-6 flex flex-col md:flex-row justify-between items-start gap-12">

        <!-- Texte d'introduction -->
        <div class="md:w-1/2">
            <h3 class="text-4xl font-extrabold mb-4">Parlons <span class="text-indigo-500">ensemble</span></h3>
            <p class="text-lg text-gray-300 mb-6 leading-relaxed">
                Que vous ayez une question, un projet ou simplement envie de discuter technologie, E‑DEV est à votre écoute.
                Remplissez le formulaire et nous vous répondrons rapidement.
            </p>
            <ul class="text-sm text-gray-400 space-y-2 mt-4">
                <li><strong>Email :</strong> edevteamofficial@gmail.com</li>
                <li><strong>Téléphone :</strong> +261 34 98 786 42</li>
                <li><strong>Adresse :</strong> Antananarivo, Madagascar</li>
            </ul>
        </div>

        <!-- Formulaire -->
        <div class="md:w-1/2 w-full">
            <form action="/contact" method="POST" class="bg-gray-800 bg-opacity-90 p-8 rounded-3xl shadow-lg backdrop-blur-sm">
                @csrf

                <div class="mb-5">
                    <label for="name" class="block mb-2 font-semibold">Nom complet</label>
                    <input type="text" id="name" name="name" required
                           class="w-full px-4 py-3 rounded-lg bg-gray-700 border border-gray-600 text-white placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 transition"
                           placeholder="Votre nom">
                </div>

                <div class="mb-5">
                    <label for="email" class="block mb-2 font-semibold">Email</label>
                    <input type="email" id="email" name="email" required
                           class="w-full px-4 py-3 rounded-lg bg-gray-700 border border-gray-600 text-white placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 transition"
                           placeholder="Votre Adresse Email">
                </div>

                <div class="mb-5">
                    <label for="message" class="block mb-2 font-semibold">Message</label>
                    <textarea id="message" name="message" rows="5" required
                              class="w-full px-4 py-3 rounded-lg bg-gray-700 border border-gray-600 text-white placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 transition"
                              placeholder="Expliquez-nous votre besoin..."></textarea>
                </div>

                <button type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3 rounded-full font-semibold text-lg transition shadow-lg hover:shadow-indigo-500/50">
                    Envoyer le message
                </button>
            </form>
        </div>
    </div>
</section>
