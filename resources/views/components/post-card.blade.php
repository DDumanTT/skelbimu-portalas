@props(['post'])

<div class="border m-2 rounded-2xl shadow-md transition hover:bg-gray-100">
    <a href="/post/{{ $post->id }}">
        <img src="{{ count($post->images()->get()) != 0 ? asset('/storage/' . $post->images()->first()->filepath) : asset('/storage/images/placeholder-image.png') }}" class="rounded-t-2xl border-b object-cover max-h-3xl" />
        <div class="p-5">
            <p class="text-xl break-words">
                {{ $post->title }}
            </p>
            <p class="text-gray-600 truncate ...">
                {{ $post->body }}
            </p>
            <p class="mt-2 border-t flex justify-end text-xs text-gray-500">
                {{ $post->created_at }}
            </p>
        </div>
    </a>
</div>
