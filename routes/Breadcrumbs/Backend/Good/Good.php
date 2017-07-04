<?php

Breadcrumbs::register('admin.good.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.access.good.management'), route('admin.good.index'));
});

Breadcrumbs::register('admin.good.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.good.index');
    $breadcrumbs->push(trans('menus.backend.access.good.create'), route('admin.good.create'));
});

Breadcrumbs::register('admin.good.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.good.index');
    $breadcrumbs->push(trans('menus.backend.access.good.edit'), route('admin.good.edit', $id));
});
