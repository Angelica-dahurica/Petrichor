<!doctype html>
<html lang="en">
<meta name="csrf-token" content="{{ csrf_token() }}">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
</head>
<body>
<div id="app">
    <signin></signin>
</div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>