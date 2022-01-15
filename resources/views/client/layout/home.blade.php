@extends('client.app')


@section ('content')
<!--main content start-->
<section id="main-content">
    <section class="wrapper">

        <div class="col-lg-12">
            <div class="form-panel">
                  <h4 class="mb"><i class="fa fa-angle-right"></i>    Giao Việc</h4>
                <form class="form-horizontal style-form"action="{{ route('addIdea') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Tiêu Đề</label>
                        <div class="col-sm-10">
                            <input type="text" name="tital" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">mo ta</label>
                        <div class="col-sm-10">
                            <input type="text" name="description" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Hình Ảnh Kèm Theo</label>
                        <div class="col-sm-10">
                            <input name="image[]"  type="file" multiple >
                            <span class="help-block">kèm theo hình ảnh để designer được rõ hơn</span>
                        </div>
                    </div>
                    <div class="form-panel">
                        <select class="col-lg-4 form-control " name="type_id">
                            <option>Chọn Loai SP</option>
                            @foreach ($type_products as $type_product)
                            <option value="{{$type_product->id}}">{{  $type_product->name }}</option>
                            @endforeach
                          </select> <br><br><br>

                       <select class="col-lg-4 form-control " id="cars" name="User_id">
                           <option>Chọn Designer</option>
                           @foreach ($designers as $designer)
                           <option value="{{ $designer->id }}">{{  $designer->name }}</option>
                           @endforeach
                         </select> <br><br><br>
                       </div><!-- /form-panel -->

                      <hr>
                      <button type="submit" class="btn btn-success">  giao viec</button>
                </form>
            </div>
            </div>
            <div class="row mt">
                <div class="col-md-12">
                    <div class="content-panel">
                        <h4><i class="fa fa-angle-right"></i>  Bảng Báo Cáo</h4>
                        <p style="margin-left: 2%;" class="category"><a style="color: gray" href="{{ route('done') }}"> Hoàn thành ({{ $totalDone ?? null}}) </a> | <a  style="color: rgb(13, 182, 36)" href="{{ route('Pending') }}">chờ duyệt ({{ $totalPending ?? null}})</a> | <a style="color:red" href="{{ route('NotReceived') }}">chưa nhận ({{ $totalNotReceived ?? null}})</a></p>
                        <button style="margin-left: 85%;" type="button" class="btn btn-primary"><a style="color:white" href="{{ route('home') }}">refresh trang</a></button>

                        <hr><table class="table table-striped table-advance table-hover">
                            <thead>
                            <tr>
                                <th><i class="fa fa-bullhorn"></i> tên designer</th>
                                <th><i class="fa fa-bullhorn"></i> Loại Sản Phẩm</th>
                                <th class="hidden-phone"><i class="fa fa-question-circle"></i> Mô tả</th>
                                <th><i class="fa fa-bookmark"></i> hình ảnh</th>
                                <th><i class=" fa fa-edit"></i> PNG</th>
                                <th><i class=" fa fa-edit"></i> status</th>
                                <th><i class=" fa fa-edit"></i> hành động</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($reports as  $report)
                                <tr>
                                    <td><a href="basic_table.html#">{{ $report->User->name ?? null }}</a></td>
                                    <td><a href="basic_table.html#">{{ $report->type_product->name ?? null }}</a></td>
                                    <td class="hidden-phone">{!!  $report->description ?? null !!}
                                        <form class="form-inline" action="{{ route('component',[$report->id]) }}" method="post">
                                      @csrf
                                            <input type="hidden" name="_token" value="7dGnLGxMMAmFtuyXszFeLyDNQ3XNu1GxyYOkRDUQ">                    <div class="form-group">
                                                <input type="text" class="form-control" id="exampleInputEmail2" name="comment" placeholder="comment">
                                            </div>
                                            <button type="submit" class="btn btn-theme">gửi</button>
                                        </form>
                                    </td>
                                    <td data-toggle="modal" data-target="#a{{$report->id}}"><img src="{{asset('/storage/'.$report->image)}}" style="width: 150px; height :150px;  border-radius: 5%;" >
                                        {{-- <span type="button" class="label label-success" value="{{ $report->id }}" data-toggle="modal" data-target="#a{{$report->id}}">
                                           xem ảnh
                                          </span> --}}
                                    </td>
                                    {{-- @php
                                    $i++
                                    @endphp --}}
                                    <div class="modal fade" id="a{{$report->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <section id="main-content">
                                            <section class="wrapper">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>

                                              @foreach ($report->product_details as $rep)
                                              <div class="project-wrapper">
                                                <div class="project">
                                                    <div class="photo-wrapper">
                                                        <div class="photo">
                                                            <a class="fancybox" target="_blank" href="{{asset('/storage/'.$rep->ImageDetail)}}" alt="" ><img src="{{asset('/storage/'.$rep->ImageDetail)}}"  width="100%"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                              @endforeach
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                              <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                          </div>
                                        </div>
                                    </section>
                                    </section>
                                      </div>
                                    <td data-toggle="modal" data-target="#b{{$report->id}}">
                                        @if ($report->ImagePNG)
                                        <img src="{{asset('/storage/'.$report->ImagePNG ) ?? null }}" style="border-radius: 5%;width: 150px; height :150px"  >
                                        @endif
                                        {{-- <span type="button" class="label label-success" data-toggle="modal" data-target="#b{{$report->id}}">
                                            xem anh designer
                                          </span> --}}
                                    </td>
                                    <div class="modal fade" id="b{{$report->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <section id="main-content">
                                            <section class="wrapper">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>

                                              @foreach ($report->ProductPngDetails as $rep)
                                              <div class="project-wrapper">
                                                <div class="project">
                                                    <div class="photo-wrapper">
                                                        <div class="photo">
                                                            <a class="fancybox" target="_blank" href="{{asset('/storage/'.$rep->ImagePngDetail)}}" alt="" ><img src="{{asset('/storage/'.$rep->ImagePngDetail)}}"  width="100%"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                              @endforeach
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                              <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                          </div>
                                        </div>
                                    </section>
                                    </section>
                                      </div>
                                    @if ($report->status == 1)
                                    <td><span class="label label-warning label-mini">chưa nhận</span></td>
                                    @elseif ( $report->status == 2)
                                    <td><span class="label label-info label-mini">đã nhận</span></td>
                                    @elseif ( $report->status == 3)
                                    <td><span class="label label-info label-mini">chờ duyệt</span></td>
                                    @elseif ( $report->status == 4)
                                    <td><span class="label label-warning label-mini">làm lại</span></td>
                                    @else
                                    <td><span class="label label-success label-mini">hoàn thành</span></td>
                                    @endif
                                    <td>
                                        <span class="btn btn-success btn-xs" alt="chi tiết">
                                            @if( $report->status == 3)
                                            <a class=" w-75 " style="color:white" href="{{ route('success',[$report->id]) }}"><i class="fa fa-check" alt="chi tiết"></i></a>
                                            @else
                                            <i class="fa fa-check" alt="chi tiết"></i>
                                            @endif
                                              </span>
                                              <span class="btn btn-primary btn-xs">
                                                @if( $report->status == 3)
                                                <a class=" w-75 " style="color:white" href="{{ route('approvalShow',[$report->id]) }}"><i class="fa fa-pencil"></i></a>
                                                @else
                                                <a class=" w-75 " style="color:white" href="{{ route('EditShow',[$report->id]) }}"><i class="fa fa-pencil"></i></a>
                                                @endif
                                              </a>
                                             </span>
                                             <span class="btn btn-danger btn-xs">
                                                <a class=" w-75 " style="color:white" href="{{ route('delete',[$report->id]) }}"><i class="fa fa-trash-o"></i></a>
                                              </a>
                                             </span>
                                             @if($report->action== 1 &&  $report->status != 5)
                                             <span class="btn btn-danger btn-xs">
                                                <a class=" w-75 " style="color:white" href="{{ route('important',[$report->id]) }}">ưu tiên</a>
                                              </a>
                                             </span>
                                             @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- /content-panel -->
                </div><!-- /col-md-12 -->
                {{ $reports->links() }}
            </div>
             <!-- Modal -->

    </section>
</section>

<!--main content end-->
@endsection

@push('scripts') --}}
<script>






</script>
@endpush
