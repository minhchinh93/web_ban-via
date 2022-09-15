@extends('admin.app')


@section ('content')
<section id="main-content">
    <section class="wrapper" style="color:black; font-family:Roboto,sans-serif; background-image: url('https://allimages.sgp1.digitaloceanspaces.com/wikilaptopcom/2021/01/Background-tim-cuc-dep.png');background-size: cover;" >

    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> tìm kiếm</h4>
              <h4 class="mb" ><a href={{ route('getIdStore') }}> Trở Lại</a></h4>
            <form class="form-inline" role="form">
                <div class="form-group">
                    <label class="sr-only" for="exampleInputEmail2">Store ID</label>
                    <input  name="Store_ID" class="form-control" id="Store ID" value="{{ $id }}" placeholder="Store ID">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="exampleInputPassword2">thời gian đầu</label>
                    <input type="time1" name="time1" class="form-control" id="exampleInputPassword2" value="{{ request()->time1}}" placeholder="time1">
                    <label class="sr-only" for="exampleInputPassword2">thời gian cuối</label>
                    <input type="time2"  name= "time2" class="form-control" id="exampleInputPassword2" value="{{ request()->time2}}" placeholder="time2">
                </div>
                <button type="submit" class="btn btn-theme">Search</button>
            </form>
            </div><!-- /form-panel -->
        </div><!-- /col-lg-12 -->
    </div>
    <div class="row mt">
        <div class="col-lg-12">
                <div class="content-panel">
                    <div class="row">
                        <div class="col-lg-11">
                            <h4><i class="fa fa-angle-right"></i> <span class="badge bg-primary"> total_Order : {{ $total ?? 0}}</span> | <span class="badge bg-important">total_prices : {{ $total_price ?? null }} $</span> | <span class="badge bg-success">total_shipping_prices : {{ $shipping_price ?? 0  }}  $</span> | <span class="badge bg-inverse">total_sw_prices : {{ $sw_prices ?? 0 }}</span> </h4>
                        </div>

                        <div  class="col-lg-1" >
                            @if(request()->time1)
                                <a href="{{ route('export-users',[$id, request()->time1, request()->time2 ]) ?? null}} "  style="font-size: 40px; color: blue;">
                          @else
                          <a href="#"  style="font-size: 40px; color: rgb(238, 255, 0);">
                          @endif
                                <i class="fa-solid fa-file-arrow-down"></i></a>
                        </div>
                    </div>

                    <section id="no-more-tables">
                        <table class="table table-bordered table-striped table-condensed cf">
                            <thead class="cf">
                            <tr>
                                <th>stt</th>
                                <th>names</th>
                                <th class="numeric">order_froms</th>
                                <th class="numeric">stores </th>
                                <th class="numeric">order_status</th>
                                <th class="numeric">purchase_date</th>
                                <th class="numeric">latest_ship_date</th>
                                <th class="numeric">tracking_status</th>
                                <th class="numeric">tracking_url</th>
                                <th class="numeric">fulfill_status</th>
                                <th class="numeric">method_fulfill</th>
                                <th class="numeric">supplier_name</th>
                            </tr>

                            </thead>
                            <tbody>
                                @php
                                    $i=1
                                @endphp
                                 @if($response != [])
                                @foreach ($response as $data)
                                <tr>
                                    <td data-title="Code">{{ $i++ ?? null}}</td>
                                    <td data-title="Code">{{ $data[0] ?? null}}</td>
                                    <td data-title="Code">{{ $data[1] ?? null}}</td>
                                    <td data-title="Code">{{ $data[2] ?? null}}</td>
                                    <td data-title="Code">{{ $data[3] ?? null}}</td>
                                    <td data-title="Code">{{ $data[4] ?? null}}</td>
                                    <td data-title="Code">{{ $data[5] ?? null}}</td>
                                    @if($data[6] === 'ManifestUpload')
                                        <td>  <span class="label label-warning">chưa ship</span></td>
                                    @elseif($data[6] === 'Delivered')
                                        <td> <span class="label label-success">Delivered</span></td>
                                    @elseif($data[6] === 'InTransit')
                                        <td> <span class="label label label-primary">đang sip</span></td>
                                    @else
                                        <td> <span class="label label-danger">Danger</span></td>

                                    @endif
                                   <td data-title="Code"><a  target="_blank" href="{{ $data[7] ?? null}}">{{ $data[8] ?? null}}</a></td>
                                   <td data-title="Code">{{ $data[9] ?? null}}</td>
                                   <td data-title="Code">{{ $data[10] ?? null}}</td>
                                   <td data-title="Code">{{ $data[11] ?? null}}</td>
                                </tr>
                                @endforeach
                                @endif

                            </tbody>
                        </table>
                    </section>
                </div><!-- /content-panel -->
            </div><!-- /col-lg-12 -->
        </div>


</section>
</section>
@endsection
