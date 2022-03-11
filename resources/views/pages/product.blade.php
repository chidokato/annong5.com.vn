@extends('layout.index')

@section('title'){{ isset($category->title) ? $category->title : $category->name }}@endsection
@section('description'){{$category->description}}@endsection
@section('keywords'){{$category->keywords}}@endsection
@section('robots'){{ $category->robot == 0 ? 'index, follow' : 'noindex, nofollow' }}@endsection
@section('url'){{asset('').$category['slug']}}@endsection

@section('content')

@include('layout.header_page')
<section class="p-t-40">
<div class="container">
	<div class="breadcrumb">
		<ul>
			<li><a href="{{asset('')}}">Trang chủ</a></li>
			<li class="active">{{$category->name}}</li>
		</ul>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-9">
			<h1 class="m-b-15">{{$category->name}}</h1>
			{!! $category->content !!}
		</div>
		<div class="col-lg-3">
			<div class="order-select">
				<form method="get">
					<select class="form-control">
						<option value="order" selected="selected">Default sorting</option>
						<option value="price-desc">Sort by price: high to low</option>
					</select>
				</form>
			</div>
		</div>
	</div>
<div class="shop">
<div class="grid-layout grid-4-columns grid-loaded" data-item="grid-item" style="margin: 0px -20px -20px 0px; position: relative; height: 957.094px;">
	<!-- iteam -->
	@foreach($product as $val)
	<div class="grid-item" style="padding: 0px 20px 20px 0px; position: absolute; left: 0px; top: 0px;">
		<div class="product">
			<div class="product-image product-list">
				<!-- <a href="{{$val->category->slug}}/{{$val->slug}}"><img alt="Shop product image!" src="data/product/300/{{$val->img}}"></a> -->
				<a href="{{$val->category->slug}}/{{$val->slug}}"><img alt="Shop product image!" src="{{ isset($val->img) ? 'data/product/300/'.$val->img : 'data/no_image.jpg' }}"></a>
				<!-- <a href="#"><img alt="Shop product image!" src="images/shop/products/10.jpg"></a> -->
				<span class="product-new">NEW</span>
				<span class="product-wishlist">
					<a id="wishlist" type="button"><i class="fa fa-heart"></i></a>
				</span>
				<div class="product-overlay">
					<button id="cart" type="button">Thêm vào giỏ hàng</button>
				</div>
			</div>
			<div class="product-description">
				<div class="product-category">{{$val->category->name}}</div>
				<div class="product-title">
					<h3><a href="{{$val->category->slug}}/{{$val->slug}}">{{$val->name}}</a></h3>
				</div>
				<div class="product-price">
					<del>
						{{ isset($val->product->oldprice) && $val->product->oldprice != '' ? number_format($val->product->oldprice)."đ" : '' }}
					</del><ins>{{ isset($val->product->price) && $val->product->price != '' ? number_format($val->product->price)."đ" : '' }}</ins>
				</div>
				<div class="product-rate">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star-half-o"></i>
				</div>
				<div class="product-reviews"><a href="#">{{rand(10,20)}} đánh giá</a></div>
			</div>
		</div>
	</div>
	@endforeach
	<!-- iteam -->
<div class="grid-loader"></div></div>
<hr>

<ul class="pagination">
	<li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
	<li class="page-item"><a class="page-link" href="#">1</a></li>
	<li class="page-item"><a class="page-link" href="#">2</a></li>
	<li class="page-item active"><a class="page-link" href="#">3</a></li>
	<li class="page-item"><a class="page-link" href="#">4</a></li>
	<li class="page-item"><a class="page-link" href="#">5</a></li>
	<li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
</ul>

</div>
</div>
</section>

@endsection