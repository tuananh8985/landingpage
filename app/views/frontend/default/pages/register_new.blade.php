
<!DOCTYPE html>
<html lang="en" dir="ltr" class="no-js multi-step windows chrome desktop page--no-banner page--logo-main page--show  card-fields">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, height=device-height, minimum-scale=1.0, user-scalable=0">
  <meta name="referrer" content="origin">

  <link rel="stylesheet" media="all" href="//cdn.shopify.com/app/services/17866805/assets/169523340/checkout_stylesheet/v2-ltr-edge-2fb6ca2c2ac44cb97965799c4a298fed-8239107568323331926" />
  <!--<![endif]-->
  <meta data-browser="chrome" data-browser-major="58">
  <meta data-body-font-family="Helvetica Neue" data-body-font-type="system">
  <meta id="shopify-digital-wallet" name="shopify-digital-wallet" content="/17866805/digital_wallets/dialog" />

  <script type="text/javascript">
    (function() {
      window.ShopifyExperiments = {};
      window.ShopifyExperiments.rememberMe = false;
      window.ShopifyExperiments.checkoutWithPhone = false;
    })();
  </script>


  <script src="//cdn.shopify.com/s/assets/checkout-d4cbd003e55c9cf355d30624ef8dfb629fa701f70907877f714ecb6fc4ed647c.js"></script>




  <meta name="shopify-checkout-authorization-token" content="4688c6f12449a6c5da07033a2699074e" />




  <script src="//cdn.shopify.com/app/services/17866805/javascripts/countries/169523340/en/countries-84581a7f0690e0bfa8f959c77bd187a61dda1303-1488942316.js"></script>

  <script type="text/javascript">
    if (window.opener) {
      window.opener.postMessage(JSON.stringify({"current_checkout_page": "\/checkout\/contact_information"}), "*");
    }

    if (typeof Shopify == 'undefined') { Shopify = {}; }
    Shopify.Checkout = {};
    Shopify.Checkout.locale = "en";
    Shopify.Checkout.token = "99f8f86fb5aadc309bb7f8af8a5bd4bd";
    Shopify.Checkout.page = "show";
    Shopify.Checkout.step = "contact_information";
    Shopify.Checkout.apiHost = "cs-hello-baby.myshopify.com";
    Shopify.Checkout.rememberMeHost = "remember-me.shopifycloud.com";
    Shopify.Checkout.rememberMeAccessToken = "aFJ6QzZTZ2I0YjZrS2UyVkx2WlllN1ZkcklKZUhaVHJCWUpOWlVWRHM4OFBrNUxhRmxHY1JSVVpJWmNzNzQxei0tcG00a2FlNnJyTC8xVXd6UitBOUlEUT09--cc7ef1e927d0d712438f459b4bb972fb9e8a7a65";
    Shopify.Checkout.AddressFormat = {"N_p_c_sc_a":[["company"],["last_name","first_name"],["zip"],["country"],["province","city"],["address1","address2"],["phone"]],"N_p_c_c_a":[["company"],["last_name","first_name"],["zip"],["country"],["city"],["address1","address2"],["phone"]],"n_a_c_csp":[["first_name","last_name"],["company"],["address1","address2"],["city"],["country","province","zip"],["phone"]],"n_a_c_cs":[["first_name","last_name"],["company"],["address1","address2"],["city"],["country","province"],["phone"]],"n_a_c_cp":[["first_name","last_name"],["company"],["address1","address2"],["city"],["country","zip"],["phone"]],"n_a_c_c":[["first_name","last_name"],["company"],["address1","address2"],["city"],["country"],["phone"]]};

    var thankYouStep = false;
    var rememberMeCookie = false;
    var rememberMeEnabled = false;

    if(thankYouStep) {
      Shopify.Checkout.OrderStatus = OrderStatusPageApi.prototype;
    }

    if(rememberMeCookie && rememberMeEnabled) {
      Shopify.Checkout.rememberMeCookieIsHere = true;
    }
  </script>





  <script type="text/javascript">
    Shopify.clientAttributesCollectionEventName =
    "client_attributes_checkout";
    var DF_CHECKOUT_TOKEN = "99f8f86fb5aadc309bb7f8af8a5bd4bd";
  </script>

  <script id="__st">
//<![CDATA[
var __st={"a":17866805,"offset":-14400,"reqid":"c5f5b61c-55de-40b4-ae76-d61277ce37bc","pageurl":"checkout.shopify.com\/17866805\/checkouts\/99f8f86fb5aadc309bb7f8af8a5bd4bd","u":"453991e2b8d5","t":"checkout","offsite":1};
//]]>
</script><script src="https://cdn.shopify.com/s/javascripts/shopify_stats.js?v=6" type="text/javascript" async="async"></script>

</head>
<body>
  <div class="content" data-content>
    <div class="wrap">

      <div class="main" role="main">
        <div class="main__header">

          <a href="https://cs-hello-baby.myshopify.com" class="logo logo--left">
            <h1 class="logo__text"></h1>
          </a>
          <div data-alternative-payments>
          </div>

        </div>
        <div class="main__content">
          <div class="step" data-step="contact_information">
            <form  action="{{route('registed')}}" method="post"><input name="utf8" type="hidden" value="&#x2713;" />
              <div class="cart-left">
                <div class="box-cart">
                  <div class="title-box-cart">1. Khách hàng khai báo thông tin</div>
                  <div class="content-box-cart">
                    <b style="font-size:14px;">Thông tin người mua</b><br>
                    <span style="font-size:11px;">Những phần đánh dấu (*) là bắt buộc</span>
                    <div class="space10"></div>
                    <table>
                      <tbody><tr>
                        <td width="95">Họ tên*</td>
                        <td colspan="3"><input type="text" class="inputText" name="user_info[name]" id="buyer_name" value=""></td>
                      </tr>
                      <tr>
                        <td>Điện thoại*</td>
                        <td colspan="3"><input type="text" class="inputText" name="user_info[tel]" id="buyer_tel" value=""></td>
                      </tr>
                      <tr>
                        <td>Địa chỉ*</td>
                        <td colspan="3"><input type="text" class="inputText" name="user_info[address]" id="buyer_address" value=""></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td colspan="3"><input type="text" class="inputText" name="user_info[email]" id="buyer_email" value=""></td>
                      </tr>
                    </tbody></table>
                    <div class="space20"></div>
                    <div class="line"></div>
                    <div class="space20"></div>
                    <b style="font-size:14px;">Thông tin người mua</b><br>
                    <span style="font-size:11px;">Những phần đánh dấu (*) là bắt buộc</span>
                    <div class="space10"></div>
                    <input name="cbxGetbuy" id="cbxGetbuy" type="checkbox" value="1" onchange="fill_ship_info()" style="display:inline-block; vertical-align:middle;"><label for="cbxGetbuy" style="padding-left:0;">Lấy từ Thông tin Người Mua</label>
                    <div class="space10"></div>
                    <table>
                      <tbody><tr>
                        <td width="95">Họ tên*</td>
                        <td colspan="3"><input type="text" class="inputText" name="user_info[ship_to_name]" id="ship_to_name"></td>
                      </tr>
                      <tr>
                        <td>Điện thoại*</td>
                        <td colspan="3"><input type="text" class="inputText" value="" id="ship_to_tel" name="user_info[ship_to_tel]"></td>
                      </tr>
                      <tr>
                        <td>Địa chỉ*</td>
                        <td colspan="3"><input type="text" class="inputText" value="" id="ship_to_address" name="user_info[ship_to_address]"></td>
                      </tr>
                    </tbody></table>
                  </div><!--content-box-cart-->
                </div><!--box-cart-->
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>




</body>
</html>
