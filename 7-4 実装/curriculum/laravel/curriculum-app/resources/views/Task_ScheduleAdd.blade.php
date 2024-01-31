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
    <div class="Task-scheduleAdd-container">

        <form action="/Task/Update/{{ $task->taskId }}" method="post" class="Task-scheduleAdd-form">
            @csrf
            <div class="Tasklist-left">
                <h2>タスクに追加</h2>
                <div class="TaskAdd-form-group">
                    <label for="taskName">タスク名:</label>
                    <input type="text" id="taskName" name="taskName" value="{{ $task->title }}"required>
                </div>

                <div class="TaskAdd-form-group">
                    <label for="start_date">開始予定日:</label>
                    <input type="date" id="start_date" name="start_date" value="{{ \Carbon\Carbon::parse($task->start_date)->format('Y-m-d') }}"required>
                </div>

                <div class="TaskAdd-form-group">
                    <label for="deadline">終了予定日:</label>
                    <input type="date" id="deadline" name="deadline" value="{{ \Carbon\Carbon::parse($task->deadline)->format('Y-m-d') }}" required>
                </div>

                <div class="TaskAdd-form-group">
                    <label for="priority">重要度:</label>
                    <select id="priority" name="priority" required>
                        <option value="3" {{ $task->priority == 3 ? 'selected' : '' }}>至急</option>
                        <option value="2" {{ $task->priority == 2 ? 'selected' : '' }}>なるはや</option>
                        <option value="1" {{ $task->priority == 1 ? 'selected' : '' }}>通常</option>
                    </select>

                </div>

                <div class="TaskAdd-form-group">
                    <label for="status">進捗状況:</label>
                    <select id="status" name="status" required>
                        <option value="未対応" {{ $task->status == '未対応' ? 'selected' : '' }}>未対応</option>
                        <option value="進行中" {{ $task->status == '進行中' ? 'selected' : '' }}>進行中</option>
                        <option value="完了" {{ $task->status == '完了' ? 'selected' : '' }}>完了</option>
                        <option value="保留" {{ $task->status == '保留' ? 'selected' : '' }}>保留</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="description">詳細説明:</label>
                    <textarea id="description" name="description" class="textarea-margin" rows="17" required>{{ $task->description }}</textarea>
                </div>

            </div>

            <div class="Tasklist-right">
                <h1>コメント機能</h1>
                <textarea name="comment" class="Task-textarea" rows="30" cols="50">{{ $task->comment }}</textarea>
                <button type="submit" class="submit-btn2">タスクの内容を保存</button>
            </div>
        </form>

        <div class="button-group">
            <form action="/Task/Delete/{{ $task->taskId }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-btn2">タスクを削除</button>
            </form>
                
            <a href="/Task" class="back-btn2">タスクページに戻る</a>
        </div>

    </div>
</body>
</html>