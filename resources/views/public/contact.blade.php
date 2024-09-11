@extends('public.layouts.main',['page_name'=>'Topic Listing Contact Page'])
     
@section('content')
    <body class="topics-listing-page" id="top">

        <main>
         
           @include('public.includes.navbar_pages')
           
           @include('public.includes.site_header',['page_header'=>'Contact Form'])

           @include('public.includes.contact_form')

        </main>

@endsection()
       
@section('java_scripts')
    @include('public.includes.jslib_pages')
@endsection()