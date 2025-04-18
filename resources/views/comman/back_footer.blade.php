<!-- START FOOTER -->
<footer class="first-footer">
   <div class="top-footer">
      <div class="container">
         <div class="row">
            <div class="col-lg-3 col-md-6">
               <div class="netabout">
                  <a href="{{url('/')}}" class="logo">
                  <img src="{{URL::asset('assets/images/logo.png')}}" style="width:30%"  class="img-responsive" alt="netcom">
                  </a>
                  <p>Alpha land India's most innovative real estate advertising platform for homeowners, landlords, developers, and real estate brokers. The company offers listings for new homes, resale homes, rentals, </p>
                </div>
               <div class="contactus">
                  <ul>

                  <li>
                        <div class="info">
                           <i class="fa fa-phone" aria-hidden="true"></i>
                           <p class="in-p">+91-7991892358
                           </p>
                        </div>
                     </li>
                     <li>
                        <div class="info">
                           <i class="fa fa-envelope" aria-hidden="true"></i>
                           <p class="in-p ti">info@alphaland.in</p>
                        </div>
                     </li>
                     <li>
                        <div class="info">
                           <i class="fa fa-map-marker" aria-hidden="true"></i>
                           <p class="in-p ti">Dandupur, Ring Road, Christ nagar near Gautam Upavan lawn, Varanasi, Uttar Pradesh Pin Code-221003</p>
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="col-lg-3 col-md-6">
               <div class="navigation">
                  <h3>Navigation</h3>
                  <div class="nav-footer">
                  <ul>
                        <li><a href="{{url('/')}}">Home One</a></li>
                        <li><a href="{{url('/about-us')}}">About Us</a></li>
                        <li class="no-mgb"><a href="{{url('/contact-us')}}">Contact Us</a></li>

                        <!-- <li><a href="#">Properties List</a></li> -->
                        <!-- <li><a href="#">Property Details</a></li> -->
                        <li class="no-mgb"><a href="{{url('/post-property')}}">Agents Listing</a></li>
                     </ul>
                     <ul class="nav-right">
                        <li><a href="{{url('/privacy-policy')}}">Privacy Policy</a></li>
                        <li><a href="{{url('/refund')}}">Refund Form</a></li>
                    
                        <li><a href="{{url('/refund-policy')}}">Refund Policy</a></li>
                        <li><a href="{{url('/terms-conditions')}}"> Terms and Condition</a></li>
                   
                     </ul>
                  </div>
               </div>
            </div>
            <div class="col-lg-3 col-md-6">
               <div class="widget">
                  <h3>Social media Page</h3>
                  <div class="twitter-widget contuct">
                     <div class="twitter-area">
                        <div class="single-item">
                           <div class="icon-holder">
                              <i class="fa fa-facebook" aria-hidden="true"></i>
                           </div>
                           <div class="text">
                              <h5><a href="https://www.facebook.com/people/Alpha-Land/61567009538969/?mibextid=ZbWKwL">@findhouses</a> Please follow the page.</h5>

                           </div>
                        </div>
                        <div class="single-item">
                           <div class="icon-holder">
                              <i class="fa fa-instagram" aria-hidden="true"></i>
                           </div>
                           <div class="text">
                              <h5><a href="https://www.instagram.com/alphalanding/profilecard/?igsh=MWVjNXFvdG1tZ2F5eA==">@findhouses</a> Please follow the page</h5>

                           </div>
                        </div>
                       
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-3 col-md-6">
               <div class="newsletters">
                  <h3>Newsletters</h3>
                  <p>Sign Up for Our Newsletter to get Latest Updates and Offers. Subscribe to receive news in your inbox.</p>
               </div>
               <form class="bloq-email mailchimp form-inline" method="post" id="newsletterForm">
                  @csrf
                  <div class="email">
                     <input type="text" class="newst" id="subscribeEmail" name="email" placeholder="Enter Your Email">
                     <!-- <input type="submit" value="Subscribe"> -->
                     <input type="submit" value="Subscribe"> 
                     <!-- <button type="submit" class="subscription-success">Subscribe</button> -->
                     <!-- <p class="subscription-success"></p> -->
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <div class="second-footer">
      <div class="container">
         <p>{{date('Y')}} © Copyright - All Rights Reserved.</p>
         <ul class="netsocials">
         <li><a href="https://www.facebook.com/profile.php?id=61567009538969&mibextid=ZbWKwL"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <!-- <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li> -->
            <li><a href="https://www.instagram.com/alphalanding/profilecard/?igsh=MWVjNXFvdG1tZ2F5eA=="><i class="fa fa-instagram"></i></a></li>
            
         </ul>
      </div>
   </div>
</footer>
<a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
<!-- END FOOTER -->