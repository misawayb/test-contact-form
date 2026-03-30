<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>送信完了 | FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
</head>

<body>
    <p class="thanks-background">Thank you</p>
    <div class="thanks-content">
        <p class="thanks-message">お問い合わせありがとうございました</p>
        <a class="back-home" href="{{ route('contact.index') }}">HOME</a>
    </div>
</body>

</html>