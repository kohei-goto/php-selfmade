<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use App\Models\Task;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function addTask(Request $request)
    {

        $task              = new Task();
        $task->userId      = Auth::id();
        $task->title       = $request->taskName;
        $task->description = $request->description;
        $task->priority    = $request->priority;
        $task->start_date  = $request->start_date;
        $task->deadline    = $request->deadline;
        $task->status      = "未対応"; 
        
        $task->save();

        return redirect('/Task'); // タスク追加後はタスクページにリダイレクト
    }

    public function TaskEditForm($taskId)
    {  
    $task = Task::find($taskId);

    if ($task && $task->userId == Auth::id()) {
        // ユーザーがそのタスクの所有者である場合のみ、編集フォームを表示
        return view('Task_ScheduleAdd', ['task' => $task]);
    } else {
        // タスクが見つからないか、ユーザーが所有者でない場合はリダイレクト
        return redirect('/Task');
    }
    }

    public function updateTask(Request $request, $taskId)
    {
        $task = Task::find($taskId);

        if ($task && $task->userId == Auth::id()) {
            // バリデーション
            $validatedData = $request->validate([
                'taskName' => 'required',
                'description' => 'required',
                'priority' => 'required',
                'start_date' => 'required',
                'deadline' => 'required',
                'status' => 'required'
            ]);

            // タスク情報の更新
            $task->title       = $request->taskName;
            $task->description = $request->description;
            $task->priority    = $request->priority;
            $task->start_date  = $request->start_date;
            $task->deadline    = $request->deadline;
            $task->status      = $request->status;
            $task->comment     = $request->comment;

            $task->save(); // 変更を保存

            return redirect('/Task'); // タスクページにリダイレクト
        } else {
            // エラー処理
            return redirect('/Task')->withErrors('タスクの更新に失敗しました。');
        }
    }

    public function deleteTask($taskId)
    {
        $task = Task::find($taskId);
        if ($task && $task->userId == Auth::id()) {
            $task->delete();
            return redirect('/Task');
        } else {
            return back()->withErrors('タスクの削除に失敗しました。');
        }
    }

    public function CreateNewTask()
    {
        $task = new Task();
        $task->userId = Auth::id();
        $task->title = "新規タスク";
        $task->description = "1";
        $task->priority = "1";
        $task->deadline = Carbon::today()->format('Y-m-d');
        $task->status = "未対応";
    
        $task->save();
    
        return redirect('/Task/Edit/' . $task->taskId); // タスク編集ページにリダイレクト
    }

}