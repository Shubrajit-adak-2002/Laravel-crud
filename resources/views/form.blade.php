<div>
    <form action="{{route('form.submit')}}" method="post">
        @csrf
        Name: <input type="text" name="name" id=""><br>
        Email: <input type="text" name="email" id=""><br>
        Phone: <input type="text" name="phone" id=""><br>
        <input type="submit" value="Submit">
    </form>
</div>
