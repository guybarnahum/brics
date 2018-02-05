
<!--
{{ print_r( $property ) }}
-->

@if (isset($property))

<!-- Property guid: {{ $property->guid }} -->

<div class="">
    <h1>{{ $property->location_desc }}</h1>
    <p>{{ $property->guid }}</p>
    <p>{{ $property->desc_full }}</p>
</div>

@else

<!-- Property guid: N/A -->

<div class="">
    <p>No Property Found!</p>
</div>

@endif
