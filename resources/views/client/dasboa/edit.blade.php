@extends('client.app')


@section ('content')

<section id="main-content">
    <section class="wrapper">


        <div class="col-lg-12">
            <div class="form-panel">
                  <h4 class="mb"><i class="fa fa-angle-right"></i>    Giao Việc</h4>
                <form class="form-horizontal style-form"action="{{ route('Edit',[$show->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">mo ta</label>
                        <div class="col-sm-10">
                            <input type="text" name="description" class="form-control" value="{{$show->description}}">
                        </div>
                    </div>
                    {{-- <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Hình Ảnh Kèm Theo</label>
                        <div class="col-sm-10">
                            <input name="image[]"  type="file" multiple >
                            <img src="{{asset('/storage/'.$show->image)}}" alt="Italian Trulli" width= 200px>
                            <span class="help-block">phai chon lai anh</span>
                        </div>
                    </div> --}}
                    <div class="form-panel">
                        <select class="col-lg-4 form-control " name="type_id">
                            <option value="{{$show->type_product->id}}">{{ $show->type_product->name }}</option>
                            @foreach ($type_products as $type_product)
                            <option value="{{$type_product->id}}">{{  $type_product->name }}</option>
                            @endforeach
                          </select> <br><br><br>

                       <select class="col-lg-4 form-control " id="cars" name="User_id">
                           <option value="{{$show->user->id}}">{{ $show->user->name }}</option>
                           @foreach ($designers as $designer)
                           <option value="{{ $designer->id }}">{{  $designer->name }}</option>
                           @endforeach
                         </select> <br><br><br>
                       </div><!-- /form-panel -->

                      <hr>
                      <button type="submit" class="btn btn-success"> Sửa giao việc</button>
                </form>
            </div>
            </div>

</section>
</section>

@endsection
