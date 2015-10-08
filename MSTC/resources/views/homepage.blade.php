<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Welcome to MSTC-Alex</div>
            </div>
        </div>
        <hr/>
        <div class="container" width="100%">
            {!! Form::open(['url' => '/']) !!}
                <div class="form-group">
                    {!! Form::label('email', 'Write Email Here:') !!}
                    {!! Form::text('email', null, ['class'=>'form-control']) !!}
                </div>
                <div class = "form-group">
                    {!! Form::submit('Subscribe', ['class' => 'btn btn-primary form-control']) !!}
                </div>
            {!! Form::close() !!}

            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
            @endif
        </div>
    </body>
</html>
