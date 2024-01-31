<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Lesson Sample Site</title>
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/sp.css') }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="container">
    <div class="TitleBox">
        <h2>Memo-Real<br>アカウント作成フォーム</h2>
    </div>

    <div class="LoginForm">
        <form action="/CreateAccount" method="post" onsubmit="return validateForm()" class="form">
            @csrf <!-- CSRF保護 -->

            <div class="form-group">
                <label for="password">メールアドレス</label><br>
                <!-- 入力フィールドにクラスを追加 -->
                <input type="email" class="form-control input-field" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">パスワード</label><br>
                <!-- 入力フィールドにクラスを追加 -->
                <input type="password" class="form-control input-field" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="password">パスワード再確認</label><br>
                <!-- 入力フィールドにクラスを追加 -->
                <input type="password" class="form-control input-field" id="password-confirmation" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn btn-primary">アカウントを作成</button>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <a href ="/" class="CreateaccuntButton">戻る</a>
    </div>
</div>

</body>
</html>