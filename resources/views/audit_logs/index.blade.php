<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Audit Logs</title>
</head>
<body>
    <h1>Audit Logs</h1>
    <ul>
        @foreach ($logs as $log)
            <li>{{ $log->created_at }} -
                {{ $log->user->name ?? 'System' }} -
                {{ $log->action }} on {{ $log->model_type }} (ID: {{ $log->model_id }})</li>
        @endforeach
    </ul>
</body>
</html>
