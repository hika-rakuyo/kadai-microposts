@if (Auth::user()->in_favorites($micropost->id))
    {{-- お気に入り解除ボタンのフォーム --}}
    {!! Form::open(['route' => ['micropost.unfavorite', $micropost->id], 'method' => 'delete']) !!}
        {!! Form::submit('Unfavorite', ['class' => "btn btn-light btn-sm"]) !!}
    {!! Form::close() !!}
@else
    {{-- お気に入り追加ボタンのフォーム --}}
    {!! Form::open(['route' => ['micropost.favorite', $micropost->id]]) !!}
        {!! Form::submit('Favorite', ['class' => "btn btn-success btn-sm"]) !!}
    {!! Form::close() !!}
@endif