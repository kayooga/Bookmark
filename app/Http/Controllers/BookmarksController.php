<?php

namespace App\Http\Controllers;

use App\Models\Bookmarks;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        Bookmarks::create($request->all());

        return redirect()->route('user.bookmarks.index');
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
    public function edit(Bookmarks $bookmarks)
    {
        return view('bookmarks.edit',compact('bookmark'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\Bookmarks  $bookmarks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bookmarks $bookmarks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\Bookmarks  $bookmarks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bookmarks $bookmarks)
    {
        //
    }
}
