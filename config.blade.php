@php
    header('Content-Type: application/json');
    echo json_encode([
        'api_url' => 'http://api.' . request()->host(),
    ], JSON_THROW_ON_ERROR);
@endphp
