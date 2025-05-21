protected $middlewareGroups = [
    'web' => [
        // Existing middleware
        \App\Http\Middleware\AccessibilityMonitoring::php,
    ],
];