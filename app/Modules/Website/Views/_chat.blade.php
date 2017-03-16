<div class="fixed-action-btn horizontal">
    <a class="btn-floating btn-large red">
        <i class="large material-icons">chat</i>
    </a>
</div>

<div id="form_chat">
    <form action="{{route('site.chat.store')}}" method="post">
        {{ csrf_field() }}
        <div class="row">
            <input type="text" name="name" placeholder="Your name" value="{{$visitor or ''}}">
        </div>
        <div class="row">
            <input type="text" name="email" placeholder="Your Email" value="{{$visitor or ''}}">
        </div>
        <div class="row">
            <input type="text" name="phone" placeholder="Your phone" value="{{$visitor or ''}}">
        </div>
        <div class="row">
            <button type="submit" class="btn btn-success" >Start</button>
        </div>
    </form>
</div>
