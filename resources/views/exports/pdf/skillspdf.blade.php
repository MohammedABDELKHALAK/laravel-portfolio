
<table>
    <tbody>
        @foreach ($skills as $skill)
        <tr>
            <th scope="row"> {{ $skill->id }}</th>
    
        </tr>
        <td>{{ $skill->title }}</td>
        @endforeach
    </tbody>
</table>
