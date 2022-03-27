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
        <div class="col-lg-3 col-md-3 col-sm-3 mb">
            <div class="content-panel pn "  style="display: flex;flex-direction: space-between;">
                <div class="media"  style="margin-right:20px">
                    <img src="{{asset('/storage/'.$show->ImagePngDetail)}}" alt="..." width="200px" class="img-thumbnail">
                </div>
                <div class="media-body">
                      <h3 class="mt-0">Idea: {{ $show->name}}</h3><hr>
                      <h4>Title: {{ $show->title}}</h4><hr>
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


