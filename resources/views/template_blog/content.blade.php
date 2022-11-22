@include('template_blog.head')
    <!-- SECTION -->
<div class="section">
		<!-- container -->
	<div class="container">
        @yield('isi')
        @include('template_blog.widget')
    </div>
</div>
@include('template_blog.footer')




