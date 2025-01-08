<form action="{{route('employee.update')}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{$employee->id}}">
    Name: <input type="text" name="name" value="{{$employee->name}}"><br>
    Email: <input type="email" name="email" value="{{$employee->email}}"><br>
    <input type="file" name="image" value="{{$employee->image}}"><br>
    Salary: <input type="text" name="salary" value="{{$employee->salary}}"><br>
    <button>Submit</button>
</form>
