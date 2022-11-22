@extends('template_blog.content')
@section('isi')
<!-- row -->
<div id="hot-post" class="row hot-post">
</div>
<!-- /container -->
</div>


<!-- SECTION -->
<div class="section">
<!-- container -->
<div class="container">
<!-- row -->
<div class="row">
	<div class="col-md-8">
		<!-- row -->
		<div class="row">
			<div class="section-row">
						<div class="post-share">
							<a href="#" class="social-facebook"><i class="fa fa-facebook"></i><span>Share</span></a>
							<a href="#" class="social-twitter"><i class="fa fa-twitter"></i><span>Tweet</span></a>
							<a href="#" class="social-pinterest"><i class="fa fa-pinterest"></i><span>Pin</span></a>
							<a href="#" ><i class="fa fa-envelope"></i><span>Email</span></a>
						</div>
					</div>
			<!-- post -->
			@foreach ($data as $isi_post )
			<!-- PAGE HEADER -->
		<div id="post-header" class="page-header">
			<div class="page-header-bg" style="background-image: url('{{ asset($isi_post->image) }}');" data-stellar-background-ratio="0.5"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-10">
						<div class="post-category">
							<a href="category.html">{{ $isi_post->category->name }}</a>
						</div>
						<h1>{{ $isi_post->judul }}</h1>
						<ul class="post-meta">
							<li><a href="author.html">{{ $isi_post->users->name }}</a></li>
							<li>{{ $isi_post->created_at->diffforHumans() }}</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- /PAGE HEADER -->
			<!-- post content -->
			<div class="section-row">
				<p align="justify">{{ $isi_post->content }}</p>
			</div>
			<!-- post tags -->
			<div class="section-row">
				<div class="post-tags">
					<ul>
						<li>TAGS:</li>
						<li><a href="#">{{ $isi_post->slug }}</a></li>
					</ul>
				</div>
			</div>
			@endforeach
		</div>
	</div>
@endsection