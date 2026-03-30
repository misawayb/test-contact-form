@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('header')
<a href="{{ route('login') }}" class="header-button">Login</a>
@endsection

@section('content')
<h1>Register</h1>
<div class="card-register">
    <form action="/register" method="post">
        @csrf
        <div class="auth-field">
            <label class="auth-title" for="name">お名前</label>
            <input class="auth-input" type="text" name="name" value="{{ old('name') }}" placeholder="例 山田 太郎">
            <p class="error-message">@error('name'){{ $message }}@enderror</p>
        </div>
        <div class="auth-field">
            <label class="auth-title" for="email">メールアドレス</label>
            <input class="auth-input" type="text" name="email" value="{{ old('email') }}" placeholder="例 test@example.com">
            <p class="error-message">@error('email'){{ $message }}@enderror</p>
        </div>
        <div class="auth-field">
            <label class="auth-title" for="password">パスワード</label>
            <input class="auth-input" type="password" name="password" value="{{ old('password') }}" placeholder="例 coachtech1106">
            <p class="error-message">@error('password'){{ $message }}@enderror</p>
        </div>
        <button class="auth-button">登録</button>
    </form>
</div>
@endsection