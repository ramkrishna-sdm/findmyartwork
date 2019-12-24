@if($type == "like")
<ul>
    @if(count($result) > 0)
        @foreach($result as $key => $value)
            @foreach($value->artwork_like as $keyz => $user)
                <li><a href="{{url('profile_details')}}/{{$user->users->id}}">{{$user->users->first_name}} {{$user->users->last_name}}</a> Liked <a href="{{url('artwork_details')}}/{{$value->id}}">{{$value->title}}</a>.</li>
            @endforeach
        @endforeach
    @else
    <li>No Likes Found</li>
    @endif
</ul>
@endif

@if($type == "followers")
    @if(count($result) > 0)
        @foreach($result as $keyz => $user)
            <li><a href="{{url('profile_details')}}/{{$user->users->id}}">{{$user->users->first_name}} {{$user->users->last_name}}</a> is following you.</li>
        @endforeach
    @else
    <li>No Follower Found</li>
    @endif
@endif

@if($type == "follow")
    @if(count($result) > 0)
        @foreach($result as $keyz => $user)
            <li>You are following <a href="{{url('profile_details')}}/{{$user->artist->id}}">{{$user->artist->first_name}} {{$user->artist->last_name}}</a>.</li>
        @endforeach
    @else
    <li>You are no Following anyone</li>
    @endif
@endif