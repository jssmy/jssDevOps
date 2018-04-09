<div class="col-md-12">
  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Datos de usuario</h3>
            </div>
            <div class="box-body">
                  <form  method="post" action="{{ route('user.store') }}">
                      @csrf
                       <div class="row">
                          <div class="col-md-8">
                                <a class="btn btn-block btn-social btn-jssdevops">
                                <i></i> jssDevOps
                                </a>
                                <br>
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                  </span>
                                  <input name="name" class="form-control" placeholder="Nombres y apellidos" type="text">
                                </div>
                                <br>
                                <div class="input-group">
                                  <input name="email" class="form-control" placeholder="email" type="text">
                                  <span class="input-group-addon">@jssdevops.com</span>
                                </div>
                          </div>
                          <div class="col-md-4">
                            <a class="btn btn-block btn-social btn-jssdevops">
                                      <i class="fa fa-user"></i>   Nivel de usuario
                                  </a>
                                  <br>
                                @if(Auth::user()->type=="admin")
                                  <div class="input-group">
                                      <span class="input-group-addon">
                                        <input id="type-user" checked="true" value="manager" name="type-user" type="radio">
                                      </span>
                                  <input  readonly="true" value="Administrador" class="form-control" type="text">
                                </div>
                                <br>
                                @endif
                                @if(Auth::user()->type=="manager")
                                  <div class="input-group">
                                        <span class="input-group-addon">
                                          <input checked="true" value="collaborator" name="type-user" type="radio">
                                        </span>
                                    <input  readonly="true" value="Colaborador" class="form-control" type="text">
                                  </div>
                            
                          @endif
                          </div>
                       </div>
                      <br>
                      <div  class="row">
                          <div class="col-md-4">
                              <a class="btn btn-block btn-social btn-trello">
                                <i class="fa  fa-trello"></i> Trello
                              </a>
                              <br>
                              <div class="input-group">
                                <span class="input-group-addon">Email</span>
                                <input name="trello-email" placeholder="example@domain.com" class="form-control" type="text">
                              </div>
                              <br>
                              @if(Auth::user()->type=="admin")
                                 <div class="jss-input input-group">
                                    <span class="input-group-addon">Key</span>
                                    <input name="trello-key" class="form-control" type="text">
                                  </div>
                                  <br>
                                  <div class="jss-input input-group">
                                    <span class="input-group-addon">Token</span>
                                    <input name="trello-token" class="form-control" type="text">
                                  </div>
                                  <br>
                              @endif
                          </div>
                          <div class="col-md-4">
                              <a class="btn btn-block btn-social btn-slack">
                                <i class="fa  fa-slack"></i> Slack
                              </a>
                              <br>
                              <div class="input-group">
                                <span class="input-group-addon">Email</span>
                                <input name="slack-email" placeholder="example@domain.com" class="form-control" type="text">
                              </div>

                              <br>
                              @if(Auth::user()->type=="admin")
                                <div class="jss-input input-group">
                                  <span class="input-group-addon">Key</span>
                                  <input name="slack-key" class="form-control" type="text">
                                </div>
                                <br>
                                <div class="jss-input input-group">
                                  <span class="input-group-addon">Token</span>
                                  <input name="slack-token" class="form-control" type="text">
                                </div>
                                <br>
                              @endif
                          </div>

                          <div class="col-md-4">
                              <a class="btn btn-block btn-social btn-github">
                                <i class="fa  fa-github"></i> Github
                              </a>
                              <br>
                              <div class="input-group">
                                <span class=" input-group-addon">Email</span>
                                <input name="github-email" placeholder="example@domain.com" class="form-control" type="text">
                              </div>
                              <br>
                              @if(Auth::user()->type=="admin")
                                  <div class="jss-input input-group">
                                    <span class=" input-group-addon">Key</span>
                                    <input name="github-key" class="form-control" type="text">
                                  </div>
                                  <br>
                                  <div class="jss-input input-group">
                                    <span class="input-group-addon">Token</span>
                                    <input name="github-token" class="form-control" type="text">
                                  </div>
                                  <br>
                              @endif
                          </div>
                      </div>
                      <button type="submit" class="btn btn-block btn-success">Agregar</button>
                  </form>
            </div>
            <!-- /.box-body -->
  </div>
</div>

