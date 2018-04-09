@if(!(Auth::user()->type=="collaborator"))
<div class="row">
    <div class="col-md-6">
      <a href="{{ route('user.create') }}" class="btn btn-block btn-social btn-google">
                <i class="fa fa-plus"></i> Agregrar nuevo
      </a>
    </div>
</div>
<br>
@endif


<div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">{{  $users->type }} agregados</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger">{{ $users->cant }} nuevo miembros</span>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    @foreach($users as $user)
                      <li>
                        <img style="
                          max-width: 100px;
                          max-height: 100px;
                          min-height: 40px;
                          min-width: 40px;
                        " src="/{{  $user->profile_img }}" alt="User Image">
                        <a class="users-list-name" href="#">{{ $user->name }}</a>
                        @if($user->type=="admin")
                          <span class="label label-danger">{{ $user->type }}</span>
                        @endif
                        @if($user->type=="manager")
                          <span class="label label-warning">{{ $user->type }}</span>
                        @endif
                        @if($user->type=="collaborator")
                          <span class="label label-success">{{ $user->type }}</span>
                        @endif
                        <span class="users-list-date">{{ $user->email }}</span>
                      </li>
                    @endforeach
                  </ul>
                  <!-- /.users-list -->
                  {!!  $users->render() !!}
                </div>
                <!-- /.box-body -->
                <!-- /.box-footer -->
</div>
              <!--/.box -->
