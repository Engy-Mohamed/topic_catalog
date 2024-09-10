<?php

namespace App\Http\Controllers;

use App\Models\Topic;

class PublicController extends Controller
{
    public function index()
    {
        return view('public/index');
    }
    public function testimonials()
    {
        return view('public/testimonials');
    }
    public function contact()
    {
        return view('public/contact');
    }
    public function topics()
    {
        $topics=Topic::where('published',1)->get();
        $trending_topics = $topics->where('trending',1)->sortByDesc('created_at')->take(2);
        return view('public/topics-listing', compact('topics','trending_topics'));
    }
    public function topics_detail(string $id)
    {
        return view('public/topics-detail');
    }
}
