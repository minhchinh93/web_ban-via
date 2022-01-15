@extends('client.app')


@section ('content')

<section id="main-content">
    <section class="wrapper">
        <div class="row mt">
            <div class="col-md-12">
                <div class="content-panel">
                    <h4><i class="fa fa-angle-right"></i>Nhận việc</h4><hr><table class="table table-striped table-advance table-hover">
                        <p style="margin-left: 2%;" class="category"><a style="color: rgb(13, 182, 36)" href="{{ route('complete') }}">Hoàn thành ({{ $totalDone ?? null}}) </a>
                            | <a  style="color: rgb(79, 76, 230)" href="{{ route('replay') }}">làm lại ({{ $totalPending ?? null}})</a>
                            | <a style="color:orange" href="{{ route('NotSeen') }}">chưa nhận ({{ $totalNotSeen ?? null}})</a>
                            | <a style="color:red" href="{{ route('prioritize') }}">ưu tiên ({{ $totalprioritize ?? null}})</a></p>

                        <thead>
                        <tr>
                            <th><i class="fa fa-bullhorn"></i> người giao designer</th>
                            <th><i class="fa fa-bullhorn"></i> loại SP</th>
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
                                    <form class="form-inline" action="{{ route('componentDesigner',[$report->id]) }}" method="post">
                                        @csrf
                                         {{-- <input type="hidden" name="_token" value="7dGnLGxMMAmFtuyXszFeLyDNQ3XNu1GxyYOkRDUQ"> --}}
                                          <div class="form-group">
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
                                    <img src="{{asset('/storage/'.$report->ImagePNG)}}" style="border-radius: 5%;width: 150px; height :150px"  >
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
                                <td><span class="label label-warning label-mini"><a target="_blank" style="color:white" href="{{route('accept',[$report->id])}}">chưa nhận</a></span></td>
                                @elseif ( $report->status == 2)
                                <td><span class="label label-info label-mini">đã nhận</span></td>
                                @elseif ( $report->status == 3)
                                <td><span class="label label-info label-mini">chờ duyệt</span></td>
                                @elseif ( $report->status == 4)
                                <td><span class="label label-warning label-mini"><a target="_blank" style="color:white" href="{{route('accept',[$report->id])}}">Làm lại</a></span></td>
                                @else
                                <td><span class="label label-success label-mini">hoàn thành</span></td>
                                @endif

                                <td>
                                    <span class="btn btn-primary btn-xs">
                                        <a class=" w-75 " style="color:white; border-radius: 3%;" href="{{ route('Detail',[$report->id]) }}"><i class="fa fa-pencil"></i></a>
                                      </a>
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
    </section>
</section>

@endsection

@push('scripts') --}}
 <script>
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
