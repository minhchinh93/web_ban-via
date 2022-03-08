@extends('client.app')


@section ('content')
<!--main content start-->
<section id="main-content">
    <section class="wrapper" style="color:black; font-family:Roboto,sans-serif" >

        <div class="col-lg-12">
            <div class="form-panel" style=" border-radius: 15px;">
                  <h4 class="mb"><i class="fa fa-angle-right"></i>Giao Việc</h4>
                <form class="form-horizontal style-form"action="{{ route('addIdea') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control conten" name="description" id="exampleFormControlTextarea1" rows="5"></textarea>                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Image</label>
                        <div class="col-sm-10">
                            <input name="image[]"  type="file" multiple >
                            <span class="help-block">kèm theo Image để Designer được rõ hơn</span>
                        </div>
                    </div>
           <div class="row">
            <div class="col-lg-4">
                <label class="">Designer:</label>
                    <select class="col-lg-4 form-control " id="cars" name="User_id" required>
                        @foreach ($designers as $designer)
                        <option value="{{ $designer->id }}" >{{  $designer->name }}</option>
                        @endforeach
                      </select> <br><br><br>
                    </div>
                     <div class="col-lg-4">
                         <label class="">Category :</label>
                        <select class="col-lg-4 form-control " name="type_id" id= "loaiSP" required>
                            <option value="">Chon</option>
                            @foreach ($type_products as $type_product)
                            <option value="{{$type_product->id}}" >{{  $type_product->name }}</option>
                            @endforeach
                          </select> <br><br><br>
                     </div>
                     <div class="col-lg-4">
                        <label class="">Size :</label>
                         <select class="col-lg-4 form-control " name="size" id="size" required>
                            <option value="">Không size</option>
                            @foreach ($sizes as $size)
                            <option value="{{ $size->id }}">{{  $size->name }}</option>
                            @endforeach
                          </select><br><br>
                        </div>
           </div>
                      <hr>
                      <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
            </div>
            <div class="row mt">
                <div class="col-md-12">
                    <div class="content-panel"  style=" border-radius: 15px;">
                        <h4><i class="fa fa-angle-right"></i>  Bảng Báo Cáo</h4>
                        <div class="col-lg-4">
                            <h5 style="margin-left: 2%;" class="category"><a style="color: gray" href="{{ route('done') }}"> Hoàn thành ({{ $totalDone ?? null}}) </a>
                                 | <a  style="color: rgb(13, 182, 36)" href="{{ route('Pending') }}">chờ duyệt ({{ $totalPending ?? null}})</a>
                                 | <a style="color:red" href="{{ route('NotReceived') }}">chưa nhận ({{ $totalNotReceived ?? null}})</a>
                                 | <a style="color:red" href="{{ route('allidea') }}"> tất cả ({{ $totalallidea ?? null}})</a>

                                </h5>
                        </div><!-- /col-lg-12 -->
                        <div class="col-lg-7">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="{{ route('find') }}" class="form-inline"role="form" method="get">
                                      @csrf
                                        <select class="form-control "  id="cars" name="type" >>
                                            <option>Tìm Kiếm loại</option>
                                            @foreach ($type_products as $type_product)
                                            <option value="{{$type_product->id}}">{{  $type_product->name }}</option>
                                            @endforeach
                                          </select>
                                          <button type="submit" class="btn btn-theme "><i class="fa-solid fa-magnifying-glass"></i> </button>
                                    </form>
                                </div>
                                <div class="col-lg-6">
                                    <form class="form-inline" role="form">
                                        <div class="form-group">
                                            <label class="sr-only" for="exampleInputEmail2">tim kiem</label>
                                            <input type="text" class="form-control" name="keyword" aria-label=" Search" id="exampleInputEmail2" value="{{ request()->keyword }}" placeholder="tim kiem">
                                        </div>
                                        <button type="submit" class="btn btn-theme"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </form>
                                </div>
                            </div>


            </div><!-- /col-lg-12 -->
            <div class="col-lg-1">
                    <button  type="button" class="btn btn-primary"><a style="color:white" href="{{ route('home') }}">refresh trang</a></button>
                </div><!-- /col-lg-12 -->

                        <hr>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                            <tr>
                                <th><i class="fa fa-bullhorn"></i> Designer</th>
                                <th><i class="fa fa-bullhorn"></i> Category(size)</th>
                                <th><i class="fa fa-bullhorn"></i> Title</th>
                                <th><i class="fa fa-bullhorn"></i> Cornerstones</th>
                                <th class="hidden-phone"><i class="fa fa-question-circle"></i> Description </th>
                                <th class="hidden-phone"><i class="fa fa-question-circle"></i>Time</th>
                                <th><i class="fa fa-bookmark"></i>Idea </th>
                                <th><i class=" fa fa-edit"></i> Mockup </th>
                                <th><i class=" fa fa-edit"></i> PNG </th>
                                <th><i class=" fa fa-edit"></i>  Status </th>
                                <th></th>
                            </tr>
                            </thead>
                            @php
                              $i=0
                            @endphp
                            <tbody>
                                @foreach ($reports as  $report)
                                <tr>
                                    <td><a href="basic_table.html#">{{ $report->User->name ?? null }}</a></td>
                                    <td>{{ $report->type_product->name ?? null }}<b>({{ $report->size->name ?? null  }})</b></td>
                                    <td  style=" max-width: 200px;"><b>{{ $report->title ?? null }}</b></td>
                                    <td  style=" max-width: 200px;"><b>
                                        @foreach ($report->cornerstones as $cornerstone)
                                        <span class="label label-info label-mini">{{ $cornerstone->name}}</span>
                                        @endforeach
                                        <form class="form-inline" action="{{ route('cornerstoneProduct',[$report->id]) }}" method="post">
                                        @csrf
                                        <select name="cornerstone" id="cars" style="border-radius: 15px;" class="form-control">
                                        @foreach ($showcornerstones as $show)
                                            <option value="{{ $show->id }}">{{  $show->name }}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" style="border-radius: 10px;" class="btn btn-theme"><i class="fa-solid fa-paper-plane"></i></button>
                                </form></b></td>
                                    <td class="hidden-phone" style=" max-width: 300px;
                                    overflow: hidden;
                                    text-overflow: ellipsis;
                                   word-wrap: break-word;">{!!  $report->description ?? null !!}
                                        <form class="form-inline" action="{{ route('comment',[$report->id]) }}" method="post">
                                      @csrf
                                          <div class="form-group">
                                                <input type="text" style="border-radius: 15px;" class="form-control" id="exampleInputEmail2" name="comment" placeholder="comment">
                                            </div>
                                            <button type="submit" style="border-radius: 10px;" class="btn btn-theme"><i class="fa-solid fa-paper-plane"></i></button>
                                        </form>
                                    </td>
                                    <td><a href="basic_table.html#">{{ $times[$i++] ?? null }}</a></td>
                                    @if(count($report->product_details)!=0)
                                    <td data-toggle="modal" data-target="#a{{$report->id}}"><img src="{{asset('/storage/'.$report->product_details[0]->ImageDetail)}}" style="width: 150px; border-radius: 5%;" >
                                      @else
                                    <td data-toggle="modal" data-target="#a{{$report->id}}"></td>
                                    @endif
                                    </td>
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
                                              <div  class="post-Image-{{ $rep->id  }}">
                                                <div class="project">
                                                    <button onclick="deleteImage({{ $rep->id }})">xoa</button>
                                                    <h5> {{$rep->ImageDetail}} </h5>
                                                    {{-- <a href="{{ route('deleteImage',[$rep->id]) }}"><span class="label label-info label-mini">xoa</span></a> --}}
                                                    <div class="photo-wrapper">
                                                        <div class="photo">
                                                            <a class="fancybox" target="_blank" href="{{asset('/storage/'.$rep->ImageDetail)}}" alt="" ><img src="{{asset('/storage/'.$rep->ImageDetail)}}"  width="100%"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                              @endforeach
                                            <div class="modal-footer">
                                              <form class="form-inline" action="{{ route('addImage',[$report->id]) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input name="image[]"  type="file" multiple required>
                                              <button type="submit" class="btn btn-primary" >Add Image Idea</button>
                                            </form>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                          </div>
                                        </div>
                                    </section>
                                    </section>
                                      </div>
                                      @if (count($report->mocups)!=0)
                                      <td data-toggle="modal" data-target="#c{{$report->id}}"><img src="{{asset('/storage/'.$report->mocups[0]->mocup)}}" style="width: 150px;  border-radius: 5%;" ></td>
                                        @else
                                        <td data-toggle="modal" data-target="#c{{$report->id}}"></td>
                                       @endif
                                    <div class="modal fade" id="c{{$report->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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

                                              @foreach ($report->mocups as $rep)
                                              <div class="project-wrapper">
                                                <h5>{{ $rep->mocup }} </h5>
                                                <div class="project">
                                                    <div class="photo-wrapper">
                                                        <div class="photo">
                                                            <a class="fancybox" target="_blank" href="{{asset('/storage/'.$rep->mocup)}}" alt="" ><img src="{{asset('/storage/'.$rep->mocup)}}"  width="100%"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                              @endforeach
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                          </div>
                                        </div>
                                    </section>
                                    </section>
                                      </div>
                                    <td data-toggle="modal" data-target="#b{{$report->id}}">
                                        @if (count($report->ProductPngDetails)!=0)
                                        <img src="{{asset('/storage/'.$report->ProductPngDetails[0]->ImagePngDetail ) ?? null }}" style="border-radius: 5%;width: 150px;"  >
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
                                                <h5>{{ $rep->ImagePngDetail }} </h5>
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
                                            {{-- @if( $report->status == 3) --}}
                                            <a class=" w-75 " style="color:white" href="{{ route('success',[$report->id]) }}"><i class="fa fa-check" alt="chi tiết"></i></a>
                                            {{-- @else
                                            <i class="fa fa-check" alt="chi tiết"></i>
                                            @endif --}}
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
var imageAPI='/deleteImage'
//api xoa api
function deleteImage(id) {
      var option = {
          method: 'GET', // *GET, POST, PUT, DELETE, etc.
          headers: {
              'Content-Type': 'application/json'
                  // 'Content-Type': 'application/x-www-form-urlencoded',
          },
      }
      alert
      fetch(imageAPI + '/' + id, option)
          .then(function(response) {
              console.log(response);
              return response.json();
          })
          .then(function() {
                  var xoaHtml = document.querySelector('.post-Image-' + id)
                  if (xoaHtml) {
                      xoaHtml.remove();
              };
          });
  }
  //ket thuc
$(document).ready(function(){

  $("#loaiSP").change(function(){
    var loaiSP = $(this).val();
    // alert(loaiSP);
    $.get("ajax/"+loaiSP, function(data){
        // console.log(data);
      $("#size").html(data);
    });
  });
});



</script>
@endpush
