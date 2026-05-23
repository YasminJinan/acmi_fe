<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="theme()" :class="{ 'dark': isDark }">

<head>
    
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    {{-- SEO Dinamis --}}
    @php
        $ogType = trim($__env->yieldContent('og_type')) ?: 'website';
        $canonical = trim($__env->yieldContent('canonical')) ?: url()->current();
    @endphp

    <title>@yield('title', 'ACMI')</title>
    <meta name="description" content="@yield('meta_description', 'ACMI (Asosiasi CEO Mastermind Indonesia) adalah wadah eksklusif bagi para pemimpin industri untuk berjejaring, belajar, dan tumbuh bersama melalui kolaborasi strategis.')">
    <meta name="keywords" content="@yield('meta_keywords', 'ACMI, Asosiasi CEO Mastermind Indonesia, komunitas CEO Indonesia, network pengusaha, mastermind bisnis')">
    <meta name="robots" content="@yield('meta_robots', 'index, follow')">
    <link rel="canonical" href="{{ $canonical }}">
 {{-- Favicon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/favicon.png') }}">
    
    <meta property="og:type" content="{{ $ogType }}">
    <meta property="og:title" content="@yield('title', 'ACMI')">
    <meta property="og:description" content="@yield('meta_description', 'ACMI (Asosiasi CEO Mastermind Indonesia) adalah wadah eksklusif bagi para pemimpin industri untuk berjejaring, belajar, dan tumbuh bersama melalui kolaborasi strategis.')">
    <meta property="og:url" content="{{ $canonical }}">
    {{-- KALAU WEB NYA SDH FIX --}}
    <meta property="og:image" content="@yield('og_image', asset('images/OG-ACMI.png'))">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:site_name" content="ACMI">
    <meta property="og:locale" content="id_ID">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'ACMI')">
    <meta name="twitter:description" content="@yield('meta_description', 'ACMI (Asosiasi CEO Mastermind Indonesia) adalah wadah eksklusif bagi para pemimpin industri untuk berjejaring, belajar, dan tumbuh bersama melalui kolaborasi strategis.')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/OG-ACMI.png'))">
    <meta name="twitter:site" content="@{{ 'ACMI_Indonesia' }}">

    {{-- Schema JSON-LD --}}
    @verbatim
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "Asosiasi CEO Mastermind Indonesia",
      "alternateName": "ACMI",
      "url": "{{ config('app.url') }}",
      "logo": "{{ asset('logo-acmi-new') }}",
      "description": "ACMI (Asosiasi CEO Mastermind Indonesia) adalah wadah eksklusif bagi para pemimpin industri untuk berjejaring, belajar, dan tumbuh bersama melalui kolaborasi strategis."
    }
    </script>
    @endverbatim

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    {{-- Dark Mode Anti-Flicker --}}
    <script>
        function theme() {
            return {
                isDark: localStorage.getItem('theme') === 'dark' ||
                    (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches),
                toggle() {
                    this.isDark = !this.isDark;
                    localStorage.setItem('theme', this.isDark ? 'dark' : 'light');
                }
            }
        }
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>

    <script src="https://cdn.tailwindcss.com?plugins=typography"></script>
    <script>
        tailwind.config = {
            darkMode: 'class'
        }
    </script>
    <script src="//unpkg.com/alpinejs" defer></script>

    @verbatim
    <style>
        .font-poppins {
            font-family: 'Poppins', sans-serif;
        }

        body {
            transition: background-color 0.3s ease;
        }

        @keyframes bounce-slow {
            0%,
            100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        .animate-bounce-slow {
            animation: bounce-slow 3s ease-in-out infinite;
        }

        @keyframes float-slow {
            0% {
                transform: translateY(0px) scale(1.05);
            }
            50% {
                transform: translateY(-20px) scale(1.1);
            }
            100% {
                transform: translateY(0px) scale(1.05);
            }
        }

        .animate-float {
            animation: float-slow 12s ease-in-out infinite;
        }
    </style>
    @endverbatim
</head>

<body class="bg-white dark:bg-[#0a0a0b] text-gray-900 dark:text-gray-100 flex flex-col min-h-screen">
    <x-navbar />
    <main class="flex-grow">
        @yield('content')
    </main>
    <x-footer />

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>

    @stack('scripts')
</body>

</html>