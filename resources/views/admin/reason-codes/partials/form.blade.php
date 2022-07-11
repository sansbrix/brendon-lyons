{!! Form::model($reasonCode, ((!empty($reasonCode)) ?
    ['method' => 'PATCH', 'route' => ['reason-codes.update', ['reason_code' => $reasonCode]],
    'enctype' => 'multipart/form-data'] :
    ['method' => 'POST',
    'route' => ['reason-codes.store'],
    'enctype' => 'multipart/form-data'])) !!}
        <div class="form-group row">
            <label for="categoryName" class="col-sm-2 col-form-label">Reason Code</label>
            <div class="col-sm-10">
                {{Form::text('reason_code', null, ['class' => 'form-control '.($errors->has('reason_code') ? 'is-invalid':''),
                                            'id'=>'reason_code', 'placeholder' => 'Reason Code', 'required' => '']) }}
                @if ($errors->has('reason_code'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{ $errors->first('reason_code') }}</strong>
                </span>
                @endif
            </div>

        </div>
        <div class="form-group row">
            <div class="col-sm-12 text-right">
                <button type="submit" class="btn btn-default">{{ isset($reasonCode) ? 'Update' : 'Save'}} Reason Code</button>
            </div>
        </div>
    {!! Form::close() !!}
