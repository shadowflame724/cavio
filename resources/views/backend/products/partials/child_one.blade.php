<div class="panel panel-warning">
    <div class="panel-heading">
        <div class="panel-title">{{ trans('product-form.label.child.title') }}</div>
        <div class="checkbox">
            <label for="child[{{$child->id}}][published]">
                {{ Form::checkbox('child['.$child->id.'][published]', $child->published, $child->published, [
                    'id' => 'child['.$child->id.'][published]'
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
                        {{ Form::label('child['.$child->id.'][code]', trans('product-form.label.child.code'), ['class' => 'input-group-addon']) }}
                        {{ Form::text('child['.$child->id.'][code]', $child->code, [
                            'class' => 'form-control',
                            'data-type' => 'replace-input',
                            'data-name' => 'code',
                            'maxlength' => '100',
                            'required' => 'required'
                        ]) }}
                    </div>
                </div>
                @foreach($langsSuf as $lng)
                    <div class="col-lg-4">
                        <div class="input-group input-group-sm">
                            {{ Form::label('child['.$child->id.'][name'.$lng['s'].']', trans('product-form.label.child.name'.$lng['s']), ['class' => 'input-group-addon']) }}
                            {{ Form::text('child['.$child->id.'][name'.$lng['s'].']', $child->{'name'.$lng['s']}, [
                                'class' => 'form-control',
                                'data-type' => 'replace-input',
                                'data-name' => 'name'.$lng['s'],
                                'maxlength' => '100',
                                'required' => 'required'
                            ]) }}
                        </div>
                        <div class="input-group input-group-sm">
                            {{ Form::label('child['.$child->id.'][prev'.$lng['s'].']', trans('product-form.label.child.prev'.$lng['s']), ['class' => 'input-group-addon']) }}
                            {{ Form::textarea('child['.$child->id.'][prev'.$lng['s'].']', $child->{'name'.$lng['s']}, [
                                'class' => 'form-control',
                                'data-type' => 'replace-input',
                                'data-name' => 'prev'.$lng['s'],
                                'maxlength' => '100',
                                'rows' => '3',
                                'required' => 'required'
                            ]) }}
                        </div>
                    </div>
                @endforeach
                <div class="col-lg-12">
                    <div class="input-group input-group-sm">
                        {{ Form::label('child['.$child->id.'][dimensions]', trans('product-form.label.child.dimensions'), ['class' => 'input-group-addon']) }}
                        {{ Form::textarea('child['.$child->id.'][dimensions]', $child->dimensions, [
                            'class' => 'form-control child-dimensions',
                            'data-type' => 'replace-input',
                            'data-name' => 'dimensions',
                            'maxlength' => '100',
                            'rows' => '3',
                            'required' => 'required'
                        ]) }}
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="input-group input-group-sm">
                        <label for="child[{{$child->id}}][comment]" class="input-group-addon"><b>{{ trans('product-form.label.child.comment') }}</b></label>
                        {{ Form::textarea('child['.$child->id.'][comment]', $child->comment, [
                            'id' => 'child['.$child->id.'][comment]',
                            'class' => 'form-control',
                            'maxlength' => '100',
                            'rows' => '3',
                            'required' => 'required'
                        ]) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>