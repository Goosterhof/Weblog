@component('mail::message')
# News Update
---
<br>

@foreach ($newsPost  as $key)
  ![{{$key->media_name}}]({{ asset( 'images/' . $key->media_path ) }})

  # {{$key->title}}
  > {{ substr(strip_tags($key->body), 0, 750) }}.


  > [Continue Reading...]({{route('post.show', $key->id)}})

  <br>

  ---

@endforeach

Thanks,<br>
{{ config('app.name') }}
@endcomponent
