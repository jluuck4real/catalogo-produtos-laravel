<?php

return [
    'admin_emails' => array_filter(
        array_map('trim', explode(',', (string) env('CATALOG_ADMIN_EMAILS', '')))
    ),
];
