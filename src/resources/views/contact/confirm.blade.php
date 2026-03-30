@extends('layouts.app')

@section('title')
お問い合わせ確認
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<h1>Confirm</h1>
<form action="{{ route('contact.store') }}" method="post">
    @csrf
    <table>
        <tr class="table-row">
            <td class="table-title">お名前</td>
            <td class="table-data">{{ $contact['last_name'] }} {{ $contact['first_name'] }}</td>
        </tr>
        <tr class="table-row">
            <td class="table-title">性別</td>
            <td class="table-data">{{ $genders[$contact['gender']] }}</td>
        </tr>
        <tr class="table-row">
            <td class="table-title">メールアドレス</td>
            <td class="table-data">{{ $contact['email'] }}</td>
        </tr>
        <tr class="table-row">
            <td class="table-title">電話番号</td>
            <td class="table-data">{{ $tel }}</td>
        </tr>
        <tr class="table-row">
            <td class="table-title">住所</td>
            <td class="table-data">{{ $contact['address'] }}</td>
        </tr>
        <tr class="table-row">
            <td class="table-title">建物名</td>
            <td class="table-data">{{ $contact['building'] }}</td>
        </tr>
        <tr class="table-row">
            <td class="table-title">お問い合わせの種類</td>
            <td class="table-data">{{ $category->content }}</td>
        </tr>
        <tr class="table-row">
            <td class="table-title">お問い合わせ内容</td>
            <td class="table-data">{{ $contact['detail'] }}</td>
        </tr>
    </table>
    <div class="buttons">
        <input class="submit" type="submit" value="送信">
        <a class="back" href="{{ route('contact.back') }}">修正</a>
    </div>
</form>
@endsection