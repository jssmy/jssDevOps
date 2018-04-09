<div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">
            <!-- timeline time label -->
              @foreach($board['lists'] as $list)
                <li class="time-label">
                        <span class="bg-red">
                          

                          {{ $list->name }}
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa  fa-tasks bg-blue"></i>
                      @foreach($list->cards as $card)
                        <div class="timeline-item">
                      <span class="time">
                        <span class="label label-danger"><i class="fa fa-clock-o"></i> {{$card->due}}</span>
                        
                      </span>

                      <h3 class="timeline-header">
                        
                        <a data-toggle="collapse" data-parent="#accordion" href="#{{ $card->id }}" aria-expanded="false" class="">
                          {{ $card->name }}
                        </a>
                         sent you an email</h3>

                      <div id="{{$card->id}}" class="timeline-body panel-collapse collapse in" aria-expanded="false" style="">
                        {{ $card->desc }}
                        <div class="row">
                          <div class="col-md-12">
                            <a class="btn btn-primary btn-xs">Read more</a>
                          <a class="btn btn-danger btn-xs">Delete</a>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                      @endforeach
                    
                  </li>
              @endforeach
            
            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
          </ul>
</div>

