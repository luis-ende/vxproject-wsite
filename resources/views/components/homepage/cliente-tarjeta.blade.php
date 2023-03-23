@props([
    'src' => '',
    'alt' => '',
    'nombre' => '',
    'actividad' => ''
])

<div class="border rounded p-10 shadow-lg">
    <div class="h-2/3">
        <img src="{{ $src }}" alt="{{ $alt }}"
             class="object-scale-down w-full h-full">
    </div>
    <div class="my-5 font-bold">
        <p class="text-gray-700">{{ $nombre }}</p>
        <p class="text-vxproject-primary">{{ $actividad }}</p>
    </div>
</div>