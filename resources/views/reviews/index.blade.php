<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} — Відгуки</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#FDFDFC] text-[#1b1b18] p-6">
    <header class="max-w-5xl mx-auto mb-10">
        <h1 class="text-2xl font-semibold">Відгуки наших користувачів</h1>
        <p class="text-[#706f6c]">Додано {{ $stats['count'] }} відгуків, середня оцінка — {{ $stats['average'] }} ⭐</p>
    </header>

    <main class="max-w-5xl mx-auto grid gap-6 lg:grid-cols-[320px_1fr]">
        <aside class="bg-white border border-[#e3e3e0] rounded-lg p-4 shadow-sm space-y-3">
            <h2 class="font-medium">Рейтинг</h2>
            <p class="text-3xl font-semibold">{{ $stats['average'] }} ⭐</p>
            <ul class="text-sm space-y-1">
                @for ($i = 5; $i >= 1; $i--)
                    <li class="flex items-center justify-between">
                        <span>{{ $i }} ⭐</span>
                        <span>{{ $stats['distribution'][$i] }}</span>
                    </li>
                @endfor
            </ul>
        </aside>

        <section class="space-y-4">
            @forelse ($reviews as $review)
                <article class="bg-white border border-[#e3e3e0] rounded-lg p-4 shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="font-medium">{{ $review->author_name }}</p>
                            <p class="text-sm text-[#706f6c]">{{ $review->city }}</p>
                        </div>
                        <p class="text-sm font-medium">{{ $review->rating }} ⭐</p>
                    </div>
                    <p class="mt-2 text-sm leading-relaxed">{{ $review->text }}</p>
                    <p class="mt-2 text-xs text-[#706f6c]">Додано {{ $review->created_at->diffForHumans() }}</p>
                </article>
            @empty
                <p class="text-sm text-[#706f6c]">Опублікованих відгуків поки немає.</p>
            @endforelse

            <div>
                {{ $reviews->links() }}
            </div>
        </section>
    </main>
</body>
</html>
