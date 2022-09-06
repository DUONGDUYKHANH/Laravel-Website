<h4>{{$catName}} </h4>
              <ul class="thumbnails">
                @foreach($product as $p)
                <li class="span3">
                  <div class="thumbnail">
                    <a href="product_details.html"><img src="{{asset('img/product').'/'.$p->image}}" alt=""></a>
                    <div class="caption">
                      <h5>{{$p->productName}}</h5>

                      <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="/cart_Add/{{$p->slug}}">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">{{$p->price}}</a>
                        <a class="btn btn-danger" href="#">{{$p->salePrice}}</a></h4>
                    </div>
                  </div>
                </li>
                @endforeach
                
              </ul> 