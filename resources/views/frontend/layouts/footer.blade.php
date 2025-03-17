<!-- footer-area-start -->
<footer>
    <div class="footer-area pt-80 pb-45">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="footer-wrapper mb-30">
                        <h3 class="footer-title">About Company</h3>
                        <div class="footer-text">
                            <p>AstraVue is Over 30 years of expertise in high-performance laryngoscopes, delivering
                                reliable, innovative solutions for airway management.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="footer-wrapper ml-80 mb-30">
                        <h3 class="footer-title">Useful Links</h3>
                        <div class="footer-link">
                            <ul>
                                <li><a href="{{route('index')}}">Home</a></li>
                                <li><a href="{{route('about')}}">About Us</a></li>
                                <li><a href="{{route('showLogin')}}">My Account</a></li>
                                <li><a href="{{route('contact_us')}}">Contact US</a></li>
                                <!--<li><a href="#">Contact Us</a></li>-->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="footer-wrapper ml-80 mb-30">
                        <h3 class="footer-title">Product</h3>
                        <div class="footer-link">
                            <ul>
                                <li><a href="#">Pro Blades</a></li>
                                <li><a href="#">Ultra Blade</a></li>
                                <li><a href="#">Lite Blade</a></li>
                                <li><a href="#">4 Inch Mini Monitor</a></li>
                                <!--<li><a href="#">Monitor Protective Cover</a></li>-->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="footer-wrapper ml-60 mb-30">
                        <h3 class="footer-title">Stay in touch</h3>
                        <div class="footer-link mb-20">
                            <ul>
                                <li><i class="fa fa-envelope fa-icon"></i><a
                                        href="mailto:info@astrave.com">info@astrave.com</a></li>
                                <li><i class="fa fa-phone fa-icon"></i><a href="tel:+923229991969">+92 322 9991969</a>
                                </li>
                            </ul>
                        </div>
                        <div class="footer-icon">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-google-plus-g"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom-area mr-70 ml-70 pt-25 pb-25">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="copyright">
                        <p>Copyright <i class="far fa-copyright"></i> 2024 <a href="#">AstraVue</a>. All Rights
                            Reserved</p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="footer-bottom-link f-right">
                        <ul>
                            <li><a href="#">Trems & Condition </a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <!-- <li><a href="#">Our Product</a></li>
                          <li><a href="#">Service </a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer-area-end -->


<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Handle category toggle
        document.querySelectorAll('.sub-menu > li > a').forEach(anchor => {
            anchor.addEventListener('click', (e) => {
                const subMenu = anchor.nextElementSibling;

                // Check if the next sibling is a submenu
                if (subMenu && subMenu.classList.contains('sub-menu')) {
                    e.preventDefault(); // Prevent default link behavior

                    // Toggle visibility of the submenu
                    if (subMenu.style.display === 'block') {
                        subMenu.style.display = 'none';
                    } else {
                        // Hide all other submenus at the same level
                        const parent = anchor.closest('ul');
                        parent.querySelectorAll('.sub-menu').forEach(menu => {
                            menu.style.display = 'none';
                        });

                        // Show the clicked submenu
                        subMenu.style.display = 'block';
                    }
                }
            });
        });
    });

    document.addEventListener('DOMContentLoaded', () => {
        // Handle category link clicks
        document.querySelectorAll('.category-link').forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault(); // Prevent default anchor behavior

                // Hide all subcategory groups
                document.querySelectorAll('.subcategory-group').forEach(group => {
                    group.style.display = 'none';
                });

                // Show the related subcategory group
                const targetId = link.getAttribute('data-id');
                const targetGroup = document.getElementById(targetId);
                if (targetGroup) {
                    targetGroup.style.display = 'block';
                }

                // Hide all product groups
                document.querySelectorAll('.product-group').forEach(group => {
                    group.style.display = 'none';
                });
            });
        });

        // Handle subcategory link clicks
        document.querySelectorAll('.subcategory-link').forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault(); // Prevent default anchor behavior

                // Hide all product groups
                document.querySelectorAll('.product-group').forEach(group => {
                    group.style.display = 'none';
                });

                // Show the related product group
                const targetId = link.getAttribute('data-id');
                const targetGroup = document.getElementById(targetId);
                if (targetGroup) {
                    targetGroup.style.display = 'block';
                }
            });
        });
    });
</script>
<!-- JS here -->
<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="{{ asset('front_end_assets') }}/assets/js/vendor/modernizr-3.5.0.min.js"></script>
<script src="{{ asset('front_end_assets') }}/assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="{{ asset('front_end_assets') }}/assets/js/popper.min.js"></script>
<script src="{{ asset('front_end_assets') }}/assets/js/bootstrap.min.js"></script>
<script src="{{ asset('front_end_assets') }}/assets/js/owl.carousel.min.js"></script>
<script src="{{ asset('front_end_assets') }}/assets/js/isotope.pkgd.min.js"></script>
<script src="{{ asset('front_end_assets') }}/assets/js/slick.min.js"></script>
<script src="{{ asset('front_end_assets') }}/assets/js/jquery.meanmenu.min.js"></script>
<script src="{{ asset('front_end_assets') }}/assets/js/ajax-form.js"></script>
<script src="{{ asset('front_end_assets') }}/assets/js/wow.min.js"></script>
<script src="{{ asset('front_end_assets') }}/assets/js/waypoints.min.js"></script>
<script src="{{ asset('front_end_assets') }}/assets/js/jquery.appear.js"></script>
<script src="{{ asset('front_end_assets') }}/assets/js/jquery.countdown.min.js"></script>
<script src="{{ asset('front_end_assets') }}/assets/js/jquery.knob.js"></script>
<script src="{{ asset('front_end_assets') }}/assets/js/jquery.counterup.min.js"></script>
<script src="{{ asset('front_end_assets') }}/assets/js/jquery.scrollUp.min.js"></script>
<script src="{{ asset('front_end_assets') }}/assets/js/imagesloaded.pkgd.min.js"></script>
<script src="{{ asset('front_end_assets') }}/assets/js/jquery.magnific-popup.min.js"></script>
<script src="{{ asset('front_end_assets') }}/assets/js/plugins.js"></script>
<script src="{{ asset('front_end_assets') }}/assets/js/main.js?"></script>
</body>

</html>
