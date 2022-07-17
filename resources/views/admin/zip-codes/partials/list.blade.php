@if($zip_codes->count() > 0)
    @foreach ($zip_codes as $zip_code)
    <tr>
        <th scope="row">
            {{ $loop->iteration }}
        </th>
        <td class="budget">
            {{ $zip_code->zip_code}}
        </td>
        <td class="budget">
            {{ $zip_code->reason_code ? $zip_code->reason_code->reason_code : ''}}
        </td>
        <td class="budget">
            {{ $zip_code->status ? $zip_code->status->status : '' }}
        </td>
        <td class="actions">
            <a href="{{ route('zip-codes.edit', ['zip_code' => $zip_code]) }}">
                <i style="font-size: 25px;" class="mr-5 fa fa-pencil" title="Edit Zip Code"></i>
            </a>
            <i style="font-size: 25px;" class="fa fa-trash cursor-pointer ask-before-delete" type="submit" title="Delete Zip Code"></i>
            <form action="{{ route('zip-codes.destroy', ['zip_code' => $zip_code]) }}" method="POST">
                @csrf
                @method('DELETE')
            </form>
        </td>
    </tr>
    @endforeach
@else
<tr colspan="4">
    <td>
        <b>No Zip Code Available</b>
    </td>
</tr>
@endif
