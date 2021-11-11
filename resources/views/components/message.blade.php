@props(['message'])

<div class="border m-1 rounded-xl shadow-md">
    <div class="p-5">
        <div class="border-b inline-flex w-full justify-between">
            <p class="text-xl ">
                {{ $message->user->name }} {{ $message->user->surname }}
            </p>
            <p class="text-xs text-gray-500">
                {{ $message->created_at }}
            </p>
        </div>
        <p class="mt-2 break-words">
            {{ $message->text }}
        </p>
    </div>
</div>
