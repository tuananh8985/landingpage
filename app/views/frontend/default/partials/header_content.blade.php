<header class="tz-headerHome tz-homeType1 tz-homeType3  tz-homeTypeFixed" data-option="3">

  <div id="Tz-provokeMe">


    <div class="tz_meetup_header_option">
      <div class="container">
        <div class="row">


          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="tz_meetup_header_option_phone">



              <span>
                <img src="../wp-content/themes/maniva-meetup/images/phone.png" alt="phone">

                +44 40 8873432
              </span>



              <span>
                <img src="../wp-content/themes/maniva-meetup/images/email_meetup.png" alt="email">
                <a href="mailto:info@maniva.com">

                  info@maniva.com                                                        </a>
                </span>



              </div>
            </div>



            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="tz-headerRight">


                <ul class="tz_list_social_header_3">

                  <li>
                    <a target="_blank" href="https://www.facebook.com/templaza  "><i class="fa fa-facebook"></i></a>
                  </li>
                  <li>
                    <a target="_blank" href="https://twitter.com/templazavn"><i class="fa fa-twitter"></i></a>
                  </li>
                  <li>
                    <a target="_blank" href="http://dribbble.com/templaza"><i class="fa fa-dribbble"></i></a>
                  </li>
                  <li>
                    <a target="_blank" href="https://plus.google.com/+Templaza/"><i class="fa fa-google-plus"></i></a>
                  </li>
                  <li>
                    <a target="_blank" href="http://www.youtube.com/channel/UCykS6SX6L2GOI-n3IOPfTVQ"><i class="fa fa-youtube"></i></a>
                  </li>
                  <li class="tz_btn_search_header">
                    <span class="tz-search-header3">
                      <i class="fa fa-search"></i>
                    </span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      @if(Session::has('message_alert'))
      <div class="col-lg-12" style="background-color: #dff0d8;text-align: center;">
        <div class = "alert" style="color:blue;height:30px;">
          <p style="color:#3c763d;font-size: 18px;">
            {{Session::get('message_alert')}}
          </p>
        </div>
      </div>
      @endif
      <div class="tz-header-content" >
        <div class="container">
          <div class="tzHeaderContainer">
            <a class="pull-left tz_logo" href="http://wordpress.templaza.net/wp-maniva/meetup" title="Home">
              <img class="logo_lager" src="../wp-content/uploads/2015/09/logo-meetup1.png" alt="Home" />
            </a>
            <div class="tzHeaderMenu_nav">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tz-navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
              <nav class="pull-right tz_speed_one_page" data-speed-one-page="2200">

                <ul id="tz-navbar-collapse" class="nav navbar-nav collapse navbar-collapse pull-left tz-nav tz_nav_one_page themeple_megemenu"><li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="#home">Home</a></li>
                  <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="#about">About</a></li>
                  <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="#wedo">What We Do</a></li>
                  <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="#agenda">Agenda</a></li>
                  <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="#gallery">Gallery</a></li>
                  <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="#speaker">Speakers</a></li>
                  <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="#faq">Faq</a></li>
                  <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="#register">Register</a></li>
                  <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="#blog">Blog</a></li>
                  <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="#Contact">Contact</a></li>
                </ul>
              </nav>
            </div>
            <!-- Form search start -->
            <div class="tz-form-search">
              <div class="container">
                <form method="get" class="searchform" action="http://wordpress.templaza.net/wp-maniva/meetup/">
                  <label class="icon-search tziconsearch">&nbsp;</label>
                  <label class="assistive-text assistive-tzsearch tzsearchlabel">Search</label>
                  <input type="text" class="field Tzsearchform inputbox search-query Tzsearchform" name="s" placeholder="Search..." />
                  <input type="submit" class="submit searchsubmit Tzsearchsubmit" name="submit" value="Search" />
                  <i class="fa fa-search tz-icon-form-search"></i>
                  <i class="fa fa-times tz-form-close"></i>
                </form>
              </div>
            </div>
            <!-- Form search end -->
          </div>
        </div>
      </div>

    </div><!--end class container-->

  </header>
