@if( !(Auth::user()->type=="admin"))
  @if( Auth::user()->type=="manager" )
    <div class="row">
        <div class="col-md-6">
          <a href="{{ route('project.create') }}" class="btn btn-block btn-social btn-google">
                    <i class="fa fa-plus"></i> Agregrar nuevo
          </a>
        </div>
    </div>
    <br>
  @endif
  
<div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Proyectos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              @foreach($boards as $board)
                        <div class="col-md-4">
                              <div class="small-box bg-blue">
                                      <div class="inner">
                                        <h3 id="CantAvion">50%</h3>

                                          <p><strong>{{ $board['name'] }}</strong></p>
                                          <span class="label label-success"> 
                                            <a  style="color: white;" href="{{ route('project.members',$board['id']) }}">
                                              <i class="fa fa-users" aria-hidden="true"></i>
                                            {{ count($board['members']) }}  miembros
                                            </a>
                                          </span>
                                           <span class="label label-warning"> <i class="fa fa-tasks" aria-hidden="true"></i>
                                            {{ $board['lists'] }} springs
                                          </span>
                                           <span class="label label-danger"> <i class="fa fa-github" aria-hidden="true"></i>
                                            120 commits
                                          </span>

                                      </div>
                                      <div class="icon">
                                        <i class="fa fa-code" aria-hidden="true"></i>
                                      </div>
                                      <a class="small-box-footer" data-toggle="modal" href="{{ route('project.details',$board['id']) }}">Detalles 
                                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                      </a>
                              </div>
                      </div>                
              @endforeach
          </div>
</div>
@endif

@if(Auth::user()->type=="collaborator")
  
@endif
