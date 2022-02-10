@extends('admin.app')
@section ('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row mtbox">
            <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                <div class="box1">
                    <span class="li_heart"></span>
                    <h5>IDEA OF THE DAY : {{ 100 }} </h5>
                    <h4>IDEA SUCCESS : {{ 1000 }}</h4>
                </div>
                <a style="color:red" href="#"><p>see more !</p></a>
            </div>
            <div class="col-md-2 col-sm-2 box0">
                <div class="box1">
                    <span class="li_cloud"></span>
                    <h5>DESIGNER OF THE DAY: {{ 100 }}</h5>
                    <h4>DESIGNER SUCCESS : {{ 1000 }}</h4>
                </div>
                <a style="color:red" href="#"><p>see more !</p></a>
            </div>
            <div class="col-md-2 col-sm-2 box0">
                <div class="box1">
                    <span class="li_stack"></span>
                    <h5>MEMBER IDEA: 10 </h5>
                    <h4>MEMBER DESIGNER: 20</h4>
                </div>
                <a style="color:red" href="#"><p>see more !</p></a>
            </div>
            <div class="col-md-2 col-sm-2 box0">
                <div class="box1">
                    <span class="li_news"></span>
                    <h5>TOTAL IDEA:</h5>
                    <h4><b>{{ null }} 1000</b></h4>
                </div>
                <a style="color:red" href="#"><p>see more !</p></a>
            </div>
            <div class="col-md-2 col-sm-2 box0">
                <div class="box1">
                    <span class="li_data"></span>
                    <h5> TOTAL DESIGNER:</h5>
                    <h4><b>{{ null }} 1000</b></h4>
                </div>
                <a style="color:red" href="#"><p>see more !</p></a>
            </div>
        </div>
                {{-- <div class="col-md-12">
                    <div class="content-panel">
                        <h4><i class="fa fa-angle-right"></i> Advanced Table</h4><hr><table class="table table-striped table-advance table-hover">


                            <thead>

                            <tr>
                                <th><i class="fa fa-bullhorn"></i> stt</th>
                                <th class="hidden-phone"><i class="fa fa-question-circle"></i> khách hàng</th>
                                <th><i class=" fa fa-edit"></i> số lượng</th>
                                <th><i class=" fa fa-edit"></i>thời gian </th>
                                <th><i class=" fa fa-edit"></i> giá trị</th>
                                <th><i class="fa fa-bullhorn"></i> địa chỉ</th>
                                <th><i class="fa fa-bullhorn"></i> lưu ý</th>
                                <th><i class="fa fa-bullhorn"></i> sô điệnt hoại khách hang</th>
                                <th><i class=" fa fa-edit"></i> trạng thái</th>
                                <th><i class=" fa fa-edit"></i> chi tiết</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                                @php
                                    $t=0;
                                @endphp

                                @foreach ($tables as $table)
                                    @php
                                    $t+=1;
                                @endphp
                                <tr>
                                    <td><a href="basic_table.html#">{{ $t }}</a></td>
                                    <td class="hidden-phone">{{ $table->khach_hang }}</td>
                                    <td class="hidden-phone">{{ $table->so_luong }}</td>
                                    <td class="hidden-phone">{{ $table->date_order }}</td>
                                    <td>{{ $table->total }}</td>
                                    <td> {{ $table->address }}</td>
                                    <td> {{ $table->note }}</td>
                                    <td> {{ $table->phone }}</td>
                                    @if( $table->payment == 'COD')
                                    <td><span class="label label-info label-mini">COD</span></td>
                                    @else
                                    <td> <span class="label label-warning label-mini">ATM</span></td>
                                    @endif
                                    <td>
                                        <span class="btn btn-success btn-xs">
                                            <a class=" w-75 " style="color:white" href="{{ route('chitiet',[$table->id]) }}"><i class="fa fa-pencil"></i></a>
                                          </span>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div><!-- /content-panel -->
                </div><!-- /col-md-12 --> --}}

  </section><!-- --/wrapper ---->
</section>
@endsection
