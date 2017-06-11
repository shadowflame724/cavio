<?php

Breadcrumbs::register('admin.news.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.access.news.management'), route('admin.news.index'));
});

Breadcrumbs::register('admin.news.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.news.index');
    $breadcrumbs->push(trans('menus.backend.access.news.create'), route('admin.news.create'));
});

Breadcrumbs::register('admin.news.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.news.index');
    $breadcrumbs->push(trans('menus.backend.access.news.edit'), route('admin.news.edit', $id));
});
