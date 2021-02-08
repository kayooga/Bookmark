<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Tag;
use App\Http\Requests\BookmarkReqest;

class BookmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookmarks = Bookmark::orderBy('id','desc')->paginate(15);

        return view('bookmarks.index',compact('bookmarks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//チャックボックスで送られてきたデータをpluckでkey,valueの形にしてtoArrayで配列の形にする
        $tags = Tag::pluck('title', 'id')->toArray();

        return view('bookmarks.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookmarkReqest $request)
    {
        $bookmark = Bookmark::create($request->all());
        $bookmark->tags()->sync($request->tags);


        return redirect()
                ->route('bookmarks.index')
                ->with('status','ブックマークを登録しました');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //findOrFail取得するデータがない場合は処理をとめてエラー画面を表示させる
        $bookmark = Bookmark::findOrFail($id);

        return view('bookmarks.show',compact('bookmark'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bookmark = Bookmark::findOrFail($id);

        $tags = Tag::pluck('title', 'id')->toArray();
        // dd($bookmark);
        // dd($tags);
        return view('bookmarks.edit',compact('bookmark', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function update(BookmarkReqest $request)
    {
        $input = $request->all();
        $bookmark = Bookmark::find($input['id']);
        $bookmark->fill([
            'title' => $input['title'],
            'url' => $input['url'],
            'description' => $input['description']
        ]);
        $bookmark->save();
        //syncリレーションのタグを保存
        $bookmark->tags()->sync($request->tags);
        return redirect()
                ->route('bookmarks.edit',$bookmark)
                ->with('status','ブックマークを更新しました');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bookmark $bookmark, $id)
    {
        Bookmark::destroy($id);
        //detachリレーションの削除
        $bookmark->tags()->detach();

        return redirect()
                ->route('bookmarks.index')
                //フラッシュメッセージ 任意のセッション名,表示するメッセージ
                ->with('status','ブックマークを削除しました');
    }
}
