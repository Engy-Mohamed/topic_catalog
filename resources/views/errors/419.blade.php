@extends('public.layouts.main',['page_name'=>'Topic Listing Bootstrap 5 Template'])

@section('content')

    <body id="top">

        <main>

          @include('public.includes.navbar_pages')

          @include('errors.includes.error_section',['error'=>'419| The page is expired'])
    
    </main>

@endsection()

@section('java_scripts')
    @include('public.includes.jslib')
@endsection()