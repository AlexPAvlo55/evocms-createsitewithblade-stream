@extends('layout.layout')
@section('content')
    <!-- Form -->
    <h3>Form</h3>

    <form method="post" action="">
        <div class="row gtr-uniform">
            <input type="hidden" name="formid" value="comments">
            <div class="col-12 col-12-xsmall">
                <input type="text" required name="name" id="demo-name" value="" placeholder="Name"/>
            </div>


            <div class="col-12">
                <textarea name="message" required  id="message" placeholder="Enter your message" rows="6"></textarea>
            </div>
            <!-- Break -->
            <div class="col-12">
                <ul class="actions">
                    <li><input type="submit" value="Send Message" class="primary"/></li>
                    <li><input type="reset" value="Reset"/></li>
                </ul>
            </div>
        </div>
    </form>
    @if(isset($comments) && count($comments))
        <h4>Комментарии</h4>
        <dl>
            @foreach($comments as $comment)
                <dt>{{$comment['name']}}</dt>
                <dd>
                    <p>{{$comment['message']}}</p>
                </dd>
            @endforeach

        </dl>
        {{ $comments->links('blocks.paginate') }}
    @endif
@endsection