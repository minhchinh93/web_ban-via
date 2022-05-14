@extends('admin.app')


@section ('content')
<section id="main-content">
    <section class="wrapper" style="color:black; font-family:Roboto,sans-serif; background-image: url('https://allimages.sgp1.digitaloceanspaces.com/wikilaptopcom/2021/01/Background-tim-cuc-dep.png');background-size: cover;" >

    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> tìm kiếm</h4>
              {{-- <h4 class="mb"><a href={{ route('getIdStore') }}> get ID_Store</a></h4> --}}
            <form class="form-inline" role="form">

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
                                <th>id_name</th>
                                <th class="numeric">transaction_typeS</th>
                                <th class="numeric">amountS</th>
                                <th class="numeric">Store</th>
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
                                    <td data-title="Code">{{ $data['description'] ?? null}}</td>
                                    <td data-title="Code">{{ $data['transaction_type'] ?? null}}</td>
                                    <td data-title="Code">{{ $data['amount'] ?? null}}</td>
                                    <td data-title="Code">{{  null}}</td>
                                </tr>
                                @endforeach
                                @endif
                         <tr>

                            </tbody>
                        </table>
                    </section>
                </div><!-- /content-panel -->
            </div><!-- /col-lg-12 -->
        </div>


</section>
</section>
@endsection
