<?php

Breadcrumbs::register('admin.access.collection.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.access.collection.management'), route('admin.access.collection.index'));
});

Breadcrumbs::register('admin.access.collection.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.access.collection.index');
    $breadcrumbs->push(trans('menus.backend.access.collection.create'), route('admin.access.collection.create'));
});

Breadcrumbs::register('admin.access.collection.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.access.collection.index');
    $breadcrumbs->push(trans('menus.backend.access.collection.edit'), route('admin.access.collection.edit', $id));
});
