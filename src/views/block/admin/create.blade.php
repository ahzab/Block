@extends('Admin::views.create')

@section('heading')
<h1>
    {{ Lang::get('block::block.name') }}
    <small> {{ Lang::get('app.manage') }} {{ Lang::get('block::block.names') }}</small>
</h1>
@stop

@section('title')
{{Lang::get('app.new')}} {{Lang::get('block::block.name')}}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{{ URL::to('admin') }}"><i class="fa fa-dashboard"></i> {{  Lang::get('app.home') }}</a></li>
    <li><a href="{{ URL::to('admin/block/block') }}">{{ Lang::get('block::block.names') }}</a></li>
    <li class="active">{{ Lang::get('app.new') }} {{ Lang::get('block::block.name') }}</li>
</ol>
@stop

@section('buttons')
<a class="btn btn-info pull-right   btn-xs" href="{{ URL::to('admin/block/block') }}"><i class="fa fa-angle-left"></i> {{  Lang::get('app.back') }}</a>
@stop

@section('content')
    {{Former::vertical_open()
    ->id('block')
    ->method('POST')
    ->files('true')
    ->action(URL::to('admin/block/block'))}}
    <div class="box-body">
          <div class="row">
         
               <div class='col-md-6'>{{ Former::select('category')
               
               -> label('block::block.label.category')
               -> options(config::get('block::block.category'))
               -> placeholder('block::block.placeholder.category')}}
               </div>

               <div class='col-md-6'>{{ Former::text('name')
               -> label('block::block.label.name')
               -> placeholder('block::block.placeholder.name')}}
               </div>

               <div class='col-md-6'>{{ Former::text('heading')
               -> label('block::block.label.heading')
               -> placeholder('block::block.placeholder.heading')}}
               </div>

                 <div class='col-md-6'>{{ Former::text('icon')
               -> label('block::block.label.icon')
               -> placeholder('block::block.placeholder.icon')}}
               </div>

               <div class='col-md-12'>{{ Former::textarea ('content')
               -> label('block::block.label.content')
               -> addClass('html-editor')
               -> placeholder('block::block.placeholder.content')}}
               </div>


               <div class='col-md-6'>{{ Former::hidden('status')
               -> forceValue('0')}}
               {{ Former::checkbox('status')
               -> label('block::block.label.status')
               -> addClass('js-switch')}}
               </div>
               
        </div>
    </div>
    <div class="box-footer">
        <div class="row">
            <div class="col-md-12">
                {{ Former::hidden('created_by',$user_id) }}
                {{Former::actions()
                ->large_primary_submit(Lang::get('app.save'))
                ->large_default_reset(Lang::get('app.reset'))}}
            </div>

        </div>
    </div>

    {{ Former::close() }}
@stop

@section('script')


@stop



