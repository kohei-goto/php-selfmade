<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Memo Function - MemoReal</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sp.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="Memo-container">

        <div class="navigation-bar">
            <div class="navi-title">
                <h1>Memo-Real<br>var 1.1</h1>
            </div>
            <div class="navigation-buttons">
                <a href="/Home"     class="navi-btn">Home<br></a>
                <a href="/Schedule" class="navi-btn">Schedule<br></a>
                <a href="/Task"     class="navi-btn">Task<br></a>
                <a href="/Memo"     class="navi-btn">Memo<br></a>
            </div>
        </div>

        <div class="memo-form">
            <h2>Memo</h2>

            <form action="/Memo-Add" method="post" class="memo-input-form">
                @csrf
                <input type="text" class="memo-input-field" id="text" name="text" placeholder="ここにメモ内容を入力" autocomplete="text" required>
                <button type="submit" class="memo-input-btn">メモを追加</button>
            </form>

            <div class="memo-list">
                @foreach ($memos as $index => $memo)
                    <div class="memo-item">
                        <div class="memo-number">メモ {{ $index + 1 }}</div>
                        <div class="memo-content">{{ $memo->content }}</div>
                        <form action="/Memo/TaskAdd/{{ $memo->memoId }}" method="get">
                            @csrf
                            <button type="submit" class="edit-btn">編集</button>
                        </form>
                        <form action="/Memo/Delete/{{ $memo->memoId }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn">削除</button>
                        </form>
                    </div>
                @endforeach
            </div>

            <div class="memo-paginate">
                {{ $memos->links() }}
            </div>

        </div>

    </div>

</body>
</html>
