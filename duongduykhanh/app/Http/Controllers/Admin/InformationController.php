<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class InformationController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view('admin.information.index', ['pages' => $pages, 'title' => 'Danh sách thông tin']);
    }

    public function create()
    {
        return view('admin.information.create',['title' => 'Tạo mới thông tin']);
    }

    public function store(Request $request)
    {
        $dataInsert = $request->only(['title','content','summary','status']);
        $slug = $this->makeSlugs($request->title);
        $dataInsert['slug'] = $slug;
        Page::insert($dataInsert);
        return view('admin.index', ['title' => 'TRANG ADMIN'])->with('message', 'Created information successfully!');
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);

        return view('admin.information.show', ['title' => 'Information show', 'page' => $page]);
    }

    public function show($id)
    {
        $data = Page::findOrFail($id);

        return view('admin.information.edit', ['title' => 'Information show', 'data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $dataUpdate = $request->only(['title','content','summary','status']);
        $slug = $this->makeSlugs($request->title);
        $dataUpdate['slug'] = $slug;
        
        $update = Page::findOrFail($id)->update($dataUpdate);
        return view('admin.index', ['title' => 'TRANG ADMIN'])->with('message', 'Updated information successfully!');
    }

    public function makeSlugs($string)
    {
        return preg_replace('/\s|\?|\!|\.|\%|\,|\`|\'|\$|\#|\&|\^|\+|\=|\~|\}|\{|\[|\]|\/|\<|\>|\"|\;|\:/u', '-', $string);
    }

    public function destroy($id)
    {
        Page::find($id)->delete($id);
        $pages = Page::all();
        return view ('admin.information.index', ['pages' => $pages, 'title' => 'Danh sách thông tin']);
    }

    public function trash()
    {
        $pages = Page::onlyTrashed()->get();
        return view('admin.information.trash',['pages' => $pages, 'title' => 'Danh sách đã xóa']);
    }

    public function revert($id)
    {
        $page = Page::where('id',$id)->withTrashed()->first();

        $page->restore();
        $pages = Page::all();
        return view ('admin.information.index', ['pages' => $pages, 'title' => 'Danh sách thông tin']);
    }
}
