@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<h1>Confirm</h1>
<form action="{{ route('contact.store') }}" method="post">
    @csrf
    <table>
        <tr class="table-row">
            <th class="table-title">お名前</th>
            <td class="table-input">{{ $contact['first_name'] }} {{ $contact['last_name'] }}</td>
        </tr>
        <tr class="table-row">
            <th class="table-title">性別</th>
            <td class="table-input">{{ $genders[$contact['gender']] }}</td>
        </tr>
        <tr class="table-row">
            <th class="table-title">メールアドレス</th>
            <td class="table-input">{{ $contact['email'] }}</td>
        </tr>
        <tr class="table-row">
            <th class="table-title">電話番号</th>
            <td class="table-input">{{ $contact['tel'] }}</td>
        </tr>
        <tr class="table-row">
            <th class="table-title">住所</th>
            <td class="table-input">{{ $contact['address'] }}</td>
        </tr>
        <tr class="table-row">
            <th class="table-title">建物名</th>
            <td class="table-input">{{ $contact['building'] }}</td>
        </tr>
        <tr class="table-row">
            <th class="table-title">お問い合わせの種類</th>
            <td class="table-input">{{ $category->content }}</td>
        </tr>
        <tr class="table-row">
            <th class="table-title">お問い合わせ内容</th>
            <td class="table-input">{{ $contact['detail'] }}</td>
        </tr>
    </table>
    <div class="buttons">
        <input class="submit" type="submit">
        <a class="back" href="{{ route('contact.back') }}">修正</a>
    </div>
</form>
@endsection