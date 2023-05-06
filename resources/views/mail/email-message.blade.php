<x-mail::message>
@yield('content')

{{--# {{ $headerLine }}

--}}{{-- Greeting --}}{{--
@if (! empty($greeting))
## {{ $greeting }}
@else
@if ($level === 'error')
## @lang('Whoops!')
@else
## @lang('Hello!')
@endif
@endif

--}}{{-- Intro Lines --}}{{--
@foreach ($introLines as $line)
{{ $line }}

@endforeach

--}}{{-- Action Button --}}{{--
@isset($actionText)
<?php
$color = match ($level) {
'success', 'error' => $level,
default => 'gold',
};
?>
<x-mail::button :url="$actionUrl" :color="$color">
{{ $actionText }}
</x-mail::button>
@endisset

--}}{{-- Outro Lines --}}{{--
@foreach ($outroLines as $line)
{{ $line }}

@endforeach--}}

{{-- Salutation --}}

@section('salutation')
@show
</x-mail::message>