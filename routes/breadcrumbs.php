<?php
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;


Breadcrumbs::for('webadmin.products.store', function ($trail) {
    $trail->parent('webadmin.products.index');
    $trail->push('Create', route('webadmin.products.create'));
});

Breadcrumbs::for('webadmin.products.update', function ($trail) {
    $trail->parent('webadmin.products.index');
    $trail->push('Update');
});
