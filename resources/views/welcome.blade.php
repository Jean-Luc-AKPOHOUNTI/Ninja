<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ninja Network</title>

    @vite('resources/css/app.css')

</head>

<body class="">
    <div class="h-screen flex flex-col items-center justify-center"
        style="background: url('{{ asset('fondhome.jpg') }}') center center / cover no-repeat;">
        <div
            class="flex flex-col items-center justify-around backdrop-blur-sm shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full max-w-md h-56 text-center ">
            <h1 class="text-center text-white">Welcome to the Ninja Network</h1>
            <a href="/login"
                class="hover:bg-purple-900 hover:border-gray-600 w-24 py-2 inline-block text-white text-2xl bg-purple-300 rounded-lg">Start</a>
        </div>

    </div>
    {{-- <p>Click the button below to view the list of ninjas.</p>

  <a href="/ninjas" class="btn mt-4 inline-block">
    Find Ninjas!
  </a> --}}
</body>

</html>
