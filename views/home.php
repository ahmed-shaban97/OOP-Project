<!-- views/home.php -->
<!--slider area start-->
<?php
require_once __DIR__ . '/../vendor/autoload.php';

        use Model\Message;
        $message = new Message;
        $message->getMessage();
?>
<section class="slider_section d-flex align-items-center" data-bgimg="assets/img/slider/slider3.jpg">
    <div class="slider_area owl-carousel">
        <div class="single_slider d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="slider_content">
                            <h1>Next level of Drone</h1>
                            <h2>Insane Quality for use</h2>
                            <p>Special offer <span> 20% off </span> this week</p>
                            <a class="button" href="product-details.html">Buy now</a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="slider_content">
                            <img src="assets/img/product/1.png" alt="">
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="single_slider d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="slider_content">
                            <h1>Best Camera Included</h1>
                            <h2>100% Flexible</h2>
                            <p>exclusive offer <span> 20% off </span> this week</p>
                            <a class="button" href="product-details.html">Shop now</a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="slider_content">
                            <img src="assets/img/product/2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_slider d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="slider_content">
                            <h1>With some gifts</h1>
                            <h2>Special one for you</h2>
                            <p>exclusive offer <span> 20% off </span> this week</p>
                            <a class="button" href="product-details.html">shopping now</a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="slider_content">
                            <img src="assets/img/product/3.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--slider area end-->

<!--Tranding product-->
<section class="pt-60 pb-30 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section-title">
                    <h2>Tranding Products</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="single-tranding">
                    <a href="product-details.html">
                        <div class="tranding-pro-img">
                            <img src="assets/img/product/tranding-1.jpg" alt="">
                        </div>
                        <div class="tranding-pro-title">
                            <h3>Meyoji Robast Drone</h3>
                            <h4>Drone</h4>
                        </div>
                        <div class="tranding-pro-price">
                            <div class="price_box">
                                <span class="current_price">$70.00</span>
                                <span class="old_price">$80.00</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="single-tranding">
                    <a href="product-details.html">
                        <div class="tranding-pro-img">
                            <img src="assets/img/product/tranding-2.jpg" alt="">
                        </div>
                        <div class="tranding-pro-title">
                            <h3>Ut praesentium earum</h3>
                            <h4>Mevrik</h4>
                        </div>
                        <div class="tranding-pro-price">
                            <div class="price_box">
                                <span class="current_price">$70.00</span>
                                <span class="old_price">$80.00</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="single-tranding">
                    <a href="product-details.html">
                        <div class="tranding-pro-img">
                            <img src="assets/img/product/tranding-3.jpg" alt="">
                        </div>
                        <div class="tranding-pro-title">
                            <h3>Consectetur adipisicing</h3>
                            <h4>Flyer</h4>
                        </div>
                        <div class="tranding-pro-price">
                            <div class="price_box">
                                <span class="current_price">$70.00</span>
                                <span class="old_price">$80.00</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Tranding product-->

<!--Features area-->
<section class="features-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section-title">
                    <h2>Awesome Features</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="single-features">
                    <img src="assets/img/icon/1.png" alt="">
                    <h3>Impressive Distance</h3>
                    <p>consectetur adipisicing elit. Ut praesentium earum, blanditiis, voluptatem repellendus rerum
                        voluptatibus dignissimos</p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="single-features">
                    <img src="assets/img/icon/2.png" alt="">
                    <h3>100% self safe</h3>
                    <p>consectetur adipisicing elit. Ut praesentium earum, blanditiis, voluptatem repellendus rerum
                        voluptatibus dignissimos</p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="single-features">
                    <img src="assets/img/icon/3.png" alt="">
                    <h3>Awesome Support</h3>
                    <p>consectetur adipisicing elit. Ut praesentium earum, blanditiis, voluptatem repellendus rerum
                        voluptatibus dignissimos</p>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                <a href="#"><img src="assets/img/product/2.png" alt=""></a>
            </div>
        </div>
    </div>
</section>
<!--Features area-->



<!--Other product-->
<section class="pt-60 pb-30">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section-title">
                    <h2>Other collections</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="single-tranding mb-30">
                    <a href="product-details.html">
                        <div class="tranding-pro-img">
                            <img src="assets/img/product/tranding-1.jpg" alt="">
                        </div>
                        <div class="tranding-pro-title">
                            <h3>Meyoji Robast Drone</h3>
                            <h4>Drone</h4>
                        </div>
                        <div class="tranding-pro-price">
                            <div class="price_box">
                                <span class="current_price">$70.00</span>
                                <span class="old_price">$80.00</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="single-tranding mb-30">
                    <a href="product-details.html">
                        <div class="tranding-pro-img">
                            <img src="assets/img/product/tranding-2.jpg" alt="">
                        </div>
                        <div class="tranding-pro-title">
                            <h3>Ut praesentium earum</h3>
                            <h4>Mevrik</h4>
                        </div>
                        <div class="tranding-pro-price">
                            <div class="price_box">
                                <span class="current_price">$70.00</span>
                                <span class="old_price">$80.00</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="single-tranding mb-30">
                    <a href="product-details.html">
                        <div class="tranding-pro-img">
                            <img src="assets/img/product/tranding-3.jpg" alt="">
                        </div>
                        <div class="tranding-pro-title">
                            <h3>Consectetur adipisicing</h3>
                            <h4>Flyer</h4>
                        </div>
                        <div class="tranding-pro-price">
                            <div class="price_box">
                                <span class="current_price">$70.00</span>
                                <span class="old_price">$80.00</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Other product-->

<!--Testimonials-->
<section class="pb-60 pt-60 gray-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="testimonial_are">
                    <div class="testimonial_active owl-carousel">
                        <article class="single_testimonial">
                            <figure>
                                <div class="testimonial_thumb">
                                    <a href="#"><img src="assets/img/about/team-3.jpg" alt=""></a>
                                </div>
                                <figcaption class="testimonial_content">
                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots
                                        in a piece of classical Latin literature from 45</p>
                                    <h3><a href="#">Kathy Young</a><span> - CEO of SunPark</span></h3>
                                </figcaption>

                            </figure>
                        </article>
                        <article class="single_testimonial">
                            <figure>
                                <div class="testimonial_thumb">
                                    <a href="#"><img src="assets/img/about/team-1.jpg" alt=""></a>
                                </div>
                                <figcaption class="testimonial_content">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                        have suffered alteration in some form, by injected humour, or randomised words
                                        which don't look even</p>
                                    <h3><a href="#">John Sullivan</a><span> - Customer</span></h3>
                                </figcaption>

                            </figure>
                        </article>
                        <article class="single_testimonial">
                            <figure>
                                <div class="testimonial_thumb">
                                    <a href="#"><img src="assets/img/about/team-2.jpg" alt=""></a>
                                </div>
                                <figcaption class="testimonial_content">
                                    <p>College in Virginia, looked up one of the more obscure Latin words, consectetur,
                                        from a Lorem Ipsum passage, and going through the cites</p>
                                    <h3><a href="#">Jenifer Brown</a><span> - Manager of AZ</span></h3>
                                </figcaption>

                            </figure>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/Testimonials-->

<!--shipping area start-->
<section class="shipping_area">
    <div class="container">
        <div class=" row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <div class="single_shipping">
                    <div class="shipping_icone">
                        <img src="assets/img/about/shipping1.png" alt="">
                    </div>
                    <div class="shipping_content">
                        <h2>Free Shipping</h2>
                        <p>Free shipping on all US order</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <div class="single_shipping">
                    <div class="shipping_icone">
                        <img src="assets/img/about/shipping2.png" alt="">
                    </div>
                    <div class="shipping_content">
                        <h2>Support 24/7</h2>
                        <p>Contact us 24 hours a day</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <div class="single_shipping">
                    <div class="shipping_icone">
                        <img src="assets/img/about/shipping3.png" alt="">
                    </div>
                    <div class="shipping_content">
                        <h2>100% Money Back</h2>
                        <p>You have 30 days to Return</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <div class="single_shipping">
                    <div class="shipping_icone">
                        <img src="assets/img/about/shipping4.png" alt="">
                    </div>
                    <div class="shipping_content">
                        <h2>Payment Secure</h2>
                        <p>We ensure secure payment</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--shipping area end-->