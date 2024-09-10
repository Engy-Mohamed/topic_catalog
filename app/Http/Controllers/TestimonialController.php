<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use App\Traits\Common;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use Common;
    public function index()
    {
        $testimonials = Testimonial::get();
        return view('admin/testimonials', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/add_testimonial');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string|max:500',
            'image' => 'required|mimes:png,jpg,jpeg,svg|max:2048',
        ]);

        $file_name = $this->uploadFile($request['image'], 'assets\images\testimonials');

        $data['image'] = $file_name;
        $data['published'] = isset($request['published']);
        Testimonial::create($data);

        return redirect()->route('testimonials.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin/edit_testimonial', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string|max:500',
            'image' => 'mimes:png,jpg,jpeg,svg|max:2048',
            'published' => 'required:boolean'
        ]);

        if (isset($data['image'])) {
            $file_name = $this->uploadFile($request['image'], 'assets\images\testimonials');
            $data['image'] = $file_name;
        }

        Testimonial::where('id', $id)->update($data);
        return redirect()->route('testimonials.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Testimonial::where('id', $id)->delete();
        return redirect()->route('testimonials.index');
    }
}
