<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Note;
use App\Http\Requests\NoteRequest;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $notes = Note::with('user')->latest('id')->paginate(20);
        return view('back.notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('back.notes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoteRequest $request)
    {
        //
        $note = Note::create($request->all());

        if($note){
            return redirect()
                ->route('back.notes.edit', $note)
                ->withSuccess('データ登録完了');
        } else {
            return redirect()
                ->route('back.notes.create')
                ->withError('登録に失敗しました');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        //
        return view('back.notes.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NoteRequest $request, Note $note)
    {
        //
        if($note->update($request->all())){
            $flash = ['success' => '更新しました'];
        }else{
            $flash = ['error' => '失敗しました'];
        }

        return redirect()
            ->route('back.notes.edit', $note)
            ->with($flash);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        //
        if($note->delete()){
            $flash = ['success' => '削除しました'];
        }else{
            $flash = ['error' => '失敗しました'];
        }

        return redirect()
            ->route('back.notes.index')
            ->with($flash);
    }
}
