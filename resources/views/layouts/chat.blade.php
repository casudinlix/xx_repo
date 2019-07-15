@php
  $users = \App\User::where('id', '!=', Auth::id())->limit(10)->get();
@endphp
 <div class="had-container ">
    <div class="card card_main p-fixed users-main">
        <div class="user-box">
            <div class="card-block">
                <div class="right-icon-control">
                    <input type="text" class="form-control  search-text" placeholder="Search Friend" id="search-friends">
                    <div class="form-icon">
                        <i class="icofont icofont-search"></i>
                    </div>
                </div>
            </div>
            <div class="main-friend-list">
              @foreach ($users as $key)
                <div class="media userlist-box" data-id="{{$key->id}}" data-status="online" data-username="{{$key->name}}" data-toggle="tooltip" data-placement="left" title="{{$key->name}}" >
                    <a class="media-left" href="javascript:">

                    @if ($key->avatar=' ')
                      <img class="media-object img-circle" src="{{asset('assets/images/avatar-1.png')}}" alt="Generic placeholder image" data-avatar="{{asset('assets/images/avatar-1.png')}}">

                    @else
                      <img class="media-object img-circle" src="{{asset('storage/avatars/')}}/{{$key->avatar}}" alt="Generic placeholder image" data-avatar="{{asset('assets/images/avatar-1.png')}}">

                    @endif


                        <div class="live-status bg-success">{{$key->avatar}}</div>
                    </a>
                    <div class="media-body">
                        <div class="f-13 chat-header">{{$key->name}}</div>
                    </div>
                </div>
              @endforeach


            </div>
        </div>
    </div>
</div>



<script>

</script>
