<?php

return [
    'dsn' => env('SENTRY_DSN'),

    // capture release as git sha
    'release' => file_exists($path = base_path('GITVERSION')) ? trim(file_get_contents($path)) : null,

    // Capture bindings on SQL queries
    'breadcrumbs.sql_bindings' => true,

    // Capture default user context
    'user_context' => true,
];
