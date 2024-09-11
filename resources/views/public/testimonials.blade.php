@extends('public.layouts.main',['page_name'=>'Topic Listing Our Client Says'])

@section('content')
    <body class="topics-listing-page" id="top">

        <main>

            @include('public.includes.navbar_pages')

            @include('public.includes.site_header',['page_header'=>'Testimonials'])

            @include('public.includes.testimonials_section')


        </main>
@endsection()

@section('java_scripts')
    @include('public.includes.jslib_pages')
@endsection()
