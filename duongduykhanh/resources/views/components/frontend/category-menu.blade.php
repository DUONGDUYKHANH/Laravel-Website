
        <div class="well well-small"><a id="myCart" href="product_summary.html"><img src="themes/images/ico-cart.png" alt="cart">3 Items in your cart  <span class="badge badge-warning pull-right">$155.00</span></a></div>
        <ul id="sideManu" class="nav nav-tabs nav-stacked">
            @foreach($categories1 as $cat1)
            <li class="subMenu open">
                <a>{{$cat1->catName}}</a>
                <ul>
                    @foreach($categories2 as $cat2)
                     @if ($cat2->parentId==$cat1->id)
                <li>
                    <a class="active" href="/category/{{$cat2->slug}}"><i class="icon-chevron-right"></i>

                   
                        {{$cat2->catName}}
                    

                </a>
            </li>
                @endif
                @endforeach
                </ul>
            </li>
            @endforeach
           
        </ul>

        
