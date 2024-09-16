<?php

namespace App\Http\Controllers;

use App\Mail\contact_message;
use App\Models\Category;
use App\Models\Message;
use App\Models\Testimonial;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class PublicController extends Controller
{
    /*-------------------------------------
     * Show Index page
     * -------------------------------------
     * Get the 3 most recently published testimonials ($testimonials)
     * Get the two most viewed published topics ($featured_topics)
     * The top 5 categories contain the largest number of topics with their 3 most recent topics ($categories )
     */
    public function index()
    {
        $testimonials = Testimonial::where('published', 1)->latest()->take(3)->get();
        $featured_topics = Topic::where('published', 1)->orderBy('no_of_views', 'DESC')->take(2)->get();
        $categories = Category::with('latest_topics')->withcount('published_topics')->orderBy('published_topics_count', 'desc')->take(5)->get();
        return view('public/index', compact('testimonials', 'featured_topics', 'categories'));
    }

    /*-------------------------------------
     * Show Our Client Says page
     * -------------------------------------
     * Get all published testimonials ($testimonials)
     */
    public function testimonials()
    {
        $testimonials = Testimonial::where('published', 1)->get();
        return view('public/testimonials', compact('testimonials'));
    }

    /*-------------------------------------
     * Show Contact Us page
     * -------------------------------------
     */
    public function contact()
    {
        return view('public/contact');
    }

    /*-------------------------------------
     * Show Topics Listing page
     * -------------------------------------
     * Get all published topics page by page ($topics)
     * no of topics per page = 3
     * Get the 2 most recently published trending topics ($trending_topics)
     */
    public function topics(): view
    {
        $topics = Topic::where('published', 1)->paginate(3);
        $trending_topics = Topic::where('published', 1)->where('trending', 1)->latest()->take(2)->get();
        return view('public/topics-listing', compact('topics', 'trending_topics'));
    }

    /*----------------------------------------------
     * Display the specified topic
     * ---------------------------------------------
     * Get the specified published topic with its category ($topic)
     */
    public function topics_detail(string $id)
    {
        $topic = Topic::with('category')->where('published', 1)->findOrFail($id);
        return view('public/topics-detail', compact('topic'));
    }

    /*---------------------------------------------------------
     * Increase the number of views for the specified topic by 1
     * ----------------------------------------------------------
     */
    public function add_view(string $id)
    {
        Topic::where('id', $id)->where('published', 1)->increment('no_of_views');
        return redirect()->route('topics_detail', $id);
    }

    /*---------------------------------------------------------
     * store and send a new message
     * ----------------------------------------------------------
     * Store a newly created message in storage
     * Send the new message to a specific email address found in .env
     */
    public function send_message(Request $request)
    {
        $data = $request->validate([
            'sender_name' => 'required|string|max:255',
            'message_subject' => 'required|string|max:255',
            'sender_email' => 'required|string|email|max:255',
            'content' => 'required|string|max:1000',
        ]);
        $data['read'] = 0;

        Message::create($data);
        $to_email = config('mail.to_contact_us');
        Mail::to($to_email)->send(new contact_message($data));

        return redirect()->route('contact')->with('message', 'Thank you for contacting us');
    }
}
