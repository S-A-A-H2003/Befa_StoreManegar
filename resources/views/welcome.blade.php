<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>أهلاً بك</title>
   @vite('resources/css/app.css')
</head>
<body>
    <h1>مرحباً بك في الصفحة العامة</h1>
    <a href="{{ route('login') }}">تسجيل الدخول</a>

    <h1>مرحباً بك في الصفحة العامة</h1>
    <a href="{{ route('register') }}">حساب جديد </a>
</body>
</html>
