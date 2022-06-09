<x-layout>
    @include('partials._hero')
    @include('partials._search')

    @if (count($listings) == 0)
        <h1 class="text-center text-6xl uppercase font-bold mt-20">OOPS ! No Listings Found</h1>
        <a href="/"
            class="flex justify-center items-center gap-1 font-bold text-black mt-3 mb-10 text-xl uppercase hover:text-laravel"><i
                class="fa-solid fa-arrow-left mt-1"></i> Back To Home
        </a>
    @else
        <div class="lg:grid lg:grid-cols-3 gap-4 space-y-4 md:space-y-0 mx-4 my-10">
            @foreach ($listings as $listing)
                <x-listing-card :listing="$listing" />
            @endforeach
        </div>
    @endif

    <div class="mb-10 px-4">
        {{ $listings->links() }}
    </div>

</x-layout>
