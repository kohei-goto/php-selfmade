<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Memo;
use App\Models\Task;
use App\Models\schedule;

class Controller extends BaseController
{
    //localhost8080にアクセスした際にログイン画面を表示
    public function LoginForm()
    {
        return view('LoginForm');
    }

    //アカウント作成画面へ遷移
    public function CreateAccountForm()
    {
        return view('CreateAccountForm');
    }

    //アカウントを作成後、ログイン画面に遷移
    public function CreateAccount(Request $request)
    {
        // バリデーション
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    
        // ユーザー作成
        $user = User::create([
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);
    
        return view('LoginForm');
    }

    //ログイン処理、成功したらHome画面に遷移
    public function Login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        \Log::info('Current session data:', session()->all());

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('Home');
        }

        return back()->withErrors([
            'email' => '提供された認証情報は記録と一致しません。',
        ]);
    }

    //ログイン処理字のHome画面に遷移処理
    public function Home()
    {
        $tasks = Task::where('userId', Auth::id())->where('status', '進行中')->get();

        $ganttData = $tasks->map(function ($task) {
            return [
                'id'    => $task->taskId,
                'text'  => $task->title,
                'start_date' => \Carbon\Carbon::parse($task->start_date)->format('d-m-Y'),
                'end_date'   => \Carbon\Carbon::parse($task->deadline)->format('d-m-Y')
            ];
        });
        return view('Home', ['ganttData' => $ganttData]);
    }

    //メモボタン押下時、Memo画面に遷移
    public function Memo()
    {
        $user = Auth::user();
        $userid = Auth::id();

        // デバッグ用
        //dd(Auth::user());
        //\Log::info('Logged in user ID: ' . $user->id);
        //\Log::info('Logged in user ID: ' . $userid);
    
        // ユーザーに紐づくメモを取得
        $memos = Memo::where('userId', $userid)->simplepaginate(5);
        return view('Memo', ['user' => $user, 'memos' => $memos]);

    }

    public function Task()
    {
        $tasksNotStarted = Task::where('userId', Auth::id())->where('status', '未対応')->get();
        $tasksInProgress = Task::where('userId', Auth::id())->where('status', '進行中')->get();
        $tasksCompleted = Task::where('userId', Auth::id())->where('status', '完了')->get();
        $tasksOnHold = Task::where('userId', Auth::id())->where('status', '保留')->get();

        return view('task', [
            'tasksNotStarted' => $tasksNotStarted,
            'tasksInProgress' => $tasksInProgress,
            'tasksCompleted' => $tasksCompleted,
            'tasksOnHold' => $tasksOnHold,
        ]);

    }

    public function Schedule()
    {
        $tasks = Task::where('userId', Auth::id())->where('status', '進行中')->get();
    
        $events = $tasks->map(function ($task) {
            return [
                'title' => $task->title,
                'start' => \Carbon\Carbon::parse($task->start_date)->format('Y-m-d'),
                'end'   =>\Carbon\Carbon::parse($task->deadline)->format('Y-m-d'),
                'url'   => url("/Task/Edit/{$task->taskId}")
            ];
        });
    
        return view('Schedule', ['events' => $events]);
    }

}
