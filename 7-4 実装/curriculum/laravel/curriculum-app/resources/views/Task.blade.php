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
    <div class="task-container">
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

        <div class="Task-form">
            <h2>Task</h2>
                <a href="/Task/Create-New" class="TaskAdd-btn">タスクを追加</a>
                <div class="task-list">
                    <div class="tasks-group" id="not-started">
                        <h3>未対応</h3>
                        @foreach ($tasksNotStarted as $task)
                            <a href="/Task/Edit/{{ $task->taskId }}" class="task-item-link">
                                <div class="task-item">
                                    <p>タスク名：{{ $task->title }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <div class="tasks-group" id="in-progress">
                        <h3>進行中</h3>
                        @foreach ($tasksInProgress as $task)
                            <a href="/Task/Edit/{{ $task->taskId }}" class="task-item-link">
                                <div class="task-item">
                                    <p>タスク名：{{ $task->title }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <div class="tasks-group" id="completed">
                        <h3>完了</h3>
                        @foreach ($tasksCompleted as $task)
                            <a href="/Task/Edit/{{ $task->taskId }}" class="task-item-link">
                                <div class="task-item">
                                    <p>タスク名：{{ $task->title }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <div class="tasks-group" id="on-hold">
                        <h3>保留</h3>
                        @foreach ($tasksOnHold as $task)
                            <a href="/Task/Edit/{{ $task->taskId }}" class="task-item-link">
                                <div class="task-item">
                                    <p>タスク名：{{ $task->title }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
        </div>
    </div>

</body>
</html>