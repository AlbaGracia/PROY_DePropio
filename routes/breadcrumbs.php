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
    $trail->push(__('labels.list-spaces'), route('space.list'));
});


Breadcrumbs::for('admin.space.create', function (BreadcrumbTrail $trail) {
    $trail->parent('space.list');
    $trail->push(__('labels.create-space'), route('space.create'));
});

Breadcrumbs::for('admin.space.edit', function (BreadcrumbTrail $trail, $space) {
    $trail->parent('space.list');
    $trail->push(__('labels.edit') . ' - ' . $space->name, route('space.edit', $space->id));
});

// Eventos - listado
Breadcrumbs::for('event.list', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.panel');
    $trail->push(__('labels.list-events'), route('event.list'));
});


Breadcrumbs::for('admin.event.create', function (BreadcrumbTrail $trail) {
    $trail->parent('event.list');
    $trail->push(__('labels.create-event'), route('event.create'));
});

Breadcrumbs::for('admin.event.edit', function (BreadcrumbTrail $trail, $event) {
    $trail->parent('event.list');
    $trail->push(__('labels.edit') . ' - ' . $event->name, route('event.edit', $event->id));
});


// Categoría - listado
Breadcrumbs::for('category.list', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.panel');
    $trail->push(__('labels.list-category'), route('category.index'));
});


Breadcrumbs::for('admin.category.create', function (BreadcrumbTrail $trail) {
    $trail->parent('category.list');
    $trail->push(__('labels.create-category'), route('category.create'));
});

Breadcrumbs::for('admin.category.edit', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('category.list');
    $trail->push(__('labels.edit') . ' - ' . $category->name, route('category.edit', $category->id));
});
