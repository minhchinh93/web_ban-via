@extends('admin.app')


@section ('content')
<section id="main-content">
    <section class="wrapper" style="color:black; font-family:Roboto,sans-serif; background-image: url('https://allimages.sgp1.digitaloceanspaces.com/wikilaptopcom/2021/01/Background-tim-cuc-dep.png');background-size: cover;" >

    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> tìm kiếm</h4>
              <h4 class="mb" ><a target="_blank" href={{ route('getIdStore') }}> get ID_Store</a></h4>
            <form class="form-inline" role="form">
                <div class="form-group">
                    <label class="sr-only" for="exampleInputEmail2">Store ID</label>
                    <input  name="Store_ID" class="form-control" id="exampleInputEmail2" placeholder="Store ID">
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
                                   {{--    <td data-title="Code">{{ $data['order_from'] }}</td> --}}
                                    {{-- <td data-title="Code">{{ $data['name'] }}</td> --}}

                                    {{-- <td data-title="Company">AUSTRALIAN AGRICULTURAL COMPANY LIMITED.</td>
                                    <td class="numeric" data-title="Price">$1.38</td>
                                    <td class="numeric" data-title="Change">-0.01</td>
                                    <td class="numeric" data-title="Change %">-0.36%</td>
                                    <td class="numeric" data-title="Open">$1.39</td>
                                    <td class="numeric" data-title="High">$1.39</td>
                                    <td class="numeric" data-title="Low">$1.38</td>
                                    <td class="numeric" data-title="Volume">9,395</td> --}}
                                </tr>
                                @endforeach
                                @endif
                            {{-- <tr>
                                <td data-title="Code">AAD</td>
                                <td data-title="Company">ARDENT LEISURE GROUP</td>
                                <td class="numeric" data-title="Price">$1.15</td>
                                <td class="numeric" data-title="Change">  +0.02</td>
                                <td class="numeric" data-title="Change %">1.32%</td>
                                <td class="numeric" data-title="Open">$1.14</td>
                                <td class="numeric" data-title="High">$1.15</td>
                                <td class="numeric" data-title="Low">$1.13</td>
                                <td class="numeric" data-title="Volume">56,431</td>
                            </tr>
                            <tr>
                                <td data-title="Code">AAX</td>
                                <td data-title="Company">AUSENCO LIMITED</td>
                                <td class="numeric" data-title="Price">$4.00</td>
                                <td class="numeric" data-title="Change">-0.04</td>
                                <td class="numeric" data-title="Change %">-0.99%</td>
                                <td class="numeric" data-title="Open">$4.01</td>
                                <td class="numeric" data-title="High">$4.05</td>
                                <td class="numeric" data-title="Low">$4.00</td>
                                <td class="numeric" data-title="Volume">90,641</td>
                            </tr>
                            <tr>
                                <td data-title="Code">ABC</td>
                                <td data-title="Company">ADELAIDE BRIGHTON LIMITED</td>
                                <td class="numeric" data-title="Price">$3.00</td>
                                <td class="numeric" data-title="Change">  +0.06</td>
                                <td class="numeric" data-title="Change %">2.04%</td>
                                <td class="numeric" data-title="Open">$2.98</td>
                                <td class="numeric" data-title="High">$3.00</td>
                                <td class="numeric" data-title="Low">$2.96</td>
                                <td class="numeric" data-title="Volume">862,518</td>
                            </tr>
                            <tr>
                                <td data-title="Code">ABP</td>
                                <td data-title="Company">ABACUS PROPERTY GROUP</td>
                                <td class="numeric" data-title="Price">$1.91</td>
                                <td class="numeric" data-title="Change">0.00</td>
                                <td class="numeric" data-title="Change %">0.00%</td>
                                <td class="numeric" data-title="Open">$1.92</td>
                                <td class="numeric" data-title="High">$1.93</td>
                                <td class="numeric" data-title="Low">$1.90</td>
                                <td class="numeric" data-title="Volume">595,701</td>
                            </tr>
                            <tr>
                                <td data-title="Code">ABY</td>
                                <td data-title="Company">ADITYA BIRLA MINERALS LIMITED</td>
                                <td class="numeric" data-title="Price">$0.77</td>
                                <td class="numeric" data-title="Change">  +0.02</td>
                                <td class="numeric" data-title="Change %">2.00%</td>
                                <td class="numeric" data-title="Open">$0.76</td>
                                <td class="numeric" data-title="High">$0.77</td>
                                <td class="numeric" data-title="Low">$0.76</td>
                                <td class="numeric" data-title="Volume">54,567</td>
                            </tr>
                            <tr>
                                <td data-title="Code">ACR</td>
                                <td data-title="Company">ACRUX LIMITED</td>
                                <td class="numeric" data-title="Price">$3.71</td>
                                <td class="numeric" data-title="Change">  +0.01</td>
                                <td class="numeric" data-title="Change %">0.14%</td>
                                <td class="numeric" data-title="Open">$3.70</td>
                                <td class="numeric" data-title="High">$3.72</td>
                                <td class="numeric" data-title="Low">$3.68</td>
                                <td class="numeric" data-title="Volume">191,373</td>
                            </tr>
                            <tr>
                                <td data-title="Code">ADU</td>
                                <td data-title="Company">ADAMUS RESOURCES LIMITED</td>
                                <td class="numeric" data-title="Price">$0.72</td>
                                <td class="numeric" data-title="Change">0.00</td>
                                <td class="numeric" data-title="Change %">0.00%</td>
                                <td class="numeric" data-title="Open">$0.73</td>
                                <td class="numeric" data-title="High">$0.74</td>
                                <td class="numeric" data-title="Low">$0.72</td>
                                <td class="numeric" data-title="Volume">8,602,291</td>
                            </tr>
                            <tr>
                                <td data-title="Code">AGG</td>
                                <td data-title="Company">ANGLOGOLD ASHANTI LIMITED</td>
                                <td class="numeric" data-title="Price">$7.81</td>
                                <td class="numeric" data-title="Change">-0.22</td>
                                <td class="numeric" data-title="Change %">-2.74%</td>
                                <td class="numeric" data-title="Open">$7.82</td>
                                <td class="numeric" data-title="High">$7.82</td>
                                <td class="numeric" data-title="Low">$7.81</td>
                                <td class="numeric" data-title="Volume">148</td>
                            </tr>
                            <tr>
                                <td data-title="Code">AGK</td>
                                <td data-title="Company">AGL ENERGY LIMITED</td>
                                <td class="numeric" data-title="Price">$13.82</td>
                                <td class="numeric" data-title="Change">  +0.02</td>
                                <td class="numeric" data-title="Change %">0.14%</td>
                                <td class="numeric" data-title="Open">$13.83</td>
                                <td class="numeric" data-title="High">$13.83</td>
                                <td class="numeric" data-title="Low">$13.67</td>
                                <td class="numeric" data-title="Volume">846,403</td>
                            </tr>
                            <tr>
                                <td data-title="Code">AGO</td>
                                <td data-title="Company">ATLAS IRON LIMITED</td>
                                <td class="numeric" data-title="Price">$3.17</td>
                                <td class="numeric" data-title="Change">-0.02</td>
                                <td class="numeric" data-title="Change %">-0.47%</td>
                                <td class="numeric" data-title="Open">$3.11</td>
                                <td class="numeric" data-title="High">$3.22</td>
                                <td class="numeric" data-title="Low">$3.10</td>
                                <td class="numeric" data-title="Volume">5,416,303</td>
                            </tr> --}}
                            </tbody>
                        </table>
                    </section>
                </div><!-- /content-panel -->
            </div><!-- /col-lg-12 -->
        </div>


</section>
</section>
@endsection
