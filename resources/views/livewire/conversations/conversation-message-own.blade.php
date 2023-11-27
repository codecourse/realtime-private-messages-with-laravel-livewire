<div class="d-flex mb-2 justify-content-end">
    <div>
        <img src="{{ $message->user->present()->avatar }}" alt="{{ $message->user->name }}" style="width: 35px;" class="rounded-circle mr-2">
    </div>
    <div>
        <div class="bg-primary text-light p-2 rounded">
            {{ $message->body }}
        </div>
        <span class="text-muted" style="font-size: 0.8rem;">
            {{ $message->user->present()->name }}
        </span>
    </div>
</div>