@extends('layouts.webmaster_ktx')
@section('content')
<div class="row">
<div class="panel panel-none panel-primary">
  <div class="panel-heading"><h2 class="panel-title"><span class="glyphicon glyphicon-fire"></span> Tin Nổi Bật</h2></div>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">

      <!-- Wrapper for slides -->
      <div class="carousel-inner">

        @foreach($slide as $bv)
        <div class="item @if($bv == $slide[0]) active @endif">
            <img src="{{$bv->AnhDaiDien}}" alt="{{ $bv->TenBaiViet }}" style="width:100%;height: 400px;">
              <div class="carousel-caption">
                <a href="{{url('bai-viet/'.str_slug($bv->MaBaiViet.'-'.$bv->TenBaiViet).'.html')}}"><h4>{{ $bv->TenBaiViet }}</h4></a>
                <p>{{str_limit(strip_tags(html_entity_decode($bv->NoiDungBaiViet)),271)}}</p>
              </div>
        </div>
        @endforeach

      </div><!-- End Carousel Inner -->


    <ul class="list-group col-sm-4" style="padding-right: 0">
      <?php foreach ($slide as $key => $bv) {
        echo '<li data-target="#myCarousel" data-slide-to="'.$key.'" class="list-group-item" style="padding: 0px 10px;background: linear-gradient(to bottom, rgba(255,255,255,1) 0%,rgba(255,255,255,0.3) 100%),url('.$bv->AnhDaiDien.') center;background-size:cover;">
                <h4 style="overflow: hidden;text-overflow: ellipsis;">'.$bv->TenBaiViet.'</h4>
              </li>';
      }?>
    </ul>

    <div class="carousel-controls">
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
      </div>
    </div><!-- End Carousel -->
</div>
        <div class="panel panel-none panel-primary">
        <div class="panel-heading"><h2 class="panel-title"><span class="glyphicon glyphicon-flash"></span> Tin tức mới</h2></div>
        <div class="panel-body">
          <div class="row">
            @foreach($baiviet as $bv)
                <div class="col-md-6 item">
                  <div class="thumbnail">
                      <a href="{{url('bai-viet/'.str_slug($bv->MaBaiViet.'-'.$bv->TenBaiViet).'.html')}}">
                        <!-- <img src="{{$bv->AnhDaiDien}}" alt="{{ $bv->TenBaiViet }}"> -->
                      </a>
                    <div class="">
                      <a href="{{url('bai-viet/'.str_slug($bv->MaBaiViet.'-'.$bv->TenBaiViet).'.html')}}"><h4>{{ $bv->TenBaiViet }}</h4> </a>
                      <p>{{str_limit(strip_tags(html_entity_decode($bv->NoiDungBaiViet)),271)}}</p>

                    </div>
                  </div>
                </div>
            @endforeach
          </div>
          @if($baiviet->links())
            <div class="phantrang">
            {{  $baiviet->links() }}
            </div>
          @endif
        </div>
      </div>
    <div class="panel panel-none panel-default">
      <div class="panel-heading"><h2 class="panel-title"><span class="glyphicon glyphicon-bullhorn"></span> Thông Báo</h2></div>
      <div class="panel-body">
        @foreach($thongbao as $tb)
        <div class="w3-row w3-margin">
          <div class="w3-third">
            <a href="{{url('bai-viet/'.str_slug($tb->MaBaiViet.'-'.$tb->TenBaiViet).'.html')}}">
              <!-- <img src="{{$tb->AnhDaiDien}}" class="w3-round" alt="{{ $tb->TenBaiViet }}" style="width:100%;height:200px"> -->
            </a>
          </div>
          <div class="w3-twothird w3-container">
            <h4><a href="{{url('bai-viet/'.str_slug($tb->MaBaiViet.'-'.$tb->TenBaiViet).'.html')}}">{{$tb->TenBaiViet}}</a></h4>
            <p>
              {{str_limit(strip_tags(html_entity_decode($tb->NoiDungBaiViet)),365)}}
              <hr />
              <a href="{{url('bai-viet/'.str_slug($bv->MaBaiViet.'-'.$bv->TenBaiViet).'.html')}}" class="label label-danger pull-right"> Xem Tiếp .. </a>
            </p>
          </div>
        </div>
        @endforeach
      </div>
      @if($thongbao->links())
        <div class="phantrang">
         {{$thongbao->links()}}
        </div>
      @endif

    </div>
</div>
@endsection
