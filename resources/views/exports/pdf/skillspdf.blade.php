
    <table class="table table-striped text-white my-2">
        <tr>
            <th>Skills </th>
        </tr>

        @foreach ($skills as $skill)
            <tr>
                <td>{{ $skill->title }}</td>
            </tr>
        @endforeach

    </table>

    <style>
        th{
            background-color: bisque;
        }

        td{
            background-color:aquamarine
        }

    </style>