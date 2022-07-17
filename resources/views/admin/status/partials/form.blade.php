{!! Form::model($status, ((!empty($status)) ?
    ['method' => 'PATCH', 'route' => ['status.update', ['status' => $status]],
    'enctype' => 'multipart/form-data'] :
    ['method' => 'POST',
    'route' => ['status.store'],
    'enctype' => 'multipart/form-data'])) !!}
        <div class="form-group row">
            <label for="categoryName" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
                {{Form::text('status', null, ['class' => 'form-control '.($errors->has('status') ? 'is-invalid':''),
                                            'id'=>'status', 'placeholder' => 'Status', 'required' => '']) }}
                @if ($errors->has('status'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{ $errors->first('status') }}</strong>
                </span>
                @endif
            </div>

        </div>
        <div class="form-group row">
            <div class="col-sm-12 text-right">
                <button type="submit" class="btn btn-default">{{ isset($status) ? 'Update' : 'Save'}} Status</button>
            </div>
        </div>
    {!! Form::close() !!}
