<table border="2">
    <thead>
        <th>Name</th>
        <th>Email</th>
        <th>Image</th>
        <th>Salary</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->email }}</td>
                <td>
                    @if ($employee->image)
                        <img src="{{ $employee->image }}" alt="">
                    @else
                        No image available
                    @endif
                </td>
                <td>{{ $employee->salary }}</td>
                <td><a href="{{route('employee.edit',['id'=>$employee->id])}}">Edit</a>
                    <form action="{{route('employee.delete',['id'=>$employee->id])}}" method="post">
                        @csrf
                        @method("DELETE")
                        <button>Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
