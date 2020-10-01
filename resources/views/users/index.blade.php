@extends('layouts.app')

@section('content')
    {{-- ユーザー一覧、他ページでも活用する --}}
    @include('users.users')
@endsection