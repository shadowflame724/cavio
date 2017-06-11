<?php
Breadcrumbs::register('admin.category.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.access.category.management'), route('admin.category.index'));
});

Breadcrumbs::register('admin.category.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.category.index');
    $breadcrumbs->push(trans('menus.backend.access.category.create'), route('admin.category.create'));
});

Breadcrumbs::register('admin.category.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.category.index');
    $breadcrumbs->push(trans('menus.backend.access.category.edit'), route('admin.category.edit', $id));
});
