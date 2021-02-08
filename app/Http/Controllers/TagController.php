<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\TagRequest;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderBy('id','desc')->paginate(15);

        // ['tags' => $tags]
        // keyとvalueが同じ名前だとcompact()で省略できる
        return view('tags.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        Tag::create($request->all());

        return redirect()
                ->route('tags.index')
                ->with('status','ブックマークを登録しました');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::findOrFail($id);

        // $bookmarks = $tag->bookmarks()->paginate(20);
        return view('tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);

        return view('tags.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $input = $request->all();
        $tag = Tag::find($input['id']);
        $tag->fill([
            'title' => $input['title'],
        ]);
        $tag->save();

        return redirect()
                ->route('tags.edit',$tag)
                ->with('status','タグを更新しました');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::destroy($id);

        return redirect()
                ->route('tags.index')
                //フラッシュメッセージ 任意のセッション名,表示するメッセージ
                ->with('status','タグを削除しました');
    }
}
