@extends('public.layouts.main',['page_name'=>'Topic Listing Bootstrap 5 Template'])

@section('content')

<body id="top">

    <main>

       
        @include('public.includes.navbar')

        @include('public.includes.hero')

        @include('public.includes.featured')

        @include('public.includes.explore')
       
        @include('public.includes.timeline')

        @include('public.includes.faq')

        @include('public.includes.testimonials_section')

        @include('public.includes.contact_section')

        
    </main>

@endsection()

@section('java_scripts')
    @include('public.includes.jslib')
@endsection()