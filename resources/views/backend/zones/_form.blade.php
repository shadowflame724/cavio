<div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="en">
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
                'name',
                trans('validation.attributes.backend.access.zone.name'),
                ['class' => 'col-lg-2 control-label']
            ) }}
            <div class="col-lg-10">
                {{ Form::text(
                    'name',
                    null,
                    ['class' => 'form-control', 'minlength' => '3', 'maxlength' => '35', 'required' => 'required', 'autofocus' => 'autofocus']
                ) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label(
                'description',
                trans('validation.attributes.backend.access.zone.description'),
                ['class' => 'col-lg-2 control-label']
            ) }}
            <div class="col-lg-10">
                {{ Form::textarea(
                    'description',
                    null,
                    ['class' => 'form-control', 'minlength' => '3', 'maxlength' => '35', 'required' => 'required', 'autofocus' => 'autofocus']
                ) }}
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="ru">
        <div class="form-group">
            {{ Form::label(
                'title_ru',
                trans('validation.attributes.backend.access.zone.title_ru'),
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
                'name_ru',
                trans('validation.attributes.backend.access.zone.name_ru'),
                ['class' => 'col-lg-2 control-label']
            ) }}
            <div class="col-lg-10">
                {{ Form::text(
                    'name_ru',
                    null,
                    ['class' => 'form-control', 'minlength' => '3', 'maxlength' => '35', 'required' => 'required', 'autofocus' => 'autofocus']
                ) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label(
                'description_ru',
                trans('validation.attributes.backend.access.zone.description_ru'),
                ['class' => 'col-lg-2 control-label']
            ) }}
            <div class="col-lg-10">
                {{ Form::textarea(
                    'description_ru',
                    null,
                    ['class' => 'form-control', 'minlength' => '3', 'maxlength' => '35', 'required' => 'required', 'autofocus' => 'autofocus']
                ) }}
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="it">
        <div class="form-group">
            {{ Form::label(
                'title_it',
                trans('validation.attributes.backend.access.zone.title_it'),
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
        <div class="form-group">
            {{ Form::label(
                'name_it',
                trans('validation.attributes.backend.access.zone.name_it'),
                ['class' => 'col-lg-2 control-label']
            ) }}
            <div class="col-lg-10">
                {{ Form::text(
                    'name_it',
                    null,
                    ['class' => 'form-control', 'minlength' => '3', 'maxlength' => '35', 'required' => 'required', 'autofocus' => 'autofocus']
                ) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label(
                'description_it',
                trans('validation.attributes.backend.access.zone.description_it'),
                ['class' => 'col-lg-2 control-label']
            ) }}
            <div class="col-lg-10">
                {{ Form::textarea(
                    'description_it',
                    null,
                    ['class' => 'form-control', 'minlength' => '3', 'maxlength' => '35', 'required' => 'required', 'autofocus' => 'autofocus']
                ) }}
            </div>
        </div>
    </div>
</div>