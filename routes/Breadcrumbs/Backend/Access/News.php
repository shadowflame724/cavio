<?php

Breadcrumbs::register('admin.access.news.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.access.news.management'), route('admin.access.news.index'));
});

Breadcrumbs::register('admin.access.news.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.access.news.index');
    $breadcrumbs->push(trans('menus.backend.access.news.create'), route('admin.access.news.create'));
});

Breadcrumbs::register('admin.access.news.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.access.news.index');
    $breadcrumbs->push(trans('menus.backend.access.news.edit'), route('admin.access.news.edit', $id));
});
