<table>
    <thead>
    <tr>
        <th>
            Job Name</th>
        <th>Company</th>
    </tr>
    </thead>
    <tbody>
    @foreach($experiences as $experience)
        <tr>
            <td>{{ $experience->job }}</td>
            <td>{{ $experience->company }}</td>
        </tr>
    @endforeach
    </tbody>
</table>