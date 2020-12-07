<h1>Emp</h1>

<table>
    <tr>
        <td>Id</td>
        <td>Name</td>
        <td>Surname</td>
    </tr>
    @foreach ($employees as $employee)
    <tr>
        <td>{{$employee['emp_id']}}</td>
        <td>{{$employee['emp_name']}}</td>
        <td>{{$employee['emp_surname']}}</td>
    </tr>
    @endforeach
</table>
