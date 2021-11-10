@props(['message'])

<div class="border m-1 rounded-xl shadow-md">
    <div class="p-5">
        <p class="text-xs text-gray-500">
            {{ $message->created_at }}
        </p>
        <p class="text-xl border-b">
            {{ $message->user->name }} {{ $message->user->surname }}
        </p>
        <p class="mt-2 break-words">
            {{ $message->text }}
        </p>
    </div>
</div>
