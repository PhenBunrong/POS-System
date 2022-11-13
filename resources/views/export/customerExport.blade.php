<h1>Customer Report</h1>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Gender</th>
            <th>Phone</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($customeres as $row)    
            <tr>
                <td>{{ $row->name}}</td>
                <td>{{ $row->email}}</td>
                <td>{{ $row->address}}</td>
                <td>{{ $row->gender}}</td>
                <td>{{ $row->phone}}</td>
            </tr>
        @endforeach
    </tbody>
</table>