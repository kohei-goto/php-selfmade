<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MemoController;
use App\Http\Controllers\TaskController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Auth::routes();

//localhost8080にアクセスした際にログイン画面を表示
Route::get('/', [Controller::class, 'LoginForm'])->name('login');

//ログインフォームよりアカウント作成画面に遷移
Route::get('/CreateAccountForm', [Controller::class, 'CreateAccountForm']);

//アカウント作成ボタン押下時、アカウントを作成しログイン画面へ遷移
Route::post('/CreateAccount', [Controller::class, 'CreateAccount']);

//ログイン処理、成功した際にHome画面に遷移
Route::post('/Login', [Controller::class, 'Login']);

//ログイン処理が完了したらHome画面に遷移
Route::get('/Home', [Controller::class, 'Home'])->middleware('auth');

//Memoボタン押下時、Memo画面へ遷移
Route::get('/Memo', [Controller::class, 'Memo'])->middleware('auth');

//メモを追加時の挙動
Route::post('/Memo-Add', [MemoController::class, 'addMemo']);

//メモ削除時の挙動
Route::delete('/Memo/Delete/{memoId}', [MemoController::class, 'deleteMemo']);

//メモ編集画面へ遷移
Route::get('/Memo/TaskAdd/{memoId}', [MemoController::class, 'TaskAddFormopen']);

//メモ編集画面でメモの編集内容を保存
Route::post('/Memo/Update', [MemoController::class, 'updateMemo']);

//メモ編集画面でタスクを登録
Route::post('/Task/Add', [TaskController::class, 'addTask']);

//Taskボタン押下時、Task画面へ遷移
Route::get('/Task', [Controller::class, 'Task'])->middleware('auth');

//Task編集ボタン押下時編集画面へ遷移
Route::get('/Task/Edit/{taskId}', [TaskController::class, 'TaskEditForm']);

//Task編集内容を保存
Route::post('/Task/Update/{taskId}', [TaskController::class, 'updateTask']);

//Task編集画面よりタスクを削除
Route::delete('/Task/Delete/{taskId}', [TaskController::class, 'deleteTask']);

// タスク追加処理
Route::get('/Task/Create-New', [TaskController::class, 'CreateNewTask']);

//Scheduleボタン押下時、Schedule画面へ遷移
Route::get('/Schedule', [Controller::class, 'Schedule'])->middleware('auth');