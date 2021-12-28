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
