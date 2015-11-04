<!-- resources/views/subscribtions/subscribe.blade.php -->
<!--Subscribe-->
<div class="container-fluid supreme-container" style="border-top:solid #eeeeee;border-top-width:1px;height:15%;background-color: white;display:flex;justify-content:center;align-items:center;">
    <div class="container">
        <div class="container-fluid">
            <p style="text-align: center;font-size: 16px;padding-top: 10px">
                Please write your email here so you can get our latest news via email.
            </p>
    <div class="row wow slideInDown">
        <div class="col-md-2"></div>
        <div class="col-md-6">
            {!! Form::open(['url' => 'subscribe']) !!}
                <div class="form-group">
                    {!! Form::text('email', null, ['class'=>'form-control input','placeholder'=>'Email','data-validate'=>'required,email']) !!}
                </div>

        </div>
        <div class="col-md-2">
            <div class = "form-group">
            {!! Form::submit('Subscribe', ['class' => 'btn btn2-primary2 form-control submit']) !!}
            </div>
            {!! Form::close() !!}
        </div>
        <div class="col-md-2"></div>
    </div>
        </div>
    </div>
</div>