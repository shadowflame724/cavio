<?php

Breadcrumbs::register('admin.access.page.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Page management', route('admin.access.page.index'));
});

Breadcrumbs::register('admin.access.page.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.access.page.index');
    $breadcrumbs->push('Create new page', route('admin.access.page.create'));
});

Breadcrumbs::register('admin.access.page.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.access.page.index');
    $breadcrumbs->push('Edit page', route('admin.access.page.edit', $id));
});
