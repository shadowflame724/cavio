<?php
Breadcrumbs::register('admin.access.category.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Category management', route('admin.access.category.index'));
});

Breadcrumbs::register('admin.access.category.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.access.category.index');
    $breadcrumbs->push('Create new page', route('admin.access.category.create'));
});

Breadcrumbs::register('admin.access.category.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.access.category.index');
    $breadcrumbs->push('Edit category', route('admin.access.category.edit', $id));
});
