<?php

Breadcrumbs::register('admin.orders.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.access.orders.management'), route('admin.orders.index'));
});

Breadcrumbs::register('admin.orders.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.orders.index');
    $breadcrumbs->push(trans('menus.backend.access.orders.show'), route('admin.orders.show', $id));
});
