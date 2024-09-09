<!doctype html>
<html lang="en">

@include('public.includes.head',['page_name'=>'Bootstrap 5 Template'])

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

    @include('public.includes.footer')
    @include('public.includes.jslib')


    

</body>

</html>