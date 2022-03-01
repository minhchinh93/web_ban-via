@extends('client.app')


@section ('content')

<section id="main-content">
    <section class="wrapper" style="color:black; font-family:Roboto,sans-serif">
        <div class="row mt">
            <div class="col-md-12">
                <div class="content-panel" style=" border-radius: 20px;">
                    <h4><i class="fa fa-angle-right"></i>Nhận việc</h4><hr>
                    <table class="table table-striped table-advance table-hover">
                        <h5 style="margin-left: 2%;" class="category"><a style="color: rgb(13, 182, 36)" href="{{ route('complete') }}">Hoàn thành ({{ $totalDone ?? null}}) </a>
                            | <a  style="color: rgb(79, 76, 230)" href="{{ route('replay') }}">làm lại ({{ $totalPending ?? null}})</a>
                            | <a style="color:orange" href="{{ route('NotSeen') }}">chưa nhận ({{ $totalNotSeen ?? null}})</a>
                            | <a style="color:rgb(225, 0, 255)" href="{{ route('PendingDS') }}">Đang làm ({{ $totalPendingDS ?? null}})</a>
                            | <a style="color:red" href="{{ route('prioritize') }}">ưu tiên ({{ $totalprioritize ?? null}})</a></h5>

                        <thead>
                        <tr>
                            <th><i class="fa fa-bullhorn"></i>Idea</th>
                            <th><i class="fa fa-bullhorn"></i> categories(size)</th>
                            <th><i class="fa fa-bullhorn"></i> Title</th>
                            <th><i class="fa fa-bullhorn"></i> SKU</th>
                            <th><i class="fa fa-bullhorn"></i> time</th>
                            <th class="hidden-phone"><i class="fa fa-question-circle"></i> Description </th>
                            <th><i class="fa fa-bookmark"></i> Idea </th>
                            <th><i class=" fa fa-edit"></i> Mockup </th>
                            <th><i class=" fa fa-edit"></i> PNG</th>
                            <th><i class=" fa fa-edit"></i> status</th>
                            <th><i class=" fa fa-edit"></i> Action</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($reports as  $report)
                            <tr>
                                <td><a href="basic_table.html#">{{$name[$i++][0]->name?? null }}</a></td>
                                <td><a href="basic_table.html#">{{ $report->type_product->name ?? null }}({{ $report->size->name ?? null  }})</a></td>
                                <td  style=" max-width: 200px;"><b>{{ $report->title ." ". $report->Sku ?? null }}</b></td>
                                <td  style=" max-width: 100px;"><b>{{  $report->Sku ?? null }}</b></td>
                                <td class="hidden-phone">{!!  $report->created_at ?? null !!}
                                <td class="hidden-phone"
                                style=" max-width: 400px;
                                overflow: hidden;
                                text-overflow: ellipsis;
                               word-wrap: break-word;">{!!  $report->description ?? null !!}
                                    <form class="form-inline" action="{{ route('componentDesigner',[$report->id]) }}" method="post">
                                        @csrf
                                         {{-- <input type="hidden" name="_token" value="7dGnLGxMMAmFtuyXszFeLyDNQ3XNu1GxyYOkRDUQ"> --}}
                                          <div class="form-group">
                                                  <input style="border-radius: 15px;"  type="text" class="form-control" id="exampleInputEmail2" name="comment" placeholder="comment">
                                              </div>
                                              <button style="border-radius: 10px;" type="submit" class="btn btn-theme"><i class="fa-solid fa-paper-plane"></i></button>
                                          </form>
                                </td>
                                <td data-toggle="modal" data-target="#a{{$report->id}}">
                                    @if  (count($report->product_details)!=0)
                                   <img src="{{asset('/storage/'.$report->product_details[0]->ImageDetail)}}" style="width: 150px;  border-radius: 5%;" >
                                      @endif
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
                                            <h5>{{ $rep->ImageDetail }} </h5>
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
                                        </div>
                                      </div>
                                    </div>
                                </section>
                                </section>
                                  </div>
                                  @if (count($report->mocups)!=0)
                                  <td><img  data-toggle="modal" data-target="#c{{$report->id}}" src="{{asset('/storage/'.$report->mocups[0]->mocup)}}" style="width: 150px; border-radius: 5%;" >
                                    <a class=" w-75 " style="color:white" href="{{ route('deleteMocupAll',[$report->id]) }}">
                                        <span type="button" class="btn btn-danger" data-dismiss="modal">&times;</span>
                                    </a>
                                  @else
                                   <td>
                                   <form class="form-inline" action="{{ route('addmocups',[$report->id]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input name="image[]"  type="file" multiple  required><br>
                                  <button type="submit" class="btn btn-primary" ><i class="fa-solid fa-square-plus"></i></button><br>
                                </form>
                                @endif
                            </td>
                                <div class="modal fade" id="c{{$report->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <section id="main-content">
                                        <section class="wrapper">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          {{-- <h5 class="modal-title" id="exampleModalLongTitle">Moccup</h5> --}}
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                          @foreach ($report->mocups as $rep)
                                          <div class="post-content-{{ $rep->id  }}">
                                            <div class="project">
                                                <button onclick="deleteComment({{ $rep->id }})">xoa</button>
                                                <h5>{{ $rep->mocup }} </h5>
                                                 {{-- <a href="{{ route('deletemocups',[$rep->id]) }}"><span onclick="deletemocups({{ $rep->id }})" class="label label-info label-mini">xoa</span></a> --}}
                                                <div class="photo-wrapper">
                                                    <div class="photo">
                                                        <a class="fancybox" target="_blank" href="{{asset('/storage/'.$rep->mocup)}}" alt="" ><img src="{{asset('/storage/'.$rep->mocup)}}"  width="100%"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                          @endforeach
                                        <div class="modal-footer">
                                            <form class="form-inline" action="{{ route('addmocups',[$report->id]) }}" method="post" enctype="multipart/form-data">
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

                                    @if (count($report->ProductPngDetails)!=0)
                                    <td >
                                    <img data-toggle="modal" data-target="#b{{$report->id}}" src="{{asset('/storage/'.$report->ProductPngDetails[0]->ImagePngDetail)}}" style="border-radius: 5%;width: 150px;"  >
                                    <a class=" w-75 " style="color:white" href="{{ route('deletePngAll',[$report->id]) }}">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
                                    </a>
                                </td>
                                    @else
                                    <td>
                                    <form class="form-inline" action="{{ route('addPngDetails',[$report->id]) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input name="image[]"  type="file" multiple required><br>
                                      <button type="submit" class="btn btn-primary" ><i class="fa-solid fa-square-plus"></i></button><br>
                                    </form>
                                </td>
                                  @endif
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
                                          <div class="post-Png-{{ $rep->id  }}">
                                            <div class="project">
                                                <button onclick="deletePng({{ $rep->id }})">xoa</button>
                                                <h5> {{ $rep->ImagePngDetail}}</h5>
                                                {{-- <a href="{{ route('deleteProductPngDetails',[$rep->id]) }}"><span class="label label-info label-mini">xoa</span></a> --}}
                                                <div class="photo-wrapper">
                                                    <div class="photo">
                                                        <a class="fancybox" target="_blank" href="{{asset('/storage/'.$rep->ImagePngDetail)}}" alt="" ><img src="{{asset('/storage/'.$rep->ImagePngDetail)}}"  width="100%"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                          @endforeach
                                        <div class="modal-footer">
                                            <form class="form-inline" action="{{ route('addPngDetails',[$report->id]) }}" method="post" enctype="multipart/form-data">
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

                                @if ($report->status == 1)
                                <td><span class="label label-warning label-mini"><a style="color:white" href="{{route('accept',[$report->id])}}">Nhận việc</a></span></td>
                                @elseif ( $report->status == 2)
                                <td><span class="label label-info label-mini">đã nhận</span></td>
                                @elseif ( $report->status == 3)
                                <td><span class="label label-info label-mini">chờ duyệt</span></td>
                                @elseif ( $report->status == 4)
                                <td><span class="label label-warning label-mini">Làm lại</span></td>
                                @else
                                <td><span class="label label-success label-mini">hoàn thành</span></td>
                                @endif

                                <td>
                                    <span class="btn btn-primary btn-xs">
                                        @if ($report->status != 1)
                                        <a class=" w-75 " style="color:white; border-radius: 3%;" href="{{ route('Detail',[$report->id]) }}"><i class="fa fa-pencil"></i></a>
                                      </a>
                                      @else
                                       <i class="fa fa-pencil"></i>
                                      @endif
                                     </span>
                                     @if($report->action== 2 &&  $report->status != 5)
                                     <td><span class="label label-danger label-mini">ưu tiên</span></td>
                                     @endif

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-primary"><a style="color:white" href="{{ route('Dashboard') }}">refresh trang</a></button>

                </div><!-- /content-panel -->
            </div><!-- /col-md-12 -->
        </div>
        {{ $reports->links() }}
    </section>
</section>

@endsection

@push('scripts') --}}
 <script>
 var deletemocupApi = "/deletemocups"
 var deletePngApi = "/deleteProductPngDetails"

function deleteComment(id) {
      var option = {
          method: 'GET', // *GET, POST, PUT, DELETE, etc.
          headers: {
              'Content-Type': 'application/json'
                  // 'Content-Type': 'application/x-www-form-urlencoded',
          },
      }

      fetch(deletemocupApi + '/' + id, option)
          .then(function(response) {
              console.log(response);
              return response.json();
          })
          .then(function() {
                  var xoaHtml = document.querySelector('.post-content-' + id)
                  if (xoaHtml) {
                      xoaHtml.remove();
              };
          });
  }
  function deletePng(id) {
      var option = {
          method: 'GET', // *GET, POST, PUT, DELETE, etc.
          headers: {
              'Content-Type': 'application/json'
                  // 'Content-Type': 'application/x-www-form-urlencoded',
          },
      }

      fetch(deletePngApi + '/' + id, option)
          .then(function(response) {
              return response.json();
          })
          .then(function() {
                  var xoaHtml = document.querySelector('.post-Png-' + id)
                  if (xoaHtml) {
                      xoaHtml.remove();
              };
          });
  }
    //<![CDATA[
    $('input.input-qty').each(function() {
      var $this = $(this),
        qty = $this.parent().find('.is-form'),
        min = Number($this.attr('min')),
        max = Number($this.attr('max'))
      if (min == 0) {
        var d = 0
      } else d = min
      $(qty).on('click', function() {
        if ($(this).hasClass('minus')) {
          if (d > min) d += -1
        } else if ($(this).hasClass('plus')) {
          var x = Number($this.val()) + 1
          if (x <= max) d += 1
        }
        $this.attr('value', d).val(d);
         var qty = $(".input-qty").val();
         var price = $("#price").val();
         var total = qty * price;
         $("#total").html(total);
      })
    })


</script>
@endpush
