 <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="/{{ Auth::user()->profile_img }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="/{{ Auth::user()->profile_img }}" class="img-circle" alt="User Image">

                <p>
                  {{ Auth::user()->name }}
                  <small>{{ Auth::user()->email }}</small>
                  <small >
                    @if(Auth::user()->type=="admin")
                      <span class="label label-danger">{{ Auth::user()->type }}</span>
                    @endif
                    @if(Auth::user()->type=="manager")
                      <span class="label label-warning">{{ Auth::user()->type }}</span>
                    @endif
                    @if(Auth::user()->type=="collaborator")
                      <span class="label label-success">{{ Auth::user()->type }}</span>
                    @endif

                    
                    </small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-default btn-flat" type="submit">Salir</button>
                  </form>
                </div>
              </li>
           </ul>
</li>