@extends('client.app')


@section ('content')

<section id="main-content">
    <section class="wrapper">
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                  <h4 class="mb"><i class="fa fa-angle-right"></i> tao loai sp</h4>
                    <form class="form-inline"action="{{ route('postTypeProduct') }}" method="post" >
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">ten loai sp</label>
                        <input type="text" class="form-control" id="exampleInputEmail2" name="name" placeholder="ten loai sp">
                        <label class="sr-only" for="exampleInputEmail3">Size cách nhau | </label>
                        <input type="text" class="form-control" id="exampleInputEmail3" name="name" placeholder="Size cách nhau '|'">
                    </div>
                    <button type="submit" class="btn btn-theme">tao</button>
                </form>
                </div><!-- /form-panel -->
            </div><!-- /col-lg-12 -->
        </div>
    </section>
</section>

@endsection


