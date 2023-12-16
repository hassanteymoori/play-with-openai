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

@if(session('file'))

    <div>
        <iframe src="https://giphy.com/embed/RdKjAkFTNZkWUGyRXF" width="480" height="256" frameBorder="0"
                class="giphy-embed" allowFullScreen></iframe>

        <a href="{{ asset(session('file')) }}"
           download
           class="block w-full text-center rounded p-2 border bg-gray-200 hover:bg-blue-500 hover:text-white mt-2">Download
            Audio</a>
        <audio controls>
            <source src="{{ asset(session('file')) }}" type="audio/mpeg">
        </audio>
    </div>

@else
    <form id="roastForm" method="POST" action="{{ route('roast') }}" class="w-full lg:max-w-md lg:mx-auto">
        @csrf
        <h2 class="pb-2">Write for me to roast it for you :)</h2>
        <div class="flex gap-2">
            <input type="text" name="topic" placeholder="what do you want me to roast?"
                   required
                   class="rounded border p-2 flex-1">
            <button class="rounded p-2 border bg-gray-200 hover:bg-blue-500 hover:text-white"
                    type="submit"
                    onclick="submitForm()">Roast
            </button>
        </div>

    </form>

    <svg aria-hidden="true" id="spinner" role="status"
         class="inline w-10 h-10 me-3 text-gray-200 animate-spin dark:text-gray-600 hidden fill-green-500"
         viewBox="0 0 100 101"
         fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
            fill="currentColor"/>
        <path
            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
            fill="#1C64F2"/>
    </svg>

@endif
</body>
<script>
    function submitForm() {
        // Get the spinner element by ID
        const spinner = document.getElementById('spinner');
        const form = document.getElementById('roastForm');


        // Toggle the class to show or hide the spinner
        spinner.classList.toggle('hidden');
        form.classList.toggle('hidden')

    }
</script>
</html>
