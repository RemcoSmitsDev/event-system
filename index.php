<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="all" href="./css/tailwindcss.css">
    <title>Remco Smits - simple event system</title>
</head>

<body
    class="w-screen h-screen sm:flex sm:items-center sm:justify-center antialiased bg-cover bg-no-repeat bg-center overflow-hidden"
    style="background-image: url('https://www.thisisourhouse.nl/wp-content/uploads/2016/12/Intents-Festival-2016.jpg')">
    <div class="p-6 md:p-12 container mx-auto max-w-2xl bg-white">
        <form class="w-full space-y-8" action="./procces.php" method="post">
            <h1 class="font-bold text-3xl text-center">Buy tickets</h1>
            <div class="space-y-4 md:space-y-0 flex md:space-x-4 md:flex-row flex-col items-center justify-between">
                <div class="w-full space-y-4 flex flex-col md:block sm:max-w-xs">
                    <div class="relative">
                        <svg id="first_name"
                            class="hidden sm:-ml-8 mt-2 rounded-full absolute h-6 w-6 text-green-500 md:left-0 right-0 mr-2"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <input
                            class="pl-4 pr-8 py-2 border w-full appearance-none outline-none focus:border-gray-400 hover:border-gray-400 text-gray-600"
                            type="text" name="first_name" id="first_input" placeholder="first_name" required>
                    </div>
                    <div class="relative">
                        <svg id="last_name"
                            class="hidden sm:-ml-8 mt-2 rounded-full absolute h-6 w-6 text-green-500 md:left-0 right-0 mr-2"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <input
                            class="pl-4 pr-8 py-2 border w-full appearance-none outline-none focus:border-gray-400 hover:border-gray-400 text-gray-600"
                            type="text" name="last_name" id="last_input" placeholder="last_name" required>
                    </div>
                    <div class="relative">
                        <svg id="email"
                            class="hidden sm:-ml-8 mt-2 rounded-full absolute h-6 w-6 text-green-500 md:left-0 right-0 mr-2"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <input
                            class="pl-4 pr-8 py-2 border w-full appearance-none outline-none focus:border-gray-400 hover:border-gray-400 text-gray-600"
                            type="email" name="email" id="email_input" placeholder="email" required>
                    </div>
                    <div class="relative">
                        <svg id="person"
                            class="hidden sm:-ml-8 mt-2 rounded-full absolute h-6 w-6 text-green-500 md:left-0 right-0 mr-2"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <input
                            class="pl-4 pr-8 sm:pr-4 py-2 border w-full appearance-none outline-none focus:border-gray-400 hover:border-gray-400 text-gray-600"
                            type="number" name="persons" id="persons" min="0" placeholder="number of persons" required>
                    </div>
                </div>
                <div>
                    <label id="date_label" for="date"
                        class="block sm:inline-flex md:flex-col sm:items-center md:space-x-0 sm:space-x-10 w-full sm:w-auto min-w-0 pl-4 pr-6 py-2 border-2 border-gray-200 rounded select-none">
                        <img class="mx-auto w-32 h-32 object-contain"
                            src="https://www.thisisourhouse.nl/wp-content/uploads/2016/12/Intents-Festival-2016.jpg"
                            alt="">
                        <div class="flex flex-col items-center mb-4 sm:-mb-4 md:mb-4">
                            <p class="-mt-6 text-sm sm:text-left text-center md:text-center">Intens festivals 2021</p>
                            <input class="mt-4 px-4 py-2 border max-w-xs" type="date" name="event_date" id="date"
                                value="0" required>
                        </div>
                    </label>
                </div>
            </div>
            <div class="w-full flex items-center justify-between space-x-6">
                <button class="px-4 py-2 bg-gray-200 rounded text-gray-600 hover:bg-gray-100"
                    type="submit">Verder</button>
                <p class="font-bold inline-flex text-xl"><span>&euro;</span><input
                        class="focus:outline-none border-none select-none font-bold text-xl" name="price" id="price"
                        value="0" readonly></p>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <script src="./js/app.js"></script>

</body>

</html>