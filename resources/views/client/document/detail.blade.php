@extends('client.app')


@section ('content')

<section id="main-content">
    <section class="wrapper" style=" background: rgba(236, 240, 240, 0.644);color:black; font-family:Roboto,sans-serif;background-image: url('https://msmobile.com.vn/upload_images/images/hinh-nen-powerpoint-mau-den-8.jpg');background-size: cover;">
        <div class="row mt">
        <div class="col-lg-2 col-md-2 col-sm-2 mb" ></div>
        <div class="col-lg-8 col-md-8 col-sm-8 mb">
            <video width="100%" controls>
                <source src="{{asset('/storage/'.$show->video) ?? null}}" type="video/mp4">
              Your browser does not support the video tag.
          </video>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 mb"></div>
    </div>
    <div class="row mt" style="margin:auto;">
        <div class="card" style="width: 99%;height: 80vh">
            <div class="row mt" style="margin:auto;height: 80vh">
                <div class="card" style="width: 99%;height: 80vh">
                    <embed src="{{asset('/storage/'.$show->file) ?? null}}" width="100%;" height="100%">
                  </div>
            </div>
          </div>

    </div>
    <div class="row mt" style="margin:auto;">
        <div class="card" style="width: 99%;">
            <div class="card-body">
              <h2 class="card-title">{{ $show->title }}</h2>
              <p class="card-text bg-light" style="transform: rotate(0);">
                {!! $show->description !!}
             </p>
            </div>
          </div>

    </div>
    </section><!-- --/wrapper ---->
</section>

@endsection
