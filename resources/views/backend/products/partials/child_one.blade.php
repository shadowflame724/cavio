@php
    $chldKey = ($child->id) ? $child->id : 'KEY';
@endphp
<div class="panel panel-warning">
    <div class="panel-heading">
        <div class="panel-title">{{ trans('product-form.label.child.title') }}</div>
        <div class="checkbox">
            <label for="child[{{ $chldKey }}][published]">
                {{ Form::checkbox('child['.$chldKey.'][published]', $child->published, $child->published, [
                    'id' => 'child['.$chldKey.'][published]'
                ]) }}
                {{ trans('product-form.label.child.published') }}
            </label>
        </div>
        <div class="pull-right">
            {{--<button type="button" class="btn btn-xs btn-success"><i class="fa fa-save"></i></button>--}}
            {{--<button type="button" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>--}}
            <button type="button"
                    class="btn btn-xs btn-link {{ ($child->published)?'':'collapsed' }}"
                    data-toggle="collapse"
                    data-parent="#productOne"
                    href="#productChild{{ $child->id }}">
                <i class="caret"></i>
            </button>
        </div>
    </div>
    <div class="panel-collapse collapse {{ ($child->published)?'in':'' }}" id="productChild{{ $child->id }}">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="input-group input-group-sm">
                        {{ Form::label('child['.$chldKey.'][code]', trans('product-form.label.child.code'), ['class' => 'input-group-addon']) }}
                        {{ Form::text('child['.$chldKey.'][code]', $child->code, [
                            'class' => 'form-control',
                            'data-type' => 'replace-input',
                            'data-name' => 'code',
                            'readonly' => 'readonly',
                            'maxlength' => '100',
                            'required' => 'required'
                        ]) }}
                    </div>
                </div>
                @foreach($langsSuf as $lng)
                    <div class="col-lg-4">
                        <div class="input-group input-group-sm">
                            {{ Form::label('child['.$chldKey.'][name'.$lng['s'].']', trans('product-form.label.child.name'.$lng['s']), ['class' => 'input-group-addon']) }}
                            {{ Form::text('child['.$chldKey.'][name'.$lng['s'].']', $child->{'name'.$lng['s']}, [
                                'class' => 'form-control',
                                'data-type' => 'replace-input',
                                'data-name' => 'name'.$lng['s'],
                                'maxlength' => '100',
                                'required' => 'required'
                            ]) }}
                        </div>
                        <div class="input-group input-group-sm">
                            {{ Form::label('child['.$chldKey.'][prev'.$lng['s'].']', trans('product-form.label.child.prev'.$lng['s']), ['class' => 'input-group-addon']) }}
                            {{ Form::textarea('child['.$chldKey.'][prev'.$lng['s'].']', $child->{'name'.$lng['s']}, [
                                'class' => 'form-control',
                                'data-type' => 'replace-input',
                                'data-name' => 'prev'.$lng['s'],
                                'maxlength' => '100',
                                'rows' => '3',
                                //'required' => 'required'
                            ]) }}
                        </div>
                    </div>
                @endforeach
                <div class="clearfix"></div>
                <div class="well" data-type="dimensions_data">
                    @php
                        $dimensions = json_decode($child->dimensions);
                    @endphp
                    @if(is_object($dimensions))
                    @foreach ($dimensions as $type => $dimension)
                    <div class="col-lg-2">
                        {{ Form::label(
                            'child['.$chldKey.'][dimensions]['.$type.']',
                            trans('product-form.label.child.dimensions.'.$type)
                        ) }}
                        {{ Form::text('child['.$chldKey.'][dimensions]['.$type.']', $dimension, [
                            'class' => 'form-control',
                                'data-dimensions' => $type,
                            'maxlength' => '100',
                            //'required' => 'required'
                        ]) }}
                    </div>
                    @endforeach
                    @endif
                    <div class="clearfix"></div>
                </div>
                <div class="col-lg-12 hidden">
                    <div class="input-group input-group-sm">
                        {{ Form::label('child['.$chldKey.'][dimensions]', trans('product-form.label.child.dimensions'), ['class' => 'input-group-addon']) }}
                        {{ Form::textarea('child['.$chldKey.'][dimensions]', $child->dimensions, [
                            'class' => 'form-control child-dimensions',
                            'data-type' => 'replace-input',
                            'data-name' => 'dimensions',
                            'maxlength' => '100',
                            'rows' => '3',
                            //'required' => 'required'
                        ]) }}
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="input-group input-group-sm">
                        <label for="child[{{$chldKey}}][comment]" class="input-group-addon"><b>{{ trans('product-form.label.child.comment') }}</b></label>
                        {{ Form::textarea('child['.$chldKey.'][comment]', $child->comment, [
                            'id' => 'child['.$chldKey.'][comment]',
                            'data-replace' => 'comment',
                            'class' => 'form-control',
                            'maxlength' => '100',
                            'rows' => '3',
                            //'required' => 'required'
                        ]) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>