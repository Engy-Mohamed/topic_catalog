@extends('public.layouts.main',['page_name'=>'Topic Listing Page'])

    @section('content')
    
    <body class="topics-listing-page" id="top">

        <main>

             @include('public.includes.navbar_pages')


             @include('public.includes.site_header',['page_header'=>'Topics Listing'])


             @include('public.includes.popular_topics')

             @if(count($trending_topics) == 2)
              @include('public.includes.trending_topics')
             @endif
        </main>


      
    @endsection()
       
    @section('java_scripts')
        @include('public.includes.jslib_pages')
    @endsection()
