<?php
$this->load->view('templates/user/navbar');
?>
<section id="about" class="about_area pt-70 pb-120">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-9">
                    <div class="about_image mt-50 wow fadeInRightBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                        <img src="<?= base_url('assets/template_landing'); ?>/images/about_hero.png" alt="Hero">
                        <div class="about_shape"></div>
                    </div> <!-- about image -->
                </div>
                <div class="col-lg-6">
                    <div class="about_content mt-45 wow fadeInLeftBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                        <div class="section_title">
                            <h5 class="sub_title">About</h5>
                            <h3 class="main_title">Why You Hire Me?</h3>
                            <ul class="line">
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                        </div> <!-- section title -->
                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus.</p>

                        <div class="about_skills pt-15">
                            <div class="skill_item mt-20">
                                <div class="skill_header">
                                    <h6 class="skill_title">UI/UX Design</h6>
                                    <div class="skill_percentage">
                                        <p><span class="counter">85</span>%</p>
                                    </div>
                                </div>
                                <div class="skill_bar">
                                    <div class="bar_inner">
                                        <div class="bar progress_line" data-width="85"></div>
                                    </div>
                                </div>
                            </div> <!-- skill item -->
                            <div class="skill_item mt-20">
                                <div class="skill_header">
                                    <h6 class="skill_title">Web Design</h6>
                                    <div class="skill_percentage">
                                        <p><span class="counter">75</span>%</p>
                                    </div>
                                </div>
                                <div class="skill_bar">
                                    <div class="bar_inner">
                                        <div class="bar progress_line" data-width="75"></div>
                                    </div>
                                </div>
                            </div> <!-- skill item -->
                            <div class="skill_item mt-20">
                                <div class="skill_header">
                                    <h6 class="skill_title">HTML/CSS</h6>
                                    <div class="skill_percentage">
                                        <p><span class="counter">90</span>%</p>
                                    </div>
                                </div>
                                <div class="skill_bar">
                                    <div class="bar_inner">
                                        <div class="bar progress_line" data-width="90"></div>
                                    </div>
                                </div>
                            </div> <!-- skill item -->
                            <div class="skill_item mt-20">
                                <div class="skill_header">
                                    <h6 class="skill_title">Sketch</h6>
                                    <div class="skill_percentage">
                                        <p><span class="counter">65</span>%</p>
                                    </div>
                                </div>
                                <div class="skill_bar">
                                    <div class="bar_inner">
                                        <div class="bar progress_line" data-width="65"></div>
                                    </div>
                                </div>
                            </div> <!-- skill item -->
                        </div> <!-- about skill -->
                    </div> <!-- about content -->
                </div>
                <a href="<?= base_url('home/about')?>">About Us Link</a>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    <!--====== Jquery js ======-->
    <script src="<?= base_url('assets/template_landing'); ?>/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?= base_url('assets/template_landing'); ?>/js/vendor/modernizr-3.7.1.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="<?= base_url('assets/template_landing'); ?>/js/popper.min.js"></script>
    <script src="<?= base_url('assets/template_landing'); ?>/js/bootstrap.min.js"></script>


    <!--====== Appear js ======-->
    <script src="<?= base_url('assets/template_landing'); ?>/js/jquery.appear.min.js"></script>

    <!--====== Scrolling Nav js ======-->
    <script src="<?= base_url('assets/template_landing'); ?>/js/jquery.easing.min.js"></script>
    <script src="<?= base_url('assets/template_landing'); ?>/js/scrolling-nav.js"></script>

    <!--====== Main js ======-->
    <script src="<?= base_url('assets/template_landing'); ?>/js/main.js"></script>