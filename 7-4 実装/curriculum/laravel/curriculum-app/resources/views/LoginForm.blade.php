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
        <h2>Memo-Real<br>ログイン用フォーム</h2>
    </div>

    <div class="LoginForm">
        <form action="/Login" method="post"class="form">
            @csrf

            <div class="form-group">
                <label for="email">アカウントID(メールアドレス)</label><br>
                <input type="email" class="form-control input-field" id="email" name="email" autocomplete="email" required>
            </div>

            <div class="form-group">
                <label for="password">パスワード</label><br>
                <input type="password" class="form-control input-field" id="password" name="password" autocomplete="current-password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
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
        <a href ="/CreateAccountForm" class="CreateaccuntButton">アカウント新規作成はこちら</a>
    </div>
</div>

</body>
</html>
