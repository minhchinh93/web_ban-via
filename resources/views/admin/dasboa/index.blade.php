@extends('admin.app')
@section ('content')
<section id="main-content">
    <section class="wrapper" style="color:black; font-family:Roboto,sans-serif">
        <div class="row mtbox">
            <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                <div class="box1">
                    <span class="li_heart"></span>
                    <h5>IDEA OF THE DAY : {{ $totaDay }} </h5>
                    <h4>IDEA SUCCESS : {{ $totaSusecDay }}</h4>
                </div>
                <a style="color:red" href="#"><p>see more !</p></a>
            </div>
            <div class="col-md-2 col-sm-2 box0">
                <div class="box1">
                    <span class="li_cloud"></span>
                    <h5>DESIGNER OF THE DAY: {{ $totalDayDesigner }}</h5>
                    <h4>DESIGNER SUCCESS : {{ NULL }}</h4>
                </div>
                <a style="color:red" href="#"><p>see more !</p></a>
            </div>
            <div class="col-md-2 col-sm-2 box0">
                <div class="box1">
                    <span class="li_news"></span>
                    <h5>TOTAL IDEA:</h5>
                    <h4><b>{{ $totalIdea }} </b></h4>
                </div>
                <a style="color:red" href="#"><p>see more !</p></a>
            </div>
            <div class="col-md-2 col-sm-2 box0">
                <div class="box1">
                    <span class="li_data"></span>
                    <h5> TOTAL DESIGNER:</h5>
                    <h4><b>{{ $totalDesign }} </b></h4>
                </div>
                <a style="color:red" href="#"><p>see more !</p></a>
            </div>
            <div class="col-md-2 col-sm-2 box0">
                <div class="box1">
                    <span class="li_stack"></span>
                    <h5>MEMBER IDEA: {{ $totalIdeamember }} </h5>
                    <h4>MEMBER DESIGNER: {{ $totalDesigner }}</h4>
                </div>
                <a style="color:red" href="#"><p>see more !</p></a>
            </div>
        </div>

        <div class="row mt">
            <div class="col-md-12">
                <div class="content-panel">
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
                <div class="content-panel" >
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
