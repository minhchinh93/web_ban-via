@extends('client.app')


@section ('content')
<section id="main-content">
    <section class="wrapper" style="color:black; font-family:Roboto,sans-serif; background-image: url('https://allimages.sgp1.digitaloceanspaces.com/wikilaptopcom/2021/01/Background-tim-cuc-dep.png');background-size: cover;" >

    <div class="row mt">
        <div class="col-lg-4">
            {{-- <form action="{{ route('find') }}" class="form-inline"role="form" method="GET"> --}}
            <form  class="form-inline"role="form" >
              @csrf
                <select class="form-control "  id="cars" name="type" >
                    <option value=" ">Tìm Kiếm loại</option>
                </select>
                  <button type="submit" class="btn btn-theme "><i class="fa-solid fa-magnifying-glass"></i> </button>
            </form>
        </div>
        <div class="col-lg-4">
            <form class="form-inline" role="form">
                <div class="form-group">
                    <label class="sr-only" for="exampleInputEmail2">tim kiem</label>
                    <input type="text" class="form-control" name="keyword" aria-label=" Search" id="exampleInputEmail2" value="{{ request()->keyword }}" placeholder="tim kiem">
                </div>
                <button type="submit" class="btn btn-theme"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        <div class="col-lg-4">
            @if(Auth::user()->role == 3)
            <a href="{{ route('AadminHome') }}">
                <button type="button" class="btn btn-theme02"><i class="fa fa-check"></i> Back to admin</button>
            </a>
            @endif
        </div>
    </div>
    <div class="row mt">
        @foreach($shows as $show)
        <div class="col-lg-3 col-md-3 col-sm-3 mb" >
            <div class="content-panel pn "  style="display: flex;flex-direction: space-between;border-radius: 10%; ">
                <div class="media"  style="margin-right:20px">
                    <img src="{{asset('/storage/'.$show->ImagePngDetail)}}" alt="..."style="max-width:150px;border-radius: 10px;" class="img-thumbnail">
                </div>
                <div class="media-body">
                    <h5 class="mt-0">Designer: {{ $show->name}}</h5>
                    <h5 class="mt-0">saller: {{ $show->saller ?? NULL}}</h5><hr>
                    <h6>Title: {{ $show->title}}</h6>
                    <h6>solt: {{ $show->Number_Items }} </h6>
                    <h6>Order_Total: ${{     $show->Order_Total }}</h6>
                    <h6>Sale_Date: {{ $show->Sale_Date }}</h6>
                    <h6>Date_Shipped: {{ $show->Date_Shipped}}</h6>
                    {{-- @foreach ($show->id->cornerstones as $cornerstone)
                    <span class="label label-info label-mini">{{ $cornerstone->name}}</span>
                    @endforeach --}}
                </div>
                </div>
            </div><!-- --/panel ---->
        </div>
        @endforeach
    </div>
    {{ $shows->links() }}
</section>
</section>

@endsection


