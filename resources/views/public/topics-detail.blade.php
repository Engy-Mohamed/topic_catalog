@extends('public.layouts.main',['page_name'=>'Topic Detail Page'])

@section('content')

    <body id="top">

        <main>

            @include('public.includes.navbar_pages')
            
            @include('public.includes.site_header_topics_detail')

            @include('public.includes.topics_detail_section')

            @include('public.includes.get_news')
            
        </main>
		
@endsection()

@section('java_scripts')
    @include('public.includes.jslib_pages')
@endsection()