<?php

Breadcrumbs::register('admin.collection.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.access.collection.management'), route('admin.collection.index'));
});

Breadcrumbs::register('admin.collection.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.collection.index');
    $breadcrumbs->push(trans('menus.backend.access.collection.create'), route('admin.collection.create'));
});

Breadcrumbs::register('admin.collection.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.collection.index');
    $breadcrumbs->push(trans('menus.backend.access.collection.edit'), route('admin.collection.edit', $id));
});
