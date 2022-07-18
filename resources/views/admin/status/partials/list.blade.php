@if($statuses->count() > 0)
    @foreach ($statuses as $status)
    <tr>
        <th scope="row">
            {{ $loop->iteration }}
        </th>
        <td class="budget">
            {{ $status->status}}
        </td>
        <td class="actions">
            <a href="{{ route('status.edit', ['status' => $status]) }}">
                <i style="font-size: 25px;" class="mr-5 fa fa-pencil" title="Edit Status"></i>
            </a>
            @if($status->id != 1)
            <i style="font-size: 25px;" class="fa fa-trash cursor-pointer ask-before-delete" type="submit" title="Delete Status"></i>
            <form action="{{ route('status.destroy', ['status' => $status]) }}" method="POST">
                @csrf
                @method('DELETE')
            </form>
            @endif
        </td>
    </tr>
    @endforeach
@else
<tr colspan="4">
    <td>
        <b>No Status Available</b>
    </td>
</tr>
@endif
