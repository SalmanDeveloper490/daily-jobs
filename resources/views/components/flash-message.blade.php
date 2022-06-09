@if (session()->has('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show"
        class="fixed top-5 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-48 py-6 rounded">
        <p class="uppercase text-xl">{{ session('message') }}</p>
    </div>
@endif
