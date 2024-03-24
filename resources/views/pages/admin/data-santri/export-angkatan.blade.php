<table>
    <thead>
        <tr>
            @foreach ($header as $h)
                <th>{{ ucfirst($h) }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($santris as $s)
            <tr>
                @foreach ($header as $h)
                    <td>{{ $s[$h] }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
