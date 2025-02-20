@props (['name'])

<select type="text" name="{{ $name }}" class="mt-1 w-full border border-gray-300 rounded-md" id="text">
    {{ $slot }}
</select>
