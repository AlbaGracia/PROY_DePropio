<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Panel Admin
Breadcrumbs::for('admin.panel', function (BreadcrumbTrail $trail) {
    $trail->push('Panel de Administración', route('admin.panel'));
});

// Espacios - listado
Breadcrumbs::for('space.list', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.panel');
    $trail->push('Listado de Espacios', route('space.list'));
});


Breadcrumbs::for('admin.space.create', function (BreadcrumbTrail $trail) {
    $trail->parent('space.list');
    $trail->push('Crear Espacio', route('space.create'));
});

Breadcrumbs::for('admin.space.edit', function (BreadcrumbTrail $trail, $space) {
    $trail->parent('space.list');
    $trail->push('Editar - ' . $space->name, route('space.edit', $space->id));
});
