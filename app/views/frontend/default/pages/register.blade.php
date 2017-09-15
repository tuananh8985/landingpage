@extends('frontend.default.layouts.master_gio_hang')
@section('content')
<div id="content-block" class="info_cart">



<div class="container">
  <div class="col-xs-12 col-md-6 col-md-offset-3">
    <div class="main" role="main">
      <div class="main__content">
        <div class="step" data-step="contact_information">
          <form  action="{{route('registed')}}" method="post">
            <div class="col-xs-12">
              <h1>Xin mời bạn nhập thông tin mua hàng</h1>
              <p>Những phần đánh dấu ( <span style="color:red;">*</span> ) là bắt buộc</p>
            </div>
            <div class="form-group col-xs-12">
              <label for="usr">Họ và Tên<span style="color:red;">*</span></label>
              <input type="text" class="form-control" id="last_name" name="last_name" required>
            </div>
           <!--  <div class="form-group col-xs-12">
              <label for="usr">Tên <span style="color:red;">*</span></label>
              <input type="text" class="form-control" id="first_name" name="first_name" required>
            </div> -->

            <div class="form-group col-xs-12">
              <label for="pwd">Điện thoại <span style="color:red;">*</span></label>
              <input type="text" class="form-control" id="phone_number" name="phone_number" min="0" required onkeypress='return (event.charCode >= 48 && event.charCode <= 57) || event.charCode <= 8'>
            </div>
            <div class="form-group col-xs-12">
              <label for="pwd">Email <span style="color:red;">*</span></label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group col-xs-12">
              <label for="usr">Địa chỉ <span style="color:red;">*</span></label>
              <input type="text" class="form-control" id="address" name="address" required>
            </div>
          <!--   <div class="form-group col-xs-12">
              <label for="pwd">Thành Phố <span style="color:red;">*</span></label>
              <input type="text" class="form-control" id="city" name="city" required>
            </div> -->
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary">Gửi Thông Tin Mua Hàng</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>
</div>
<div class="clear"></div>

</div>
@stop