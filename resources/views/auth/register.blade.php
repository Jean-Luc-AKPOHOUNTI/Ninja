<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ninja Network</title>

    @vite('resources/css/app.css')

</head>
<html>
<div class="min-h-screen flex items-center justify-center bg-gray-100 py-12"
    style="background: url('{{ asset('sign.jpg') }}') center center / cover no-repeat;">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md px-8 py-8 mx-2">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-8">Créer un compte</h2>

        @if ($errors->any())
            <div class="mb-4">
                <ul class="list-disc list-inside text-red-600 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.submit') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block text-gray-700">Nom</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                    class="mt-1 block w-full rounded-md bg-blue-50 border-gray-300 focus:border-blue-600 focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label for="email" class="block text-gray-700">Adresse e-mail</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    class="mt-1 block w-full rounded-md bg-blue-50 border-gray-300 focus:border-blue-600 focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label for="password" class="block text-gray-700">Mot de passe</label>
                <input id="password" type="password" name="password" required
                    class="mt-1 block w-full rounded-md bg-blue-50 border-gray-300 focus:border-blue-600 focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label for="password_confirmation" class="block text-gray-700">Confirmer le mot de passe</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    class="mt-1 block w-full rounded-md bg-blue-50 border-gray-300 focus:border-blue-600 focus:ring focus:ring-blue-200">
            </div>

            <div>
                <button type="submit"
                    class="w-full py-2 px-4 bg-green-600 hover:bg-green-700 text-white font-semibold rounded transition">
                    S’inscrire
                </button>
            </div>
        </form>

        <!-- Lien vers la connexion -->
        <div class="mt-6 text-center">
            <span class="text-gray-600">Déjà inscrit ?</span>
            <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 underline font-semibold">
                Se connecter
            </a>
        </div>
    </div>
</div>

</html>
