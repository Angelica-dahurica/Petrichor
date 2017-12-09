<!doctype html>
<html lang="en">
<meta name="csrf-token" content="{{ csrf_token() }}">
<head>
    <meta charset="UTF-8">
    <title>Petrichor</title>
</head>
<body>
<div id="app">
    <start></start>
</div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>