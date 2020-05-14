<footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="widget">
                            <div class="widget-title">
                                <h4>Giới thiệu</h4>
                                <hr>
                            </div>
                        </div><!-- end widget -->  
                    </div><!-- end col -->

                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="widget">
                            <div class="widget-title">
                                <h4>Liên hệ</h4>
                                <hr>
                            </div><!-- end widget-title -->

                            <div class="links-widget m30">
                                <ul class="check">
                                    <li><a href="#">E-mail: contact@gmail.com</a></li>
                                    <li><a href="#">Địa chỉ: Bạch Mai, Hai Bà Trưng, Hà Nội</a></li>
                                    <li><a href="#">Add to our database</a></li>
                                    <li><a href="#">Write a review</a></li>
                                    <li><a href="#">Report site issue</a></li>
                                    <li><a href="#">Our Authors</a></li>
                                    <li><a href="#">Site Categories</a></li>
                                </ul>
                            </div><!-- end links -->
                        </div><!-- end widget -->  
                    </div><!-- end col -->
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="widget">
                            <div class="widget-title">
                                <h4>Chuyên mục nổi bật</h4>
                                <hr>
                            </div><!-- end widget-title -->

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
                            </div><!-- end links -->
                        </div><!-- end widget -->  
                    </div><!-- end col -->

                    
            </div>
        </footer>

        <div id="sitefooter-wrap">
            <div id="sitefooter" class="container">
                <div id="copyright" class="row">
                    <div class="col-md-6 col-sm-12 text-left">
                    <p class="copyright-notice"><span class="fa fa-copyright"></span> 2016 Techmag. All Rights Reserved. A <a href="#" title="TemplateVisual" target="_blank">TemplateVisual</a> INC.</p>
                    <p class="footer-links"><a href="#" title="Privacy Policy" rel="nofollow">Privacy Policy</a><span>|</span><a href="#" title="Site Disclosure" rel="nofollow">Site Terms &amp; Disclosures</a><span>|</span><a href="#" title="" rel="nofollow" target="_blank">Powered by Bootstrap</a></p>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <ul class="list-inline text-right">
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

    </div><!-- end wrapper -->
    <!-- END SITE -->

    <script src="{{asset('asset/js/jquery.min.js')}}"></script>
    <script src="{{asset('asset/js/bootstrap.js')}}"></script>
    <script src="{{asset('asset/js/plugins.js')}}"></script>
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

<!-- Mirrored from trendingtemplates.com/demos/techmag/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 May 2020 01:49:03 GMT -->
</html>