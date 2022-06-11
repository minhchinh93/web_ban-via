@extends('admin.app')


@section ('content')
<section id="main-content">
    <section class="wrapper" style="color:black; font-family:Roboto,sans-serif; background-image: url('https://allimages.sgp1.digitaloceanspaces.com/wikilaptopcom/2021/01/Background-tim-cuc-dep.png');background-size: cover;" >

    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> tìm kiếm</h4>
              <h4 class="mb" ><a href={{ route('getIdStore') }}> get ID_Store</a></h4>
            <form class="form-inline" role="form">
                <div class="form-group">
                    <label class="sr-only" for="exampleInputEmail2">Store ID</label>
                    <input  name="Store_ID" class="form-control" id="Store ID" value="{{ $id }}" placeholder="Store ID">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="exampleInputPassword2">thời gian đầu</label>
                    <input type="time1" name="time1" class="form-control" id="exampleInputPassword2" placeholder="time1">
                    <label class="sr-only" for="exampleInputPassword2">thời gian cuối</label>
                    <input type="time2"  name= "time2" class="form-control" id="exampleInputPassword2" placeholder="time2">
                </div>
                <button type="submit" class="btn btn-theme">Search</button>
            </form>
            </div><!-- /form-panel -->
        </div><!-- /col-lg-12 -->
    </div>
    <div class="row mt">
        <div class="col-lg-12">
                <div class="content-panel">
                    <h4><i class="fa fa-angle-right"></i> Iteam: {{ $total ?? 0}}</h4>
                    <section id="no-more-tables">
                        <table class="table table-bordered table-striped table-condensed cf">
                            <thead class="cf">
                            <tr>
                                <th>stt</th>
                                <th>names</th>
                                <th class="numeric">order_froms</th>
                                <th class="numeric">stores </th>
                                <th class="numeric">order_status</th>
                                <th class="numeric">fulfill_status</th>
                                <th class="numeric">total_prices</th>
                                <th class="numeric">shipping_prices </th>
                                <th class="numeric">sw_prices </th>
                                <th class="numeric">discount_prices</th>
                            </tr>
                           {{-- {{  dump(request()->all()) }} --}}
                            </thead>
                            <tbody>
                                @php
                                    $i=1
                                @endphp
                                 @if($datas != null)
                                @foreach ($datas as $data)
                                <tr>
                                    <td data-title="Code">{{ $i++ ?? null}}</td>
                                    <td data-title="Code">{{ $data['name'] ?? null}}</td>
                                    <td data-title="Code">{{ $data['order_from'] ?? null}}</td>
                                    <td data-title="Code">{{ $data['store']['name'] ?? null}}</td>
                                    <td data-title="Code">{{ $data['order_status'] ?? null}}</td>
                                     @if(count($data['order_supplier']) ?? null)
                                   <td data-title="Code">{{ $data['order_supplier'][0]['fulfill_status'] ?? null}}</td>
                                   <td data-title="Code">{{ $data['order_supplier'][0]['total_price'] ?? null}}$</td>
                                   <td data-title="Code">{{ $data['order_supplier'][0]['shipping_price'] }}$</td>
                                   <td data-title="Code">{{ $data['order_supplier'][0]['total_price'] - $data['order_supplier'][0]['shipping_price'] ?? null}}$</td>
                                   <td data-title="Code">{{ $data['order_supplier'][0]['discount_price'] ?? null}}$</td>
                                   @else
                                   <td data-title="Code">MissingSupplier</td>
                                   <td data-title="Code">0</td>
                                   <td data-title="Code">0</td>
                                   <td data-title="Code">0</td>
                                   <td data-title="Code">0</td>
                                   @endif

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
