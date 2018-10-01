<thead id="t-head">
<tr>

    @foreach($cols as $col)

        @if($col['status'] == 1)
            @if(strcasecmp($col['key'],'campaignName') == 0)
                <th class="string">
                    {{ $col['label'] }}
                </th>
            @elseif(strcasecmp($col['type'],'double') == 0)
                <th class="double">
                    {{ $col['label'] }}
                </th>
            @else
                <th>
                    {{ $col['label'] }}
                </th>
            @endif
        @endif

    @endforeach

</tr>
</thead>
<tbody id="t-body">
@foreach($result['rows'] as $row)
    <tr>
        @foreach($cols as $col)
            @if($col['status'] == 1)
                @if(strcasecmp($col['key'],'campaignName') == 0)
                    <th class="string">
                        {{ $row[$col['key']] }}
                    </th>
                @elseif(strcasecmp($col['type'],'double') == 0)
                    <th class="double">
                        {{ $row[$col['key']] }}
                    </th>
                @else
                    <td>
                        {{ $row[$col['key']] }}
                    </td>
                @endif
            @endif
        @endforeach
    </tr>

@endforeach
</tbody>
