@if($message->status == 0)
    {{ $message->name }}<span class="label label-primary">New</span>
    @else
    {{ $message->name }}
@endif
