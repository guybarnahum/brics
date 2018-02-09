@extends('layouts.app' )

@section('header')
@endsection

@section('content')

<section class="section">
    <div class="container">
        <div class="row">
            @if (!isset($properties))
            No Properties found
            @else
            {{--
                <!--
                    {{ print_r( $properties ) }}
                -->
            --}}
            <div class="portfolio isotope no-transition portfolio-round row">

                @forelse ($properties as $property)
                    @include('property',[ 'property' => $property ] )
                @empty
                    No Properties found
                @endforelse
            </div>
            @endif
        </div>
    </div>
</section>

@endsection

@section('footer')
@endsection

@section('scripts')
@endsection
