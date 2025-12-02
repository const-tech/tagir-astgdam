<?php
$map = ['create', 'read', 'update', 'delete'];

return [
    'models' => [
        'clients' => $map,
        'employees' => array_merge($map, ['archive', 'vacations']),
        'settings' => ['read', 'update'],
        'users' => $map,
        'administrative_structure' => $map,
        'price_quotation' => ['create', 'read', 'update', 'delete', 'send_message', 'change_status'],
        'contracts' => $map,
        'projects' => $map,
        'goals' => $map,
        'administration_employees' => $map,
        'invoices' => $map,
        'contactes' => $map,
        'governmentals' => $map,
        'jobs' => $map,
        'work_types' => $map,
        'insurance_companies' => $map,
        'roles' => $map,
        'accounts' => $map,
        'vouchers' => $map,
    ],
];
