<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ninja Network</title>

  @vite('resources/css/app.css')
</head>
<body>
  @if (session('success'))
    <div id="flash" class="p-4 text-center bg-green-50 text-green-500 font-bold">
      {{ session('success') }}
    </div>
  @endif
  
<header class="bg-white shadow">
    <nav class="container mx-auto flex items-center justify-between py-4 px-6">
        <h1>
            <a href="{{ route('ninjas.index') }}" class="text-2xl font-bold text-red-700 hover:text-blue-900 transition">
                Ninja Network
            </a>
        </h1>
        <div class="flex items-center justify-center space-x-4">
            <a href="{{ route('ninjas.create') }}"
               class="text-blue-600 hover:text-blue-800 font-semibold px-3 py-2 transition rounded hover:bg-blue-50"
            >
                Create New Ninja
            </a>
            <form action="{{ route('logout') }}" method="POST" class="">
                @csrf
                <button
                    type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded transition focus:outline-none focus:ring-2 focus:ring-red-400"
                >
                    Déconnexion
                </button>
            </form>
        </div>
    </nav>
</header>


  <main class="container"> 
  {{-- style="background: url('{{ asset('index.jpg') }}') center center / cover no-repeat;"--}}
    {{ $slot }}
  </main>

</body>
</html>