<?php

Breadcrumbs::register('admin.page.block.create', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.page.edit', $id);
    $breadcrumbs->push(trans('menus.backend.access.block.create'), route('admin.page.block.create', $id));
});


Breadcrumbs::register('admin.page.block.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.page.edit', $id);
    $breadcrumbs->push(trans('menus.backend.access.block.edit'), route('admin.page.block.edit', $id));
});
