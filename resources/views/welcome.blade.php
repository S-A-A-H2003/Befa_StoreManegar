<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>welcome</title>
   @vite('resources/css/app.css')
</head>
<body class=" w-full h-screen flex flex-col justify-center items-center">
    <div class=" w-[50vh] h-[50vh] rounded-md  flex flex-col justify-evenly items-center bg-gray-700">
        <h1 class=" uppercase font-mono text-white"> Welcom In Aliaa Befa Store</h1>
        <a href="{{ route('login') }}" class="font-mono p-3 bg-white rounded-md">Login</a>
    </div>
</body>
</html>
