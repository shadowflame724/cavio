<?php

namespace App\Models\Product\Attribute;

trait ProductAttribute
{

    public function getEditButtonAttribute()
    {
        return '<a href="' . route('admin.products.edit', ['id' => $this->id]) . '" class="btn btn-xs btn-primary" >' .
                    '<i class="fa fa-pencil" data-toggle="tooltip"></i>' .
                '</a>';
    }

    public function getDeleteButtonAttribute()
    {
        return '<a href="' . route('admin.products.remove', ['id' => $this->id]) . '" ' .
                   'data-method="delete" data-trans-button-cancel="Отмена" ' .
                   'data-trans-button-confirm="Удалить" data-trans-title="Внимание" class="btn btn-xs btn-danger"' .
               '>' .
                    '<i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title=""></i>' .
               '</a>';
    }

    public function getRestoreButtonAttribute()
    {
        return 
        '<a href="' . route('admin.products.restore', ['id' => $this->id]).'" name="restore_lien" class="btn btn-xs btn-info">' .
            '<i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="Восставновить"></i>' .
        '</a> ';
    }

    public function getDeletePermanentlyButtonAttribute()
    {
        return 
        '<a href="'.route('admin.products.permanent.remove', ['id' => $this->id]).'" name="delete_lien_perm" class="btn btn-xs btn-danger">' .
            '<i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Удалить навсегда"></i>' . 
        '</a> ';
    }

    public function getActionButtonsAttribute()
    {
        if ($this->trashed()) {
            return $this->getRestoreButtonAttribute().
                   $this->getDeletePermanentlyButtonAttribute();
        }
        return
            $this->getEditButtonAttribute().
            $this->getDeleteButtonAttribute();

    }
}
