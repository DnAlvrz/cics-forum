<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
  
      </div>
    </div>
  </div>

  <div class="modal fade" id="login-modal" tabindex="-1" style="padding-top:100px;"role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Log In</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('login')}}" method="post">
            @csrf
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" name="email"id="email" aria-describedby="emailHelp" placeholder="Enter email">
            
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-chcke-input" name="remember" id="remember" >
              <label class="form-check-label" for="remember">Remember me</label>
            </div>
          <div class="modal-footer">
            <button type="submit" style="margin-left:auto; width:20%" class="btn btn-primary">Log in</button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>