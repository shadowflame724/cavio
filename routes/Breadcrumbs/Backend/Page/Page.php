<?php

Breadcrumbs::register('admin.page.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.access.page.management'), route('admin.page.index'));
});

Breadcrumbs::register('admin.page.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.page.index');
    $breadcrumbs->push(trans('menus.backend.access.page.create'), route('admin.page.create'));
});

Breadcrumbs::register('admin.page.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.page.index');
    $breadcrumbs->push(trans('menus.backend.access.page.edit'), route('admin.page.edit', $id));
});
