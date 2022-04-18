<div class="form-group row">
    {{ Form::label('url', 'URL', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-10">
        {{ Form::text('url', null, [
            'class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''),
            'required'
        ]) }}
        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">接続申請</button>
        {{ link_to_route('back.connects.index', '一覧へ', null, ['class' => 'btn btn-secondary']) }}
    </div>
</div>

