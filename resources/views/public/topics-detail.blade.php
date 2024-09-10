<!doctype html>
<html lang="en">

    @include('public.includes.head',['page_name'=>'Topic Detail Page'])
    
    <body id="top">

        <main>

            @include('public.includes.navbar_pages')
            
            @include('public.includes.site_header_topics_detail')

            @include('public.includes.topics_detail_section')

            @include('public.includes.get_news')
            
        </main>
		
        @include('public.includes.footer')
      
        @include('public.includes.jslib_pages')

    </body>
</html>