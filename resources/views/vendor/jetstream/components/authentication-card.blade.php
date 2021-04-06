<div class="bg-cover bg-top min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0" style="background-image: url({{asset('img/portada.jfif')}})">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
