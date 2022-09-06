

<ul id="topMenu" class="nav pull-right">

    @foreach($links as $link)

     <li class=""><a href="{{$link->link}}">{{$link->title}}</a></li>
    @endforeach

<?php 

if($customerName==''){
?>
     <li class="">
     <a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Login</span></a>
    <div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3>Login Block</h3>
          </div>
          <div class="modal-body">
            <form action="/dologin" method="post">
          @csrf
              <div class="control-group">                               
                <input type="text" id="inputEmail" placeholder="Email" name=email>
              </div>
              <div class="control-group">
                <input type="password" id="inputPassword" placeholder="Password" name=password>
              </div>
              <div class="control-group">
                <label class="checkbox">
                <input type="checkbox"> Remember me
                </label>
              </div>
            <button type="submit" class="btn btn-success">Sign in</button>
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            </form>     

          </div>
    </div>

   
    </li>
    <li>
      <a href="#register" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-info">Register</span></a>
       <div id="register" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="register" aria-hidden="false">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3>Register Block</h3>
          </div>
          <div class="modal-body">
            <form action="{{ route('user.register') }}" method="post">
                @csrf
              <div class="control-group">                               
                <input type="text" id="inputEmail" placeholder="Email" name=email>
              </div>
              <div class="control-group">                               
                <input type="text" id="inputEmail" placeholder="Name" name=name>
              </div>
              <div class="control-group">                               
                <input type="text" id="inputEmail" placeholder="Phone" name=phone>
              </div>
              <div class="control-group">                               
                <input type="text" id="inputEmail" placeholder="Address" name=address>
              </div>
              <div class="control-group">
                <input type="password" id="inputPassword" placeholder="Password" name=password>
              </div>
              <div class="control-group">
                <input type="password" id="inputPassword" placeholder="Re-Password" name=password_confirmation>
              </div>
            <button type="submit" class="btn btn-success">Register</button>
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            </form>     

          </div>
    </div>
    </li>
<?php }
else
{
  ?>
     <li class="">
      {{$customerName}}
     <a href="/logout" role="button"  style="padding-right:0"><span class="btn btn-large btn-success">Logout</span></a>
  </li>
  <?php
}
?>
    </ul>
