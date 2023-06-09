@extends('layouts.default.index')
  @section('content')
    <div class="container ">
      <!-- Index-page Start -->
      
      <section id="home" class="section active">
        <div class="homecolor-box"></div>
        <div class="common_bg animate__animated animate__zoomIn">
          <div class="container m-auto">
            <div class="row align-items-center">
              <!-- Profile-Pic -->
              <div class=" col-xl-5 col-lg-6 col-md-6 col-12">
                <div class="home-profile animate__animated animate__fadeInLeft animate__delay-1s">
                  <img src="{{ asset('uploads') }}/images/myself/{{ $myself->photo }}" height="529px" width="529px" alt="home-profile">
                </div>
              </div>
              <!-- Profile-Pic End-->
              <!-- Profile-Information -->
              <div class="col-xl-7 col-lg-6 col-md-6 col-12">
                <div class="home-content">
                  <P class="common-desctiption animate__animated animate__fadeInDown animate__delay-1s">Get to know me
                  </P>
                  <h1 class="common-title animate__animated animate__fadeInDown animate__delay-1s">{{$myself->name}}</h1>
                  <div class="animated-bar animate__animated animate__fadeInDown animate__delay-2s"></div>
                  <div class="animated-text animate__animated animate__fadeInDown animate__delay-2s">
                    @foreach($designations as $row)
                    <h3>{{$row->designation}}</h3>
                    @endforeach
                  </div>
                  <!-- Social media icons-->
                  <div class="fixed-block animate__animated animate__jackInTheBox animate__delay-2-5s">
                    <ul class="list-unstyled social-icons">
                      <li><a href="{{ $setting->twitter}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                      <li><a href="{{ $setting->facebook}}" target="_blank"><i class="fab fa-facebook-square "></i></a></li>
                      <li><a href="{{ $setting->linkedin}}" target="_blank"><i class="fab fa-linkedin "></i></a></li>
                      <li><a href="{{ $setting->github_link}}" target="_blank"><i class="fab fa-github-square "></i></a></li>
                      <li><a href="{{ $setting->instagram}}" target="_blank"><i class="fab fa-instagram-square"></i></a></li>
                    </ul>
                  </div>
                  <p class="lorem-text animate__animated animate__zoomIn animate__delay-2-5s">{{$myself->about_myself}}
                  </p>
                  <div class="home-btn">
                    <a href="#contact" data-section-index="1"
                      class="clickbtn hire-me animate__animated animate__fadeInTopLeft animate__delay-3s ">Hire me</a>
                    <a href="#about" data-section-index="1"
                      class="clickbtn about-us animate__animated animate__fadeInTopRight animate__delay-3s">about me </a>
                  </div>
                </div>
              </div>
              <!-- Profile-Information End -->
            </div>
          </div>
        </div>
      </section>
      <!-- Index-page End -->

      <!-- About Section Start -->
      <section id="about" class="section ">
        <div class="homecolor-box"></div>
        <div class="common_bg animate__animated animate__fadeInDown">
          <div class="container">
            <div class="about-content">
              <!-- About Title Start-->
              <div class="row ">
                <div class="col-12 ">
                  <div class="section-title animate__animated animate__fadeInDown animate__delay-1s">
                    <P class="common-desctiption">my intro</P>
                    <h1 class="common-title">About <span>Me</span></h1>
                    <div class="animated-bar"></div>
                  </div>
                </div>
              </div>
              <!-- About Title End -->
              <!-- About-Me -->
              <div class="row single-section">
                <div class="col-lg-4 profile-photo animate__animated animate__fadeInLeft animate__delay-2s ">
                  <div class="row">
                    <div class="col-12 d-block col-sm-none">
                      <img src="{{ asset('uploads') }}/images/myself/{{ $myself->about_section_photo }}" class="img-fluid main-img-mobile" alt="my picture">
                    </div>
                  </div>
                </div>
                <div class="col-lg-8 col-sm-12">
                  <div class="row personal-info animate__animated animate__fadeInRight animate__delay-2s">

                    <div class="col-12">
                      <h5 class="personal-title">who am <span>i ?</span></h5>
                      <h3 class="personal-title">I'm {{$myself->name}}, a  
                        @foreach($designations as $row)
                        <span>{{$row->designation}}</span> 
                        @endforeach
                      </h3>
                      <p class="info">{{$myself->about_myself}}</p>
                    </div>

                    <div class="row align-items-center">
                      <div class="col-lg-12">
                        <h3 class="personal-infotitle">personal <span>informations</span></h3>
                      </div>

                      <div class="col-lg-6">
                        <ul class="about-you ">
                          <li>
                            <span class="title">first name :</span>
                            <span class="value">{{$myself->first_name}}</span>
                          </li>
                          <li>
                            <span class="title">last name :</span>
                            <span class="value">{{$myself->last_name}}</span>
                          </li>
                          <li>
                            <span class="title">address :</span>
                            <span class="value">{{ $setting->address}}</span>
                          </li>
                          <li>
                            <span class="title">From :</span>
                            <span class="value">{{$myself->belong_from}}</span>
                          </li>
                          <li>
                            <span class="title">Age :</span>
                            <span class="value">{{$myself->age}} years</span>
                          </li>
                        </ul>
                      </div>
                      <div class="col-lg-6">
                        <ul class="about-you ">
                          <li>
                            <span class="title">E-mail :</span>
                            <span class="value"><a href="mailto:{{$setting->email}}">{{$setting->email}}</a></span>
                          </li>
                          <li>
                            <span class="title">Phone :</span>
                            <span class="value"><a href="tel:{{$setting->phone}}">{{$setting->phone}}</a></span>
                          </li>
                          <li>
                            <span class="title">skype :</span>
                            <span class="value">steve.milner</span>
                          </li>
                          <li>
                            <span class="title">Langages :</span>
                            <span class="value">{{$myself->language}}</span>
                          </li>
                          <li>
                            <span class="title">Freelance :</span>
                            <span class="value"> {{$myself->is_available}}</span>
                          </li>
                        </ul>
                      </div>

                      <div class="col-lg-12">
                        <div class="About-btn">
                          <button id="b1" class="clickbtn download-cv">Download CV <i class="fa fa-download"
                              aria-hidden="true"></i></button>
                          <!-- Social media icons-->
                          <div class="col-lg-7 col-sm-6 col-12">
                            <ul class="list-unstyled social-icons">
                              <li><a href="{{ $setting->twitter}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                              <li><a href="{{ $setting->facebook}}" target="_blank"><i class="fab fa-facebook-square "></i></a></li>
                              <li><a href="{{ $setting->linkedin}}" target="_blank"><i class="fab fa-linkedin "></i></a></li>
                              <li><a href="{{ $setting->github_link}}" target="_blank"><i class="fab fa-github-square "></i></a></li>
                              <li><a href="{{ $setting->instagram}}" target="_blank"><i class="fab fa-instagram-square"></i></a></li>
                            </ul>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
              <!-- About-Me End -->
              <!-- Resume section Start -->
              <div class="resume-section ">
                <!-- Resume title-->
                <div class="row">
                  <div class="col-12">
                    <div class="section-title animate__animated animate__fadeInUp animate__delay-3s">
                      <P class="common-desctiption">Check out my Resume</P>
                      <h1 class="common-title ">my <span>Resume</span></h1>
                      <div class="animated-bar "></div>
                    </div>
                  </div>
                </div>
                <!-- Resume title End-->
                <!-- Resume Content -->
                <div class="row">
                  <!-- Education part-->
                  <div class="col-md-6 col-12 ">
                    <div class=" col-block education ">
                      <h3 class="about-subtitle">Education</h3>
                      <div class="resume-item"><span class="item-arrow"></span>
                        <h5 class="item-title">Bachelor of Science in Information Technology</h5><span
                          class="item-details">Cambridge University / 2004 - 2007</span>
                        <p class="item-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio quo
                          repudiandae.</p>
                      </div>
                      <div class="resume-item"><span class="item-arrow"></span>
                        <h5 class="item-title">Master of Science in Information Technology</h5><span
                          class="item-details">Cambridge University / 2007 - 2009</span>
                        <p class="item-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio quo
                          repudiandae.</p>
                      </div>
                      <div class="resume-item"><span class="item-arrow"></span>
                        <h5 class="item-title">Diploma In Web Design</h5><span class="item-details">Cambridge University
                          /
                          2009 - 2010</span>
                        <p class="item-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio quo
                          repudiandae.</p>
                      </div>
                    </div>
                  </div>
                  <!-- Experience part-->
                  <div class="col-md-6 col-12 ">
                    <div class=" col-block education">
                      <h3 class="about-subtitle">Experience</h3>
                      <div class="resume-item"><span class="item-arrow"></span>
                        <h5 class="item-title">Lead Ui/Ux Designer</h5><span class="item-details">Google / 2016 -
                          Current</span>
                        <p class="item-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio quo
                          repudiandae.</p>
                      </div>
                      <div class="resume-item"><span class="item-arrow"></span>
                        <h5 class="item-title">Senior Ui/Ux Designer</h5><span class="item-details">Adobe / 2013 -
                          2016</span>
                        <p class="item-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio quo
                          repudiandae.</p>
                      </div>
                      <div class="resume-item"><span class="item-arrow"></span>
                        <h5 class="item-title">Junior Ui/Ux Designer</h5><span class="item-details">Google / 2011 -
                          2013</span>
                        <p class="item-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio quo
                          repudiandae.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Resume ContentEnd -->
              </div>
              <!-- / Resume section End-->
              <!-- Skill Bar Section -->
              <div class="skill-section">
                <div class="row">
                  <div class="col-12 ">
                    <div class="section-title animate__animated animate__fadeInUp animate__delay-3s">
                      <P class="common-desctiption">My level of knowledge in some tools</P>
                      <h1 class="common-title">my <span>skills</span></h1>
                      <div class="animated-bar"></div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-12 ">
                    <h3 class="about-subtitle">Design <span>Skills</span></h3>
                    <div class="skill-bars">
                      <div class="bar">
                        <div class="info">
                          <span>Photoshop</span>
                        </div>
                        <div class="progress-line Photoshop">
                          <span></span>
                        </div>
                      </div>
                      <div class="bar">
                        <div class="info">
                          <span>Illustrator</span>
                        </div>
                        <div class="progress-line Illustrator">
                          <span></span>
                        </div>
                      </div>
                      <div class="bar">
                        <div class="info">
                          <span>Figma</span>
                        </div>
                        <div class="progress-line Figma">
                          <span></span>
                        </div>
                      </div>
                      <div class="bar">
                        <div class="info">
                          <span>Indesign</span>
                        </div>
                        <div class="progress-line Indesign">
                          <span></span>
                        </div>
                      </div>
                      <div class="bar">
                        <div class="info">
                          <span>Sketch</span>
                        </div>
                        <div class="progress-line Sketch">
                          <span></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-12 ">
                    <h3 class="about-subtitle">Coding <span>Skills</span></h3>
                    <div class="skill-bars">
                      <div class="bar">
                        <div class="info">
                          <span>HTML</span>
                        </div>
                        <div class="progress-line html">
                          <span></span>
                        </div>
                      </div>
                      <div class="bar">
                        <div class="info">
                          <span>CSS</span>
                        </div>
                        <div class="progress-line css">
                          <span></span>
                        </div>
                      </div>
                      <div class="bar">
                        <div class="info">
                          <span>jQuery</span>
                        </div>
                        <div class="progress-line jquery">
                          <span></span>
                        </div>
                      </div>
                      <div class="bar">
                        <div class="info">
                          <span>Python</span>
                        </div>
                        <div class="progress-line python">
                          <span></span>
                        </div>
                      </div>
                      <div class="bar">
                        <div class="info">
                          <span>MySQL</span>
                        </div>
                        <div class="progress-line mysql">
                          <span></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- / Skill Bar Section -->
              <!-- service section  -->
              <div class="services-section text-center ">
                <div class="row ">
                  <div class="col-12">
                    <div class="section-title  animate__animated animate__fadeInUp animate__slower animate__delay-3s ">
                      <P class="common-desctiption">Services i offer to my clients</P>
                      <h1 class="common-title">My <span>Services</span></h1>
                      <div class="animated-bar"></div>
                    </div>
                    <p class="service-text">Lorem Ipsum is simply dummy text of the printing and type setting industry.
                      Lorem Ipsum has been the industry's<br>standard dummy text ever since the 1500s, when an unknown
                      book.
                    </p>
                  </div>
                </div>
                <div class="row animate__animated animate__zoomIn animate__slower animate__delay-3s">
                  <!-- Single Item -->
                  <div
                    class="col-lg-3 col-sm-6 services-box animate__animated animate__zoomIn animate__slower animate__delay-3s">
                    <div class="service-item">
                      <i class="fas fa-laptop-code"></i>
                      <h4><span class="service-line">web design</span></h4>
                      <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                      </p>
                    </div>
                  </div>
                  <!-- End Single Item -->

                  <!-- Single Item -->
                  <div
                    class="col-lg-3 col-sm-6 services-box animate__animated animate__zoomIn animate__slower animate__delay-3s">
                    <div class="service-item">
                      <i class="fas fa-palette"></i>
                      <h4><span class="service-line">design</span></h4>
                      <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                      </p>
                    </div>
                  </div>
                  <!-- End Single Item -->

                  <!-- Single Item -->
                  <div
                    class="col-lg-3 col-sm-6 services-box animate__animated animate__zoomIn animate__slower animate__delay-3s">
                    <div class="service-item">
                      <i class="fas fa-object-ungroup"></i>
                      <h4><span class="service-line">product design</span></h4>
                      <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                      </p>
                    </div>
                  </div>
                  <!-- End Single Item -->

                  <!-- Single Item -->
                  <div
                    class="col-lg-3 col-sm-6 services-box animate__animated animate__zoomIn animate__slower animate__delay-3s">
                    <div class="service-item">
                      <i class="far fa-object-ungroup"></i>
                      <h4><span class="service-line">UI/UX design</span></h4>
                      <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                      </p>
                    </div>
                  </div>
                  <!-- End Single Item -->

                  <!-- Single Item -->
                  <div
                    class="col-lg-3 col-sm-6 services-box animate__animated animate__zoomIn animate__slower animate__delay-3s">
                    <div class="service-item">
                      <i class="fas fa-radiation"></i>
                      <h4><span class="service-line">animation</span></h4>
                      <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                      </p>
                    </div>
                  </div>
                  <!-- End Single Item -->

                  <!-- Single Item -->
                  <div
                    class="col-lg-3 col-sm-6 services-box animate__animated animate__zoomIn animate__slower animate__delay-3s">
                    <div class="service-item">
                      <i class="fas fa-code"></i>
                      <h4><span class="service-line">web devolopment</span></h4>
                      <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                      </p>
                    </div>
                  </div>
                  <!-- End Single Item -->

                  <!-- Single Item -->
                  <div
                    class="col-lg-3 col-sm-6 services-box animate__animated animate__zoomIn animate__slower animate__delay-3s">
                    <div class="service-item">
                      <i class="fas fa-arrows-alt"></i>
                      <h4><span class="service-line">fully responsive</span></h4>
                      <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                      </p>
                    </div>
                  </div>
                  <!-- End Single Item -->

                  <!-- Single Item -->
                  <div
                    class="col-lg-3 col-sm-6 services-box animate__animated animate__zoomIn animate__slower animate__delay-3s">
                    <div class="service-item">
                      <i class="fas fa-dharmachakra"></i>
                      <h4><span class="service-line">management</span></h4>
                      <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                      </p>
                    </div>
                  </div>
                  <!-- End Single Item -->
                </div>
              </div>
              <!-- / service section -->
              <!-- Testimonials -->
              <div class="row">
                <div class="col-12 animate__animated animate__fadeInDown animate__delay-3s">
                  <div class="section-title">
                    <P class="common-desctiption">what our clients say</P>
                    <h1 class="common-title">My<span>Testimonial</span></h1>
                    <div class="animated-bar"></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div id="testimonial" class="owl-carousel owl-theme">
                  <div class="item">
                    <div class="testimonial-item">
                      <div class="quote">
                        <i class="fas fa-quote-left"></i>
                      </div>
                      <div class="testimonial-img">
                        <img src="assets/images/profile/glitch.jpg" alt="">
                      </div>
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta consequatur,
                        optio dolores aliquid </p>
                      <div class="rating">
                        <i class="fas fa-3x fa-star"></i>
                        <i class="fas fa-3x fa-star"></i>
                        <i class="fas fa-3x fa-star"></i>
                        <i class="fas fa-3x fa-star"></i>
                        <i class="fas fa-3x fa-star"></i>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="testimonial-item">
                      <div class="quote">
                        <i class="fas fa-quote-left"></i>
                      </div>
                      <div class="testimonial-img">
                        <img src="assets/images/profile/partical.jpg" alt="">
                      </div>
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta consequatur,
                        optio dolores aliquid </p>
                      <div class="rating">
                        <i class="fas fa-3x fa-star"></i>
                        <i class="fas fa-3x fa-star"></i>
                        <i class="fas fa-3x fa-star"></i>
                        <i class="fas fa-3x fa-star"></i>
                        <i class="fas fa-3x fa-star"></i>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="testimonial-item">
                      <div class="quote">
                        <i class="fas fa-quote-left"></i>
                      </div>
                      <div class="testimonial-img">
                        <img src="assets/images/profile/simple.jpg" alt="">
                      </div>
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta consequatur,
                        optio dolores aliquid </p>
                      <div class="rating">
                        <i class="fas fa-3x fa-star"></i>
                        <i class="fas fa-3x fa-star"></i>
                        <i class="fas fa-3x fa-star"></i>
                        <i class="fas fa-3x fa-star"></i>
                        <i class="fas fa-3x fa-star"></i>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="testimonial-item">
                      <div class="quote">
                        <i class="fas fa-quote-left"></i>
                      </div>
                      <div class="testimonial-img">
                        <img src="assets/images/profile/water.jpg" alt="">
                      </div>
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta consequatur,
                        optio dolores aliquid </p>
                      <div class="rating">
                        <i class="fas fa-3x fa-star"></i>
                        <i class="fas fa-3x fa-star"></i>
                        <i class="fas fa-3x fa-star"></i>
                        <i class="fas fa-3x fa-star"></i>
                        <i class="fas fa-3x fa-star"></i>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="testimonial-item">
                      <div class="quote">
                        <i class="fas fa-quote-left"></i>
                      </div>
                      <div class="testimonial-img">
                        <img src="assets/images/profile/wrap.jpg" alt="">
                      </div>
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta consequatur,
                        optio dolores aliquid </p>
                      <div class="rating">
                        <i class="fas fa-3x fa-star"></i>
                        <i class="fas fa-3x fa-star"></i>
                        <i class="fas fa-3x fa-star"></i>
                        <i class="fas fa-3x fa-star"></i>
                        <i class="fas fa-3x fa-star"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--End Testimonials section -->
              <!-- Fun Fact Section -->
              <div class="funfacts-section">
                <div class="row">
                  <div class="col-12">
                    <div class="section-title">
                      <P class="common-desctiption">This are my strongest sides</P>
                      <h1 class="common-title">fun <span>facts</span></h1>
                      <div class="animated-bar"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-6">
                    <div class="funfacts-box">
                      <h3 class="counter" data-to="10" data-time="10000">0</h3>
                      <p class="fun-text">years of <span>experience</span></p>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                    <div class="funfacts-box">
                      <h3 class="counter" data-to="499" data-time="100000">0</h3>
                      <p class="fun-text">happy Clients</p>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                    <div class="funfacts-box">
                      <h3 class="counter" data-to="101" data-time="100000">0</h3>
                      <p class="fun-text">completed projects</p>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                    <div class="funfacts-box">
                      <h3 class="counter" data-to="20" data-time="10000">0</h3>
                      <p class="fun-text">awards win</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- About Section End -->

      <!-- Protfolio Section Start-->
      <section id="portfolio" class="section">
        <div class="homecolor-box"></div>
        <div class="common_bg animate__animated animate__fadeInLeft">
          <div class="container">
            <div class="protfolio-section text-center  ">
              <!-- Protfolio-Title Start -->
              <div class="row">
                <div class="col-12">
                  <div class="section-title animate__animated animate__fadeInDown animate__delay-1s">
                    <P class="common-desctiption">Showcasing some of my best work</P>
                    <h1 class="common-title">My <span>Portfolio</span></h1>
                    <div class="animated-bar"></div>
                  </div>
                </div>
              </div>
              <!-- Protfolio-Title Start -->
              <!-- Protfolio nav-button start  -->
              <div class="row">
                <div class="col-lg-12">
                  <div class="portfolio-menu animate__animated animate__fadeInUp animate__delay-2s">
                    <nav class="controls ">
                      <button type="button" class="control clickbtn" data-filter="all">All</button>
                      <button type="button" class="control clickbtn"
                        data-filter=".webdevelopment ">WebDevelopment</button>
                      <button type="button" class="control clickbtn" data-filter=".webdesign ">Web Design</button>
                      <button type="button" class="control clickbtn" data-filter=".graphic ">Graphic Design</button>
                      <button type="button" class="control clickbtn" data-filter=".uiuxdesign ">UI-UX Design</button>
                    </nav>
                  </div>
                </div>
              </div>
              <!-- Protfolio nav-button End  -->
              <!-- Portfolio Mix Content Start -->
              <div class="row portfolio-list animate__zoomIn animate__animated animate__delay-3s">
                <div class="container">
                  <ul class="row ps-0">
                    <!-- Mix Content-Box -->
                    <li class="mix webdevelopment col-xl-3 col-lg-4 col-md-6">
                      <a title="click to zoom-in" href="assets/images/protfolio/item-1.jpg"
                        data-caption="Web Development" data-size="1200x600">
                        <img src="assets/images/protfolio/item-1.jpg" alt="Image description" />
                        <div class="info">
                          <h3 class="title">Web Develoment</h3>
                          <span class="post">project</span>
                        </div>
                      </a>
                    </li>
                    <!-- Mix Content-Box -->
                    <li class="mix webdesign col-xl-3 col-lg-4 col-md-6">
                      <a title="click to zoom-in" href="assets/images/protfolio/item-2.jpg" data-caption="Web Design"
                        data-size="1200x600">
                        <img src="assets/images/protfolio/item-2.jpg" alt="Image description" />
                        <div class="info">
                          <h3 class="title">Web Design</h3>
                          <span class="post">project</span>
                        </div>
                      </a>
                    </li>
                    <!-- Mix Content Box -->
                    <li class="mix uiuxdesign col-xl-3 col-lg-4 col-md-6">
                      <a title="click to zoom-in" href="assets/images/protfolio/item-3.jpg" data-caption="UI-UX Design"
                        data-size="1200x600">
                        <img src="assets/images/protfolio/item-3.jpg" alt="Image description" />
                        <div class="info">
                          <h3 class="title">UI-UX Design</h3>
                          <span class="post">project</span>
                        </div>
                      </a>
                    </li>
                    <!-- Mix Content Box -->
                    <li class="mix webdevelopment col-xl-3 col-lg-4 col-md-6">
                      <a title="click to zoom-in" href="assets/images/protfolio/item-4.jpg"
                        data-caption="Web Development" data-size="1200x600">
                        <img src="assets/images/protfolio/item-4.jpg" alt="Image description" />
                        <div class="info">
                          <h3 class="title">Web Develoment</h3>
                          <span class="post">project</span>
                        </div>
                      </a>
                    </li>
                    <!-- Mix Content Box -->
                    <li class="mix webdesign col-xl-3 col-lg-4 col-md-6">
                      <a title="click to zoom-in" href="assets/images/protfolio/item-5.jpg" data-caption="Web Design"
                        data-size="1200x600">
                        <img src="assets/images/protfolio/item-5.jpg" alt="Image description" />
                        <div class="info">
                          <h3 class="title">Web Design</h3>
                          <span class="post">project</span>
                        </div>
                      </a>
                    </li>
                    <!-- Mix Content Box -->
                    <li class="mix graphic col-xl-3 col-lg-4 col-md-6">
                      <a title="click to zoom-in" href="assets/images/protfolio/item-6.jpg"
                        data-caption="Graphic Design" data-size="1200x600">
                        <img src="assets/images/protfolio/item-6.jpg" alt="Image description" />
                        <div class="info">
                          <h3 class="title">Graphic Design</h3>
                          <span class="post">project</span>
                        </div>
                      </a>
                    </li>
                    <!-- Mix Content Box -->
                    <li class="mix uiuxdesign col-xl-3 col-lg-4 col-md-6">
                      <a title="click to zoom-in" href="assets/images/protfolio/item-7.jpg" data-caption="UI-UX Design"
                        data-size="1200x600">
                        <img src="assets/images/protfolio/item-7.jpg" alt="Image description" />
                        <div class="info">
                          <h3 class="title">UI-UX Design</h3>
                          <span class="post">project</span>
                        </div>
                      </a>
                    </li>
                    <!-- Mix Content Box -->
                    <li class="mix graphic col-xl-3 col-lg-4 col-md-6">
                      <a title="click to zoom-in" href="assets/images/protfolio/item-8.jpg"
                        data-caption="Graphic Design" data-size="1200x600">
                        <img src="assets/images/protfolio/item-8.jpg" alt="Image description" />
                        <div class="info">
                          <h3 class="title">Graphic Design</h3>
                          <span class="post">project</span>
                        </div>
                      </a>
                    </li>
                    <!-- Mix Content Box -->
                  </ul>
                </div>
              </div>
              <!-- Portfolio Mix Content End -->
            </div>
          </div>
        </div>
      </section>
      <!-- Protfolio Section End -->

      <!-- Blog section Start -->
      <section id="blog" class="section">
        <div class="homecolor-box"></div>
        <div class="common_bg animate__animated animate__fadeInDown" >
          <div class="container">
            <!-- Blog-Section Title -->
            <div class="blog-section text-center">
              <div class="row ">
                <div class="col-12">
                  <div class="section-title animate__animated animate__bounceInDown animate__delay-1s">
                    <P class="common-desctiption">Check out my latest blog posts</P>
                    <h1 class="common-title">My <span>blog</span></h1>
                    <div class="animated-bar"></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Blog-Section Title End -->
            <!-- Blog-Content Box Start -->
            <div class="blog-section animate__animated animate__fadeInUp animate__delay-2s">
              <div class="row justify-content-center">
                <!-- Single post-->
                <div class="col-lg-4 col-md-6 col-sm-12">
                  <div class="single-post">
                    <div class="ih-item square effect ">
                      <a href="blog-page.html">
                        <div class="img"><img src="assets/images/blog/01.jpg" alt="img"></div>
                      </a>
                    </div>
                    <div class="card-body post-content">
                      <div class="content-date">10 Dec, 2021</div>
                      <div class="content-title">
                        <h5><a href="blog-page.html">Women in Web Design: How To Achieve Success</a></h5>
                      </div>
                      <div class="content-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                          Dolore, porro rem quod illo quam, eum alias id, repellendus magni, quas.
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                          Dolore, porro rem quod illo quam, eum alias id, repellendus magni, quas.
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br>
                          Dolore, porro rem quod illo quam, eum alias id, repellendus magni, quas.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Single post-->
                <div class="col-lg-4 col-md-6 col-sm-12">
                  <div class="single-post">
                    <div class="ih-item square effect ">
                      <a href="blog-page.html">
                        <div class="img"><img src="assets/images/blog/02.jpg" alt="img"></div>
                      </a>
                    </div>
                    <div class="card-body post-content">
                      <div class="content-date">13 Dec, 2021</div>
                      <div class="content-title">
                        <h5><a href="blog-page.html">The Services provide for designs</a></h5>
                      </div>
                      <div class="content-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                          Dolore, porro rem quod illo quam, eum alias id, repellendus magni, quas.
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                          Dolore, porro rem quod illo quam, eum alias id, repellendus magni, quas.
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br>
                          Dolore, porro rem quod illo quam, eum alias id, repellendus magni, quas.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Single post-->
                <div class="col-lg-4 col-md-6 col-sm-12">
                  <div class=" single-post">
                    <div class="ih-item square effect ">
                      <a href="blog-page.html">
                        <div class="img"><img src="assets/images/blog/03.jpg" alt="img"></div>
                      </a>
                    </div>
                    <div class="card-body post-content">
                      <div class="content-date">10 Dec, 2021</div>
                      <div class="content-title">
                        <h5><a href="blog-page.html">mobile app landing design & app maintain</a></h5>
                      </div>
                      <div class="content-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                          Dolore, porro rem quod illo quam, eum alias id, repellendus magni, quas.
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                          Dolore, porro rem quod illo quam, eum alias id, repellendus magni, quas.
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br>
                          Dolore, porro rem quod illo quam, eum alias id, repellendus magni, quas.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Single post-->
                <div class="col-lg-4 col-md-6 col-sm-12">
                  <div class="single-post">
                    <div class="ih-item square effect ">
                      <a href="blog-page.html">
                        <div class="img"><img src="assets/images/blog/04.jpg" alt="img"></div>
                      </a>
                    </div>
                    <div class="card-body post-content">
                      <div class="content-date">10 Dec, 2021</div>
                      <div class="content-title">
                        <h5><a href="blog-page.html">How to Work Better: Efficiency Tools Every Logo Designer Needs</a>
                        </h5>
                      </div>
                      <div class="content-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                          Dolore, porro rem quod illo quam, eum alias id, repellendus magni, quas.
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                          Dolore, porro rem quod illo quam, eum alias id, repellendus magni, quas.
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br>
                          Dolore, porro rem quod illo quam, eum alias id, repellendus magni, quas.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Single post-->
                <div class="col-lg-4 col-md-6 col-sm-12">
                  <div class="single-post">
                    <div class="ih-item square effect ">
                      <a href="blog-page.html">
                        <div class="img"><img src="assets/images/blog/05.jpg" alt="img"></div>
                      </a>
                    </div>
                    <div class="card-body post-content">
                      <div class="content-date">10 Dec, 2021</div>
                      <div class="content-title">
                        <h5><a href="blog-page.html">Why can Hill Planet help you in the development of your
                            website?</a>
                        </h5>
                      </div>
                      <div class="content-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                          Dolore, porro rem quod illo quam, eum alias id, repellendus magni, quas.
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                          Dolore, porro rem quod illo quam, eum alias id, repellendus magni, quas.
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br>
                          Dolore, porro rem quod illo quam, eum alias id, repellendus magni, quas.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Single post-->
                <div class="col-lg-4 col-md-6 col-sm-12">
                  <div class="single-post">
                    <div class="ih-item square effect ">
                      <a href="blog-page.html">
                        <div class="img"><img src="assets/images/blog/06.jpg" alt="img"></div>
                      </a>
                    </div>
                    <div class="card-body post-content">
                      <div class="content-date">10 Dec, 2021</div>
                      <div class="content-title">
                        <h5><a href="blog-page.html">30 Beautiful Google Fonts for Your Website</a></h5>
                      </div>
                      <div class="content-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                          Dolore, porro rem quod illo quam, eum alias id, repellendus magni, quas.
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                          Dolore, porro rem quod illo quam, eum alias id, repellendus magni, quas.
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br>
                          Dolore, porro rem quod illo quam, eum alias id, repellendus magni, quas.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Blog-Content Box End -->
          </div>
        </div>
      </section>
      <!-- Blog section End -->

      <!-- Contact section Start -->
      <section id="contact" class="section">
        <div class="homecolor-box"></div>
        <div class="common_bg animate__animated animate__zoomIn">
          <div class="container">
            <!-- Contact-page Start -->
            <div class="contact-section">
              <!-- Contact-Section Title -->
              <div class="row">
                <div class="col-12">
                  <div class="section-title animate__animated animate__fadeInDown animate__delay-1s">
                    <P class="common-desctiption">Feel free to contact me anytimes</P>
                    <h1 class="common-title">my <span>contact</span></h1>
                    <div class="animated-bar"></div>
                  </div>
                </div>
              </div>
              <!-- Contact-Section Title End-->
              <!-- Contact Form Start -->
              <div class="contact-section">
                <div class="row">
                  <!-- Contact form -->
                  <div class="col-lg-7 col-12 ">
                    <form class="contact-form animate__animated animate__fadeInLeft animate__delay-2s"
                      id="contact-form">
                      <h4 class="content-title">contact me</h4>
                      <div class="row">
                        <div class="col-12 col-md-6 form-group"><input class="form-control" id="contact-name"
                            type="text" name="name" placeholder="Name" required=""></div>
                        <div class="col-12 col-md-6 form-group"><input class="form-control" id="contact-email"
                            type="email" name="email" placeholder="Email" required=""></div>
                        <div class="col-12 form-group"><input class="form-control" id="contact-subject" type="text"
                            name="subject" placeholder="Subject" required=""></div>
                        <div class="col-12 form-group form-message"><textarea class="form-control" id="contact-message"
                            name="message" placeholder="Message" rows="5" required=""></textarea></div>
                        <div class="col-12 mb-4 form-submit"><button class="clickbtn button-main button-scheme"
                            id="contact-submit" type="submit">Send Message</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- Contact form End -->
                  <!-- Contact info -->
                  <div class="col-lg-5 col-12 ">
                    <div class="contact-info animate__animated animate__fadeInRight animate__delay-3s">
                      <h4 class="content-title">Contact Info</h4>
                      <p class="info-description">Always available for freelance work if the right project comes along,
                        Feel free to contact me!</p>
                      <ul class="list-unstyled list-info" style="display: inline-grid">
                        <li>
                          <div class="media d-flex align-items-center"><span class="info-icon"><i
                                class="fas fa-user-alt"></i></span>
                            <div class="media-body info-details">
                              <h6 class="info-type">Name</h6><span class="info-value">Alex Smith</span>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="media d-flex align-items-center"><span class="info-icon"><i
                                class="fas fa-map-pin"></i></span>
                            <div class="media-body info-details">
                              <h6 class="info-type">Location</h6><span class="info-value">4155 Mann Island, Liverpool,
                                United Kingdom.</span>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="media d-flex align-items-center"><span class="info-icon"><i
                                class="fas fa-phone-alt"></i></span>
                            <div class="media-body info-details">
                              <h6 class="info-type">Call Me</h6><span class="info-value"><a href="tel:+441632967704">+44
                                  1632 967704</a></span>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="media d-flex align-items-center"><span class="info-icon"><i
                                class="fas fa-envelope"></i></span>
                            <div class="media-body info-details">
                              <h6 class="info-type">Email Me</h6><span class="info-value"><a
                                  href="mailto:Alex@example.com">Alex@example.com</a></span>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                    <!-- Social media icons-->
                    <div class="fixed-block d-flex animate__animated animate__jackInTheBox animate__delay-3s">
                      <ul class="list-unstyled social-icons p-3">
                        <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="fab fa-facebook-square"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="fab fa-linkedin"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="fab fa-github-square"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="fab fa-instagram-square"></i></a></li>
                      </ul>
                    </div>
                  </div>
                  <!-- Contact info End -->
                </div>
              </div>
              <!-- map -->
              <div class="row">
                <div class="col-12">
                  <div class="map animate__animated animate__fadeInRight animate__delay-4s">
                    <iframe
                      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19845.82732713224!2d-0.3162034543774074!3d51.55487883052924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4876116207a6d0bd%3A0xaf7016a2cadb21e4!2sWembley%2C%20UK!5e0!3m2!1sen!2sin!4v1645179715804!5m2!1sen!2sin"
                      style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                  </div>
                </div>
              </div>
              <!-- map end -->
              <!-- Contact-Footer -->
              <div class="row justify-content-center animate__animated animate__fadeInUp animate__delay-5s">
                <div class="col-lg-6 text-center">
                  <h5 class="footer">Copyright&copy; &#160;<script>
                      document.write(new Date().getFullYear())
                    </script><a> Avs Technolabs</a>&#160;&#160;<i
                      class="fas fa-heart animate__animated animate__pulse animate__faster animate__infinite  infinite"></i>&#160;&#160;All
                    rigths reserved</h5>
                </div>
              </div>
              <!-- Contact-Footer End -->
            </div>
            <!-- Contact-page End -->
          </div>
        </div>
      </section>
      <!-- Contact section End -->

    </div>
  @endsection