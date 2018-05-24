@if($getPost->status == 1)
    <a href=""   id="{{$getPost->id}}" class="tipS"><img src="/images/posts/icons/accept.png" alt="" /></a>
@elseif($getPost->status == 0)
    <a href=""   id="{{$getPost->id}}" class="tipS"><img src="/images/posts/icons/exclamation.png" alt="" /></a>
@endif
