@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<h1>Contact</h1>
<form action="{{ route('contact.confirm') }}" method="post">
    @csrf
    <div class="contact-row">
        <div class="contact-label">
            <span class="contact-title">お名前</span>
            <span class="required">※</span>
        </div>
        <div class="contact-input">
            <div class="contact-name">
                <label for="first_name" class="visually-hidden">姓</label>
                <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $contact['first_name'] ?? '') }}" placeholder="例 山田">
                <label for="last_name" class="visually-hidden">名</label>
                <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $contact['last_name'] ?? '') }}" placeholder="例 太郎">
            </div>
            <p class="error-message"></p>
        </div>
    </div>
    <div class="contact-row">
        <div class="contact-label">
            <span class="contact-title">性別</span>
            <span class="required">※</span>
        </div>
        <div class="contact-input">
            <div class="contact-gender">
                <input type="radio" name="gender" id="gender-male" value="1">
                <label for="gender-male">男性</label>
                <input type="radio" name="gender" id="gender-female" value="2">
                <label for="gender-female">女性</label>
                <input type="radio" name="gender" id="gender-other" value="3">
                <label for="gender-other">その他</label>
            </div>
            <p class="error-message"></p>
        </div>
    </div>
    <div class="contact-row">
        <div class="contact-label">
            <label class="contact-title" for="email">メールアドレス</label>
            <span class="required">※</span>
        </div>
        <div class="contact-input">
            <input type="email" name="email" id="email" value="{{ old('email', $contact['email'] ?? '') }}" placeholder="test@example.com">
            <p class="error-message"></p>
        </div>
    </div>
    <div class="contact-row">
        <div class="contact-label">
            <span class="contact-title">電話番号</span>
            <span class="required">※</span>
        </div>
        <div class="contact-input">
            <div class="contact-tel">
                <input class="tel-input" type="text" name="tel_1" placeholder="080">
                <span>-</span>
                <input class="tel-input" type="text" name="tel_2" placeholder="1234">
                <span>-</span>
                <input class="tel-input" type="text" name="tel_3" placeholder="5678">
            </div>
            <p class="error-message"></p>
        </div>
    </div>
    <div class="contact-row">
        <div class="contact-label">
            <label class="contact-title" for="address">住所</label>
            <span class="required">※</span>
        </div>
        <div class="contact-input">
            <input type="text" name="address" id="address" value="{{ old('address', $contact['address'] ?? '') }}" placeholder="例 東京都渋谷区千駄ヶ谷1-2-3">
            <p class="error-message"></p>
        </div>
    </div>
    <div class="contact-row">
        <div class="contact-label">
            <label class="contact-title" for="building">建物名</label>
        </div>
        <div class="contact-input">
            <input type="text" name="building" id="building" value="{{ old('building', $contact['building'] ?? '') }}" placeholder="例 千駄ヶ谷マンション102">
            <p class="error-message"></p>
        </div>
    </div>
    <div class="contact-row">
        <div class="contact-label">
            <label class="contact-title" for="category">お問い合わせの種類</label>
            <span class="required">※</span>
        </div>
        <div class="contact-input">
            <select class="contact-category" name="category_id" id="category">
                <option value="" hidden disabled selected>選択してください</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->content }}</option>
                @endforeach
            </select>
            <p class="error-message"></p>
        </div>
    </div>
    <div class="contact-row">
        <div class="contact-label">
            <label class="contact-title" for="contact-detail">お問い合わせ内容</label>
            <span class="required">※</span>
        </div>
        <div class="contact-input">
            <textarea class="contact-detail" name="detail" id="contact-detail" placeholder="お問い合わせ内容をご記載ください"></textarea>
            <p class="error-message"></p>
        </div>
    </div>
    <button class="confirm">確認画面</button>
</form>
@endsection