@php
$langsSuf = [
    [ 'n' => 'en', 's' => '',],
    [ 'n' => 'ru', 's' => '_ru',],
    [ 'n' => 'it', 's' => '_it',],
];
@endphp

<style>
    .panel { border-width: 2px;}
    .panel hr{ margin: 10px 0 15px;}
    .panel .select2 ~ .btn, .panel .inpMb ~ .btn { margin-top: 5px; }
    .panel .select2 { width: 100% !important; }
    .panel .select2:not(.forPopup) { height: 32px; }
    .panel .select2-container--default .select2-selection--single { border-radius: 0; border: 1px solid #ccc;}
    .panel .select2-container .select2-selection--single { height: 32px;}
    .panel .select2-container--default .select2-selection--single .select2-selection__arrow { height: 30px;}
    .panel .panel { margin: 10px 0 15px;}
    .panel .panel-heading { position: relative; padding: 7px 10px;}
    .panel .panel-body { padding: 10px; }
    .panel .panel-body > label { font-weight: normal; }
    .panel .panel-heading .radio,.panel .panel-heading .checkbox { display: inline-block; vertical-align: middle; padding-top: 0;min-height: 20px;}
    .panel .panel-heading .btns-right { position: absolute; display: block; top: 0; bottom: 0; right: 15px; vertical-align: middle;}
    .panel .input-group { margin-bottom: 5px;}
    .panel .input-group .input-group-addon { min-width: 150px; vertical-align: top; text-align: right; background-color: #f7f7f7;}
    .panel .input-group textarea { resize: none;}
    .panel .form-control.photos { min-height: 46px;}
    .panel .form-control.photos,.panel .form-control.nHeight { height: auto; font-size: 0;}
    .panel .form-control.nHeight .select2 { font-size: 12px;}
    .panel .form-control.photos .photo-one { width: 0; height: 0; position: relative; padding: 8%; display: inline-block; vertical-align: top;
        margin-right: 20px; font-size: 14px;
        border: 1px solid #ddd; border-radius: 4px;
        background-size: contain; background-repeat: no-repeat; background-position: 50% 50%;
    }
    .panel .dropzone{ min-height: 0;}
    .panel .well:before,.panel .well:after{ content: ''; clear: both; display: table;}
    .panel .well label{ font-weight: normal; font-size: 12px;}
    .panel .well{ padding: 5px 0; border-radius: 0; margin-left: 15px; margin-right: 15px; margin-bottom: 5px;
        background-color: #f7f7f7; border-color: #d2d6de; box-shadow: none;}

    .select2-container--default.forPopup .select2-selection--multiple .select2-selection__choice{
        background: #fff; position: relative;
    }
    .select2-container--default.forPopup .select2-search--inline .select2-search__field{
        width: 100px !important; height: 28px !important; padding: 5px;
        border-radius: 4px; border: 1px solid #d2d6de;
        font-size: 16px; line-height: 1; color: #2b2b2b;
    }
    .select2-container--default.forPopup .select2-selection--multiple {border: none;}
    .select2-container--default.forPopup .select2-selection--multiple .select2-selection__rendered{ padding: 0;}
    .select2-container--default.forPopup .select2-selection--multiple .select2-selection__choice__remove{
        position: absolute; display: block; top: 0; right: 0; margin: 0; text-align: center; z-index: 2;
        background-color: #dd4b39; border-color: #d73925; color: #fff;
        font-size: 24px; line-height: 24px; width: 24px; height: 24px; }
    .pop-sel-img{ position: relative; display: block; width: 256px; height: 256px; z-index: 1;
        background-size: contain; background-repeat: no-repeat; background-position: 50% 50%;}
    .pop-img{ width: 0; height: 0; position: relative; padding: 30%; display: inline-block; vertical-align: top;
        font-size: 12px;
        border: 1px solid #ddd; border-radius: 4px;
        background-size: contain; background-repeat: no-repeat; background-position: 50% 50%;}
    .pop-img:hover{border: 1px solid #aaa;}
    .pop-img span{ position: absolute; display: block; top: 100%; height: 15px; left: 0; right: 0;
        text-align: center;}
    .modal-body .select2{ width: 100% !important; position: relative;}
    .select2-container.forPopup .select2-results__option{ width: 20%; display: inline-block;
        padding-bottom: 20px;}
</style>

<div class="panel panel-success" id="productOne">
    <div class="panel-heading">
        <div class="panel-title">{{ trans('product-form.label.parent.title') }}</div>
        <div class="checkbox">
            <label for="published">
                {{ Form::checkbox('published', $product->published, $product->published, [
                    'id' => 'published'
                ]) }}
                {{ trans('product-form.label.parent.published') }}
            </label>
        </div>
        <div class="pull-right">
            {{--<button type="button" class="btn btn-xs btn-success"><i class="fa fa-save"></i> Save</button>--}}
            <button type="button"
                    class="btn btn-xs btn-link"
                    data-toggle="collapse"
                    data-parent="#productOne"
                    href="#productItem{{ $product->id }}">
                <i class="caret"></i>
            </button>
        </div>
    </div>
    <div class="panel-collapse collapse in" id="productItem{{ $product->id }}">
        <div class="panel-body">
            <div class="row" data-type="parent_item">
                @include('backend.products.partials.parent_inputs',[
                    'product' => $product
                ])
            </div>

            <hr class="hr child-after" />

            @forelse($product->childs as $child)
                @include('backend.products.partials.child_one',[
                    'child' => $child
                ])
            @empty
                <div class="new-child hidden">
                    @include('backend.products.partials.child_one',[
                        'child' => $child
                    ])
                </div>
            @endforelse

            <hr class="hr photo-after" />

            @forelse($product->photos as $ky => $photo)
                @include('backend.products.partials.photo_one',[
                    'photo' => $photo,
                    'ky' => $ky,
                ])
            @empty
                <div class="new-photo hidden">
                    @include('backend.products.partials.photo_one',[
                        'photo' => $photo,
                        'ky' => 'NEW',
                    ])
                </div>
            @endforelse
        </div>
    </div>

</div>

<div class="modal fade bs-example-modal-lg" id="photosPopup" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">All photos</h4>
            </div>
            <div class="modal-body">

                <select name="selected_photos" multiple id="selected_photos" class="select2"></select>
                <div class="modal-photos">

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Select photos</button>
            </div>
        </div>
    </div>
</div>