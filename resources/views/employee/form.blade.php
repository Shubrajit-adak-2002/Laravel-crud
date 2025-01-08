<form action="{{route('employee.form')}}" method="post" enctype="multipart/form-data">
    @csrf
    Name: <input type="text" name="name" id=""><br>
    Email: <input type="email" name="email" id=""><br>
    <input type="file" name="image" id=""><br>
    Salary: <input type="text" name="salary" id=""><br>
    <button>Submit</button>
</form>
