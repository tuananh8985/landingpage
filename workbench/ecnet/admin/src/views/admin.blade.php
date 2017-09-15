@extends('admin::layouts.scaffold')
@section('head')
@stop
@section('footer')
    <script src="{{URL::to('/')}}/packages/ecnet/admin/assets/flot/jquery.flot.js"></script>
    <script type="text/javascript">
        function chart2() {
            var pageviews = {{Viewnote::result()}};


            var plot = $.plot($("#chart_2"), [{
                data: pageviews
            }], {
                series: {
                    lines: {
                        show: true,
                        lineWidth: 2,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 0.05
                            }, {
                                opacity: 0.01
                            }]
                        }
                    },
                    points: {
                        show: true
                    },
                    shadowSize: 2
                },
                grid: {
                    hoverable: true,
                    clickable: true,
                    tickColor: "#eee",
                    borderWidth: 0
                },
                colors: ["#37b7f3", "#52e136"],
                xaxis: {
                    ticks: 0,
                    tickDecimals: 0
                },
                yaxis: {
                    ticks: 8,
                    tickDecimals: 0
                }
            });


            function showTooltip(x, y, contents) {
                $('<div id="tooltip">' + contents + '</div>').css({
                    position: 'absolute',
                    display: 'none',
                    top: y + 5,
                    left: x + 15,
                    border: '1px solid #333',
                    padding: '4px',
                    color: '#fff',
                    'border-radius': '3px',
                    'background-color': '#333',
                    opacity: 0.80
                }).appendTo("body").fadeIn(200);
            }

            var previousPoint = null;

            function dateformat(x) {
                x = x * 1000;
                d = new Date();
                d.setTime(x);
                var ngay = d.getDate();
                var gio = d.getHours();
                var thang = d.getMonth() + 1;
                var nam = d.getFullYear();
                return gio + " giờ ngày " + ngay + "/" + thang + "/" + nam;
            }

            $("#chart_2").bind("plothover", function (event, pos, item) {
                $("#x").text(pos.x.toFixed(2));
                $("#y").text(pos.y.toFixed(2));

                if (item) {
                    if (previousPoint != item.dataIndex) {
                        previousPoint = item.dataIndex;

                        $("#tooltip").remove();
                        var x = item.datapoint[0].toFixed(2),
                                y = item.datapoint[1].toFixed(2);

                        showTooltip(item.pageX, item.pageY, "Vào lúc:" + dateformat(x) + " Lượng truy cập: " + y);
                    }
                } else {
                    $("#tooltip").remove();
                    previousPoint = null;
                }
            });
        }
        chart2();
    </script>
@stop



@section('main')
    <!-- Hot Controls -->
    <div class="container-fluid">
        <div class="row-fluid">
            <h3 class="page-title">
                Chào mừng bạn đến với trang quản trị của Rikagaku !
          
            </h3>

        </div>
<!-- 
        <div class="row-fluid">
            <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
                <a href="{{URL::route('admin.postcatalogs.index')}}">
                    <div class="dashboard-stat green">
                        <div class="visual">
                            <i class="icon-folder-open"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                {{Post::whereType(1)->count()}}
                            </div>
                            <div class="desc">
                                Danh mục
                            </div>
                        </div>
                        <a class="more" href="{{URL::route('admin.postcatalogs.index')}}">
                            Xem thêm <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </a>
            </div>
            <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
                <a href="{{URL::route('admin.posts.index')}}">

                    <div class="dashboard-stat blue">
                        <div class="visual">
                            <i class="icon-file"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                {{Post::whereType(2)->count()}}
                            </div>
                            <div class="desc">
                                Bài viết
                            </div>
                        </div>
                        <a class="more" href="{{URL::route('admin.posts.index')}}">
                            Xem thêm <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </a>
            </div>
            <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
                <a href="{{URL::route('admin.posts.index')}}">
                    <div class="dashboard-stat yellow">
                        <div class="visual">
                            <i class="icon-eye-open"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                {{Viewnote::sum('views')}}
                            </div>
                            <div class="desc">
                                Lượt Xem
                            </div>
                        </div>
                        <a class="more" href="{{URL::route('admin.posts.index')}}">
                            Xem thêm <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </a>
            </div>
            <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
                <a href="{{URL::route('admin.contacts.index')}}">
                    <div class="dashboard-stat red">
                        <div class="visual">
                            <i class="icon-envelope"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                {{Contact::unread()->count()}}
                            </div>
                            <div class="desc">
                                Tin nhắn phản hồi
                            </div>
                        </div>
                        <a class="more" href="{{URL::route('admin.contacts.index')}}">
                            Xem thêm <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </a>
            </div>

        </div> -->


    </div>

    <!-- Hot key -->
   <!--  <div class="row-fluid">
        <div class="span12" style="margin-bottom: 20px;background-color: #EEEEEE;padding:10px;">
            <h4>
                Tần suất truy cập website
            </h4>

            <div class="span10">
                <div id="chart_2" class="chart" style="height:140px"></div>
            </div>
        </div>
    </div> -->
    <div class="row-fluid">
        <?php
        $time_now = \Carbon\Carbon::now();
        $logs_path = app_path( 'storage/logs/ip_logs' );
        $month = $time_now->month;
        $year = $time_now->year;

        $logs_name = 'ip_logs_' . $month . '_' . $year . '.txt';
        if ( File::isFile( $logs_path . '/' . $logs_name ) ) {
            $IP_logs_content            = File::get( $logs_path . '/' . $logs_name );
            $logs_arr                   = explode( '||', $IP_logs_content );
            $logs_count                 = count( $logs_arr );
            $current_online_guest_count = 0;
            if ( Cache::has( 'online_guests' ) ) {
                $onlines_guests             = Cache::get( 'online_guests' );
                $current_online_guest_count = count( $onlines_guests );
            }
        }

        ?>
        @if( File::isFile( $logs_path . '/' . $logs_name ) )
        <div class="row-fluid">
            <h4>Log IP Truy cập tháng {{$time_now->month}} / {{$time_now->year}} || <span
                        style="font-weight:bold;color:green;">Khách đang online: {{$current_online_guest_count}}</span>
            </h4>

            <div class="span11">
                <ul style="height: 350px;overflow: scroll;">
                    @for($i=$logs_count - 1; $i>=0 ; $i--)
                        @if($logs_arr[$i])
                            <li>{{$logs_arr[$i]}}</li>
                        @endif
                    @endfor
                </ul>
            </div>
        </div>
        @endif
    </div>


    <!-- End Hot Key -->

    </div>

@endsection