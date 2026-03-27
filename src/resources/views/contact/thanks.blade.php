<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせフォーム</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
</head>

<body>
    <p class="thanks-background">Thank you</p>
    <p class="thanks-message">お問い合わせありがとうございました</p>
    <a class="back-home" href="{{ route('contact.index') }}">HOME</a>
</body>

</html>