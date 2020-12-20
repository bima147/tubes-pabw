	<!-- Footer Section Start-->
      <div class="footer-main-container">
         <div class="footer-inner">
            <div class="container">
               <div class="foot-top">
                  <div class="foot-top-right row">
                     <ul class="foot-top-left col-lg-3 col-md-3 col-sm-6 col-xs-6">
                           <a href="#" class="foot-logo" style="text-decoration:none">
                            	<img src="{{ asset('img/logo.png') }}" alt="">
                           </a>
                           <hr class="foot-list-bold">
                          <p class="foot-text">JajanIkan adalah sebuah website penyedia ikan online. Disini kamu dapat dengan mudah </p>
                     </ul>
                     <ul class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <h5>Kategori</h5>
                           <hr class="foot-list-bold">
                           @foreach($category as $cat)
                           <li><a href="#">{{ $cat->nama_kategori }}</a></li>
                           @endforeach
                     </ul>
                     <ul class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <h5>Explore</h5>
                        <hr class="foot-list-bold">
                        <li><a href="/about-us">About Us</a></li>
                        <li><a href="/careers">Careers</a></li>
                        <li><a href="/blogs">Blog</a></li>
                        <li><a href="/#product">Services</a></li>
                     </ul>
                     <ul class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <h5>Social Media</h5>
                           <hr class="foot-list-bold">
                        <div class="social-media">
                           <a href="https://instagram.com/"><i class="fab fa-instagram instagram"></i></a>
                           <a href="https://facebook.com/"><i class="fab fa-facebook-f facebook"></i></a>
                           <a href="https://twitter.com/"><i class="fab fa-twitter twitter"></i></a>
                           <a href="https://youtube.com/"><i class="fab fa-youtube youtube"></i></a>
                        </div>
                     </ul>
                  </div>
               </div>
               <div class="foot-info col-lg-12 text-center">
                  <p><a href="/" style="text-decoration: none;">&copy; 2020 Inspiring Media All Rights Reserved.</a></p>
               </div>
            </div>
         </div>
      </div>
      <!--Footer Section End-->

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5fdf56eca8a254155ab4f4e0/1eq06n4b7';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
    @livewireScripts
  </body>
</html>