@extends('layouts.app')

@section('title', $article['title'])
@section('meta_description', Str::limit(strip_tags($article['excerpt'] ?? $article['content']), 155))
@section('meta_keywords', implode(', ', $article['tags'] ?? []))
@section('og_type', 'article')
@section('og_image', $article['thumbnail_url'])
@section('canonical', url('/ontopic/' . $article['slug']))

@section('schema')
    <script type="application/ld+json">
        <?php echo json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => $article['title'],
            'image' => $article['thumbnail_url'],
            'author' => [
                '@type' => 'Person',
                'name' => $article['author_name'] ?? 'Admin',
            ],
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'ACMI',
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => asset('assets/logo-acmi-new.svg'),
                ],
            ],
            'datePublished' => $article['published_at'],
            'dateModified' => $article['updated_at'] ?? $article['published_at'],
            'description' => Str::limit(strip_tags($article['excerpt'] ?? $article['content']), 155),
        ]); ?>
    </script>
@endsection

@section('content')
    <article class="max-w-4xl mx-auto px-4 py-12" data-aos="fade-up">

        {{-- Breadcrumbs --}}
        <nav class="text-sm text-gray-500 mb-4 font-poppins">
            <a href="/" class="hover:text-orange-500">Home</a> /
            <a href="/ontopic" class="hover:text-orange-500">On Topik</a> /
            <span class="text-gray-400">{{ Str::limit($article['title'], 20) }}</span>
        </nav>

        <header class="mb-8">
            <h1 class="text-4xl md:text-5xl font-extrabold font-poppins leading-tight mb-4">
                {{ $article['title'] }}
            </h1>
            <div class="flex items-center space-x-4 text-gray-600 dark:text-gray-400">
                <span class="flex items-center">
                    <i class="far fa-calendar-alt mr-2"></i>
                    {{ \Carbon\Carbon::parse($article['published_at'])->format('d M Y') }}
                </span>
                <span class="flex items-center">
                    <i class="far fa-user mr-2"></i>
                    {{ $article['author_name'] ?? 'Admin' }}
                </span>
            </div>
        </header>

        {{-- Featured Image --}}
        <div class="mb-10 overflow-hidden rounded-2xl shadow-2xl">
            <img src="{{ $article['thumbnail_url'] }}" alt="{{ $article['image_alt'] ?? $article['title'] }}"
                class="w-full h-auto object-cover animate-float">
        </div>

        {{-- Content Body --}}
        <div class="prose prose-lg dark:prose-invert max-w-none">
            {!! $article['content'] !!}
        </div>

        {{-- Tags --}}
        @if (!empty($article['tags']))
            <div class="mt-12 pt-6 border-t border-gray-200 dark:border-gray-800">
                <div class="flex flex-wrap gap-2">
                    @foreach ($article['tags'] as $tag)
                        <span class="px-3 py-1 bg-gray-100 dark:bg-gray-800 rounded-full text-sm">
                            #{{ $tag }}
                        </span>
                    @endforeach
                </div>
            </div>
        @endif

    </article>
@endsection
