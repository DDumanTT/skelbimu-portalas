@props(['post'])

<div class="border m-2 rounded-2xl shadow-md transition hover:bg-gray-100">
    <a href="/post/{{ $post->id }}">
        <img src="{{ $post->img_path ? asset('/storage/img/$post->img_path[0]') : asset('/storage/img/placeholder-image.png') }}" />
        <div class="p-5">
            <p class="text-xl">
                {{ $post->title }}
            </p>
            <p class="truncate ...">
                {{ $post->body }}
            </p>
        </div>
    </a>
</div>
