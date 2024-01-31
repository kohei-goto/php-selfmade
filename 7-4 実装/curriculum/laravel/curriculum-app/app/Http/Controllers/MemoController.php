<?php

namespace App\Http\Controllers;

use App\Models\Memo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemoController extends Controller
{
    public function addMemo(Request $request)
    {
        $validatedData = $request->validate([
            'text' => 'required', // メモの内容は必須
        ]);
    
        $memo = new Memo();
        $memo->content = $request->text;
        $memo->userId = Auth::id(); // ログインしているユーザーのIDをセット
        $memo->save();
    
        return redirect('/Memo'); // メモページにリダイレクト
    }

    public function deleteMemo($memoId)
    {
        $memo = Memo::find($memoId);
        if ($memo && $memo->userId == Auth::id()) {
            $memo->delete();
        }
    
        return redirect('/Memo'); // 削除後はメモページにリダイレクト
    }

    public function TaskAddFormopen($memoId)
    {
        $memo = Memo::find($memoId);
        if ($memo && $memo->userId == Auth::id()) {
            return view('Memo_TaskAdd', ['memo' => $memo]); // 編集画面のビューを返す
        } else {
            // 該当するメモがないか、ユーザーが所有者でない場合
            return redirect('/Memo');
        }
    }

    public function updateMemo(Request $request)
    {
        $validatedData = $request->validate([
            'memoId' => 'required', // メモIDが必要
            'content' => 'required', // メモの内容も必要
        ]);

        $memo = Memo::find($request->memoId);
        if ($memo && $memo->userId == Auth::id()) {
            $memo->content = $request->content;
            $memo->save();
            return redirect('/Memo'); // 更新後はメモページにリダイレクト
        }

        return back()->withErrors(['msg' => 'メモの更新に失敗しました']);
    }

} 