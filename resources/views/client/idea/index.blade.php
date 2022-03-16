@extends('client.app')


@section ('content')
<section id="main-content">
        <section class="wrapper" style=" background: rgba(236, 240, 240, 0.644);color:black; font-family:Roboto,sans-serif;background-image: url('https://msmobile.com.vn/upload_images/images/hinh-nen-powerpoint-mau-den-8.jpg');background-size: cover;">

            <div class="row">
                <div class="col-lg-9 main-chart">

                    <div class="row mtbox" style="background:#070706; color:white">
                        <div class="row" style="text-align: center;">
                            <a href="{{ route('showIdeaa') }}"><span class="label label-info">Idea</span></a>|<a  href="{{ route('showPNGG') }}"><span class="label label-warning">PNG</span></a>
                        </div>
                        @if($users[0]->payment==1)
                        <div class="border-head">
                            <h3 style="color: #54bae6;">IDEA TABLE</h3>
                        </div>
                        <div class="custom-bar-chart">
                            <ul class="y-axis">
                                <li><span>100</span></li>
                                <li><span>80</span></li>
                                <li><span>60</span></li>
                                <li><span>40</span></li>
                                <li><span>20</span></li>
                                <li><span>0</span></li>
                            </ul>
                            @foreach ($totalidea as $show)
                            <div class="bar">
                                <div class="title">{{  $show->date }}</div>
                                <div class="value tooltips" data-original-title="{{ $show->value }}" data-toggle="tooltip" data-placement="top">{{ $show->value }}%</div>
                            </div>
                            @endforeach
                        </div>
                        <!--custom chart end-->
                        @else
                        <div class="border-head">
                            <h3 style="color: #ff865c;">PNG TABLE</h3>
                        </div>
                        <div class="custom-bar-chart">
                            <ul class="y-axis">
                                <li><span>100</span></li>
                                <li><span>80</span></li>
                                <li><span>60</span></li>
                                <li><span>40</span></li>
                                <li><span>20</span></li>
                                <li><span>0</span></li>
                            </ul>
                            @foreach ($totalPNG as $show)
                            <div class="bar">
                                <div class="title">{{  $show->date }}</div>
                                <div class="value tooltips" data-original-title="{{ $show->value }}" data-toggle="tooltip" data-placement="top">{{ $show->value }}%</div>
                            </div>
                            @endforeach
                        </div>
                        @endif

                    </div>
                    <!-- /row mt -->


                    <div class="row mt" >
                        <!-- SERVER STATUS PANELS -->

                        <div class="col-lg-4 col-md-4 col-sm-4 mb" >
							<div class="weather-2 pn" >
								<div class="weather-2-header">
									<div class="row">
										<div class="col-sm-6 col-xs-6">
											<p>TOP IDEA</p>
										</div>
										<div class="col-sm-6 col-xs-6 goright">
											<p class="small">{{ $timess }}</p>
										</div>
									</div>
								</div><!-- /weather-2 header -->

								<div class="row centered">
									<img src="https://png.pngtree.com/png-clipart/20190904/original/pngtree-cartoon-flat-man-holding-a-trophy-png-image_4486875.jpg" class="img-circle" width="80">
								</div>
                                @if(count($Idea)>0)
								<div class="row data">
									<div class="col-sm-6 col-xs-6 goleft">
										<h4><b>MEMBER </b></h4>
										<h6>{{ $Idea[0]->name }}</h6>
										<h6>{{ $Idea[0]->email }}</h6>
									</div>
									<div class="col-sm-6 col-xs-6 goright">
										<h5><i class="fa fa-sun-o fa-2x"></i></h5>
										<h6><b>TOTAL IDEA</b></h6>
										<h5>{{ $Idea[0]->sum }}</h5>
									</div>
								</div>
                                @else
								<div class="row data">
									<div class="col-sm-6 col-xs-6 goleft">
										<h4><b>ngày nghỉ </b></h4>
									</div>
								</div>
                                @endif
							</div>
						</div>
                        <!-- /col-md-4-->


                        <div class="col-lg-4 col-md-4 col-sm-4 mb">
							<div class="weather-2 pn">
								<div class="weather-2-header">
									<div class="row">
										<div class="col-sm-6 col-xs-6">
											<p>TOP MOCKUP</p>
										</div>
										<div class="col-sm-6 col-xs-6 goright">
											<p class="small">{{ $timess }}</p>
										</div>
									</div>
								</div><!-- /weather-2 header -->

								<div class="row centered">
									<img src="https://png.pngtree.com/png-clipart/20190904/original/pngtree-cartoon-flat-man-holding-a-trophy-png-image_4486875.jpg" class="img-circle" width="80">
								</div>
                                @if(count($mocup)>0)
								<div class="row data">
									<div class="col-sm-6 col-xs-6 goleft">
										<h4><b>MEMBER </b></h4>
										<h6>{{ $mocup[0]->name }}</h6>
										<h6>{{ $mocup[0]->email }}</h6>
									</div>
									<div class="col-sm-6 col-xs-6 goright">
										<h5><i class="fa fa-sun-o fa-2x"></i></h5>
										<h6><b>TOTAL MOCKUP</b></h6>
										<h5>{{ $mocup[0]->mocup_products }}</h5>
									</div>
								</div>
                                @else
                                <div class="row data">
									<div class="col-sm-6 col-xs-6 goleft">
										<h4><b>ngày nghỉ </b></h4>
									</div>
								</div>
                                @endif
							</div>
						</div>
                        <!-- /col-md-4 -->

                        <div class="col-lg-4 col-md-4 col-sm-4 mb">
							<div class="weather-2 pn">
								<div class="weather-2-header">
									<div class="row">
										<div class="col-sm-6 col-xs-6">
											<p>TOP PNG</p>
										</div>
										<div class="col-sm-6 col-xs-6 goright">
											<p class="small">{{ $timess }}</p>
										</div>
									</div>
								</div><!-- /weather-2 header -->
								<div class="row centered">
									<img src="https://png.pngtree.com/png-clipart/20190904/original/pngtree-cartoon-flat-man-holding-a-trophy-png-image_4486875.jpg" class="img-circle" width="80">
								</div>
                                @if(count($mocup)>0)
								<div class="row data">
									<div class="col-sm-6 col-xs-6 goleft">
										<h4><b>MEMBER </b></h4>
										<h6>{{ $designer[0]->name }}</h6>
										<h6>{{ $designer[0]->email }}</h6>
									</div>
									<div class="col-sm-6 col-xs-6 goright">
										<h5><i class="fa fa-sun-o fa-2x"></i></h5>
										<h6><b>TOTAL PNG</b></h6>
										<h5>{{ $designer[0]->product_png_details }}</h5>
									</div>
								</div>
                                @else
                                <div class="row data">
									<div class="col-sm-6 col-xs-6 goleft">
										<h4><b>ngày nghỉ </b></h4>
									</div>
								</div>
                                @endif
							</div>
						</div>
                        <!-- /col-md-4 -->


                    </div>
                    <!-- /row -->
                    <section class="task-panel tasks-widget" style="background:#ebebe3">
                        <div class="panel-heading" style="background-color:#54bae6;">
                            <div class="pull-left"><h5 style = "color:white; margin-top: 1%;" class="category""><i class="fa fa-tasks"></i> Todo List - Notification</h5></div>
                            <br>
                         </div>
                          <div class="panel-body">
                              <div class="task-content">
                                  <ul id="sortable" class="task-list ui-sortable">
                                    @php
                                    $list= ['primary','danger','success','info','warning'];
                                    $i=0
                                @endphp
                              @foreach ($jobs as $job )
                              @if($job->private == 1)
                              <li class="list-{{ $list[$i++] }}">
                                <i class=" fa fa-ellipsis-v"></i>
                                <div class="task-checkbox">
                                    <input type="checkbox" class="list-child" value="">
                                </div>
                                <div class="task-title">
                                    <span class="task-title-sp">{{ $job->Conten }}</span>
                                    <span class="badge bg-info"> Public</span>
                                    @if($job->action==2)
                                    <span class="badge bg-important" value="{{ $job->action}}">Quan trọng</span>
                                    @else
                                    <span class="badge bg-warning" value="{{ $job->action}}">Chú ý</span>
                                    @endif
                                    <div class="pull-right hidden-phone">
                                        <button class="btn btn-success btn-xs fa fa-check"></button>
                                        <button class="btn btn-primary btn-xs fa fa-pencil"></button>
                                        <button class="btn btn-danger btn-xs fa fa-trash-o"></button>
                                    </div>
                                </div>
                            </li>
                            @else
                            @if($job->User_id == Auth::user()->id)
                            <li class="list-{{ $list[$i++] }}">
                                <i class=" fa fa-ellipsis-v"></i>
                                <div class="task-checkbox">
                                    <input type="checkbox" class="list-child" value="">
                                </div>
                                <div class="task-title">
                                    <span class="task-title-sp">{{ $job->Conten }}</span>
                                    <span class="badge bg-success"> Private</span>
                                    @if($job->action==2)
                                    <span class="badge bg-important" value="{{ $job->action}}">Quan trọng</span>
                                    @else
                                    <span class="badge bg-warning" value="{{ $job->action}}">Chú ý</span>
                                    @endif
                                    <div class="pull-right hidden-phone">
                                        <button class="btn btn-success btn-xs fa fa-check"></button>
                                        <button class="btn btn-primary btn-xs fa fa-pencil"></button>
                                        <button class="btn btn-danger btn-xs fa fa-trash-o"></button>
                                    </div>
                                </div>
                            </li>
                            @endif
                            @endif
                              @endforeach

                                  </ul>
                                  {{ $jobs->links() }}
                              </div>

                          </div>
                      </section>


                    <!-- /row -->

                    {{-- <div class="row mt">
                        <!--CUSTOM CHART START -->
                        <div class="border-head">
                            <h3>VISITS</h3>
                        </div>
                        <div class="custom-bar-chart">
                            <ul class="y-axis">
                                <li><span>10.000</span></li>
                                <li><span>8.000</span></li>
                                <li><span>6.000</span></li>
                                <li><span>4.000</span></li>
                                <li><span>2.000</span></li>
                                <li><span>0</span></li>
                            </ul>
                            <div class="bar">
                                <div class="title">JAN</div>
                                <div class="value tooltips" data-original-title="8.500" data-toggle="tooltip" data-placement="top">85%</div>
                            </div>
                            <div class="bar ">
                                <div class="title">FEB</div>
                                <div class="value tooltips" data-original-title="5.000" data-toggle="tooltip" data-placement="top">50%</div>
                            </div>
                            <div class="bar ">
                                <div class="title">MAR</div>
                                <div class="value tooltips" data-original-title="6.000" data-toggle="tooltip" data-placement="top">60%</div>
                            </div>
                            <div class="bar ">
                                <div class="title">APR</div>
                                <div class="value tooltips" data-original-title="4.500" data-toggle="tooltip" data-placement="top">45%</div>
                            </div>
                            <div class="bar">
                                <div class="title">MAY</div>
                                <div class="value tooltips" data-original-title="3.200" data-toggle="tooltip" data-placement="top">32%</div>
                            </div>
                            <div class="bar ">
                                <div class="title">JUN</div>
                                <div class="value tooltips" data-original-title="6.200" data-toggle="tooltip" data-placement="top">62%</div>
                            </div>
                            <div class="bar">
                                <div class="title">JUL</div>
                                <div class="value tooltips" data-original-title="7.500" data-toggle="tooltip" data-placement="top">75%</div>
                            </div>
                        </div>
                        <!--custom chart end-->
                    </div> --}}
                    <!-- /row -->

                </div>
                <!-- /col-lg-9 END SECTION MIDDLE -->


                <!-- **********************************************************************************************************************************************************
  RIGHT SIDEBAR CONTENT
  *********************************************************************************************************************************************************** -->

                <div class="col-lg-3 ds">
                    <!--COMPLETED ACTIONS DONUTS CHART-->
                    <h3>NOTIFICATIONS</h3>
                   @php
                       $i=0;
                   @endphp
                    <!-- First Action -->
                    @foreach ($shows as $show)
                    <div class="desc">
                        <div class="thumb">
                            <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                            <p>
                                <muted>{{ $time[$i++] }}</muted><br/>
                                <a href="#"> {{  $show->User->name ?? null }}</a> send 1 job posted.<br/>
                            </p>
                        </div>
                    </div>
                    @endforeach

                    <!-- USERS ONLINE SECTION -->
                    <h3>TEAM MEMBERS</h3>
                    <!-- First Member -->
                    @foreach ($users as $user)
                    <div class="desc">
                        <div class="thumb">
                            <img class="img-circle" src="https://ambe.vn/wp-content/uploads/2020/08/5-buoc-xay-dung-hinh-anh-ca-nhan-noi-bat-va-chuyen-nghiep-1.jpg" width="35px" height="35px" align="">
                        </div>
                        <div class="details">
                            <p><a href="#">{{ $user->name }}</a><br/>
                                @if($user->role ==1)
                                <muted>DESIGNER</muted>
                                @elseif ($user->role ==2)
                                <muted>IDEA</muted>
                                @else
                                <muted>ADMIN</muted>
                                @endif
                            </p>
                        </div>
                    </div>
                    @endforeach
                    <!-- Second Member -->
                    {{ $users->links() }}

                    <!-- CALENDAR-->
                    <div id="calendar" class="mb">
                        <div class="panel green-panel no-margin">
                            <div class="panel-body">
                                <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                    <div class="arrow"></div>
                                    <h3 class="popover-title" style="disadding: none;"></h3>
                                    <div id="date-popover-content" class="popover-content"></div>
                                </div>
                                <div id="my-calendar"></div>
                            </div>
                        </div>
                    </div>
                    <!-- / calendar -->

                </div>
                <!-- /col-lg-3 -->
            </div>
            <! --/row -->
    </section><!-- --/wrapper ---->
</section>

@endsection

@push('scripts')
<script src=" {{ asset('admin/js/sparkline-chart.js') }}"></script>
<script src="{{ asset('admin/js/zabuto_calendar.js') }}"></script>
<script src="{{ asset('admin/js/chart-master/Chart.js') }}"></script>
<script src="{{ asset('admin/js/chartjs-conf.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Welcome to Dashgum!',
            // (string | mandatory) the text inside the notification
            text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo. Free version for <a href="http://blacktie.co" target="_blank" style="color:#ffd777">BlackTie.co</a>.',
            // (string | optional) the image to display on the left
            image: 'assets/img/ui-sam.jpg',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
            time: '',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
    });
</script>


@endpush

