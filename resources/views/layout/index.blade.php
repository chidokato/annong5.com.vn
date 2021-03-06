<!DOCTYPE HTML>
<html lang="vi-VN">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<base href="{{asset('')}}">
<!-- seo -->
<title>@yield('title')</title>
<meta name="description" content="@yield('description')"/>
<meta name="keywords" itemprop="keywords" content="@yield('keywords')" />
<meta name="news_keywords" content="@yield('keywords')" />
<meta name="robots" content="@yield('robots')"/>
<link rel="shortcut icon" href="data/favicon.png" />
<link rel="canonical" href="@yield('url')"/>
<link rel="alternate" href="{{asset('')}}" hreflang="vi-vn" />
<!-- and seo -->
<!-- og -->
<meta property="og:locale" content="vi_VN" />
<meta property="og:type" content="website" />
<meta property="og:title" content="@yield('title')" />
<meta property="og:description" content="@yield('description')" />
<meta property="og:url" content="@yield('url')" />
<meta property="og:site_name" content="site_name" />
<meta property="og:images" content="@yield('img')" />
<meta property="og:image" content="@yield('img')" />
<meta property="og:image:alt" content="@yield('title')" />
<!-- and og -->
<!-- twitter -->
<meta name="twitter:card" content="summary" />
<meta name="twitter:title" content="@yield('title')" />
<meta name="twitter:description" content="@yield('description')" />
<!-- and twitter -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta property="article:author" content="admin" />
<!-- ================= Style ================== --> 
<link href="frontend/font/stylesheet.css" rel=stylesheet>
<link href="frontend/polo/css/polo.css" rel=stylesheet>
<link href="frontend/custom79b779b7.css?113245" rel=stylesheet>
<!-- ================= js ================== --> 
@yield('css')
{!! $head_setting->codeheader !!}
</head>
@include('layout.function')
<body class="no-page-loader index-page"> 
<div id=wrapper>
@include('layout.header')

@yield('content')
</div>
@include('layout.footer')

{!! $head_setting->codebody !!}
@if(session('Alerts'))
	<script> alert('Th??nh c??ng'); </script>
@endif
<a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
<script src="frontend/js/jquery.js"></script>
<script src="frontend/js/plugins.js"></script>
<script src="frontend/js/functions.js"></script>
<script src="frontend/validate/validate.min.js"></script>
<script src="frontend/validate/valildate-rules.js"></script>
@yield('script')
<script src="frontend/toc.js"></script>
</body>
</html>