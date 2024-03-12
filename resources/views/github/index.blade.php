@extends('layouts.app')
@section('body')
<div class="row">
    <div class="col-md-12">
        @if ($user)
        <div class="d-flex justify-content-between">
           <h2>{{ $user['login'] }}</h2>
           <a href="/" class="btn-sm text-decoration-none">< Go Back</a>
        </div>
        <p>Follower count: {{ $user['followers'] }}</p>
        <div id="followers-list" class="d-flex flex-wrap">
            @foreach ($followers as $follower)
            <div class="mx-2"><img src="{{ $follower['avatar_url'] }}" alt="{{ $follower['login'] }}" width="100"></div>
            @endforeach
        </div>
        <button id="load-more" class="mt-4 btn-success">Load More</button>

        @endif
    </div>
</div>



@endsection

@section('scripts')
<script>

    $('#load-more').on('click', function(){
        let currentPage = 1;
        let username = $('h2').text();
        $.ajax({
                url: "followers/"+username,
                type: 'GET',
                data:'_token = <?php echo csrf_token() ?>',
                success: function(data) {
                    console.log(data);
                    data.forEach(follower => {
                        $('#followers-list').append(`<div><img src="${follower.avatar_url}" alt="${follower.login}" width="100"></div>`);
                        currentPage++;
                    });
                }
            });
    });
</script>

@endsection
