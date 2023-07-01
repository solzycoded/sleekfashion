@props(['bgColor'])

{{-- one alert icon for success and another for failure --}}
{{--  --}}

@php
    $class = "d-flex fixed-bottom justify-content-evenly alert-message";
@endphp

<div style="bottom: 2%; position: fixed; z-index: 9999;opacity: 0" {{ $attributes(["class" => $class]) }}>
	<button style="background-color: {{ $bgColor }}; border-radius: 20px; padding: 5px 15px 5px 15px;  color: white; border: 0px; font-weight: bold; box-shadow: 1px 0px 20px #d1d1d1 !important;" class="alert-message-container">
		<span class="alert-message-content"></span> <i class="bi ps-2 alert-message-icon"></i>
	</button>
</div>