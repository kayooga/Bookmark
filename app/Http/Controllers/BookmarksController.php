<?php

namespace App\Http\Controllers;

use App\Models\Bookmarks;
use App\Http\Requests\BookmarkReqest;

class BookmarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookmarks = Bookmarks::orderBy('id','desc')->paginate(15);

        return view('bookmarks.index',compact('bookmarks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bookmarks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookmarkReqest $request)
    {
        Bookmarks::create($request->all());

        return redirect()
                ->route('bookmarks.index')
                ->with('status','ブックマークを登録しました');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\Bookmarks  $bookmarks
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //findOrFail取得するデータがない場合は処理をとめてエラー画面を表示させる
        $bookmark = Bookmarks::findOrFail($id);

        return view('bookmarks.show',compact('bookmark'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\Bookmarks  $bookmarks
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bookmark = Bookmarks::findOrFail($id);

        return view('bookmarks.edit',compact('bookmark'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\Bookmarks  $bookmarks
     * @return \Illuminate\Http\Response
     */
    public function update(BookmarkReqest $request)
    {
        $input = $request->all();
        $bookmark = Bookmarks::find($input['id']);
        $bookmark->fill([
            'title' => $input['title'],
            'url' => $input['url'],
            'description' => $input['description']
        ]);
        $bookmark->save();

        return redirect()
                ->route('bookmarks.edit',$bookmark)
                ->with('status','ブックマークを更新しました');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\Bookmarks  $bookmarks
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bookmarks::destroy($id);

        return redirect()
                ->route('bookmarks.index')
                //フラッシュメッセージ 任意のセッション名,表示するメッセージ
                ->with('status','ブックマークを削除しました');
    }
}
