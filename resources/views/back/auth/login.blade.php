<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, intial-scale=1">
        <title>ログイン</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous">
    </head>
    <body>
        <div id="app">
            <div class="container">
                <div class="row justify-content-center mt-5">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">ログイン</div>
                            <div class="card-body">
                                {{ Form::open(['route' => 'login']) }}
                                    <div class="form-group">
                                        {{ Form::label('name', 'ユーザー') }}
                                        {{ Form::text('name', null, [
                                            'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')
                                        ]) }}
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('password', 'パスワード') }}
                                        {{ Form::password('password', [
                                            'class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : '')
                                        ]) }}
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary">ログイン</button>
                                    </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
    </body>
</html>