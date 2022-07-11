@if($reasonCodes->count() > 0)
    @foreach ($reasonCodes as $reasonCode)
    <tr>
        <th scope="row">
            {{ $loop->iteration }}
        </th>
        <td class="budget">
            {{ $reasonCode->reason_code}}
        </td>
        <td class="actions">
            <a href="{{ route('reason-codes.edit', ['reason_code' => $reasonCode]) }}">
                <i style="font-size: 25px;" class="mr-5 fa fa-pencil" title="Edit Reason Code"></i>
            </a>
            <i style="font-size: 25px;" class="fa fa-trash cursor-pointer ask-before-delete" type="submit" title="Delete Reason Code"></i>
            <form action="{{ route('reason-codes.destroy', ['reason_code' => $reasonCode]) }}" method="POST">
                @csrf
                @method('DELETE')
            </form>
        </td>
    </tr>
    @endforeach
@else
<tr colspan="4">
    <td>
        <b>No Reason Code Available</b>
    </td>
</tr>
@endif
