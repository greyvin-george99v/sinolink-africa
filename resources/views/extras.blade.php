dollar stream_get_line<div class="price-pill">${{ number_format($car['price']) }}</div> 

@foreach($vehicles as $vehicle)
                                    @if(isset($vehicle['slug'])) 
       <option value="{{ $vehicle['slug'] }}">{{ $vehicle['name'] }}</option>
                                    @endif
                                @endforeach

                                About Page