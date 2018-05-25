@if($post->status == 1)
    <a href=""   id="{{$post->id}}" class="tipS"><img src="/images/posts/icons/accept.png" alt="" /></a>
@elseif($post->status == 0)
    <a href=""   id="{{$post->id}}" class="tipS"><img src="/images/posts/icons/exclamation.png" alt="" /></a>
@endif
