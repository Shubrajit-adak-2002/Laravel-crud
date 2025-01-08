<div>
    <table border="2">
        <thead>
            <tr>
                <th>Student No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td><a href="{{ route('student.edit', ['id' => $student->id]) }}">Edit</a> |
                        <form action="{{ route('student.delete', ['id' => $student->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button style="background: none; border: none; cursor: pointer;">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
