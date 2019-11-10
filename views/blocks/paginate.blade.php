<div class="pagination">
    @foreach($elements[0] as $key=>$element)
        <a href="{{$element}}" class="page">{{$key}}</a>
    @endforeach
    </div>