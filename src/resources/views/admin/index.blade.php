@extends('layouts.app')

@section('header')
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button class="header-button">logout</button>
</form>
@endsection


@section('content')
<h1>Admin</h1>
<form class="admin-search" action="{{ route('admin.search') }}">
    @csrf
    <input class="search-text" type="text" name="text" placeholder="名前やメールアドレスを入力してください">
    <select class="search-gender" type="text" name="gender">
        <option value="" hidden disabled selected>性別</option>
        <option value="">全て</option>
        @foreach($genders as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
    </select>
    <select class="search-category" name="category_id">
        <option value="" hidden disabled selected>お問い合わせの種類</option>
        @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->content }}</option>
        @endforeach
    </select>
    <input class="search-date" type="date" name="date">
    <button class="search-button">検索</button>
    <a href="{{ route('admin.reset') }}" class="reset-button">リセット</a>
</form>
<div class="admin-actions">
    <section class="export">エクスポート</section>
    <nav class="pagination">
        {{ $contacts->links() }}
    </nav>
</div>
<table>
    <tr class="table-title">
        <th class="admin-table-header">お名前</th>
        <th class="admin-table-header">性別</th>
        <th class="admin-table-header">メールアドレス</th>
        <th class="admin-table-header">お問い合わせの種類</th>
    </tr>
    @foreach($contacts as $contact)
    <tr class="table-contacts">
        <td class="admin-table-data">{{ $contact->last_name }}　{{ $contact->first_name }}</td>
        <td class="admin-table-data">
            {{ $genders[ $contact->gender ] }}
        </td>
        <td class="admin-table-data">{{ $contact->email }}</td>
        <td class="admin-table-data">{{ $contact->category->content }}</td>
        <td class="admin-table-data">
            <button class="modal-open"
                data-name="{{ $contact->last_name }}　{{ $contact->first_name }}"
                data-gender="{{ $genders[$contact->gender] }}"
                data-email="{{ $contact->email }}"
                data-tel="{{ $contact->tel }}"
                data-address="{{ $contact->address }}"
                data-building="{{ $contact->building }}"
                data-category="{{ $contact->category->content }}"
                data-detail="{{ $contact->detail }}"
                data-id="{{ $contact->id }}">
                詳細
            </button>

        </td>
    </tr>
    @endforeach
</table>
{{-- モーダル --}}
<div class="modal" id="modal">
    <button class="modal-close">✕</button>
    <table>
        <tr class="modal-row">
            <td class="modal-title">お名前</td>
            <td class="modal-data" id="modal-name"></td>
        </tr>
        <tr class="modal-row">
            <td class="modal-title">性別</td>
            <td class="modal-data" id="modal-gender"></td>
        </tr>
        <tr class="modal-row">
            <td class="modal-title">メールアドレス</td>
            <td class="modal-data" id="modal-email"></td>
        </tr>
        <tr class="modal-row">
            <td class="modal-title">電話番号</td>
            <td class="modal-data" id="modal-tel"></td>
        </tr>
        <tr class="modal-row">
            <td class="modal-title">住所</td>
            <td class="modal-data" id="modal-address"></td>
        </tr>
        <tr class="modal-row">
            <td class="modal-title">建物名</td>
            <td class="modal-data" id="modal-building"></td>
        </tr>
        <tr class="modal-row">
            <td class="modal-title">お問い合わせの種類</td>
            <td class="modal-data" id="modal-category"></td>
        </tr>
        <tr class="modal-row">
            <td class="modal-title">お問い合わせ内容</td>
            <td class="modal-data" id="modal-detail"></td>
        </tr>
    </table>
    <form action="" method="post" id="modal-delete">
        @csrf
        @method('DELETE')
        <button class="delete-button">削除</button>
    </form>
</div>
<style>
    .modal {
        display: none;
    }

    .modal.active {
        display: block;
    }
</style>
<script>
    document.querySelectorAll('.modal-open').forEach(function(button) {
        button.addEventListener('click', function() {
            const data = this.dataset;

            document.getElementById('modal-name').textContent = data.name;
            document.getElementById('modal-gender').textContent = data.gender;
            document.getElementById('modal-email').textContent = data.email;
            document.getElementById('modal-tel').textContent = data.tel;
            document.getElementById('modal-address').textContent = data.address;
            document.getElementById('modal-building').textContent = data.building;
            document.getElementById('modal-category').textContent = data.category;
            document.getElementById('modal-detail').textContent = data.detail;

            document.getElementById('modal-delete').action = '/delete/' + data.id;

            document.getElementById('modal').classList.add('active');
        });
    });

    document.querySelector('.modal-close').addEventListener('click', function() {
        document.getElementById('modal').classList.remove('active');
    });
</script>
@endsection