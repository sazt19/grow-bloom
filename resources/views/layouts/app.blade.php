

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('app.name') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <nav class="bg-green-700 text-white px-6 py-4">
        <div class="max-w-5xl mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-xl font-bold">
                {{ __('app.name') }}
            </a>
            <div class="flex gap-4">
                <a href="{{ route('plants.index') }}" class="hover:underline">
                    {{ __('app.nav.plants') }}
                </a>
                <a href="{{ route('services.index') }}" class="hover:underline">
                    {{ __('app.nav.services') }}
                </a>
            </div>
        </div>
    </nav>

    <main class="max-w-5xl mx-auto mt-8 px-6">
        @yield('content')
    </main>

    <footer class="text-center text-sm text-gray-400 mt-16 pb-6">
        {{ __('app.footer') }}
    </footer>

</body>
</html>