@extends('client.app')


@section ('content')

<section id="main-content">
    <section class="wrapper">
        <div class="row">
                <div class="row mtbox">
                    <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                        <div class="box1">
                            <span class="li_heart"></span>
                            <h3>933</h3>
                        </div>
                            <p>933 People liked your page the last 24hs. Whoohoo!</p>
                    </div>
                    <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                            <span class="li_cloud"></span>
                            <h3>+48</h3>
                        </div>
                            <p>48 New files were added in your cloud storage.</p>
                    </div>
                    <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                            <span class="li_stack"></span>
                            <h3>23</h3>
                        </div>
                            <p>You have 23 unread messages in your inbox.</p>
                    </div>
                    <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                            <span class="li_news"></span>
                            <h3>+10</h3>
                        </div>
                            <p>More than 10 news were added in your reader.</p>
                    </div>
                    <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                            <span class="li_data"></span>
                            <h3>OK!</h3>
                        </div>
                            <p>Your server is working perfectly. Relax & enjoy.</p>
                    </div>

                </div><!-- /row mt -->





              <div class="row mt">
                <div class="col-md-12">
                    <div class="content-panel">
                        <h4><i class="fa fa-angle-right"></i> Advanced Table</h4><hr><table class="table table-striped table-advance table-hover">


                            <thead>
                            <tr>
                                <th><input type="checkbox"  name="checkbox" ></th>
                                <th><i class="fa fa-bullhorn"></i> Loại via</th>
                                <th><i class="fa fa-bullhorn"></i> ngày lập</th>
                                <th class="hidden-phone"><i class="fa fa-question-circle"></i> 2FA</th>
                                <th><i class="fa fa-bookmark"></i> change info</th>
                                <th><i class="fa fa-bookmark"></i> số lượng</th>
                                <th><i class="fa fa-bookmark"></i> đơn giá</th>
                                <th><i class="fa fa-bookmark"></i> tổng tiền</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <form method="post" action="{{ route('postcheckout') }}">
                                    @csrf
                                @foreach ( $carts as $cart )
                                <th><input type="checkbox"  name="checkbox" ></th>
                                <td class="hidden-phone" name="name" value="{{ $cart->id}}">{{ $cart->name }}</td>
                                <td> 2018 </td>
                                <td><a href="basic_table.html#">DSFD|SFDF|DSFD|****</a></td>
                                <td class="hidden-phone">CÓ</td>
                                <td>
                                    <input class="minus is-form" type="button" value="-">
                                    <input aria-label="quantity" class="input-qty " max="10" min="1" name="qty" type="number" value="1" readonly>
                                    <input class="plus is-form" type="button" value="+">
                                </td>
                                <td><input style="font-size:10px" class="label label-info label-mini" id='price' name="price" value="{{ $cart->price }}" >{{ $cart->price }}</input> Ucoi</td>
                                <td><span style="font-size:12px" class="label label-warning label-mini" id='total' name="total"  >{{ $cart->price }}</span> Ucoi</td>
                                <td>
                                    <button class="btn btn-success btn-xs" type="submit"><i class="fa fa-shopping-cart"></i></i></button>
                                </td>
                                @endforeach
                                </form>
                            </tr>
                            </tbody>
                        </table>
                    </div><!-- /content-panel -->
                </div><!-- /col-md-12 -->
            </div><!-- /row -->
            </div><!-- /col-lg-9 END SECTION MIDDLE -->


<!-- **********************************************************************************************************************************************************


            <div class="row mt">
                <div class="col-md-12">
                    <div class="content-panel">
                        <h4><i class="fa fa-angle-right"></i> Advanced Table</h4><hr><table class="table table-striped table-advance table-hover">


                            <thead>
                            <tr>
                                <th><input type="checkbox"  name="checkbox" ></th>
                                <th><i class="fa fa-bullhorn"></i> Loại via</th>
                                <th><i class="fa fa-bullhorn"></i> quốc gia</th>
                                <th><i class="fa fa-bullhorn"></i> ngày lập</th>
                                <th class="hidden-phone"><i class="fa fa-question-circle"></i> 2FA</th>
                                <th><i class="fa fa-bookmark"></i> bạn bè</th>
                                <th><i class="fa fa-bookmark"></i> change info</th>
                                <th><i class="fa fa-bookmark"></i> backup</th>
                                <th><i class="fa fa-bookmark"></i> số lượng</th>
                                <th><i class="fa fa-bookmark"></i> tổng tiền</th>
                                <th><i class=" fa fa-edit"></i> Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th><input type="checkbox"  name="checkbox" ></th>
                                <td class="hidden-phone">Lorem Ipsum dolor</td>
                                <td>12000.00$ </td>
                                <td><a href="basic_table.html#">Company Ltd</a></td>
                                <td class="hidden-phone">Lorem Ipsum dolor</td>
                                <td>12000.00$ </td>
                                <td>12000.00$ </td>
                                <td>12000.00$ </td>
                                <td>
                                    <input class="minus is-form" type="button" value="-">
                                    <input aria-label="quantity" class="input-qty" max="50" min="1" name="" type="number" value="1">
                                    <input class="plus is-form" type="button" value="+">
                                </td>
                                <td><span class="label label-info label-mini">12000.00$</span></td>
                                <td>
                                    <button class="btn btn-success btn-xs"><i class="fa fa-shopping-cart"></i></i></button>
                                    {{-- <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button> --}}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div><!-- /content-panel -->
                </div><!-- /col-md-12 -->
            </div><!-- /row -->


  </section><!-- --/wrapper ---->
</section>
@endsection

@push('scripts')
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


    //]]>
</script>
@endpush
