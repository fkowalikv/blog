@component('mail::message')
# You posted on your blog!

{{ $post->name }}

@component('mail::button', ['url' => 'localhost:3000/posts/' . $post->id])
Read
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
