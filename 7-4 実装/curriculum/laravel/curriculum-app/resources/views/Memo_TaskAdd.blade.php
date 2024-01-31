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
    <div class="MemoTaskAdd-container">
        <form action="/Task/Add" method="post" class="TaskAdd-form">
            @csrf
            <h2>タスクに追加</h2>
            <div class="TaskAdd-form-group">
                <label for="taskName">タスク名:</label>
                <input type="text" id="taskName" name="taskName" required>
            </div>

            <div class="TaskAdd-form-group">
                <label for="start_date">開始予定日:</label>
                <input type="date" id="start_date" name="start_date" required>
            </div>

            <div class="TaskAdd-form-group">
                <label for="deadline">終了予定日:</label>
                <input type="date" id="deadline" name="deadline" required>
            </div>

            <div class="TaskAdd-form-group">
                <label for="priority">重要度:</label>
                <select id="priority" name="priority" required>
                    <option value="3">至急</option>
                    <option value="2">なるはや</option>
                    <option value="1">通常</option>
                </select>
            </div>

            <div class="form-group">
                <label for="description">詳細説明:</label>
                <textarea id="description" name="description" class="textarea-margin" rows="17" required></textarea>
            </div>

            <button type="submit" class="submit-btn">タスク登録</button>
        </form>

        <form action="/Memo/Update" method="post" class="memoedit-form">
            @csrf
            <h2>メモの編集</h2>
            <input type="hidden" name="memoId" value="{{ $memo->memoId }}"> <!-- メモのIDを隠しフィールドとして送信 -->
            <textarea name="content" class="textarea-margin" rows="30" cols="50">{{ $memo->content }}</textarea> <!-- メモの内容を表示 -->
        <button type="submit" class="update-btn">メモの変更を保存</button>
        </form>

    </div>
</body>
</html>
