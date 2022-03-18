@extends('client.app')


@section ('content')

<section id="main-content">
    <section class="wrapper" style=" background: rgba(236, 240, 240, 0.644);color:black; font-family:Roboto,sans-serif;background-image: url('https://msmobile.com.vn/upload_images/images/hinh-nen-powerpoint-mau-den-8.jpg');background-size: cover;">

      <div class="row mt">
        @foreach($shows as $show)
        <div class="col-lg-4 col-md-4 col-sm-4 mb">
            <div class="content-panel pn">
                <div id="profile-01">
                    <h3>{{ $show->title ?? null}}</h3>
                    <h6>DOCUMENT BY SYTEM mR.hAI</h6>
                </div>
                <div class="profile-01 centered">
                   <a href= "{{ route('detailDoc',[$show->id]) ?? null}}"> <p>CLICK ĐỂ XEM CHI TIẾT</p></a>
                </div>
                <div class="centered">
                    <h6><i class="fa fa-envelope"></i><br>{{ route('detailDoc',[$show->id]) ?? null}}</h6>
                </div>
            </div><!-- --/content-panel ---->
        </div>
        @endforeach


    </div>

<div class="row mt">
<div style="text-align: center">
    <a href="{{ route('addlDoc') }}">
    <button type="button" class="btn btn-theme03"><i class="fa fa-heart"></i> Add Document</button>
    </a>
</div>
</div>
    </section><!-- --/wrapper ---->
</section>

@endsection
