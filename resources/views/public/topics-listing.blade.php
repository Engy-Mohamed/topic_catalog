<!doctype html>
<html lang="en">

     @include('public.includes.head',['page_name'=>'Topic Listing Page'])
    
    <body class="topics-listing-page" id="top">

        <main>

             @include('public.includes.navbar_pages')


             @include('public.includes.site_header',['header_name'=>'Topics Listing'])


             @include('public.includes.popular_topics')


        @include('public.includes.trending_topics')
        </main>

        @include('public.includes.footer')
      
        @include('public.includes.jslib_pages')

    </body>
</html>