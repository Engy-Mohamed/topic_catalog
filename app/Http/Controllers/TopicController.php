<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Topic;
use App\Traits\Common;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    use Common;

    /**
     * Display a listing of the topic.
     */
    public function index()
    {
        $topics = Topic::with('category')->get();
        return view('admin/topics', compact('topics'));
    }

    /**
     * Show the form for creating a new topic.
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin/add_topic', compact('categories'));
    }

    /**
     * Store a newly created topic in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'topic_title' => 'required|string|max:255',
            'content' => 'required|string|max:3000',
            'image' => 'required|mimes:png,jpg,jpeg,svg|max:2048',
            'category_id' => 'required|exists:categories,id,deleted_at,NULL',
        ]);

        $file_name = $this->uploadFile($request['image'], 'assets\images\topics');

        $data['image'] = $file_name;
        $data['published'] = isset($request['published']);
        $data['trending'] = isset($request['trending']);
        Topic::create($data);

        return redirect()->route('topics.index');
    }

    /**
     * Display the specified topic.
     */
    public function show(Topic $topic)
    {
        return view('admin/topic_details', compact('topic'));
    }

    /**
     * Show the form for editing the specified topic.
     */
    public function edit(Topic $topic)
    {
        $categories = Category::get();
        return view('admin/edit_topic', compact('topic', 'categories'));
    }

    /**
     * Update the specified topic in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'topic_title' => 'required|string|max:255',
            'content' => 'required|string|max:3000',
            'image' => 'mimes:png,jpg,jpeg,svg|max:2048',
            'category_id' => 'required|exists:categories,id,deleted_at,NULL',
            'published' => 'required:boolean',
            'trending' => 'required:boolean',
        ]);
        if (isset($data['image'])) {
            $file_name = $this->uploadFile($request['image'], 'assets\images\topics');
            $data['image'] = $file_name;
        }

        Topic::where('id', $id)->update($data);

        return redirect()->route('topics.index');
    }

    /**
     * soft delete the specified topic from storage.
     */
    public function destroy(string $id)
    {
        Topic::where('id', $id)->delete();
        return redirect()->route('topics.index');
    }
}
