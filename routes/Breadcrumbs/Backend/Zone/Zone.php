<?php

Breadcrumbs::register('admin.zone.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.access.zone.management'), route('admin.zone.index'));
});

Breadcrumbs::register('admin.zone.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.zone.index');
    $breadcrumbs->push(trans('menus.backend.access.zone.create'), route('admin.zone.create'));
});

Breadcrumbs::register('admin.zone.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.zone.index');
    $breadcrumbs->push(trans('menus.backend.access.zone.edit'), route('admin.zone.edit', $id));
});
