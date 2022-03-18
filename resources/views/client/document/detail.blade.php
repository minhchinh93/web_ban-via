@extends('client.app')


@section ('content')

<section id="main-content" oncontextmenu="return false;">
    <section class="wrapper" style=" background: rgba(236, 240, 240, 0.644);color:black; font-family:Roboto,sans-serif;background-image: url('https://msmobile.com.vn/upload_images/images/hinh-nen-powerpoint-mau-den-8.jpg');background-size: cover;">
        <div class="row mt">
        <div class="col-lg-2 col-md-2 col-sm-2 mb" ></div>
        <div class="col-lg-8 col-md-8 col-sm-8 mb">
            @if($show->video)
            <video width="100%" controls controlsList="nodownload">
                <source id="id" src="{{asset('/storage/'.$show->video) ?? null}}" type="video/mp4">
              Your browser does not support the video tag.
          </video>
          @else
          @endif
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 mb"></div>
    </div>
    @if($show->file)
    <div oncontextmenu="return false" class="row mt" style="margin:auto;" >
        <div class="card" style="width: 99%;height: 80vh">
            <div class="row mt" style="margin:auto;height: 80vh">
                <div class="card" style="width: 99%;height: 80vh" >
                    <iframe    id="viewer" src="{{asset('/storage/'.$show->file) ?? null}}#toolbar=0&navpanes=0&scrollbar=0" width="100%;" height="100%"></iframe>
                  </div>
            </div>
          </div>
    </div>
    @else
    <div></div>
    @endif
    @if($show->description)
    <div class="row mt" style="margin:auto;height: 100%">
        <div class="card" style="width: 99%;height: 100%;margin:auto">
            <div class="card-body"style="width: 96%;margin:auto">
              <h2 class="card-title">{{ $show->title }}</h2>
              <p class="card-text bg-light" style="transform: rotate(0);">
                {!! $show->description !!}
             </p>
            </div>
          </div>

    </div>
    @else
    <div></div>
    @endif
    </section><!-- --/wrapper ---->
</section>

@endsection
@push('scripts')
<script type="text/javascript" src="https://cloudpdf.io/viewer.min.js"></script>
<script>
document.addEventListener('contextmenu', event => event.preventDefault());
</script>
@endpush
