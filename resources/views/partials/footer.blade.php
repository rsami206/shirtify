 
 <!-- subscribe section -->
      <section class="subscribe_section">
         <div class="container-fuild">
            <div class="box">
               <div class="row">
                  <div class="col-md-6 offset-md-3">
                     <div class="subscribe_form ">
                        <div class="heading_container heading_center">
                           <h3>Subscribe To Get Discount Offers</h3>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                        <form action="" >
                           <input type="email" placeholder="Enter your email">
                           <button>
                           subscribe
                           </button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end subscribe section -->
      <!-- client section -->
      <section class="client_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Customer's Testimonial
               </h2>
            </div>
            <div id="carouselExample3Controls" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="box col-lg-10 mx-auto">
                        <div class="img_container">
                           <div class="img-box">
                              <div class="img_box-inner">
                                 <img src="images/client.jpg" alt="">
                              </div>
                           </div>
                        </div>
                        <div class="detail-box">
                           <h5>
                              Anna Trevor
                           </h5>
                           <h6>
                              Customer
                           </h6>
                           <p>
                              Dignissimos reprehenderit repellendus nobis error quibusdam? Atque animi sint unde quis reprehenderit, et, perspiciatis, debitis totam est deserunt eius officiis ipsum ducimus ad labore modi voluptatibus accusantium sapiente nam! Quaerat.
                           </p>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="box col-lg-10 mx-auto">
                        <div class="img_container">
                           <div class="img-box">
                              <div class="img_box-inner">
                                 <img src="images/client.jpg" alt="">
                              </div>
                           </div>
                        </div>
                        <div class="detail-box">
                           <h5>
                              Anna Trevor
                           </h5>
                           <h6>
                              Customer
                           </h6>
                           <p>
                              Dignissimos reprehenderit repellendus nobis error quibusdam? Atque animi sint unde quis reprehenderit, et, perspiciatis, debitis totam est deserunt eius officiis ipsum ducimus ad labore modi voluptatibus accusantium sapiente nam! Quaerat.
                           </p>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="box col-lg-10 mx-auto">
                        <div class="img_container">
                           <div class="img-box">
                              <div class="img_box-inner">
                                 <img src="images/client.jpg" alt="">
                              </div>
                           </div>
                        </div>
                        <div class="detail-box">
                           <h5>
                              Anna Trevor
                           </h5>
                           <h6>
                              Customer
                           </h6>
                           <p>
                              Dignissimos reprehenderit repellendus nobis error quibusdam? Atque animi sint unde quis reprehenderit, et, perspiciatis, debitis totam est deserunt eius officiis ipsum ducimus ad labore modi voluptatibus accusantium sapiente nam! Quaerat.
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel_btn_box">
                  <a class="carousel-control-prev" href="#carouselExample3Controls" role="button" data-slide="prev">
                  <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                  <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExample3Controls" role="button" data-slide="next">
                  <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                  <span class="sr-only">Next</span>
                  </a>
               </div>
            </div>
         </div>
      </section>
      <!-- end client section -->
 <!-- footer start -->
 <footer>
     <div class="container">
         <div class="row">
             <div class="col-md-4">
                 <div class="full">
                     <div class="logo_footer">
                         <!-- <a href="#"><img width="210" src="images/logo.png" alt="#" /></a> -->
                         <a href="/" class="fs-3 btn text-uppercase logo-a">🧥<strong class="">Shirtify</strong></a>
                     </div>
                     <div class="information_f">
                         <p><strong>ADDRESS:</strong> nationl bank lodhran pakistan</p>
                         <p><strong>TELEPHONE:</strong> +92 304 2602673</p>
                         <p><strong>EMAIL:</strong> samirajpot10@gmail.com</p>
                     </div>
                 </div>
             </div>
             <div class="col-md-8">
                 <div class="row">
                     <div class="col-md-7">
                         <div class="row">
                             <div class="col-md-6">
                                 <div class="widget_menu">
                                     <h3>Menu</h3>
                                     <ul>
                                         <li><a href="/">Home</a></li>
                                         <li><a href="{{ route('about.show') }}">About</a></li>
                                         <li><a href="{{route('services.show')}}">Services</a></li>
                                         <li><a href="{{route('testimonial.show')}}">Testimonial</a></li>
                                         <li><a href="#">Blog</a></li>
                                         <li><a href="{{route('contact.show')}}">Contact</a></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="widget_menu">
                                     <h3>Account</h3>
                                     <ul>
                                         <li><a href="#">Account</a></li>
                                         <li><a href="#">Checkout</a></li>
                                         @guest
                                         <li><a href="{{route('loginForm')}}">Login</a></li>
                                         <li><a href="{{route('signupForm')}}">Register</a></li>
                                         @endguest
                                         <li><a href="/">Shopping</a></li>
                                         <li><a href="#">Widget</a></li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-5">
                         <div class="widget_menu">
                             <h3>Newsletter</h3>
                             <div class="information_f">
                                 <p>Subscribe by our newsletter and get update protidin.</p>
                             </div>
                             <div class="form_sub">
                                 <form>
                                     <fieldset>
                                         <div class="field">
                                             <input type="email" placeholder="Enter Your Mail" name="email" />
                                             <input type="submit" value="Subscribe" />
                                         </div>
                                     </fieldset>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </footer>
 <!-- footer end -->
 <div class="cpy_">
     <p class="mx-auto">© 2025 All Rights Reserved By <a href="{{route('shop.index')}}">Free Html Templates</a><br>

         Distributed By <a href="" target="_blank">ThemeWagon</a>

     </p>
 </div>