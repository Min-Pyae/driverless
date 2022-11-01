<footer class="p-md-5 p-3 bg-light">
    <div class="container"></div>
        <div class="row">

            <div class="col-lg-3 col-6 text-lg-start text-center mb-5">
                <ul class="nav flex-column">
                    <li class="nav-item mb-3"><a href="./index.php" class="nav-link p-0 footer-text">Home</a></li>
                    <li class="nav-item mb-3"><a href="./index.php#about" class="nav-link p-0 footer-text">About</a></li>
                    <li class="nav-item mb-3"><a href="./contact_page.php" class="nav-link p-0 footer-text">Contact</a></li>
                    <li class="nav-item mb-3"><a href="./index.php#more-info" class="nav-link p-0 footer-text">Blog</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-6 text-lg-start text-center">
                <ul class="nav flex-column">
                    <li class="nav-item mb-3"><a href="./faq_page.php" class="nav-link p-0 footer-text">FAQs</a></li>
                    <li class="nav-item mb-3"><a href="#" class="nav-link p-0 footer-text">Terms</a></li>
                    <li class="nav-item mb-3"><a href="#" class="nav-link p-0 footer-text">Privacy Policy</a></li>
                    <li class="nav-item mb-3"><a href="#" class="nav-link p-0 footer-text">Legal</a></li>
                </ul>
            </div>

            <div class="col-lg-4 col-12 offset-lg-1 offset-0 text-lg-start text-center mb-4 px-5 p-lg-1">
                <div>
                    <h5 class="footer-text mb-3">Join our newsletter</h5>
                    <p class="footer-text mb-3 text-secondary">Subscribe to get the latest updates on Driverless and our technology</p>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a class="btn btn-register p-3" href="./newsletter_form_page.php" role="button">Sign Up</a>
                    </div>
                </div>

                <!-- GOOGLE TRANSLATE -->
                <div>
                    <div class="d-flex justify-content-lg-start mt-5 mb-3" id="google_translate_element"></div>
                </div>
                <!-- END OF GOOGLE TRANSLATE -->
            </div>

        </div>

        <div class="row">
            <hr>
            <div class="col-md-6 col-12 text-md-start text-center">
                <p class="mt-lg-3 mt-2">&copy; 2022 Driverless. All rights reserved.</p>
            </div>

            <div class="col-md-6 col-12 d-flex justify-content-center justify-content-lg-end">
                <!-- SOCIAL MEDIA LINKS -->
                <div class="mt-lg-1 mt-3">
                    <div class="social-media">
                        <div class="icon">
                            <i class="bi bi-facebook"></i>
                        </div>
                        <a href="https://www.facebook.com">Facebook</a>
                    </div>

                    <div class="social-media">
                        <div class="icon">
                            <i class="bi bi-twitter"></i>
                        </div>
                        <a href="https://www.twitter.com">Twitter</a>
                    </div>

                    <div class="social-media">
                        <div class="icon">
                            <i class="bi bi-instagram"></i>
                        </div>
                        <a href="https://www.instagram.com">Instagram</a>
                    </div>
                                
                    <div class="social-media">
                        <div class="icon">
                            <i class="bi bi-youtube"></i>
                        </div>
                        <a href="https://www.youtube.com/">YouTube</a>
                    </div>          
                </div>
                <!-- END OF SOCIAL MEDIA LINKS -->
            </div>
        </div>
    </div>
</footer>

<!-- BOOTSTRAP JS -->
<!-- <script src="vendor/jquery/jquery.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


<!-- Additional Scripts -->
<script src="assets/js/custom.js"></script>
<script src="assets/js/slick.js"></script>
<script src="assets/js/accordions.js"></script>
<script src="assets/js/aos.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="assets/js/event_timer.js"></script>
<script src="https://cdn.logwork.com/widget/countdown.js"></script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<script>
    $(function() {
        AOS.init({
            offset: 100,
            duration: 1500
        });
    });
</script>

<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
            autoDisplay: false
        }, 'google_translate_element');
    }
</script>
