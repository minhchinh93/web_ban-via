@extends('client.app')
@section ('content')
<section id="main-content">
    <section class="wrapper">

        <div class="row mt">
            <div class="col-md-12">
                <div class="content-panel">
                    <h4><i class="fa fa-angle-right"></i> Advanced Table</h4><hr><table class="table table-striped table-advance table-hover">


                        <thead>
                        <tr>
                            <th><input type="checkbox"  name="checkbox" ></th>
                            <th><i class="fa fa-bullhorn"></i> ID</th>
                            <th><i class="fa fa-bullhorn"></i> PASS</th>
                            <th><i class="fa fa-bullhorn"></i> Email</th>
                            <th class="hidden-phone"><i class="fa fa-question-circle"></i> PassMail</th>
                            <th><i class="fa fa-bookmark"></i> 2FA</th>
                            <th><i class="fa fa-bookmark"></i> Cookie</th>
                            <th><i class="fa fa-bookmark"></i> Token</th>
                            <th><i class="fa fa-bookmark"></i> loại via</th>
                            <th><i class="fa fa-bookmark"></i> Status</th>
                            <th><i class=" fa fa-edit"></i> check</th>
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
                            <td class="hidden-phone">via việt cổ </td>
                            <td><span class="label label-info label-mini">live</span></td>
                            <td>
                                <button class="btn btn-success btn-xs">check</button>
                                {{-- <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button> --}}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div><!-- /content-panel -->
            </div><!-- /col-md-12 -->
        </div>
  </section><!-- --/wrapper ---->
</section>

@endsection
