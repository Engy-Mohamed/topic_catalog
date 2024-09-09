<!doctype html>
<html lang="en">

   @include('public.includes.head',['page_name'=>'Our Client Says'])
    
    <body class="topics-listing-page" id="top">

        <main>

            @include('public.includes.navbar_pages')

            @include('public.includes.site_header',['header_name'=>'Testimonials'])

            @include('public.includes.testimonials_section')

           
        </main>
        @include('public.includes.footer')
      
        @include('public.includes.jslib_pages')

    </body>
</html>