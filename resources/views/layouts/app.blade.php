<!DOCTYPE html>
<html 
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    x-data="theme()" 
    :class="{ 'dark': isDark }"
>
<head>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
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

        // Inline check untuk cegah layar putih sesaat
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { darkMode: 'class' }
    </script>
    
    <script src="//unpkg.com/alpinejs" defer></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        .font-poppins { font-family: 'Poppins', sans-serif; }
        body { transition: background-color 0.3s ease; }

        @keyframes bounce-slow {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}
.animate-bounce-slow {
    animation: bounce-slow 3s ease-in-out infinite;
}

@keyframes float-slow {
    0% { transform: translateY(0px) scale(1.05); }
    50% { transform: translateY(-20px) scale(1.1); }
    100% { transform: translateY(0px) scale(1.05); }
}

.animate-float {
    animation: float-slow 12s ease-in-out infinite;
}
    </style>
</head>

<body class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 flex flex-col min-h-screen">
    <x-navbar />
    <main class="flex-grow">@yield('content')</main>
    <x-footer />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 1000, // Durasi animasi (ms)
    once: true,     // Animasi cuma jalan sekali pas di-scroll
  });
</script>
</body>
</html>