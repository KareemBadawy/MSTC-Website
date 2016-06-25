<!-- resources/views/contactus.blade.php -->
<!--Contact us-->
<div id="contact" class="container-fluid fill supreme-container" style="background-color: white">
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 wow animated fadeInDown"style="text-align: center;font-size: 36px;padding-top: 40px">Contact Us</div>
                <div class="col-md-9"></div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="container-fluid" style="padding-top: 40px;padding-bottom: 40px">

            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    {!! Form::open(['url' => 'contactus']) !!}
                        <div class="form-group wow animated fadeInLeft">
                        	{!! Form::text('name', null, ['class'=>'form-control input-lg', 'id' => 'name','placeholder'=>'Name','data-validate'=>'required']) !!}
                        </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">
                        <div class="form-group wow fadeInRight">
                        	{!! Form::text('email', null, ['class'=>'form-control input-lg', 'id' => 'email','placeholder'=>'Email','data-validate'=>'required|email']) !!}
                        </div>
                </div>
            </div>

            <div class="row"style="padding-top: 30px">
                <div class="col-md-1"></div>
                <div class="col-md-11">
                        <div class="form-group wow fadeInUpBig">
                        	{!! Form::text('title', null, ['class'=>'form-control input-lg', 'id' => 'pwd','placeholder'=>'Title','data-validate'=>'required']) !!}
                        </div>
                </div>
            </div>

            <div class="row"style="padding-top: 30px">
                <div class="col-md-1"></div>
                <div class="col-md-11">
                        <div class="form-group wow zoomIn">
                        	{!! Form::textarea('msg', null, ['class'=>'form-control input-lg', 'rows' => '10', 'id' => 'comment','placeholder'=>'Message','data-validate'=>'required|min:5']) !!}
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-2">
                    {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-lg wow rotateInUpLeft', 'style' => 'color: white']) !!}
                </div>
                <div class="col-md-5"></div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
