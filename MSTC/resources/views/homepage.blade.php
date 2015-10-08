<!DOCTYPE html>
<html>
    <head>
        <title>Microsoft Student Tech Club - Alexandria University</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
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
                    {!! Form::text('email', null, ['class'=>'form-control input-lg']) !!}
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
