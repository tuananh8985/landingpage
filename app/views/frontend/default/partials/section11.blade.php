<div id="register" data-vc-parallax="1.5" data-vc-parallax-image="http://wordpress.templaza.net/wp-maniva/meetup/wp-content/uploads/2015/09/bk-paralax-8.jpg" class="vc_row wpb_row vc_row-fluid tzSpace_default vc_custom_1469091696609 vc_row-has-fill vc_row-o-equal-height vc_row-flex vc_general vc_parallax vc_parallax-content-moving"><div class="overlay_parallax" style="background-color:rgba(9,9,31,0.6)"></div><div class="wpb_column vc_column_container vc_col-sm-6"><div class="vc_column-inner vc_custom_1450234730995 tz_responsiveness_padding"><div class="wpb_wrapper">
<div class="tz_register_meetup">
    <div class="tz_register_meetup_pricing">
        <div class="tz_register_meetup_pricing_item" data-price-pricing="380">
            <div class="tz_register_meetup_pricing_item_container">
                <h3>
                    Only Conference        </h3>
                    <p>This is a conference which is celebrated within University. All members belong university can participate in this conference for discussing</p>
                </div>
                <div class="tz_register_meetup_pricing_item_price ">
                    <div class="ds-table">
                        <div class="ds-table-cell">
                            <h3>
                                $380                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tz_register_meetup_pricing_item" data-price-pricing="475">
                    <div class="tz_register_meetup_pricing_item_container">
                        <h3>
                            Only Workshops        </h3>
                            <p>International students and students undertaking this course as part of a postgraduate fee paying program must refer to the relevant program home page to determine the cost for undertaking this course.</p>
                        </div>
                        <div class="tz_register_meetup_pricing_item_price ">
                            <div class="ds-table">
                                <div class="ds-table-cell">
                                    <h3>
                                        $475                </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tz_register_meetup_pricing_item" data-price-pricing="645">
                            <div class="tz_register_meetup_pricing_item_container">
                                <h3>
                                    Conference + Workshops        </h3>
                                    <p>Through this introductory creative-critical approach to textual study based on the writing and re-writing of texts, students will learn theoretical perspectives on literary study.</p>
                                </div>
                                <div class="tz_register_meetup_pricing_item_price ">
                                    <div class="ds-table">
                                        <div class="ds-table-cell">
                                            <h3>
                                                $645                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tz_register_meetup_pricing_item" data-price-pricing="465">
                                    <div class="tz_register_meetup_pricing_item_container">
                                        <h3>
                                            Conference + Buffet        </h3>
                                            <p>Joining to meet up to have a chance to raise your ideas directly on Conference. Especially, you can enjoy Asian buffet after conference.</p>
                                        </div>
                                        <div class="tz_register_meetup_pricing_item_price ">
                                            <div class="ds-table">
                                                <div class="ds-table-cell">
                                                    <h3>
                                                        $465                </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tz_register_meetup_pricing_item" data-price-pricing="995">
                                            <div class="tz_register_meetup_pricing_item_container">
                                                <h3>
                                                    Full Package (No Hidden Fees)        </h3>
                                                    <p>Don&#8217;t hesitate anymore! Let&#8217;s come and try to register with us. You do not worry anything, we give you some demo. You can register after demo</p>
                                                </div>
                                                <div class="tz_register_meetup_pricing_item_price ">
                                                    <div class="ds-table">
                                                        <div class="ds-table-cell">
                                                            <h3>
                                                                $995                </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div></div></div></div><div class="wpb_column vc_column_container vc_col-sm-6 vc_col-has-fill"><div class="vc_column-inner vc_custom_1450234091900 tz_check_width tz_responsiveness_padding"><div class="wpb_wrapper tz_check_width_right_position">
                                        <div class="tz_maniva_meetup_title  tz_text_align_left">


                                            <h3 style="color:#ffffff">
                                                Đăng Ký Ngay
                                            </h3>



                                            <div class="tz_image_title_meetup">
                                                <img width="25" height="1" src="../wp-content/uploads/2015/09/line-text.jpg" class="attachment-full size-full" alt="" />            </div>



                                           <!--      <div class="tz_meetup_title_content">
                                                    <p><span style="color: #95979d;">The Conference can help you meet some special person. In addition,</span></p>
                                                    <p><span style="color: #95979d;">you can open your knowledge and contribute your ideas in this conference.</span></p>
                                                    <p><span style="color: #95979d;">You will also have a chance to enjoy Buffet. Now, Let&#8217;s Register now to get new experience!</span></p>
                                                </div>
                                            -->


                                        </div>

                                        <form method="post" action="{{route('register')}}" enctype="multipart/form-data">
                                          <div class="form-group">
                                              <label for="exampleInputEmail1" class="color_label">Tên Cá Nhân Hoặc Tên Công Ty</label>
                                              <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Vui lòng nhập tên..." value="{{Input::old('name')}}" required>

                                              @if($errors->has('name'))
                                              <span style="color:red;">{{ $errors->first('name') }}</span>
                                              @endif  
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleInputEmail1" class="color_label">Email</label>
                                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Vui lòng nhập email..." value="{{Input::old('email')}}" required>
                                            @if($errors->has('email'))
                                            <span style="color:red;">{{ $errors->first('email') }}</span>
                                            @endif 
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="color_label">Mật Khẩu</label>
                                            <input name="password" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Vui lòng nhập mật khẩu..." required>
                                            @if($errors->has('password'))
                                            <span style="color:red;">{{ $errors->first('password') }}</span>
                                            @endif 
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="color_label">Số Điên Thoại</label>
                                            <input name="phone" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Vui long nhập số điện thoại" value="{{Input::old('phone')}}" required onkeypress='return (event.charCode >= 48 && event.charCode <= 57) || event.charCode <= 8'>
                                            @if($errors->has('phone'))
                                            <span style="color:red;">{{ $errors->first('phone') }}</span>
                                            @endif 
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="color_label">Chứng Minh Thư Hay Mã Số Thuế</label>
                                            <input name="identification" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Vui lòng nhập chứng minh thư..." value="{{Input::old('identification')}}" required onkeypress='return (event.charCode >= 48 && event.charCode <= 57) || event.charCode <= 8'>
                                            @if($errors->has('identification'))
                                            <span style="color:red;">{{ $errors->first('identification') }}</span>
                                            @endif 
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="color_label">Địa Chi</label>
                                            <input name="address" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Vui lòng nhập địa chỉ" value="{{Input::old('address')}}" required>
                                            @if($errors->has('address'))
                                            <span style="color:red;">{{ $errors->first('address') }}</span>
                                            @endif 

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="color_label">Ảnh Đại Diện</label>
                                            <input class="form-control" type="file" name="image" accept="image/*" value="{{Input::old('image')}}" required>
                                            @if($errors->has('image'))
                                            <span style="color:red;">{{ $errors->first('image') }}</span>
                                            @endif 
                                        </div>
                                        <button type="submit" class="btn btn-primary">Đăng Ký</button>
                                    </form>


                                </div>

                            </div>

                        </div>

                    </div>

                    <style type="text/css">
                        .color_label{
                            color:#7e8394;
                        }
                    </style>