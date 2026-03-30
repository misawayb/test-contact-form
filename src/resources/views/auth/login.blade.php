@extends('layouts.app')

@section('title')
管理者ログイン
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('header')
<a href="{{ route('register') }}" class="header-button">register</a>
@endsection

@section('content')
<h1>Login</h1>
<div class="auth-card">
    <form action="/login" method="post">
        @csrf
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
        <button class="auth-button">ログイン</button>
    </form>
</div>
@endsection