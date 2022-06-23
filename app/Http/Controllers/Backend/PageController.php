<?php

namespace App\Http\Controllers\Backend;

use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::paginate(10);
        return view('admin.pages.index', compact('pages'));
    }


    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        if (isset($request->slug)) {
            $request['slug'] = Str::slug($request['slug']);
        }

        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'slug' => ['required', 'unique:pages,slug'],
            'is_published' => 'nullable',
        ]);

        isset($data['is_published']) ? $data['is_published'] = 1 : $data['is_published'] = 0;

        Page::create($data);

        return redirect()->route('admin.pages.index')->with('success', 'Page created successfully.');
    }

    public function show(Page $page)
    {
        return view('admin.pages.show', compact('page'));
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        if (isset($request->slug)) {
            $request['slug'] = Str::slug($request['slug']);
        }

        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'slug' => ['required', 'unique:pages,slug,' . $page->id],
            'is_published' => 'nullable',
        ]);

        isset($data['is_published']) ? $data['is_published'] = 1 : $data['is_published'] = 0;
        $page->update($data);

        return redirect()->route('admin.pages.index')->with('success', 'Page updated successfully.');
    }

    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()->route('admin.pages.index')->with('success', 'Page deleted successfully.');
    }
}
