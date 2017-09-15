@extends('frontend.default.layouts.master_gio_hang')
@section('content')



<div class="content container">
    <h2 class="title_border_bottom">
        <a href="{{route('home')}}">Trang chủ</a> > Liên Hệ
    </h2>
    <div class="row">
        <div class="col-xs-12">
            <iframe style="width:100%;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14899.56512659285!2d105.8246443!3d20.9969947!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x373fe642d7e649b8!2zQ8O0bmcgVHkgQ-G7lSBQaOG6p24gTW9raQ!5e0!3m2!1svi!2s!4v1496300106784" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>

    </div>
    <div class="map-and-info">
        <div class="row">
            <div class="col-xs-9">
                {{$data->body}}
            </div>

        </div>
    </div>
    <div class="form-and-info">
        <div class="row" style="margin-top: 20px;">
            <div class="col-md-8 col-md-offset-2 information-entry">
                <h3 class="block-title main-heading">Thông tin liên hệ</h3>
                <form  action="{{route('lienhe_post')}}" method="post">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <!-- <label for="text">Tiêu Đề <span>*</span></label>
                                <input type="text" class="form-control" id="title" name="title" />
                                @if ($errors->has('title'))
                                <span class="error">{{ $errors->first('title') }}</span>
                                @endif -->
                                <label for="text">Tiêu Đề <span>*</span></label>
                                <select class="selectpicker form-control" name="title">
                                    <option value="Mua Hàng">Mua Hàng</option>
                                    <option value="Khuyến Mại">Khuyến Mại</option>
                                    <option value="Phản Hồi">Phản Hồi</option>
                                    <option value="Nội Dung Khác">Nội Dung Khác</option>
                                </select>

                            </div>


                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="text">Họ và Tên<span>*</span></label>
                                <input type="text" class="form-control" id="name" name="name" required="true" />
                                @if ($errors->has('name'))
                                <span class="error">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email">Email <span>*</span></label>
                                <input type="email" class="form-control" id="email" name="email"  required="true"/>
                                @if ($errors->has('email'))
                                <span class="error">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="text">Địa chỉ <span>*</span></label>
                                <input type="text" class="form-control" id="address" name="address"  required="true"/>
                                @if ($errors->has('address'))
                                <span class="error">{{ $errors->first('address') }}</span>
                                @endif
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="number">SĐT <span>*</span></label>
                                <input type="text" class="form-control" id="tel" name="tel"  required="true"/ onkeypress='return (event.charCode >= 48 && event.charCode <= 57) || event.charCode <= 8'>
                                @if ($errors->has('tel'))
                                <span class="error">{{ $errors->first('tel') }}</span>
                                @endif
                            </div>

                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="text">Nội dung<span>*</span></label>
                                <textarea class="form-control" rows="5" id="message" name="message"  required="true"/ style="resize:none;"></textarea>
                                @if ($errors->has('message'))
                                <span class="error">{{ $errors->first('message') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <button type="submit" class="btn btn-primary">Gửi liên hệ</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12 information-entry" style="display:none;">
                <div class="row">
                    <div class="col-xs-8">
                        <h3 class="block-title main-heading">{{EConfig::getValue('contact','full-name')}}</h3>
                        <div class="article-container style-1">
                            <p>{{Content::getContent('gioi-thieu-ngan-ve-cua-hang')->body}}</p>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="cell-view">
                            <h3 class="block-title">Chăm sóc khách hàng</h3>

                            <div class="detail-info-lines border-box"
                            style="margin-bottom: 20px; ">
                            <div class="share-box">
                                <div class="title"><b>Công ty:</b><span style="font-family: -webkit-body;"> {{EConfig::getValue('contact','full-name')}}</span></div>
                            </div>
                            <div class="share-box">
                                <div class="title"><b>Làm việc:</b> 8h sáng đến 8h tối hàng ngày</div>
                            </div>
                            <div class="share-box">
                                <div class="title"><b>Địa chỉ:</b> {{EConfig::getValue('contact','email')}}</div>
                            </div>
                            <div class="share-box">
                                <div class="title"><b>Chăm sóc khách hàng:</b><span style="color: #F70909; font-weight: 700;">{{EConfig::getValue('contact','mobile')}}</span></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<style type="text/css">
    .error{
        color:red;
    }
</style>

@stop