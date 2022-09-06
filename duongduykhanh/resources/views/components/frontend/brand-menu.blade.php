<ul id="sideManu1" class="nav nav-tabs nav-stacked">
        <li class="subMenu">
                <a>BRAND</a>
                <ul style="display: none;">

        @foreach($brands as $brand)
                 <li>
                     <a class="active" href="/brand/{{$brand->slug}}">
                        <i class="icon-chevron-right"></i>

                     {{$brand->brandName}}
                 </a>
                 </li>
                @endforeach                                                                                                                              </ul>
            </li>
                       
        </ul>