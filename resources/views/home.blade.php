@extends( 'layouts.app' )

@section( 'content' )

    {{-- My hero video!!! old -> http://youtu.be/7lutvYTZk8E --}}
    <a id="bgndVideo" class="player" data-property="{videoURL:'https://youtu.be/Zbow21FKJS4',showYTLogo:false, showAnnotations: false, showControls: false, cc_load_policy: false, containment:'#home-section',autoPlay:true, mute:true, startAt:2, stopAt:36, opacity:1, optimizeDisplay:false}"></a>

    <div class="intro-section d-none d-md-block" id="home-section" style="background-color: #ccc;">

        <div class="container">

            <div id="main-page-hero-text-container" class="row align-items-center">

                <div class="col-lg-8 mx-auto text-center mb-5" data-aos="fade-up">

                    <h1 id="main-page-hero-text" class="mt-4 text-white"><span class="text-white typed-words"></span></h1>
                    <button class="btn btn-primary mt-4" style="font-size: 1.25rem" type="button" data-toggle="modal" data-target="#registerModal">Begin your Journey</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end of the hero video --}}

    {{-- The fucking metrics section --}}
    <section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url(images/bg_2.jpg);" data-stellar-background-ratio="0.5">

        <div class="overlay"></div>

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-md-10">

                    <div class="row">

                        <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">

                            <div class="block-18 text-center">

                                <div class="text">

                                    <strong class="number" data-number="678">0</strong>
                                    <span>Happy Customers</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">

                            <div class="block-18 text-center">

                                <div class="text">

                                    <strong class="number" data-number="459">0</strong>
                                    <span>Perfect Bodies</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">

                            <div class="block-18 text-center">

                                <div class="text">

                                    <strong class="number" data-number="915">0</strong>
                                    <span>Working Hours</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">

                            <div class="block-18 text-center">

                                <div class="text">

                                    <strong class="number" data-number="1000">0</strong>
                                    <span>Ways Forward</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- End metrics section --}}

    {{-- Pricing Section --}}
    <section class="ftco-section bg-light" id="pricing">

        <div class="container">

            <div class="row justify-content-center mb-5 pb-3">

                <div class="col-md-7 heading-section ftco-animate text-center">

                    <h3 class="subheading">Pricing Tables</h3>
                    <h2 class="mb-1">Membership Plans</h2>
                </div>
            </div>
            <div class="row">

                <div class="col-md-4 ftco-animate">

                    <div class="block-7">

                        <div class="text-center">

                            <h2 class="heading">One Day Training</h2>
                            <span class="price"><sup>$</sup> <span class="number">7</span></span>
                            <span class="excerpt d-block">100% free. Forever</span>
                            <a href="#" class="btn btn-primary d-block px-2 py-4 mb-4">Get Started</a>

                            <h3 class="heading-2 mb-4">Enjoy All The Features</h3>

                            <ul class="pricing-text">

                                <li>Onetime Access To All Club</li>
                                <li>Group Trainer</li>
                                <li>Book A Group Class</li>
                                <li>Fitness Orientation</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ftco-animate">

                    <div class="block-7">

                        <div class="text-center">

                            <h2 class="heading">Pay Every Month</h2>
                            <span class="price"><sup>$</sup> <span class="number">65</span></span>
                            <span class="excerpt d-block">All features are included</span>
                            <a href="#" class="btn btn-primary d-block px-3 py-4 mb-4">Get Started</a>

                            <h3 class="heading-2 mb-4">Enjoy All The Features</h3>

                            <ul class="pricing-text">

                                <li>Group Classes</li>
                                <li>Discuss Fitness Goals</li>
                                <li>Group Trainer</li>
                                <li>Fitness Orientation</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ftco-animate">

                    <div class="block-7">

                        <div class="text-center">

                            <h2 class="heading">1 Year Membership</h2>
                            <span class="price"><sup>$</sup> <span class="number">125</span></span>
                            <span class="excerpt d-block">All features are included</span>
                            <a href="#" class="btn btn-primary d-block px-3 py-4 mb-4">Get Started</a>

                            <h3 class="heading-2 mb-4">Enjoy All The Features</h3>

                            <ul class="pricing-text">

                                <li>Group Classes</li>
                                <li>Discuss Fitness Goals</li>
                                <li>Group Trainer</li>
                                <li>Fitness Orientation</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- End Pricing Section --}}

    {{-- Testimony sections --}}
    <section class="ftco-section testimony-section" id="testimonies">

        <div class="container">

            <div class="row justify-content-center mb-5 pb-3">

                <div class="col-md-7 heading-section ftco-animate text-center">

                    <h3 class="subheading">Testimony</h3>
                    <h2 class="mb-1">Successful Stories</h2>
                </div>
            </div>
            <div class="row ftco-animate">

                <div class="col-md-12">

                    <div class="carousel-testimony owl-carousel">

                        <div class="item">

                            <div class="testimony-wrap p-4 pb-5">

                                <div class="text">

                                    <p class="mb-4 pb-1 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>

                                    <div class="d-flex align-items-center">

                                        <div class="user-img" style="background-image: url(images/person_1.jpg)">

                                            <span class="quote d-flex align-items-center justify-content-center">

                                                <i class="icon-quote-left"></i>
                                            </span>
                                        </div>
                                        <div class="ml-4">

                                            <p class="name">Gabby Smith</p>
                                            <span class="position">Customer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">

                            <div class="testimony-wrap p-4 pb-5">

                                <div class="text">

                                    <p class="mb-4 pb-1 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>

                                    <div class="d-flex align-items-center">

                                        <div class="user-img" style="background-image: url(images/person_2.jpg)">

                                            <span class="quote d-flex align-items-center justify-content-center">

                                                <i class="icon-quote-left"></i>
                                            </span>
                                        </div>
                                        <div class="ml-4">

                                            <p class="name">Floyd Weather</p>
                                            <span class="position">Customer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">

                            <div class="testimony-wrap p-4 pb-5">

                                <div class="text">

                                    <p class="mb-4 pb-1 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>

                                    <div class="d-flex align-items-center">

                                        <div class="user-img" style="background-image: url(images/person_3.jpg)">

                                            <span class="quote d-flex align-items-center justify-content-center">
                                                <i class="icon-quote-left"></i>
                                            </span>
                                        </div>
                                        <div class="ml-4">

                                            <p class="name">James Dee</p>
                                            <span class="position">Customer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">

                            <div class="testimony-wrap p-4 pb-5">

                                <div class="text">

                                    <p class="mb-4 pb-1 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>

                                    <div class="d-flex align-items-center">

                                        <div class="user-img" style="background-image: url(images/person_1.jpg)">

                                            <span class="quote d-flex align-items-center justify-content-center">

                                                <i class="icon-quote-left"></i>
                                            </span>
                                        </div>
                                        <div class="ml-4">

                                            <p class="name">Lance Roger</p>
                                            <span class="position">Customer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">

                            <div class="testimony-wrap p-4 pb-5">

                                <div class="text">

                                    <p class="mb-4 pb-1 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>

                                    <div class="d-flex align-items-center">

                                        <div class="user-img" style="background-image: url(images/person_2.jpg)">

                                            <span class="quote d-flex align-items-center justify-content-center">

                                                <i class="icon-quote-left"></i>
                                            </span>
                                        </div>
                                        <div class="ml-4">

                                            <p class="name">Kenny Bufer</p>
                                            <span class="position">Customer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- End testimony Section --}}

    {{-- Blog Section --}}
    <section class="ftco-section bg-light">

        <div class="container">

            <div class="row justify-content-center mb-5 pb-3">

                <div class="col-md-7 heading-section ftco-animate text-center">

                    <h3 class="subheading">Articles</h3>
                    <h2 class="mb-1">Recent Blog</h2>
                </div>
            </div>

            <div class="row d-flex">

                <div class="col-md-4 d-flex ftco-animate">

                    <div class="blog-entry justify-content-end">

                        <a href="blog-single.html" class="block-20" style="background-image: url('images/image_1.jpg');"></a>

                        <div class="text p-4 float-right d-block">

                            <div class="meta">

                                <div><a href="#">December 23, 2018</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                            </div>

                            <h3 class="heading mt-2"><a href="#">Young Women Doing Abdominal</a></h3>

                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 d-flex ftco-animate">

                    <div class="blog-entry justify-content-end">

                        <a href="blog-single.html" class="block-20" style="background-image: url('images/image_2.jpg');"></a>

                        <div class="text p-4 float-right d-block">

                            <div class="meta">

                                <div><a href="#">December 23, 2018</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                            </div>

                            <h3 class="heading mt-2"><a href="#">Young Women Doing Abdominal</a></h3>

                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 d-flex ftco-animate">

                    <div class="blog-entry">

                        <a href="blog-single.html" class="block-20" style="background-image: url('images/image_3.jpg');"></a>

                        <div class="text p-4 float-right d-block">

                            <div class="meta">

                                <div><a href="#">December 23, 2018</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                            </div>

                            <h3 class="heading mt-2"><a href="#">Young Women Doing Abdominal</a></h3>

                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- End Blog Section --}}

    {{-- Contact Us Section --}}
    <section class="ftco-appointment" id="contact">

        <div class="overlay"></div>

        <div class="container-wrap">

            <div class="row no-gutters d-md-flex align-items-center">

                <div class="col-md-6 d-flex align-self-stretch img" style="background-image: url(images/about-3.jpg);"></div>

                <div class="col-md-6 appointment ftco-animate">

                    <h3 class="mb-3">Book a Appointment</h3>

                    <form action="#" class="appointment-form">

                        <div class="d-md-flex">

                            <div class="form-group">

                                <input type="text" class="form-control" placeholder="First Name">
                            </div>
                            <div class="form-group ml-md-4">

                                <input type="text" class="form-control" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="d-md-flex">

                            <div class="form-group">

                                <div class="input-wrap">

                                    <div class="icon"><span class="ion-md-calendar"></span></div>
                                    <input type="text" class="form-control appointment_date" placeholder="Date">
                                </div>
                            </div>
                            <div class="form-group ml-md-4">

                                <div class="input-wrap">

                                    <div class="icon"><span class="ion-ios-clock"></span></div>
                                    <input type="text" class="form-control appointment_time" placeholder="Time">
                                </div>
                            </div>
                            <div class="form-group ml-md-4">

                                <input type="text" class="form-control" placeholder="Phone">
                            </div>
                        </div>
                        <div class="d-md-flex">

                            <div class="form-group">

                                <textarea name="" id="" cols="30" rows="2" class="form-control" placeholder="Message"></textarea>
                            </div>
                            <div class="form-group ml-md-4">

                                <input type="submit" value="Appointment" class="btn btn-primary py-3 px-4">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    {{-- End Contact Us Section --}}
@endsection