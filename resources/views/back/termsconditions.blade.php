@extends('layout.back_master')

@section('title', 'Terms & Condition')

@section('styles')
	
@endsection

@section('content')
<section class="headings" style="height: 100%;">
            <div class="text-heading text-center">
                <div class="container">
                    <h1>Terms & Conditions Our Company</h1>
                    <h2><a href="{{url('/')}}">Home </a> &nbsp;/&nbsp; Terms & Conditions</h2>
                </div>
            </div>
        </section>
        <!-- END SECTION HEADINGS -->
        <!-- START SECTION ABOUT -->
        <section class="about-us fh">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 who-1">
                        <div>
                            <h2 class="text-left mb-4">Terms  <span>of Use</span></h2>
                        </div>
                        <div class="pftext">
                            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum odio id voluptatibus incidunt cum? Atque quasi eum debitis optio ab. Esse itaque officiis tempora possimus odio rerum aperiam ratione, sunt. Lorem ipsum dolor sit amet, consectetur adipisicing elit sunt.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum odio id voluptatibus incidunt cum? Atque quasi eum debitis optio ab. Esse itaque officiis tempora possimus odio rerum aperiam ratione, sunt. Lorem ipsum dolor sit amet, consectetur adipisicing elit sunt.</p> -->
                            <p>
                                These terms of use ("Terms") constitute a legally binding agreement between you and Realty Services Limited (the "Company/
                                We/
                                website www.
                                or Us') regarding the use of the web application/ com (the "Site") or the domain thereof and
                                any service offered or deemed to be offered by the Company including
                                but not limited to delivery of content via the Site, any mobile or internet
                                connected device or otherwise (the "the Service").
                                Your use of the Site and services and tools are governed by the following Terms &Conditions which are incorporated herein. By mere
                                use of the Site, you shall be contracting with Realty Services Limited, the owner of the Platform. These terms and
                                conditions including the policies constitute your binding obligations,
                                with
                                Therefore, it is imperative that before using the platform you acquaint yourself and understand the applicability and
                                consequential application of these terms & conditions.
                                When You use any of the services provided by Us through the Platform, including but not limited to, (e.g. Product Reviews, Seller Reviews), You will be subject to the rules, guidelines, policies, terms, and conditions applicable to such service, and they shall be deemed to be incorporated into these Terms and shall be considered as part and parcel of these Terms.
                                may amend/modify these terms and conditions at any time, and such modifications shall be effective immediately upon
                                posting of the modified terms and conditions on
                                You may review the modified terms and conditions periodically to be aware of such modifications and your continued access or use of
                                shall be deemed conclusive proof of your acceptance of these terms and conditions, as amended/modified from time to time.
                                reserves the right to suspend the operations for support
                                or technical upgradation, maintenance work, in order to update the content or for any other reason without intimating any user in advance.
                            </p>
                        </div>
                        <!-- <div class="box bg-2">
                            <a href="about.html" class="text-center button button--moema button--text-thick button--text-upper button--size-s">read More</a>
                            <img src="images/signature.png" class="ml-5" alt="">
                        </div> -->
                    </div>
                    <div class="col-lg-6 col-md-12 col-xs-12">
                        <h2 class="text-left mb-4">Terms</h2>
                        <p>These Terms shall continue to form a valid and binding contract between the Parties and shall continue to be in full force and effect till the User continues to access the Site and avails the Services provided by the Company.</p>
                        <h2 class="text-left mb-4">Services</h2>
                            <p>Company provides a number of internet-based services through its platform and shall </p><br>
                            <p> 1. Posting User profile or listing for the purpose of sale/rental of property, and related property services </p> <br>
                            <p> 2. Fnid aproperty througAlpha Land.com and its internet links.</p> <br>
                            <p> 3. Place a print advertisement in any of the group publications through the A l p h a Land. .com site.</p> <br>
                            <p> 4. Post advertisements on Alpha Land.com </p> <br>
                            <p> 5. Send advertisements and promotional messages through emails and messages.</p> <br>
                            <p>The Services can be purchased through various methods of payments offered. The purchase of Services shall be additionally governed by specific policies of sale, like subscription fees, payment and Refund policy, cancellation policy etc.</p>
                    </div>
                    <div class="col-lg-6 col-md-12 col-xs-12">
                        <h2 class="text-left mb-4">Eligibility</h2>
                        <p>You hereby represent and warrant to the Company that you are at least eighteen (18) years of age or above and are competent to enter into a valid and binding contract apart from being capable of entering, performing and adhering to these Terms & Conditions. While individuals under the age of 18 may utilize the Service of the site, they shall do so only with the involvement &guidance of their parents and /
                        or legal guardians, under such Parent /Legal guardian's registered account. You agree to register prior to uploading any content and / or comment and any other use or services of this site and provide your details including but not limited to complete name, age, email address, residential address, and contact number.</p> <br>
                    </div>
                    <div class="col-lg-6 col-md-12 col-xs-12">
                        <h2 class="text-left mb-4">Obligations <span>and Representations of User/Subscriber</span></h2>
                            <p> 1. To provide accurate, complete and correct registration data on initial application for the Services.</p> <br>
                            <p> 2. The User agrees that any data entered on the Site will be subject to mandatory verification process by the Company.</p> <br>
                            <p> 3. Any and all licenses, permits, consents, approvals and intellectual property or other rights as may be required for using the Service shall be obtained by the User at his own cost.</p> <br>
                            <p> 4. The User will ensure compliance with all notices or instructions given by the Company from time to time to enable the use of the Service. </p> <br>
                            <p> 5. The User understands and agrees that the User is responsible for all applicable taxes and for all costs that are incurred in using the Site service(s).</p> <br>
                            <p> 6. The User shall be solely responsible for al information retrieved, stored and transmitted by him.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- END SECTION ABOUT -->
        <!-- START SECTION WHY CHOOSE US -->
        <section class="how-it-works bg-white-2">
            <div class="container">
                <div class="sec-title">
                    <h2><span>Why </span>Choose Us</h2>
                    <p>We provide full service at every step.</p>
                </div>
                <div class="row service-1">
                    <article class="col-lg-4 col-md-6 col-xs-12 serv" data-aos="fade-up">
                        <div class="serv-flex">
                            <div class="art-1 img-13">
                                <img src="{{asset('assets/images/icons/icon-4.svg')}}" alt="">
                                <h3>Wide Renge Of Properties</h3>
                            </div>
                            <div class="service-text-p">
                                <p class="text-center">lorem ipsum dolor sit amet, consectetur pro adipisici consectetur debits adipisicing lacus consectetur Business Directory.</p>
                            </div>
                        </div>
                    </article>
                    <article class="col-lg-4 col-md-6 col-xs-12 serv" data-aos="fade-up">
                        <div class="serv-flex">
                            <div class="art-1 img-14">
                                <img src="{{asset('assets/images/icons/icon-5.svg')}}" alt="">
                                <h3>Trusted by thousands</h3>
                            </div>
                            <div class="service-text-p">
                                <p class="text-center">lorem ipsum dolor sit amet, consectetur pro adipisici consectetur debits adipisicing lacus consectetur Business Directory.</p>
                            </div>
                        </div>
                    </article>
                    <article class="col-lg-4 col-md-6 col-xs-12 serv mb-0 pt" data-aos="fade-up">
                        <div class="serv-flex arrow">
                            <div class="art-1 img-15">
                                <img src="{{asset('assets/images/icons/icon-6.svg')}}" alt="">
                                <h3>Financing made easy</h3>
                            </div>
                            <div class="service-text-p">
                                <p class="text-center">lorem ipsum dolor sit amet, consectetur pro adipisici consectetur debits adipisicing lacus consectetur Business Directory.</p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>
        <!-- END SECTION WHY CHOOSE US -->
        <!-- START SECTION COUNTER UP -->
        <section class="counterup">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="countr">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <div class="count-me">
                                <p class="counter text-left">300</p>
                                <h3>Sold Houses</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="countr">
                            <i class="fa fa-list" aria-hidden="true"></i>
                            <div class="count-me">
                                <p class="counter text-left">400</p>
                                <h3>Daily Listings</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="countr mb-0">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <div class="count-me">
                                <p class="counter text-left">250</p>
                                <h3>Expert Agents</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="countr mb-0 last">
                            <i class="fa fa-trophy" aria-hidden="true"></i>
                            <div class="count-me">
                                <p class="counter text-left">200</p>
                                <h3>Won Awars</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END SECTION COUNTER UP -->
        <!-- START SECTION AGENTS -->
        <section class="team">
            <div class="container">
                <div class="sec-title">
                    <h2><span>Our </span>Team</h2>
                    <p>We provide full service at every step.</p>
                </div>
                <div class="row team-all">
                    <div class="col-lg-3 col-md-6 team-pro">
                        <div class="team-wrap">
                            <div class="team-img">
                                <img src="images/team/t-5.jpg" alt="" />
                            </div>
                            <div class="team-content">
                                <div class="team-info">
                                    <h3>Carls Jhons</h3>
                                    <p>Financial Advisor</p>
                                    <div class="team-socials">
                                        <ul>
                                            <li>
                                                <a href="#" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                                <a href="#" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                                <a href="#" title="instagran"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <span><a href="#">View Profile</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 team-pro">
                        <div class="team-wrap">
                            <div class="team-img">
                                <img src="images/team/t-6.jpg" alt="" />
                            </div>
                            <div class="team-content">
                                <div class="team-info">
                                    <h3>Arling Tracy</h3>
                                    <p>Acountant</p>
                                    <div class="team-socials">
                                        <ul>
                                            <li>
                                                <a href="#" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                                <a href="#" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                                <a href="#" title="instagran"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <span><a href="#">View Profile</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 team-pro pb-none">
                        <div class="team-wrap">
                            <div class="team-img">
                                <img src="images/team/t-7.jpg" alt="" />
                            </div>
                            <div class="team-content">
                                <div class="team-info">
                                    <h3>Mark Web</h3>
                                    <p>Founder &amp; CEO</p>
                                    <div class="team-socials">
                                        <ul>
                                            <li>
                                                <a href="#" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                                <a href="#" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                                <a href="#" title="instagran"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <span><a href="#">View Profile</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 team-pro kat">
                        <div class="team-wrap">
                            <div class="team-img">
                                <img src="images/team/t-8.jpg" alt="" />
                            </div>
                            <div class="team-content">
                                <div class="team-info">
                                    <h3>Katy Grace</h3>
                                    <p>Team Leader</p>
                                    <div class="team-socials">
                                        <ul>
                                            <li>
                                                <a href="#" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                                <a href="#" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                                <a href="#" title="instagran"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <span><a href="#">View Profile</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END SECTION AGENTS -->
        <!-- START SECTION TESTIMONIALS -->
        <section class="testimonials home18 bg-white">
            <div class="container">
               <div class="sec-title">
                    <h2><span>Clients </span>Testimonials</h2>
                    <p>We collect reviews from our customers.</p>
                </div>
                <div class="owl-carousel style1">
                    <div class="test-1 pb-0 pt-0">
                        <img src="images/testimonials/ts-1.jpg" alt="">
                        <h3 class="mt-3 mb-0">Lisa Smith</h3>
                        <h6 class="mt-1">New York</h6>
                        <ul class="starts text-center mb-2">
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, ligula magna at etiam aliquip venenatis. Vitae sit felis donec, suscipit tortor et sapien donec.</p>
                    </div>
                    <div class="test-1 pb-0 pt-0">
                        <img src="images/testimonials/ts-2.jpg" alt="">
                        <h3 class="mt-3 mb-0">Jhon Morris</h3>
                        <h6 class="mt-1">Los Angeles</h6>
                        <ul class="starts text-center mb-2">
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star-o"></i>
                            </li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, ligula magna at etiam aliquip venenatis. Vitae sit felis donec, suscipit tortor et sapien donec.</p>
                    </div>
                    <div class="test-1 pt-0">
                        <img src="images/testimonials/ts-3.jpg" alt="">
                        <h3 class="mt-3 mb-0">Mary Deshaw</h3>
                        <h6 class="mt-1">Chicago</h6>
                        <ul class="starts text-center mb-2">
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, ligula magna at etiam aliquip venenatis. Vitae sit felis donec, suscipit tortor et sapien donec.</p>
                    </div>
                    <div class="test-1 pt-0">
                        <img src="images/testimonials/ts-4.jpg" alt="">
                        <h3 class="mt-3 mb-0">Gary Steven</h3>
                        <h6 class="mt-1">Philadelphia</h6>
                        <ul class="starts text-center mb-2">
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star-o"></i>
                            </li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, ligula magna at etiam aliquip venenatis. Vitae sit felis donec, suscipit tortor et sapien donec.</p>
                    </div>
                    <div class="test-1 pt-0">
                        <img src="images/testimonials/ts-5.jpg" alt="">
                        <h3 class="mt-3 mb-0">Cristy Mayer</h3>
                        <h6 class="mt-1">San Francisco</h6>
                        <ul class="starts text-center mb-2">
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, ligula magna at etiam aliquip venenatis. Vitae sit felis donec, suscipit tortor et sapien donec.</p>
                    </div>
                    <div class="test-1 pt-0">
                        <img src="images/testimonials/ts-6.jpg" alt="">
                        <h3 class="mt-3 mb-0">Ichiro Tasaka</h3>
                        <h6 class="mt-1">Houston</h6>
                        <ul class="starts text-center mb-2">
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star-o"></i>
                            </li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, ligula magna at etiam aliquip venenatis. Vitae sit felis donec, suscipit tortor et sapien donec.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- END SECTION TESTIMONIALS -->

        <!-- STAR SECTION PARTNERS -->
        <div class="partners bg-white-2">
            <div class="container">
                <div class="sec-title">
                    <h2><span>Our </span>Partners</h2>
                    <p>The Companies That Represent Us.</p>
                </div>
                <div class="owl-carousel style2">
                    <div class="owl-item"><img src="images/partners/11.jpg" alt=""></div>
                    <div class="owl-item"><img src="images/partners/12.jpg" alt=""></div>
                    <div class="owl-item"><img src="images/partners/13.jpg" alt=""></div>
                    <div class="owl-item"><img src="images/partners/14.jpg" alt=""></div>
                    <div class="owl-item"><img src="images/partners/15.jpg" alt=""></div>
                    <div class="owl-item"><img src="images/partners/16.jpg" alt=""></div>
                    <div class="owl-item"><img src="images/partners/17.jpg" alt=""></div>
                    <div class="owl-item"><img src="images/partners/11.jpg" alt=""></div>
                    <div class="owl-item"><img src="images/partners/12.jpg" alt=""></div>
                    <div class="owl-item"><img src="images/partners/13.jpg" alt=""></div>
                </div>
            </div>
        </div>
        <!-- END SECTION PARTNERS -->
        @endsection