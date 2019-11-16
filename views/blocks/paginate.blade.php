@foreach($elements as $element)
    @if(is_array($element))
        @foreach($element as $key=>$link)
            <a href="{{$link}}">{{$key}}</a>
        @endforeach
    @else
        {{$element}}
    @endif
@endforeach