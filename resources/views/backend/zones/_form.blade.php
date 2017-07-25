<div class="form-group">
    {{ Form::label(
        'title',
        trans('validation.attributes.backend.access.zone.title'),
        ['class' => 'col-lg-2 control-label']
    ) }}
    <div class="col-lg-10">
        {{ Form::text(
            'title',
            null,
            ['class' => 'form-control', 'minlength' => '3', 'maxlength' => '35', 'required' => 'required', 'autofocus' => 'autofocus']
        ) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label(
        'title_ru',
        trans('validation.attributes.backend.access.zone.title'),
        ['class' => 'col-lg-2 control-label']
    ) }}
    <div class="col-lg-10">
        {{ Form::text(
            'title_ru',
            null,
            ['class' => 'form-control', 'minlength' => '3', 'maxlength' => '35', 'required' => 'required', 'autofocus' => 'autofocus']
        ) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label(
        'title_it',
        trans('validation.attributes.backend.access.zone.title'),
        ['class' => 'col-lg-2 control-label']
    ) }}
    <div class="col-lg-10">
        {{ Form::text(
            'title_it',
            null,
            ['class' => 'form-control', 'minlength' => '3', 'maxlength' => '35', 'required' => 'required', 'autofocus' => 'autofocus']
        ) }}
    </div>
</div>