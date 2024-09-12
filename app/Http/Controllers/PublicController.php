<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use App\Models\Topic;
use App\Models\Category;
use App\Models\Message;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Mail\contact_message;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::where('published',1)->latest()->take(3)->get();
        $featured_topics = Topic::where('published',1)->orderBy('no_of_views','DESC')->take(2)->get();
        $categories = Category::with('latest_topics')->withcount('published_topics')->orderBy('published_topics_count', 'desc')->take(5)->get();
        return view('public/index', compact('testimonials','featured_topics','categories'));
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
    public function send_message(Request $request)
    {
        $data = $request->validate([
            'sender_name' => 'required|string|max:255',
            'message_subject' => 'required|string|max:255',
            'sender_email' => 'required|string|email|max:255',
            'content' => 'required|string|max:1000',
        ]);
        $data['read']= 0;
        
        Message::create($data);
        $to_email = config('mail.to_contact_us');
        Mail::to($to_email )->send(new contact_message($data));

        return redirect()->route('contact')->with('message','Thank you for contacting us');
    }
}
