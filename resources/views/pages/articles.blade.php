@extends('layout.index')

@section('title'){{ isset($articles->title) ? $articles->title : $articles->name }}@endsection
@section('description'){{$articles->description}}@endsection
@section('keywords'){{$articles->keywords}}@endsection
@section('robots'){{ $articles->robot == 0 ? 'index, follow' : 'noindex, nofollow' }}@endsection
@section('url'){{asset('').$articles->category->slug.'/'.$articles->slug.'.html'}}@endsection

@section('content')

@include('layout.header_page')

<section id="page-content" class="sidebar-right" style="transform: none;">
	<div class="container">
		
	</div>

	<div class="container" style="transform: none;">
		<div class="row" style="transform: none;">
			<div class="content col-lg-8">
				<div id="blog" class="single-post">
					<div class="breadcrumb">
						<ul>
							<li><a href="{{asset('')}}">Trang chủ</a>
							</li>
							<li><a href="{{$articles->category->slug}}">{{$articles->category->name}}</a>
							</li>
							<li class="active">{{$articles->name}}</li>
						</ul>
					</div>
					<div class="post-item">
						<div class="post-item-wrap">
							<div class="post-item-description">
								<h1>{{$articles->name}}</h1>
								<div class="post-meta">
									<span class="post-meta-date"><i class="fa fa-calendar-o"></i>{{date('d/m/Y',strtotime($articles->created_at))}}</span>
									<span class="post-meta-comments"><a href=""><i class="fa fa-comments-o"></i>33 Comments</a></span>
									<span class="post-meta-category"><a href=""><i class="fa fa-tag"></i>{{$articles->category->name}}</a></span>
									<div class="post-meta-share">
										<a class="btn btn-xs btn-slide btn-facebook" href="#"><i class="fab fa-facebook-f"></i><span>Facebook</span></a>
										<a class="btn btn-xs btn-slide btn-twitter" href="#" data-width="100"><i class="fab fa-twitter"></i><span>Twitter</span></a>
										<a class="btn btn-xs btn-slide btn-instagram" href="#" data-width="118"><i class="fab fa-instagram"></i><span>Instagram</span></a>
									</div>
								</div>
								<div class="content" id="contents">
									{!! $articles->content !!}
								</div>
							</div>
							<div class="post-tags">
								<a href="{{asset('')}}">sổ tay tiêu dùng</a>
								<a href="{{$articles->category->slug}}">{{$articles->category->name}}</a>
							</div>
						<!-- @include('layout.comment') -->
						</div>
					</div>
				</div>
			</div>
			<!-- sidebar -->
			<div class="sidebar sticky-sidebar col-lg-4" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
				<div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 1101.5px;">
					<div class="widget">
						<div class="position-sticky" style="top: 4.5rem;">
						<h4>Mục lục</h4>
						<div id="toc"  ></div>
						</div>
					</div>
					<!-- <div class="widget  widget-tags">
						<h4 class="widget-title">Tags</h4>
						<div class="tags">
							<a href="#">Design</a>
						</div>
					</div> -->
				</div>
			</div>
			<!-- sidebar -->
		</div>
	</div>
</section>


@endsection