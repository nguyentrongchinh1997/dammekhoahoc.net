<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="widget">
                    <div class="widget-title">
                        <h4>Giới thiệu</h4>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="widget">
                    <div class="widget-title">
                        <h4>Liên hệ</h4>
                        <hr>
                    </div>
                    <div class="links-widget m30">
                        <ul class="check">
                            <li><a href="#">E-mail: contact@gmail.com</a></li>
                            <li><a href="#">Địa chỉ: Bạch Mai, Hai Bà Trưng, Hà Nội</a></li>
                        </ul>
                    </div>
                </div> 
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="widget">
                    <div class="widget-title">
                        <h4>Chuyên mục nổi bật</h4>
                        <hr>
                    </div>

                    <div class="links-widget m30">
                        <ul class="check">
                            <li><a href="#">Khám phá khoa học</a></li>
                            <li><a href="#">Khoa học vũ trụ</a></li>
                            <li><a href="#">Sinh vật học</a></li>
                            <li><a href="#">Công nghệ mới</a></li>
                            <li><a href="#">Phát minh khoa học</a></li>
                            <li><a href="#">AI - Trí tuệ nhân tạo</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="widget">
                    <div class="widget-title">
                        <h4>Website khác</h4>
                        <hr>
                    </div><!-- end widget-title -->

                    <div class="links-widget m30">
                        <ul class="check">
                            <li><a href="#">Diembao24h.net</a></li>
                            <li><a href="#">Safedownload.net</a></li>
                            <li><a href="#">Moviee.vn</a></li>
                            <li><a href="#">Vanmautuyenchon.net</a></li>
                            <li><a href="#">Toeic24.vn</a></li>
                            <li><a href="#">Dehoctot.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
    </div>
    </div>
</footer>

<div id="sitefooter-wrap" style="padding: 10px 0px">
    <div id="sitefooter" class="container">
        <div id="copyright" class="row">
            <div class="col-md-6 col-sm-12 text-left">
            <p class="copyright-notice"><span class="fa fa-copyright"></span> {{date('Y')}} Damekhoahoc.net</p>
            </div>

            <div class="col-md-6 col-sm-12">
                <ul class="list-inline text-right" style="margin-bottom: 0px">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Shop</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a class="topbutton" href="#">Back to top <i class="fa fa-angle-up"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
    

    <script src="{{asset('asset/js/jquery.min.js')}}"></script>
    <script src="{{asset('asset/js/bootstrap.js')}}"></script>
    <!--<script src="{{asset('asset/js/plugins.js')}}"></script>-->
    @yield('js')
    <script type="text/javascript">
        $(function(){
            value = $('#cate').val();

            if ($('.cate' + value).attr('data') == value) {
                $('.cate' + value).addClass('active');
                $('.home').removeClass('active');
            }
        })
    </script>
</body>
</html>