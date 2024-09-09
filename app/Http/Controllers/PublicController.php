<?php

namespace App\Http\Controllers;

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
        return view('public/topics-listing');
    }
    public function topics_detail(string $id)
    {
        return view('public/topics-detail');
    }
}
