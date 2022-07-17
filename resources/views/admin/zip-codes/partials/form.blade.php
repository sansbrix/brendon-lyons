{!! Form::model($zipCode, ((!empty($zipCode)) ?
['method' => 'PATCH', 'route' => ['zip-codes.update', ['zip_code' => $zipCode]],
'enctype' => 'multipart/form-data'] :
['method' => 'POST',
'route' => ['zip-codes.store'],
'enctype' => 'multipart/form-data'])) !!}
    <div class="form-group row">
        <label for="categoryName" class="col-sm-2 col-form-label">Zip Code</label>
        <div class="col-sm-10">
            {{Form::text('zip_code', null, ['class' => 'form-control '.($errors->has('zip_code') ? 'is-invalid':''),
                                        'id'=>'zip_code', 'placeholder' => 'Zip Code', 'required' => '']) }}
            @if ($errors->has('zip_code'))
            <span class="invalid-feedback" style="display: block;" role="alert">
                <strong>{{ $errors->first('zip_code') }}</strong>
            </span>
            @endif
        </div>

    </div>
    <div class="form-group row">
        <label for="reason_code_id" class="col-sm-2 col-form-label">Reason Code</label>
        <div class="col-sm-10">
            <select class="form-control" name="reason_code_id">
                <option value="">Select Reason Code</option>
                @foreach($reason_codes as $reason_code)
                    <option @if($zipCode && $reason_code->id == $zipCode->reason_code_id) selected @endif value="{{$reason_code->id}}">{{$reason_code->reason_code}}</option>
                @endforeach
            </select>
            @if ($errors->has('reason_code_id'))
            <span class="invalid-feedback" style="display: block;" role="alert">
                <strong>{{ $errors->first('reason_code_id') }}</strong>
            </span>
            @endif
            <a href="{{ route('reason-codes.create') }}">Reason Code, Not Available ! Click Here </a>
        </div>
    </div>
    <div class="form-group row">
        <label for="reason_code_id" class="col-sm-2 col-form-label">Status</label>
        <div class="col-sm-10">
            <select class="form-control" name="status_id">
                <option value="">Select Status</option>
                @foreach($statuses as $status)
                    <option @if($zipCode && $status->id == $zipCode->status_id) selected @endif value="{{$status->id}}">{{$status->status}}</option>
                @endforeach
            </select>
            @if ($errors->has('status_id'))
            <span class="invalid-feedback" style="display: block;" role="alert">
                <strong>{{ $errors->first('status_id') }}</strong>
            </span>
            @endif
            <a href="{{ route('status.create') }}">Status, Not Available ! Click Here </a>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12 text-right">
            <button type="submit" class="btn btn-default">{{ isset($zipCode) ? 'Update' : 'Save'}} Zip Code</button>
        </div>
    </div>
{!! Form::close() !!}
