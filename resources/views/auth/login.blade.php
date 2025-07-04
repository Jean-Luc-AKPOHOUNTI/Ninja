<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ninja Network</title>

    @vite('resources/css/app.css')

</head>
<html>
<div class="min-h-screen flex items-center justify-center py-12"
    style="background: url('{{ asset('login.jpg') }}') center center / cover no-repeat;">
    <div class="w-full max-w-md backdrop-blur-sm rounded-lg shadow-md px-8 py-8 mx-2">
        <h2 class="text-2xl font-semibold text-center text-white mb-8">Connexion</h2>

        @if ($errors->any())
            <div class="mb-4">
                <ul class="list-disc list-inside text-red-600 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="email" class="block text-white">Adresse e-mail</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="mt-1 block w-full rounded-md border-gray-300 focus:border-blue-600 focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label for="password" class="block text-white">Mot de passe</label>
                <input id="password" type="password" name="password" required
                    class="mt-1 block w-full rounded-md border-gray-300 focus:border-blue-600 focus:ring focus:ring-blue-200">
            </div>

            <div class="mt-6 text-center">
                <span class="text-white">Vous n’avez pas de compte ?</span>
                <a href="{{ route('register') }}" class="text-purple-600 hover:text-purple-800 underline font-semibold">
                    Créer un compte
                </a>
            </div>


            <div>
                <button type="submit"
                    class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded transition">
                    Se connecter
                </button>
            </div>
        </form>
    </div>
</div>

</html>
