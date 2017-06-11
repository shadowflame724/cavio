<?php

Breadcrumbs::register('admin.faq.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.access.faq.management'), route('admin.faq.index'));
});

Breadcrumbs::register('admin.faq.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.faq.index');
    $breadcrumbs->push(trans('menus.backend.access.faq.create'), route('admin.faq.create'));
});

Breadcrumbs::register('admin.faq.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.faq.index');
    $breadcrumbs->push(trans('menus.backend.access.faq.edit'), route('admin.faq.edit', $id));
});
