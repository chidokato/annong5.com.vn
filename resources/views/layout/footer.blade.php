<a id="goToTop"><i class="fa fa-angle-up top-icon"></i><i class="fa fa-angle-up"></i></a>
    <a href="javascript:showMenu()" class="show-menu hidden-xs hidden-sm"><img src="frontend/0809/bar.png" /></a>
    <a href="tel:{{$head_setting->hotline}}" class="btn-hotline-noi" data-action="Khách hàng bấm nút hotline"><img src="frontend/0809/Group%204.png" /></a>
    <a href="javascript:void(0)" class="btn-hotline-noi btn-hotline-noi-2 btn-mua" data-action="Khách hàng bấm nút form"><img src="frontend/0809/Group%206.png" /></a>
    <div class="modal fade" id="modalForm" tabindex="-1" role="modal" aria-labelledby="modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="slideInfo2">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <p>Đăng ký nhận ưu đãi<br />và tư vấn miễn phí</p>
                        <form class="widget-contact-form" action="dang-ky" method="POST" >
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <input type="hidden" name="link" value="<?php echo 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>" />
                            <div class="form-group">
                                <input type="text" aria-required="true" name="name" class="form-control name" placeholder="Họ và tên" />
                            </div>
                            <div class="form-group">
                                <input type="text" aria-required="true" name="phone" class="form-control phone" placeholder="Số điện thoại" />
                            </div>
                            <div class="form-group">
                                <input type="email" aria-required="true" name="email" class="form-control email" placeholder="Email" />
                            </div>
                            <div class="form-group text-center">
                                <input type="hidden" name="subject" value="Đăng ký nhận ưu đãi" />
                                <button class="btn btn-my btn-send-mail" data-action="Khách hàng bấm nút Đăng ký nhận thông tin" type="submit">Đăng ký nhận thông tin</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <a id="goToTop"><i class="fa fa-angle-up top-icon"></i><i class="fa fa-angle-up"></i></a>
    <script src=frontend/polo/js/jquery.js></script>
    <script src=frontend/polo/js/plugins.js></script>
    <script src=frontend/functions.js></script>
    <script src=frontend/js/jquery.cookie.min.js></script>
    <script src=frontend/js/jquery.matchHeight-min.js></script>
    <script src=frontend/js/wow.min.js></script>
    <script type=text/javascript>
        window.addEventListener('DOMContentLoaded', function () {
            (function ($) {

                var screenTop = $(document).scrollTop();

                if (screenTop >= 100) {
                    $('#menu-overlay-trigger').addClass('fixed');
                } else {
                    $('#menu-overlay-trigger').removeClass('fixed');
                }

                $(window).scroll(function (event) {
                    var screenTop = $(document).scrollTop();
                    if (screenTop >= 100) {
                        $('#menu-overlay-trigger').addClass('fixed');
                    } else {
                        $('#menu-overlay-trigger').removeClass('fixed');
                    }
                });

                // $('#openModal').modal('show');
                // setTimeout(function(){
                //   $('.waitactive').removeClass('active');
                // },5000);

                $(".matchHeight").matchHeight({ byRow: true, property: "height", target: null, remove: false });
                $(".matchHeight1").matchHeight({ byRow: true, property: "height", target: null, remove: false });
                $(".matchHeight2").matchHeight({ byRow: true, property: "height", target: null, remove: false });
                $(".matchHeight3").matchHeight({ byRow: true, property: "height", target: null, remove: false });
                $(".matchHeight4").matchHeight({ byRow: true, property: "height", target: null, remove: false });
                $(".matchHeight5").matchHeight({ byRow: true, property: "height", target: null, remove: false });
                $(".matchHeight6").matchHeight({ byRow: false, property: "height", target: null, remove: false });
                new WOW().init();

                $('body').on('click', '.btn-mua', function (event) {
                    $('#modalForm').modal('show');
                });

                $('body').on('click', '.btn-taive', function (event) {
                    $('#modalTaive').modal('show');
                    $('#modalTaive').find('.btn-link-tai').attr('data-taive', $(this).data('file'));
                });

                $('.carousel-click .carousel-click-item').each(function (index, el) {
                    $(this).on('click', function (event) {
                        event.preventDefault();
                        $('.carousel-click .owl-dot:nth(' + index + ')').trigger('click');
                    });
                });

                $('#mainMenu a.scroll-to').click(function (event) {
                    $('#menu-overlay-trigger').trigger('click');
                });

                if (isMobile()) {
                    $('#mainMenu a.scroll-to').click(function (event) {
                        $('#mainMenu-trigger button').trigger('click');
                    });
                }

                var device = (isMobile()) ? 'Điện thoại' : 'Máy tính';
                var utm = getUrlParameter('utm_source');
                var action = '';

            })(jQuery);
        });

        if (screen.width >= 992) {
            $('#mainMenu').addClass("hide");
        }

        var getUrlParameter = function getUrlParameter(sParam) {
            var sPageURL = decodeURIComponent(window.location.search.substring(1)),
                sURLVariables = sPageURL.split('&'),
                sParameterName,
                i;

            for (i = 0; i < sURLVariables.length; i++) {
                sParameterName = sURLVariables[i].split('=');

                if (sParameterName[0] === sParam) {
                    return sParameterName[1] === undefined ? true : sParameterName[1];
                }
            }
        };

        function showMenu() {
            if ($('#mainMenu').hasClass("hide")) {
                $('#mainMenu').removeClass("hide");
            } else {
                $('#mainMenu').addClass("hide");
            }
        }
       
       
    </script>