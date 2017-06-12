<?php

Breadcrumbs::register('admin.collection.marker.create', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.collection.index', $id);
    $breadcrumbs->push(trans('menus.backend.access.marker.create'), route('admin.collection.marker.create', $id));
});


Breadcrumbs::register('admin.collection.marker.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.collection.index', $id);
    $breadcrumbs->push(trans('menus.backend.access.marker.edit'), route('admin.collection.marker.edit', $id));
});
