<div id="carouselBlk">
    <div id="myCarousel" class="carousel slide">
        <div class="carousel-inner">
            <?php $link=$links[0];
            unset($links[0]);
            ?>

            <div class="item active">
          <div class="container">
            <a href="{{$link->link}}"><img style="width:100%" src="{{asset('img').'/'.$link->image}}" alt="special offers"></a>
            <div class="carousel-caption">
                  <h4>{{$link->title}}</h4>
                  
                </div>
          </div>
          </div>
            @foreach($links as $link)
          <div class="item ">
          <div class="container">
            <a href="{{$link->link}}"><img style="width:100%" src="{{asset('img').'/'.$link->image}}" alt="special offers"></a>
            <div class="carousel-caption">
                  <h4>{{$link->title}}</h4>
                  
                </div>
          </div>
          </div>
          @endforeach
      
     
       
      
     
        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
      </div> 
</div>