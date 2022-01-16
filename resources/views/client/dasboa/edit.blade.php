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
                        <label class="col-sm-2 col-sm-2 control-label">Tiêu Đề</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" class="form-control" value="{{$show->title}}">
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
                    <label class="col-sm-2 col-sm-2 control-label">chon designer</label>
                    <select class="col-lg-4 form-control " id="cars" name="User_id">
                        <option value="{{$show->user->id}}">{{ $show->user->name }}</option>
                        @foreach ($designers as $designer)
                        <option value="{{ $designer->id }}">{{  $designer->name }}</option>
                        @endforeach
                      </select> <br>
                    <label class="col-sm-2 col-sm-2 control-label">chon loai Sp</label>
                        <select class="col-lg-4 form-control " name="type_id">
                            <option value="{{$show->type_product->id}}">{{ $show->type_product->name }}</option>
                            @foreach ($type_products as $type_product)
                            <option value="{{$type_product->id}}">{{  $type_product->name }}</option>
                            @endforeach
                          </select> <br>
                         <label class="col-sm-2 col-sm-2 control-label">chon size</label>
                         <select class="col-lg-4 form-control " id="cars" name="size">
                            <option value="{{$show->size->id}}">{{ $show->size->name }}</option>
                            @foreach ($sizes as $size)
                            <option value="{{ $size->id }}">{{  $size->name }}</option>
                            @endforeach
                          </select><br><br>
                      <!-- /form-panel -->

                      <hr>
                      <button type="submit" class="btn btn-success"> Sửa giao việc</button>
                </form>
            </div>
            </div>

</section>
</section>

@endsection
