@props([
    'src' => '',
    'alt' => '',
    'nombre' => '',
    'actividad' => ''
])

<div class="vxproject-border p-10">
    <div class="h-2/3">
        <img src="{{ $src }}" alt="{{ $alt }}"
             class="object-scale-down w-full h-full">
    </div>
    <div class="my-5">
        <p class="text-vxproject-primary uppercase">{{ $nombre }}</p>
        <p class="text-vxproject-secondary lowercase">{{ $actividad }}</p>
    </div>
</div>