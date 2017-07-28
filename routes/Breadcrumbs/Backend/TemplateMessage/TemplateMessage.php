<?php

Breadcrumbs::register('admin.template-messages.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.access.template-messages.management'), route('admin.template-messages.index'));
});

Breadcrumbs::register('admin.template-messages.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.template-messages.index');
    $breadcrumbs->push(trans('menus.backend.access.template-messages.create'), route('admin.template-messages.create'));
});

Breadcrumbs::register('admin.template-messages.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.template-messages.index');
    $breadcrumbs->push(trans('menus.backend.access.template-messages.edit'), route('admin.template-messages.edit', $id));
});
