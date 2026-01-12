<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $schoolSettings?->school_name ?? config('app.name', 'School') }} - Login</title>

    <!-- Favicon -->
    @if($schoolSettings?->favicon)
        <link rel="icon" href="{{ $schoolSettings->favicon_url }}" />
    @else
        <link rel="icon" href="{{ asset('single-logo-midh.png') }}" />
    @endif

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800">
        <!-- Logo & School Name -->
        <div class="mb-6 text-center">
            <a href="/" class="inline-block">
                @if($schoolSettings?->logo)
                    <img src="{{ $schoolSettings->logo_url }}" 
                         alt="{{ $schoolSettings->school_name }}" 
                         class="w-24 h-24 mx-auto object-contain" />
                @else
                    <img src="{{ asset('logo-midh.png') }}" 
                         alt="Logo" 
                         class="w-60 h-auto mx-auto" />
                @endif
            </a>
            @if($schoolSettings?->school_name)
                <h1 class="mt-4 text-xl font-bold text-gray-800 dark:text-white">
                    {{ $schoolSettings->school_name }}
                </h1>
            @endif
            @if($schoolSettings?->npsn || $schoolSettings?->nsm)
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                    @if($schoolSettings->npsn)
                        NPSN: {{ $schoolSettings->npsn }}
                    @endif
                    @if($schoolSettings->npsn && $schoolSettings->nsm)
                        |
                    @endif
                    @if($schoolSettings->nsm)
                        NSM: {{ $schoolSettings->nsm }}
                    @endif
                </p>
            @endif
        </div>

        <!-- Login Card -->
        <div class="w-full sm:max-w-md px-6 py-8 bg-white dark:bg-gray-800 shadow-xl rounded-xl border border-gray-100 dark:border-gray-700">
            {{ $slot }}
        </div>

        <!-- Footer -->
        <div class="mt-6 text-center text-sm text-gray-500 dark:text-gray-400">
            @if($schoolSettings?->address)
                <p class="mb-1">{{ $schoolSettings->address }}</p>
            @endif
            @if($schoolSettings?->email || $schoolSettings?->website)
                <p>
                    @if($schoolSettings->email)
                        <a href="mailto:{{ $schoolSettings->email }}" class="hover:text-blue-600 transition">
                            {{ $schoolSettings->email }}
                        </a>
                    @endif
                    @if($schoolSettings->email && $schoolSettings->website)
                        |
                    @endif
                    @if($schoolSettings->website)
                        <a href="{{ $schoolSettings->website }}" target="_blank" class="hover:text-blue-600 transition">
                            {{ $schoolSettings->website }}
                        </a>
                    @endif
                </p>
            @endif
        </div>
    </div>
</body>

</html>
