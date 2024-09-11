<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use App\Models\Topic;
use Illuminate\View\View;

class PublicController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::where('published',1)->latest()->take(3)->get();
        $featured_topics = Topic::where('published',1)->orderBy('no_of_views','DESC')->take(2)->get();
        return view('public/index', compact('testimonials','featured_topics'));
    }
    public function testimonials()
    {
        $testimonials = Testimonial::where('published',1)->get();
        return view('public/testimonials', compact('testimonials'));
    }
    public function contact()
    {
        return view('public/contact');
    }
    public function topics():view
    {
        $topics = Topic::where('published',1)->paginate(3);
        $trending_topics = Topic::where('published',1)->where('trending',1)->latest()->take(2)->get();
        return view('public/topics-listing', compact('topics','trending_topics'));
    }
    public function topics_detail(string $id)
    {
        $topic = Topic::with('category')->where('published',1)->findOrFail($id);
        return view('public/topics-detail', compact('topic'));
    }
    public function add_view(string $id)
    {
       Topic::where('id', $id)->where('published',1)->increment('no_of_views');
       return redirect()->route('topics_detail',$id);
    }
}
