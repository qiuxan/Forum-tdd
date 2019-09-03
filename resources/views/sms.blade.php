{{--<h1>smsview</h1>

--}}

<form action="{{route('smsStore')}}" method="POST">

    {{csrf_field()}}

    <div>
        <input name="number" type="text">


    </div>

    <div>

        <textarea name="content" id="" cols="30" rows="10"></textarea>

    </div>

    <div>

        <button type="submit">Send</button>

    </div>

</form>


