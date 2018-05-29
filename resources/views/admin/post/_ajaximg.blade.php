@if($post->status == App\Post::ENABLE)
    <a href=""   id="{{$post->id}}" class="tipS"><img src="{{asset('images/posts/icons/accept.png')}}" alt="" /></a>
@elseif($post->status == App\Post::DISABLE)
    <a href=""   id="{{$post->id}}" class="tipS"><img src="{{asset('images/posts/icons/exclamation.png')}}" alt="" /></a>
@endif
