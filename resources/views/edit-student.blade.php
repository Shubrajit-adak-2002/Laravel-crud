<div>
    <form action="{{route('student.update')}}" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{$student->id}}">
        Name: <input type="text" name="name" value="{{$student->name}}"><br>
        Email: <input type="text" name="email" value="{{$student->phone}}"><br>
        Phone: <input type="text" name="phone" value="{{$student->email}}"><br>
        <input type="submit" value="Submit">
    </form>
</div>
