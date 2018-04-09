 <div class="row">
 	<div class="col-md-12">
 		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Datos del proyecto</h3>
            </div>
            <div class="box-body">
                  <form method="post" action="{{ route('project.store') }}">
                  	@csrf
                     
                          <div class="col-md-8">
                                <div class="text-center">
						                <a class="btn btn-social-icon btn-trello"><i class="fa fa-trello"></i></a>
						                <a class="btn btn-social-icon btn-slack"><i class="fa fa-slack"></i></a>
						                <a class="btn btn-social-icon btn-github"><i class="fa fa-github"></i></a>
						         </div>
                                <br>
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <i class="">#</i>
                                  </span>
                                  <input name="name" class="form-control" placeholder="Nombre del proyecto" type="text">
                                </div>
                          </div>
                       </div>
                      <br>
                      
                      <button type="submit" class="btn btn-block btn-success">Agregar</button>
                  </form>
            </div>
            <!-- /.box-body -->
  </div>
 	</div>
 </div>