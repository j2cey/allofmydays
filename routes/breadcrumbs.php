<?php

use Tabuna\Breadcrumbs\Trail;
use Tabuna\Breadcrumbs\Breadcrumbs;

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Hello Home', route('home'));
});

// System
Breadcrumbs::for('systems.index', function (Trail $trail) {
    $trail->parent('home')->push('System', route('systems.index'));
});

// Reports
Breadcrumbs::for('reports.index', function (Trail $trail) {
    $trail->parent('home')->push('Reports', route('reports.index'));
});
