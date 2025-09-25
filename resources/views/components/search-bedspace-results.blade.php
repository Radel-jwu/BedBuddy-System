@forelse($listings as $listing)
    <x-bedspace :listing="$listing" />
@empty
    <div class="col-span-full text-center text-gray-500">
        No results found.
    </div>
@endforelse
