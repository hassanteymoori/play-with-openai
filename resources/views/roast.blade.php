<!doctype html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Twin-Gpt</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="h-full grid place-items-center p-6">

<form action="{{ route('roast') }}" class="w-full lg:max-w-md lg:mx-auto">
    <h2 class="pb-2">Write for me to roast it for you :)</h2>
    <div class="flex gap-2">
        <input type="text" placeholder="what do you want me to roast?"
               required
               class="rounded border p-2 flex-1">
        <button class="rounded p-2 border bg-gray-200 hover:bg-blue-500 hover:text-white">Roast</button>

    </div>
</form>

</body>
</html>
