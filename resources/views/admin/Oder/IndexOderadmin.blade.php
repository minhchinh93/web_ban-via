@extends('admin.app')


@section ('content')

<section id="main-content">
    <section class="wrapper" style="color:black; font-family:Roboto,sans-serif;background-image: url('https://msmobile.com.vn/upload_images/images/hinh-nen-powerpoint-mau-den-8.jpg');background-size: cover;">
        <div class="row mtbox">
            <div class="col-md-3 col-sm-3 col-md-offset-1 box0" >
                <div class="box1" style=" border-radius: 20px;
                background-image: linear-gradient(90deg, #fe9e75, rgb(245, 45, 78)); ">
                    <span class="li_heart" style="color:rgb(252, 250, 247);"></span>
                    <h5  style="color:rgb(250, 250, 250)">TOTAL ODER  :  </h5>
                    <h4  style="color:rgb(248, 245, 241)">TOTAL MONEY : {{ null }}</h4>
                </div>
                <a style="color:red" href="{{ route('totalidea') }}"><p>see more EBAY !</p></a>
            </div>
            <div class="col-md-4 col-sm-4 box0">
                <div class="box1" style="background-image: linear-gradient(90deg, #0bd48e, rgba(158, 168, 8, 0.829));  border-radius:20px;">
                    <span class="li_cloud" style="color:rgb(255, 255, 255)"></span>
                    <h5 style="color:rgb(250, 250, 253)">TOTAL ODER  :{{ Null }}</h5>
                    <h4 style="color:rgb(243, 242, 247)">TOTAL MONEY : {{ NULL }}</h4>
                </div>
                <a style="color:red" href="{{ route('totalDesigner') }}"><p>see ESTY !</p></a>
            </div>
            <div class="col-md-3 col-sm-3 box0">
                <div class="box1" style="background-image: linear-gradient(90deg, #fe6c7d, rgba(37, 8, 168, 0.829));  border-radius: 20px;">
                    <span class="li_news" style="color:rgb(250, 245, 247)"></span>
                    <h5 style="color:rgb(247, 245, 246)">TOTAL ODER  :</h5>
                    <h5 style="color:rgb(247, 245, 246)">TOTAL MONEY :</h5>
                    <h4><b style="color:rgb(248, 245, 246)">{{ null }} </b></h4>
                </div>
                <a style="color:rgb(0, 60, 255)" href="{{ route('totalall') }}"><p>see more AMAZON !</p></a>
            </div>
            {{-- <div class="col-md-2 col-sm-2 box0">
                <div class="box1" style="background-image: linear-gradient(90deg, #01b5c1, rgba(194, 6, 6, 0.829));  border-radius: 20px;">
                    <span class="li_data" style="color:rgb(246, 242, 247)"></span>
                    <h5 style="color:rgb(250, 248, 250)"> TOTAL DESIGNER:</h5>
                    <h4 style="color:rgb(252, 250, 252)"><b>{{ null }} </b></h4>
                </div>
                <a style="color:rgb(0, 60, 255)" href="{{ route('findPNG') }}"><p>see more !</p></a>
            </div>
            <div class="col-md-2 col-sm-2 box0">
                <div class="box1" style="background-image: linear-gradient(90deg, rgba(255, 42, 59, 0.541), rgba(9, 221, 236, 0.829));  border-radius: 20px;">
                    <span class="li_stack" style="color:rgb(252, 244, 244)"></span>
                    <h5 style="color:rgb(255, 255, 255)">MEMBER IDEA: {{ null }} </h5>
                    <h4 style="color:rgb(253, 249, 249)">MEMBER DESIGNER: {{ null }}</h4>
                </div>
                <a style="color:red" href="{{ route('showUser') }}"><p>see more !</p></a>
            </div> --}}
        </div>
        <div class="row mtbox">
            <div class="col-md-4 col-sm-4 mb">
                <!-- REVENUE PANEL -->
                <div class="darkblue-panel pn">
                    <div class="darkblue-header">
                        <h5>ESTY</h5>
                    </div>
                    <div class="chart mt">
                        <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[200,135,667,333,526,996,564,123,890,464,655,135,667,333,526,996,564,123,890,464,655,135,667,333,526,996,564,123,890,464,655,135,667,333,526,996,564,123,890,464,655]"><canvas width="358" height="75" style="display: inline-block; width: 358px; height: 75px; vertical-align: top;"></canvas></div>
                    </div>
                    <p class="mt"><b>$ 17,980</b><br>Month Income</p>
                </div>
            </div>
        <div class="col-md-4 col-sm-4 mb">
            <!-- REVENUE PANEL -->
            <div class="darkblue-panel pn">
                <div class="darkblue-header">
                    <h5>EBAY</h5>
                </div>
                <div class="chart mt">
                    <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[200,135,667,333,526,996,564,123,890,464,655,135,667,333,526,996,564,123,890,464,655,135,667,333,526,996,564,123,890,464,655,135,667,333,526,996,564,123,890,464,655]"><canvas width="358" height="75" style="display: inline-block; width: 358px; height: 75px; vertical-align: top;"></canvas></div>
                </div>
                <p class="mt"><b>$ 17,980</b><br>Month Income</p>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 mb">
            <!-- REVENUE PANEL -->
            <div class="darkblue-panel pn">
                <div class="darkblue-header">
                    <h5>AMAZON</h5>
                </div>
                <div class="chart mt">
                    <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[200,135,667,333,526,996,564,123,890,464,655]"><canvas width="358" height="75" style="display: inline-block; width: 358px; height: 75px; vertical-align: top;"></canvas></div>
                </div>
                <p class="mt" ><b >$ 17,980</b><br>Month Income</p>
            </div>
        </div>
    </div>
    <div class="row mt" >
        <div class="col-md-12">
            <div class="content-panel" style="border-radius: 10px;background: rgba(255, 255, 255, 0.842)" >
                <h4><i class="fa fa-angle-right"></i> ODER MANAGER  </h4><hr><table class="table table-striped table-advance table-hover">
                    <thead>
                    <tr>
                        <th><i class="fa fa-bullhorn"></i> NAME SALLER</th>
                        <th><i class="fa fa-bookmark"></i> TOTAL ODER</th>
                        <th class="hidden-phone"><i class="fa fa-question-circle"></i> TOTAL PRICE</th>
                        <th><i class=" fa fa-edit"></i> Status</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($estys as $show)
                    <tr>
                        <td><a href="">{{ $show->name?? null }}</a></td>
                        <td> {{ $show->Number_Items?? null }} </td>
                        <td>${{ $show->order_Total?? null }} </td>
                        <td><span class="label label-success label-mini">ESTY</span></td>
                        <td>
                            <span class="btn btn-success btn-xs">
                                <a style="color:white" href="{{null}}">
                                 Detail
                              </a>
                             </span>
                        </td>
                    </tr>
                        @endforeach
                        @foreach ($ebays as $show)
                    <tr>
                        <td><a href="">{{ $show->name?? null }}</a></td>
                        <td> {{ $show->Number_Items?? null }} </td>
                        <td>${{ $show->order_Total?? null }} </td>
                        <td><span class="label label-warning label-mini">EBAY</span></td>
                        <td>
                            <span class="btn btn-success btn-xs">
                                <a style="color:white" href="{{null}}">
                                 Detail
                              </a>
                             </span>
                        </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- /content-panel -->
        </div><!-- /col-md-12 -->
    </div>
    </section>
</section>


@endsection
@push('scripts')
    <!--script for this page-->
    {{-- <script src="assets/js/sparkline-chart.js"></script>
    <script src="assets/js/zabuto_calendar.js"></script> --}}

    <script type="text/javascript" src="{{ asset('admin/js/sparkline-chart.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/zabuto_calendar.js') }}"></script>
@endpush
