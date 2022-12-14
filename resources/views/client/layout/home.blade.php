@extends('client.app')


@section ('content')
<!--main content start-->
<section id="main-content">
    <section class="wrapper">

        <div class="row">
            <div class="col-lg-9 main-chart">

                <div class="row mtbox">
                    <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                        <div class="box1">
                            <span class="li_heart"></span>
                            <h3>{{ $Users }} vnđ</h3>
                        </div>
                        <p>Số tiền còn lại :{{ $Users }} VND</p>
                    </div>
                    <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                            <span class="li_cloud"></span>
                            <h3>{{ count($userProduct) }} VIA</h3>
                        </div>
                        @if(Auth::check())
                            <p>Bạn đã mua {{ count($userProduct) }} Via</p>
                        @else
                        <p>Bạn đã mua {{ count($userProduct) }} Via</p>
                        @endif
                    </div>
                    <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                            <span class="li_stack"></span>
                            <h3>23 BM </h3>
                        </div>
                            <p>You have 23 unread messages in your inbox.</p>
                    </div>
                    <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                            <span class="li_news"></span>
                            <h3>10 via LIVE</h3>
                        </div>
                            <p>More than 10 news were added in your reader.</p>
                    </div>
                    <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                            <span class="li_data"></span>
                            <h3>10 via die</h3>
                        </div>
                            <p>Your server is working perfectly. Relax & enjoy.</p>
                    </div>

                </div><!-- /row mt -->
              <div class="row mt">
                @php
                    $i=0;
                @endphp

                @foreach ($shows as $show )
                @php
                $i++;
                @endphp
                <div class="col-lg-4 col-md-4 col-sm-4 mb">
                    <div class="product-panel-2 pn">
                        <div class="badge badge-hot">{{ count($totalProducts[$i]) }}</div>
                        <img src="{{asset('/storage/'.$show->image)}}" width="150px" alt="via việt cổ">
                        <h5 class="mt">{{ $show->name }}</h5>
                        <h6>GIÁ: {{ $show->price }} VNĐ</h6>
                        <button class="btn btn-small btn-theme04"><a style="color:white" href="{{ route('dasboa',[$show->id])}}">MUA HÀNG</a> </button>
                    </div>
                </div>
                @endforeach
            </div><!-- /row -->



            </div><!-- /col-lg-9 END SECTION MIDDLE -->


<!-- **********************************************************************************************************************************************************
RIGHT SIDEBAR CONTENT
*********************************************************************************************************************************************************** -->

            <div class="col-lg-3 ds">
              <!--COMPLETED ACTIONS DONUTS CHART-->
                  <h3>THÔNG BÁO</h3>
                  @php
                      $i= -1;
                  @endphp
                   @foreach ($times as $time)
                   @php
                   $i++;
                   @endphp
                   <div class="desc">
                    <div class="thumb">
                        <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                    </div>
                    <div class="details">
                        <p><muted>{{ $time }}</muted><br/>
                           <a href="#">{{ $infos[$i]->bill->name }}</a> đã mua {{ $infos[$i]->total }} VNĐ.<br/>
                        </p>
                    </div>
                </div>
                   @endforeach
                <!-- First Action -->

                 <!-- USERS ONLINE SECTION -->
                  <h3>TÀI NGUYÊN MUA NHIỀU NHẤT</h3>
                @foreach ($topProducts as $product )
                <div class="desc">
                    <div class="thumb">
                        <img class="img-circle" src="{{asset('/storage/'.$product->image)}}" width="35px" height="35px" align="">
                    </div>
                    <div class="details">
                        <p><a href="{{ route('dasboa',[$product->id])}}">{{ $product->name }}</a></p>
                           <muted>{{ $product->price }} VNĐ</muted>
                        </p>
                    </div>
                </div>
                @endforeach
                <!-- First Member -->

            </div><!-- /col-lg-3 -->
        </div><! --/row -->
    </section>
</section>

<!--main content end-->
@endsection
