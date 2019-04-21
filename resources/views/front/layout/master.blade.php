@include('front.partials.header')

@if(Route::current()->getName() == 'homePage' || Route::current()->getName() =='shop')
@include('front.partials.slide_front_page')
@endif
</div>

@yield('content')

@include('front.partials.footer')