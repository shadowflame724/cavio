<?php
Breadcrumbs::register('admin.access.page.block.create', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.access.page.edit');
    $breadcrumbs->push('Create new block', route('admin.access.page.block.create', $id));
});


Breadcrumbs::register('admin.access.page.block.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.access.page.edit');
    $breadcrumbs->push('Edit block', route('admin.access.page.block.edit', $id));
});
