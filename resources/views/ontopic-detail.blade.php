@extends('layouts.app')

{{-- SEO & META TAGS --}}
@section('title', $article['title'] ?? 'On Topik')
@section('meta_description', Str::limit(strip_tags($article['content'] ?? ''), 155))
@section('meta_keywords', implode(', ', $article['tags'] ?? ['ACMI', 'Bisnis', 'CEO']))
@section('og_type', 'article')
@section('canonical', url()->current())

{{-- Ini og_image yang benar --}}
@section('og_image', $article['og_image_url'] ?? $article['thumbnail_url'] ?? asset('assets/logo-acmi-new.svg'))

{{-- Ini section schema yang tadi hilang, kita kembalikan ya --}}
@section('schema')
    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => $article['title'] ?? 'Artikel',
            'image' => $article['thumbnail_url'] ?? asset('assets/logo-acmi-new.svg'),
            'author' => [
                '@type' => 'Person',
                'name' => $article['author'] ?? 'Admin ACMI',
            ],
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'ACMI',
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => asset('assets/logo-acmi-new.svg'),
                ],
            ],
            'datePublished' => $article['published_at'] ?? now()->toIso8601String(),
            'description' => Str::limit(strip_tags($article['content'] ?? ''), 155),
        ]) !!}
    </script>
@endsection

@section('content')
    <article class="max-w-4xl mx-auto px-4 py-32" data-aos="fade-up">

        {{-- Breadcrumbs --}}
        <nav class="text-sm text-gray-500 mb-6 font-poppins">
            <a href="/" class="hover:text-orange-500 transition-colors">Home</a> /
            <a href="/ontopic" class="hover:text-orange-500 transition-colors">On Topik</a> /
            <span class="text-gray-400">{{ Str::limit($article['title'] ?? 'Detail', 30) }}</span>
        </nav>

        <header class="mb-8">
            <h1 class="text-4xl md:text-5xl font-extrabold font-poppins leading-tight mb-6 text-slate-900 dark:text-white">
                {{ $article['title'] ?? 'Judul Tidak Tersedia' }}
            </h1>
            <div class="flex items-center space-x-4 text-gray-600 dark:text-gray-400 text-sm md:text-base">
                <span class="flex items-center">
                    <i class="far fa-calendar-alt mr-2 text-orange-500"></i>
                    {{-- Ini sudah Karisa ganti pakai published_at --}}
                    {{ !empty($article['published_at']) ? \Carbon\Carbon::parse($article['published_at'])->format('d M Y') : '-' }}
                </span>
                <span class="flex items-center">
                    <i class="far fa-user mr-2 text-orange-500"></i>
                    {{ $article['author'] ?? 'Admin ACMI' }}
                </span>
            </div>
        </header>

        {{-- Featured Image --}}
        @if(!empty($article['thumbnail_url']))
        <div class="mb-12 overflow-hidden rounded-3xl shadow-xl">
            <img src="{{ $article['thumbnail_url'] }}" alt="{{ $article['image_alt'] ?? $article['title'] }}"
                class="w-full h-[400px] md:h-[500px] object-cover hover:scale-105 transition-transform duration-700">
        </div>
        @endif

        {{-- Content Body --}}
        <div class="prose prose-lg dark:prose-invert prose-orange max-w-none font-poppins">
            {!! $article['content'] ?? '<p>Konten tidak tersedia.</p>' !!}
        </div>

        {{-- Tags --}}
        @if (!empty($article['tags']) && is_array($article['tags']))
            <div class="mt-16 pt-8 border-t border-gray-200 dark:border-gray-800">
                <div class="flex flex-wrap gap-3">
                    @foreach ($article['tags'] as $tag)
                        <span class="px-4 py-1.5 bg-orange-50 dark:bg-orange-500/10 text-orange-600 dark:text-orange-400 rounded-full text-sm font-semibold border border-orange-100 dark:border-orange-500/20">
                            #{{ $tag }}
                        </span>
                    @endforeach
                </div>
            </div>
        @endif

    </article>
@endsection