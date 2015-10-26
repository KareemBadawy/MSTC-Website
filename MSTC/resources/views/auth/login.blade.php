<!-- resources/views/auth/login.blade.php -->
<!-- Sign in -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title" style="text-align: center">Member Login</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    {!! Form::open(['url' => '/auth/login', 'id'=>'reg-form', 'autocomplete'=>'off']) !!}
                    {!! csrf_field() !!}

                        <input class="form-control input-lg" value="{{ old('email') }}" data-validate="required" id="email" type="email" name="email" placeholder="Email"><br>
                        <input class="form-control input-lg" value="" data-validate="required,min(6)" id="password" type="password" name="password" placeholder="Password"><br>
                        <input class="btn btn-lg btn-warning btn-group-justified" id="bo" type="submit" value="Login" style="display : block; margin : auto;">
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
</div>