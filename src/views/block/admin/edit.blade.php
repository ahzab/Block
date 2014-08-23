@extends('Admin::views.edit')

@section('heading')
<h1>
    {{ Lang::get('block::block.name') }}
    <small> {{ Lang::get('app.manage') }} {{ Lang::get('block::block.names') }}</small>
</h1>
@stop

@section('title')
{{Lang::get('app.edit')}} {{Lang::get('block::block.name')}} {{$block['name']}}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{{ URL::to('admin') }}"><i class="fa fa-dashboard"></i> {{  Lang::get('app.home') }}</a></li>
    <li><a href="{{ URL::to('admin/block/block')}}">{{ Lang::get('block::block.names') }}</a></li>
    <li class="active">{{ $block['name'] }}</li>
</ol>

@stop

@section('buttons')
<a class="btn btn-info pull-right view-btn-back" href="{{ URL::to('admin/block/cblock') }}"><i class="fa fa-angle-left"></i> {{  Lang::get('app.back') }}</a>
@stop


@section('tabs')
<li class="active"><a href="#details" data-toggle="tab">Block</a></li>

@stop

@section('icon')
<i class="fa fa-th"></i>
@stop


@section('content')

{{Former::vertical_open()
->id('block')
->secure()
->method('PUT')
->files('true')
->enctype('multipart/form-data')
->action(URL::to('admin/block/block/'. $block['id']))}}
{{Former::hidden('id')}}
{{ Former::token() }}
<div class="tab-content">
    <div class="tab-pane active" id="details">
        <div class="row">

               <div class='col-md-6'>{{ Former::select('category')
               -> options(config::get('block::block.category'))
               -> label('block::block.label.category')
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
                 <div class='col-md-6'>{{ Former::file('image')
               -> label('block::block.label.image')
               -> placeholder('block::block.placeholder.image')
               -> addClass('image-up')  }}
               </div>

               <div class='col-md-6'>{{ Former::hidden('status')
               -> forceValue('0')}}
               {{ Former::checkbox('status')
               -> label('block::block.label.status')
               -> addClass('js-switch')}}
               </div>
               
        </div>
    </div>
</div>
<div class="tab-footer">
    <div class="row">
        <div class="col-md-12">
            {{Former::actions()
            ->large_primary_submit(Lang::get('app.save'))
            ->large_default_reset(Lang::get('app.reset'))}}
        </div>
    </div>
</div>
{{Former::close()}}
@stop

@section('script')
 <script>
    jQuery(function ($) {
        $('.image-up').ezdz({
            text: '{{Lang::get('block::block.placeholder.image')}}',
            validators: {
                maxWidth:  900000,
                maxHeight: 900000,
                maxSize: 1000000
            },
            reject: function (file, errors) {
                if (errors.mimeType) {
                    alert(file.name + ' must be an image.');
                }

                if (errors.maxWidth) {
                    alert(file.name + ' must be width:900px max.');
                }

                if (errors.maxHeight) {
                    alert(file.name + ' must be height:900px max.');
                }
            }
        });
        @if ($block->image != '')
        $('.image-up').ezdz('preview', '{{ URL::to($block->image) }}');
        @endif
    });
</script>

@stop