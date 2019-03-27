@component('mail::message')
# Someone commented your post! ({{ $comment->post->title }})

{{ $comment->post->name }}

{{ $comment->author->username }}

{{ $comment->comment }}

@component('mail::button', ['url' => 'localhost:3000/posts/' . $comment->post->id])
Read
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
