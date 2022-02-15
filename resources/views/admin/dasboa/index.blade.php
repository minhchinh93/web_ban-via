@extends('admin.app')
@section ('content')
<section id="main-content" >
    <section class="wrapper" style="color:black; font-family:Roboto,sans-serif; background: rgba(236, 240, 240, 0.644) ">
        <div class="row mtbox">
            <div class="col-md-2 col-sm-2 col-md-offset-1 box0" >
                <div class="box1" style="background-color:rgba(156, 255, 153, 0.952); border-radius: 5%;">
                    <span class="li_heart" style="color:rgb(235, 136, 15);"></span>
                    <h5  style="color:rgb(235, 136, 15)">IDEA OF THE DAY : {{ $totaDay }} </h5>
                    <h4  style="color:rgb(235, 136, 15)">IDEA SUCCESS : {{ $totaSusecDay }}</h4>
                </div>
                <a style="color:red" href="#"><p>see more !</p></a>
            </div>
            <div class="col-md-2 col-sm-2 box0">
                <div class="box1" style="background-color:rgba(255, 153, 153, 0.705);  border-radius: 5%;">
                    <span class="li_cloud" style="color:rgb(55, 15, 235)"></span>
                    <h5 style="color:rgb(55, 15, 235)">DESIGNER OF THE DAY: {{ $totalDayDesigner }}</h5>
                    {{-- <h4 style="color:rgb(55, 15, 235)">DESIGNER SUCCESS : {{ NULL }}</h4> --}}
                </div>
                <a style="color:red" href="#"><p>see more !</p></a>
            </div>
            <div class="col-md-2 col-sm-2 box0">
                <div class="box1" style="background-color:rgba(30, 255, 0, 0.733);  border-radius: 5%;">
                    <span class="li_news" style="color:rgb(245, 61, 107)"></span>
                    <h5 style="color:rgb(245, 61, 107)">TOTAL IDEA:</h5>
                    <h4><b style="color:rgb(245, 61, 107)">{{ $totalIdea }} </b></h4>
                </div>
                <a style="color:red" href="#"><p>see more !</p></a>
            </div>
            <div class="col-md-2 col-sm-2 box0">
                <div class="box1" style="background-color:rgb(229, 255, 85);  border-radius: 5%;">
                    <span class="li_data" style="color:rgb(207, 0, 235)"></span>
                    <h5 style="color:rgb(207, 0, 235)"> TOTAL DESIGNER:</h5>
                    <h4 style="color:rgb(207, 0, 235)"><b>{{ $totalDesign }} </b></h4>
                </div>
                <a style="color:red" href="#"><p>see more !</p></a>
            </div>
            <div class="col-md-2 col-sm-2 box0">
                <div class="box1" style="background-color:rgba(153, 226, 255, 0.705);  border-radius: 5%;">
                    <span class="li_stack" style="color:rgb(248, 68, 62)"></span>
                    <h5 style="color:rgb(248, 68, 62)">MEMBER IDEA: {{ $totalIdeamember }} </h5>
                    <h4 style="color:rgb(248, 68, 62)">MEMBER DESIGNER: {{ $totalDesigner }}</h4>
                </div>
                <a style="color:red" href="#"><p>see more !</p></a>
            </div>
        </div>

        <div class="row mt">
            <div class="col-md-12">
                <div class="content-panel" style="border-radius: 10px;background: rgb(248, 248, 245)">
                    <h4><i class="fa fa-angle-right"></i> IDEA MANAGER  </h4><hr><table class="table table-striped table-advance table-hover">


                        <thead>
                        <tr>
                            <th><i class="fa fa-bullhorn"></i> NAME</th>
                            <th><i class="fa fa-bookmark"></i> EMAIL</th>
                            <th class="hidden-phone"><i class="fa fa-question-circle"></i> ROLE</th>
                            <th><i class="fa fa-bookmark"></i> TOTAL IDEA</th>
                            <th><i class=" fa fa-edit"></i> Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($shows as $show)
                        <tr>
                            <td><a href="basic_table.html#">{{ $show->name?? null }}</a></td>
                            <td>{{$show->email}} </td>
                            @if($show->role ==1)
                            <td><span class="label label-info label-mini">DESIGNER</span></td>
                            @elseif ($show->role ==2)
                            <td><span class="label label-warning label-mini">IDEA</span></td>
                            @else
                            <td><span class="label label-success label-mini">ADMIN</span></td>
                            @endif
                            <td><h4>{{$show->sum}}</h4></td>
                            <td>
                                @if (  $show->deleted_at ==  null)
                                <span class="label label-info label-mini">active</span></td>
                                @else
                                <span class="label label-danger">disabled</span>
                                @endif
                            </td>
                            <td>
                                <span class="btn btn-success btn-xs">
                                    <a style="color:white" href="{{ route('DetailIdea',[$show->id]) }}">
                                     Detail
                                  </a>
                                 </span>
                                {{-- <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button> --}}
                                {{-- <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button> --}}
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /content-panel -->
            </div><!-- /col-md-12 -->
        </div>
        <div class="row mt" >
            <div class="col-md-12">
                <div class="content-panel" style="border-radius: 10px;background: rgba(255, 255, 255, 0.842)">
                    <h4><i class="fa fa-angle-right"></i> DESIGNER MANAGER  </h4><hr><table class="table table-striped table-advance table-hover">


                        <thead>
                        <tr>
                            <th><i class="fa fa-bullhorn"></i> NAME</th>
                            <th><i class="fa fa-bullhorn"></i> EMAIL</th>
                            <th class="hidden-phone"><i class="fa fa-question-circle"></i> ROLE</th>
                            <th><i class="fa fa-bookmark"></i> TOTAL MOCKUP</th>
                            <th><i class="fa fa-bookmark"></i> TOTAL PNG</th>
                            <th><i class=" fa fa-edit"></i> Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($designer as $show)
                        <tr>
                            <td><a href="basic_table.html#">{{ $show->name?? null }}</a></td>
                            <td>{{ $show->email?? null }}</td>
                            @if($show->role ==1)
                            <td><span class="label label-info label-mini">DESIGNER</span></td>
                            @elseif ($show->role ==2)
                            <td><span class="label label-warning label-mini">IDEA</span></td>
                            @else
                            <td><span class="label label-success label-mini">ADMIN</span></td>
                            @endif
                             <td>{{null}} </td>
                             <td>{{null}} </td>
                            <td>
                                @if (  $show->deleted_at ==  null)
                                <span class="label label-info label-mini">active</span></td>
                                @else
                                <span class="label label-danger">disabled</span>
                                @endif
                            </td>
                            <td>
                                <span class="btn btn-success btn-xs">
                                    <a style="color:white" href="{{ route('DetailDesigner',[$show->id]) }}">
                                     Detail
                                  </a>
                                 </span>
                                {{-- <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button> --}}
                                {{-- <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button> --}}
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /content-panel -->
            </div><!-- /col-md-12 -->
        </div>

  </section><!-- --/wrapper ---->
</section>
@endsection
