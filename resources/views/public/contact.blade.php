<!doctype html>
<html lang="en">

   @include('public.includes.head',['page_name'=>'Topic Listing Contact Page'])
    
    <body class="topics-listing-page" id="top">

        <main>
         
           @include('public.includes.navbar_pages')
           
           @include('public.includes.site_header',['header_name'=>'Contact Form'])

           @include('public.includes.contact_form')

        </main>

        @include('public.includes.footer')

        @include('public.includes.jslib_pages')
    </body>
</html>