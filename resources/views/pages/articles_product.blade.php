@extends('layout.index')

@section('title'){{ isset($articles->title) ? $articles->title : $articles->name }}@endsection
@section('description'){{$articles->description}}@endsection
@section('keywords'){{$articles->keywords}}@endsection
@section('robots'){{ $articles->robot == 0 ? 'index, follow' : 'noindex, nofollow' }}@endsection
@section('url'){{asset('').$articles->category->slug.'/'.$articles->slug.'.html'}}@endsection

@section('content')

@include('layout.header_page')
<section id="page-content" class="sidebar-right">
<div class="container">
	<div class="breadcrumb">
		<ul>
			<li><a href="{{asset('')}}">Trang chủ</a></li>
			<li><a href="{{$articles->category->slug}}">{{$articles->category->name}}</a></li>
			<li class="active">{{$articles->name}}</li>
		</ul>
	</div>
</div>

<div class="container">
<div class="row">

<div class="content col-lg-9">
<div class="product">
<div class="row m-b-40">
<div class="col-lg-7">
<div class="product-image">
<div class="carousel dots-inside dots-dark arrows-visible" data-items="1" data-loop="true" data-autoplay="true" data-animate-in="fadeIn" data-animate-out="fadeOut" data-autoplay="2500" data-lightbox="gallery">
<img class="img-detail-product"  alt="{{$articles->name}}" src="data/product/{{$articles->img}}">
@foreach($articles->images as $val)
<!-- <a href="data/product/{{$val->img}}" data-lightbox="image"><img class="img-detail-product"  alt="{{$articles->name}}" src="data/product/{{$val->img}}"></a> -->
<img class="img-detail-product"  alt="{{$articles->name}}" src="data/product/{{$val->img}}">
@endforeach
</div>
</div>
</div>
<div class="col-lg-5">
<div class="product-description">
<div class="product-category">{{$articles->category->name}}</div>
<div class="product-title">
<h3><a>{{$articles->name}}</a></h3>
</div>
<div class="product-price"><ins>{{ isset($articles->product->price) && $articles->product->price != '' ? number_format($articles->product->price)."đ" : '' }}</ins>
</div>
<div class="product-rate">
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star-half-o"></i>
</div>
<div class="product-reviews"><a href="#">{{rand(10,30)}} Đánh giá</a></div>
<div class="seperator m-b-5"></div>
</div>
<div class="row">
<div class="col-lg-6 mb-3">
<h6>Chọn màu sắc</h6>
<select style="padding:10px">
<option value="">Select color…</option>
<option value="">White</option>
</select>
</div>

<div class="col-lg-6 mb-3"></div>

<!-- <div class="col-lg-12">
<h6>Select the size</h6>
<ul class="product-size">
<li><label><input type="radio" checked="checked" value="option1" name="product-size"><span>xs</span></label></li>
<li><label><input type="radio" checked="checked" value="option1" name="product-size"><span>s</span></label></li>
<li><label><input type="radio" checked="checked" value="option1" name="product-size"><span>m</span></label></li>
<li><label><input type="radio" checked="checked" value="option1" name="product-size"><span>l</span></label></li>
<li><label><input type="radio" checked="checked" value="option1" name="product-size"><span>xl</span></label></li>
</ul>
</div> -->

<div class="col-lg-6">
<h6>Số lượng</h6>
<div class="cart-product-quantity">
<div class="quantity m-l-5">
<input type="button" class="minus" value="-">
<input type="text" class="qty" value="1">
<input type="button" class="plus" value="+">
</div>
</div>
</div>
<div class="col-lg-6">
<h6 style="color: #fff">Mua hàng</h6>
<a class="btn" href="#"><i class="icon-shopping-cart"></i> Mua hàng</a>
</div>
</div>
</div>
</div>

<div class="tabs tabs-folder">
<ul class="nav nav-tabs" id="myTab3" role="tablist">
<li class="nav-item">
<a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="false"><i class="fa fa-align-justify"></i>Description</a></a>
</li>
<li class="nav-item">
<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="true"><i class="fa fa-info"></i>Additional Info</a></a>
</li>
<li class="nav-item">
<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact3" role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-star"></i>Reviews</a></a>
</li>
</ul>
<div class="tab-content" id="myTabContent3">
<div class="tab-pane fade" id="home3" role="tabpanel" aria-labelledby="home-tab">
<p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. </p>
</div>
<div class="tab-pane fade active show" id="profile3" role="tabpanel" aria-labelledby="profile-tab">
<table class="table table-striped table-bordered">
<tbody>
<tr>
<td>Size</td>
<td>Small, Medium &amp; Large</td>
</tr>
<tr>
<td>Color</td>
<td>Pink &amp; White</td>
</tr>

</tbody>
</table>
</div>
<div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact-tab">
<div class="comments" id="comments">
<div class="comment_number">
Reviews <span>(3)</span>
</div>
<div class="comment-list">

<div class="comment" id="comment-1">
<div class="image"><img alt="" src="images/blog/author.jpg" class="avatar"></div>
<div class="text">
<div class="product-rate">
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
 <i class="fa fa-star"></i>
<i class="fa fa-star-half-o"></i>
</div>
<h5 class="name">John Doe</h5>
<span class="comment_date">Posted at 15:32h, 06 December</span>
<a class="comment-reply-link" href="#">Reply</a>
<div class="text_holder">
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
</div>

</div>
<div class="heading-text heading-line text-center">
<h4>Sản phẩm cùng loại!</h4>
</div>
<div class="row">

<div class="col-lg-4">
<div class="widget-shop">
<div class="product">
<div class="product-image">
<a href="#"><img src="images/shop/products/10.jpg" alt="Shop product image!">
</a>
</div>
<div class="product-description">
<div class="product-category">Women</div>
<div class="product-title">
<h3><a href="#">Bolt Sweatshirt</a></h3>
</div>
<div class="product-price"><del>$30.00</del><ins>$15.00</ins>
</div>
<div class="product-rate">
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star-half-o"></i>
</div>
</div>
</div>
</div>
</div>

</div>
</div>


<div class="sidebar col-lg-3">

@include('layout.sidebar_pro')





</div>

</div>
</div>
</section>

@endsection