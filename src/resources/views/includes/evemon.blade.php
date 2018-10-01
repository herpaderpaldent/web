<div class="col-md-4">
  <div class="box box-widget">
    <div class="box-header with-border">
      <div class="user-block">
        {{--<img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Image">--}}
        {!! img('character', $user->character->character_id, 128, ['class' => 'img-circle']) !!}
        <span class="username"><a href="{{route('character.view.sheet', ['character_id' => $user->character->character_id])}}"> {{$user->character->name}}</a></span>
        <span class="description"><span rel="id-to-name">{{$user->character->corporation_id}}</span></span>
      </div>
      <!-- /.user-block -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <!-- post text -->
      <h4 class="text">{{number($user->character->balance->balance)}} ISK</h4>
      <p class="text">{{number($user->character->skillpoints->total_sp)}} SP</p>

      <dl>
        <dt>{{ trans('web::seat.curr_training') }}</dt>
        <dd>
          @if($user->character->skillqueue->where('finish_date', '>', carbon())->count() > 0)
            {{$user->character->skillqueue->where('finish_date', '>', carbon())->first()->type->typeName}}  to level
            <b>{{$user->character->skillqueue->where('finish_date', '>', carbon())->first()->finished_level}}</b>
          @else
            {{ trans('web::seat.no_skill_training') }}
          @endif
        </dd>

        <dt>{{ trans('web::seat.skill_training_end') }}</dt>
        <dd>
          @if($user->character->skillqueue->where('finish_date', '>', carbon())->count() > 0)
            {{human_diff(carbon($user->character->skillqueue->where('finish_date', '>', carbon())->sortBy('finish_date')->first()->finish_date)) }}  to level
            on {{carbon($user->character->skillqueue->where('finish_date', '>', carbon())->sortBy('finish_date')->first()->finish_date)->toDateString()}}
            at {{carbon($user->character->skillqueue->where('finish_date', '>', carbon())->sortBy('finish_date')->first()->finish_date)->toTimeString()}}
          @else
            {{ trans('web::seat.no_skill_training') }}
          @endif
        </dd>
        <dt>Skill Queue End</dt>
        <dd>
          @if($user->character->skillqueue->where('finish_date', '>', carbon())->count() > 0)
            {{human_diff(carbon($user->character->skillqueue->where('finish_date', '>', carbon())->sortBy('finish_date')->last()->finish_date)) }}  to level
            on {{carbon($user->character->skillqueue->where('finish_date', '>', carbon())->sortBy('finish_date')->last()->finish_date)->toDateString()}}
            at {{carbon($user->character->skillqueue->where('finish_date', '>', carbon())->sortBy('finish_date')->last()->finish_date)->toTimeString()}}
          @else
            {{ trans('web::seat.no_skill_training') }}
          @endif
        </dd>
      </dl>

    </div>
    <!-- /.box-body -->
  </div>

  <!-- Widget: user widget style 1 -->
  <div class="box box-widget widget-user-2">
    <!-- Add the bg color to the header using any of the bg-* classes -->
    <div class="widget-user-header bg-light-blue">
      <div class="widget-user-image">
        {!! img('character', $user->character->character_id, 128, ['class' => 'img-circle eve-icon large-icon']) !!}
      </div>
      <!-- /.widget-user-image -->
      <h3 class="widget-user-username">
        <a href="{{route('character.view.sheet', ['character_id' => $user->character->character_id])}}" style="color:white">
        {{$user->character->name}}
        </a>
      </h3>
      <h5 class="widget-user-desc"><span rel="id-to-name">{{$user->character->corporation_id}}</span></h5>
    </div>
    <div class="box-body">
      <h4 class="text">{{number($user->character->balance->balance)}} ISK</h4>
      <p class="text">{{number($user->character->skillpoints->total_sp)}} SP</p>

      <dl>
        <dt>{{ trans('web::seat.curr_training') }}</dt>
        <dd>
          @if($user->character->skillqueue->where('finish_date', '>', carbon())->count() > 0)
            {{$user->character->skillqueue->where('finish_date', '>', carbon())->first()->type->typeName}}  to level
              <b>{{$user->character->skillqueue->where('finish_date', '>', carbon())->first()->finished_level}}</b>
          @else
            {{ trans('web::seat.no_skill_training') }}
          @endif
        </dd>

        <dt>{{ trans('web::seat.skill_training_end') }}</dt>
        <dd>
          @if($user->character->skillqueue->where('finish_date', '>', carbon())->count() > 0)
            {{human_diff(carbon($user->character->skillqueue->where('finish_date', '>', carbon())->sortBy('finish_date')->first()->finish_date)) }}  to level
            on {{carbon($user->character->skillqueue->where('finish_date', '>', carbon())->sortBy('finish_date')->first()->finish_date)->toDateString()}}
            at {{carbon($user->character->skillqueue->where('finish_date', '>', carbon())->sortBy('finish_date')->first()->finish_date)->toTimeString()}}
          @else
            {{ trans('web::seat.no_skill_training') }}
          @endif
        </dd>
        <dt>Skill Queue End</dt>
        <dd>
          @if($user->character->skillqueue->where('finish_date', '>', carbon())->count() > 0)
            {{human_diff(carbon($user->character->skillqueue->where('finish_date', '>', carbon())->sortBy('finish_date')->last()->finish_date)) }}  to level
              on {{carbon($user->character->skillqueue->where('finish_date', '>', carbon())->sortBy('finish_date')->last()->finish_date)->toDateString()}}
              at {{carbon($user->character->skillqueue->where('finish_date', '>', carbon())->sortBy('finish_date')->last()->finish_date)->toTimeString()}}
          @else
            {{ trans('web::seat.no_skill_training') }}
          @endif
        </dd>
      </dl>

    </div>

  </div>
  <!-- /.widget-user -->
</div>

