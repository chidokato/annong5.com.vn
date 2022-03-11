@extends('layout.index')

@section('title'){{ isset($head_setting->title) ? $head_setting->title : $head_setting->name }}@endsection
@section('description'){{$head_setting->description}}@endsection
@section('keywords'){{$head_setting->keywords}}@endsection
@section('robots'){{ $head_setting->robot == 0 ? 'index, follow' : 'noindex, nofollow' }}@endsection
@section('url'){{asset('').$head_setting['slug']}}@endsection

@section('content')

<div class="slideBox section" id="slideBox">
    <div id=slider class="inspiro-slider dots-inside" data-ratio-width=1920 data-ratio-height=980 data-dots="true" data-autoplay=true data-autoplay-timeout=3000>
        <div class=slide style="background-image:url('frontend/2409/1.jpg');background-position: center;background-size: cover;"></div>
        <div class=slide style="background-image:url('frontend/new/phu3.jpg');background-position: center;background-size: cover;"></div>
        <div class=slide style="background-image:url('frontend/2409/3.jpg');background-position: center;background-size: cover;"></div>
        <div class=slide style="background-image:url('frontend/new/phu7.jpg');background-position: center;background-size: cover;"></div>
    </div>
    <div class="slideInfo2Con">
        <div class="slideInfo2 dangki wow zoomInUp">
            <p>Đăng ký nhận ưu đãi<br>và tư vấn miễn phí</p>
            <form action="dang-ky" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <input type="hidden" name="link" value="<?php echo 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>" />
                <div class="form-group">
                    <input type="text" aria-required="true" name="Họ và tên" class="form-control name" placeholder="Họ và tên">
                </div>
                <div class="form-group">
                    <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" pattern="\d*" maxlength="11" min="010000000" max="99999999999"  aria-required="true" name="Số điện thoại" class="form-control phone" placeholder="Số điện thoại">
                </div>
                <div class="form-group">
                    <input type="email"  name="email" class="form-control email" placeholder="Email">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-my btn-send-mail" data-action="Khách hàng bấm nút Đăng ký nhận thông tin" type="button">Đăng ký nhận thông tin</button>
                </div>
            </form>
        </div>
    </div>
</div>

<section id="vitri" class="s1 section" style="background-image:url('frontend/new/phu2.jpg');background-size: cover;background-position: top;">
            <img src="frontend/2409/so%20do.jpg" class="visible-xs m-b-30">
            <div class="container">
                <div class="heading wow bounceInLeft m-b-10">
                    <h1 style="opacity: 0;margin: 0;padding: 0;font-size: 1px;line-height: 1">Rose Mall - Vị trí kim cương, tương lai rộng mở</h1>
                    <h2><img src="frontend/2209/5.png" style="width: 500px"></h2>
                </div>
                <div class="wow bounceInRight">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">

                            <p style="padding: 35px; border-radius: 25px; background: rgba(255, 255, 255, 0.8); color: #603813; font-weight: 600; text-align:center; font-size: 20px">
                                Giữa những ngả đường rợp bóng cây xanh và đầy ắp hương hoa là các dãy nhà phố được thiết kế theo phong cách hiện đại. Những đường nét phóng khoáng, tinh tế mang đậm hơi thở đương thời khéo léo kết hợp với nét kiến trúc truyền thống của nhà Việt suốt nhiều thập kỷ.
                                <br /><br /> Nằm trên những cung đường được quy hoạch theo mô hình bàn cờ, mọi nẻo thông suốt và liên kết liền mạch, khu đô thị thương mại RoseMall không chỉ là nơi an cư đẳng cấp mà còn thuận tiện kết hợp với các mô hình kinh doanh gia tăng lợi nhuận.
                            </p>

                            <p><a href="javascript:void(0)" class="btn btn-my btn-mua">Đăng ký nhận thông tin</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="tongquan" class="s2 section" style="background-image:url('frontend/new/phu3.jpg');background-size: cover;background-position: top;">
            <img src="frontend/2409/bg3.jpg" class="visible-xs">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 wow bounceInRight">
                        <div class="s2box">
                            <div class="heading">
                                <p class="hidden-xs m-b-20"><img src="data/themes/{{$head_logo->img}}"></p>
                                <h2><img src="frontend/0809/Vector%20Smart%20Object.png"></h2>
                            </div>
                            <ul>
                                <li>Quy mô khu đô thị RoseMall: 4.4ha</li>
                                <li>Chủ đầu tư dự án: Công ty TNHH Annongland</li>
                                <li>Đơn vị phát triển dự án: Công ty Cổ Phần Địa Ốc XD An Phúc</li>
                                <li>Pháp lý: Sổ hồng riêng</li>
                                <li>Sản phẩm quy hoạch: Nền đất nhà phố - Biệt thự</li>
                                <li>Địa chỉ dự án: MT Vành Đai 4, ấp 5, xã Hựu Thạnh, huyện Đức Hòa, Tỉnh Long An.</li>
                            </ul>
                            <p><a href="javascript:void(0)" class="btn btn-my btn-mua">Đăng ký nhận thông tin</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="matbang" class="s5 section hidden-xs">
            <h2 class=""><img src="frontend/0809/M%e1%ba%b7t%20b%e1%ba%b1ng%20t%e1%bb%95ng%20th%e1%bb%83.png"></h2>
            <div class="" style="position: relative;">
                <img src="frontend/2409/bg3.jpg">
            </div>
        </section>

        <section id="loaihinh" class="s3 section text-light" style="background-image:url('frontend/new/phu6.jpg');background-size: cover;background-position: top;">
            <div class="container">
                <div class="heading m-b-10 wow bounceInLeft">
                    <h2><img src="frontend/2409/5.png"></h2>
                </div>
                <p class=" wow bounceInRight" style="text-align:left;  font-weight:500; font-size:20px; background: rgba(255, 255, 255, 0.80); padding: 35px; border-radius: 25px;">
                    Được quy hoạch hơn 200 nền đất nhà phố tọa lạc ngay mặt tiền trung tâm Vành Đai 4 đã hiện hữu tại khu đô thị thương mại RoseMall.<br /><br />
                    - Diện tích đa dạng:4x20, 5x16, 5x20, 8x20<br />
                    - Giá gốc chủ đầu tư: 750 triệu (50% giá trị)<br />
                    - Pháp lý: Sổ hồng riêng<br /><br />
                    Với những kiến trúc hiện đại và được cộng hưởng bởi các tiện ích hiện hữu giúp cho khu đô thị RoseMall khởi tạo lên một cuộc sống phồn thịnh, nơi khai mở cho những cư dân thành đạt.<br />
                </p>
            </div>
        </section>
        <section id="taisao" class="s4 section text-light" style="background-image:url('frontend/new/phu5.jpg');background-size: cover;background-position: top;">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-md-offset-7  wow bounceInRight">
                        <div class="s2box">
                            <div class="heading">
                                <p class="hidden-xs"><img src="data/themes/{{$head_logo->img}}"></p>
                                <h2><img src="frontend/2409/6.png"></h2>
                            </div>
                            <p class="matchHeightX"><span>1.</span>Tọa lạc ngay mặt tiền Vành Đai 4 hiện hữu 55m giao cắt N2.</p>
                            <p class="matchHeightX"><span>2.</span>Liền kề Trường Đại Học Tân Tạo</p>
                            <p class="matchHeightX"><span>3.</span>Bán kính 2km tiếp giáp đến 4KCN ( Tân Đô - Tân Đức - Hải Sơn- Hựu Thạnh)</p>
                            <p class="matchHeightX"><span>4.</span>Liền kề sông Vàm Cỏ Đông luôn cung cấp làn gió mát.</p>
                            <p><a href="javascript:void(0)" class="btn btn-my btn-mua">Đăng ký nhận thông tin</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="tintuc" class="s2 section" style="background-image: url('frontend/new/phu7.jpg'); background-size: cover; background-position: top;">
            <img src="frontend/new/phu1.jpg" class="visible-xs">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 wow bounceInRight">
                        <div class="s2box">
                            <div class="heading">
                                <p class="hidden-xs m-b-20"><img src="data/themes/{{$head_logo->img}}"></p>
                                <h2><img src="frontend/0809/new.png"></h2>
                            </div>
                            <ul>
                                <li>Chỉ với quy mô 4.4ha nhưng khu đô thị Rosemall mang cho mình đầy đủ các tiện ích vượt trội mà bất kỳ các khu đô thị khác không có được.</li>
                                <li>Về giao thông: Mặt tiền Vành đai 4 rộng 55m giao với Quốc lộ N2 là giao thông huyết mạch của khu đô thị.</li>
                                <li>Chưa đầy bán kính 1km, khu đô thị Rosemall có đầy đủ: Trung tâm thương mại Rosemall, Đại học Tân Tạo, UBND xã Hựu Thạnh, Trường cấp 1-2-3.</li>
                                <li>Với những tiện ích vượt trội hiện hữu của mình, Khu đô thị Rosemall mang cho mình những giá trị hiếm có mà ai cũng muốn sở hữu cho hiện tại và tương lại.</li>
                            </ul>
                            <p><a href="javascript:void(0)" class="btn btn-my btn-mua">Đăng ký nhận thông tin</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section id="chinhsach" class="s8 section" style="background-image:url('frontend/2409/AnhNenSecCuoi.jpg');background-size: cover;background-position: top;">
            <div class="container">
                <div class="heading wow bounceInLeft">
                    <h2 class="text-center"><img src="frontend/2409/9.png"></h2>
                </div>
                <span></span>
                <p class="text-center" style="text-align-last:center">
                    <img src="frontend/2409/10-00.png" style="max-height: 70px;" class="matchHeight wow bounceInUp" data-wow-delay="0.2s">
                    <!--<img src="frontend/./2409/11.png" class="matchHeight wow bounceInUp" data-wow-delay="0.4s">-->
                    <!--<img src="frontend/./2409/12.png" class="matchHeight wow bounceInUp" data-wow-delay="0.6s">-->
                    <!--<img src="frontend/./2409/13.png" class="matchHeight wow bounceInUp" data-wow-delay="0.8s">-->
                </p>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="text-center" style="text-align-last:center"><img style="max-height: 60px;" src="2409/10-01.png" class=" wow bounceInUp" data-wow-delay="0.4s"></p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-center" style="text-align-last:center"><img style="max-height: 60px;" src="2409/10-02.png" class=" wow bounceInUp" data-wow-delay="0.6s"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wow bounceInRight">
                    <form class="" data-wow-delay="0.3s" data-element="mail-to-admin">
                        <!-- <p>Đăng ký nhận ưu đãi<br>và tư vấn miễn phí</p> -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" aria-required="true" name="Họ và tên" class="form-control name" placeholder="Họ và tên">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" pattern="\d*" maxlength="11" min="010000000" max="99999999999" aria-required="true" name="Số điện thoại" class="form-control phone" placeholder="Số điện thoại">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control email" placeholder="Email">
                                </div>
                            </div>

                        </div>
                        <input type="hidden" name="subject" value="Đăng ký nhận ưu đãi">
                        <p class="text-center"><button class="btn btn-my btn-send-mail" data-action="Khách hàng bấm nút Đăng ký nhận thông tin" type="button">Đăng ký nhận thông tin</button></p>
                    </form>
                </div>
            </div>
        </section>
        <section id="lienhe" class="s9 section text-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 wow bounceInLeft">
                        <p class="text-right"><img src="data/themes/{{$head_logo_trang->img}}"></p>
                    </div>
                    <div class="col-md-4 wow bounceInRight">

                        <!-- <p>Địa chỉ dự án:</p> -->
                        <div style="font-size: 17px; font-weight:bold; text-align:center">CÔNG TY CP XÂY DỰNG ĐỊA ỐC AN PHÚC</div>
                        <p style="font-size: 15px;">
                            268 Đường Tên Lửa, Bình Trị Đông B, Bình Tân <br> TP Hồ Chí Minh
                        </p>
                    </div>
                    <div class="col-md-4 wow bounceInRight" data-wow-delay="0.2s">
                        <!-- <p>Hotline liên hệ:</p> -->
                        <p class="text-left"><a href="tel:{{$head_setting->hotline}}">{{$head_setting->hotline}}</a></p>
                    </div>
                </div>
            </div>
        </section>

@endsection
