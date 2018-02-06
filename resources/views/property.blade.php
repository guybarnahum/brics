
{{--
    <!--
        {{ print_r( $property ) }}
    -->
--}}

@if (isset($property))

    <!-- Property guid: {{ $property->guid }} -->

    <div class="">
        <h1>{{ $property->location_desc }}</h1>
        <p>{{ $property->guid }}</p>
        <p>{{ $property->desc_full }}</p>
    </div>

    @if (isset($property->photos))

    <div id="carousel-{{$property->guid}}" class="carousel slide" data-interval="false" data-keyboard=true>
      <ol class="carousel-indicators">
        @foreach ($property->photos as $photo)
            @if ($loop->index == 0 )
        <li data-target="#carousel-{{$property->guid}}" data-slide-to="{{$loop->index}}" class="active" ></li>
            @else
        <li data-target="#carousel-{{$property->guid}}" data-slide-to="{{$loop->index}}" ></li>
            @endif
        @endforeach
      </ol>
      <div class="carousel-inner" role="listbox">
        @foreach ($property->photos as $photo)
            @if ($loop->index == 0 )
        <div class="carousel-item active">
            @else
        <div class="carousel-item">
            @endif
            <div style='background:url("https://{{$photo->url}}") center center; background-size:cover;' class="slider-size">
{{--
<img class="d-block img-fluid" src="https://{{$photo->url}}" alt="{{$photo->desc}}">
--}}
            </div>
        </div>
        @endforeach
      </div>
      <a class="carousel-control-prev" href="javascript:void(0)" data-target="#carousel-{{$property->guid}}" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="javascript:void(0)" data-target="#carousel-{{$property->guid}}" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    @endif
@else

<!-- Property guid: N/A -->

    <div class="">
        <p>No Property Found!</p>
    </div>

@endif
