<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.list', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(Request $request)
    {
        $request->validate(['tag' => ['required', 'string']]);
        Tag::create($request->all());
        alert()->success('تگ با موفقیت ایجاد گردید', 'عملیات موفق');
        return redirect()->route('tags.index');
    }

    public function show(Tag $tag)
    {
        //
    }

    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate(['tag' => ['required']]);
        $tag->update(['tag' => $request->tag]);
        alert()->success('تگ با موفقیت ویرایش گردید');
        return redirect()->route('tags.index');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        alert()->warning('تگ مورد نظر حذف گردید', 'عملیات موفق');
        return back();
    }
}
