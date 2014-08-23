@extends('Admin::views.show')

@section('heading')
<h1>
    {{ Lang::get('block::block.name') }}
    <small> {{ Lang::get('app.manage') }} {{ Lang::get('block::block.names') }}</small>
</h1>
@stop

@section('title')
{{$block['name']}} {{Lang::get('block::block.name')}}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{{ URL::to('admin') }}"><i class="fa fa-dashboard"></i> {{ Lang::get('app.home') }}</a></li>
    <li><a href="{{ URL::to('admin/block/block') }}">{{ Lang::get('block::block.names') }}</a></li>
    <li class="active">{{ $block['name'] }}</li>
</ol>
@stop

@section('buttons')
<a class="btn btn-info  btn-xs" href="{{ URL::to('admin/block/block') }}" ><i class="fa fa-angle-left"></i> {{ Lang::get('app.back') }}</a>
<a class="btn btn-info  btn-xs {{ ($permissions['edit']) ? '' : 'disabled' }}" href="{{ URL::to('admin/block/block') . '/' . $block['id'] . '/edit'}}">
    <i class="fa fa-pencil-square-o"></i> {{ Lang::get('app.edit') }}
</a>
@stop

@section('content')
                <div class="row">

                              <div class="col-md-6 ">
                                 <div class="form-group">
                                      <label for="category">{{ Lang::get('block::block.label.category') }}</label><br />
                                      {{ $block['category'] }}
                                 </div>
                              </div>

                              <div class="col-md-6 ">
                                 <div class="form-group">
                                      <label for="name">{{ Lang::get('block::block.label.name') }}</label><br />
                                      {{ $block['name'] }}
                                 </div>
                              </div>

                              <div class="col-md-6 ">
                                 <div class="form-group">
                                      <label for="heading">{{ Lang::get('block::block.label.heading') }}</label><br />
                                      {{ $block['heading'] }}
                                 </div>
                              </div>

                              <div class="col-md-6 ">
                                 <div class="form-group">
                                      <label for="icon">{{ Lang::get('block::block.label.icon') }}</label><br />
                                      <i class="{{ $block['icon'] }} fa-4x"></i>
                                 </div>
                              </div>

                              <div class="col-md-6 ">
                                 <div class="form-group">
                                      <label for="content">{{ Lang::get('block::block.label.content') }}</label><br />
                                      {{ $block['content'] }}
                                 </div>
                              </div>

                            

                              <div class="col-md-6 ">
                                 <div class="form-group">
                                      <label for="image">{{ Lang::get('block::block.label.image') }}</label><br />
                                      <img src="{{ URL::to($block->image) }}">
                                 </div>
                              </div>

                              <div class="col-md-6 ">
                                 <div class="form-group">
                                      <label for="status">{{ Lang::get('block::block.label.status') }}</label><br />
                                      {{ $block['status'] }}
                                 </div>
                              </div>
        </div>
@stop

@section('script')

@stop