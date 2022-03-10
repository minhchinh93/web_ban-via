@extends('client.app')


@section ('content')

<section id="main-content">
    <section class="wrapper">
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                  <h4 class="mb"><i class="fa fa-angle-right"></i> tao loai sp</h4>
                    <form class="form-inline"action="{{ route('postTypeProduct') }}" method="post" >
                        @csrf
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">ten loai sp</label>
                        <input type="text" class="form-control" id="exampleInputEmail2" name="name" placeholder="ten loai sp">
                        <label class="sr-only" for="exampleInputEmail3">Size cách nhau |(Không size)</label>
                        <input type="text" class="form-control" id="exampleInputEmail3" name="size" placeholder="Size cách nhau '|'">
                    </div>
                    <button type="submit" class="btn btn-theme">tao</button>
                </form>
                </div><!-- /form-panel -->
            </div><!-- /col-lg-12 -->
        </div>
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                  <h4 class="mb"><i class="fa fa-angle-right"></i> nen tang</h4>
                    <form class="form-inline"action="{{ route('cornerstone') }}" method="post" >
                        @csrf
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">ten loai nen tang</label>
                        <input type="text" class="form-control" id="exampleInputEmail2" name="name" placeholder="ten loai sp">
                        {{-- <label class="sr-only" for="exampleInputEmail3">Size cách nhau |(Không size)</label> --}}
                        {{-- <input type="text" class="form-control" id="exampleInputEmail3" name="size" placeholder="Size cách nhau '|'"> --}}
                    </div>
                    <button type="submit" class="btn btn-theme">tao</button>
                </form>
                </div><!-- /form-panel -->
            </div><!-- /col-lg-12 -->
        </div>
        <div class="row mt">
            <div class="col-lg-6">
                <div class="form-panel">
                  <h4 class="mb"><i class="fa fa-angle-right"></i> add cornerstone</h4>
                  <form class="form-inline" action="{{ route('cornerstoneadd') }}" method="post">
                    @csrf
                    <select name="users" id="cars" style="border-radius: 15px;" class="form-control">
                    @foreach ($users as $show)
                        <option value="{{ $show->id }}">{{  $show->name }}</option>
                    @endforeach
                    </select>
                    <select name="cornerstone" id="cars" style="border-radius: 15px;" class="form-control">
                    @foreach ($shows as $showss)
                        <option value="{{ $showss->id }}">{{  $showss->name }}</option>
                    @endforeach
                </select>
                <button type="submit" style="border-radius: 10px;" class="btn btn-theme"><i class="fa-solid fa-paper-plane"></i></button>
            </form>
                </div><!-- /form-panel -->
            </div><!-- /col-lg-12 -->
            <div class="col-lg-6">
                <div class="form-panel">
                  <h4 class="mb"><i class="fa fa-angle-right"></i> xoa cornerstone</h4>
                  <form class="form-inline" action="{{ route('cornerstonedele') }}" method="post">
                    @csrf
                    <select name="users" id="cars" style="border-radius: 15px;" class="form-control">
                    @foreach ($users as $show)
                        <option value="{{ $show->id }}">{{  $show->name }}</option>
                    @endforeach
                    </select>
                    <select name="cornerstone" id="cars" style="border-radius: 15px;" class="form-control">
                    @foreach ($shows as $showss)
                        <option value="{{ $showss->id }}">{{  $showss->name }}</option>
                    @endforeach
                </select>
                <button type="submit" style="border-radius: 10px;" class="btn btn-theme"><i class="fa-solid fa-paper-plane"></i></button>
            </form>
                </div><!-- /form-panel -->
            </div><!-- /col-lg-12 -->
        </div>
    </section>
</section>

@endsection


