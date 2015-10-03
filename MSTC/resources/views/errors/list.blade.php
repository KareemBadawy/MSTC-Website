@if ($errors->any())
    <ul class = "alert alert-danger">
    	<strong>Whoops!</strong> There were some problems with your input.<br><br>
        @foreach ($errors->all() as $error)
        	<li> {{ $error }} </li>
        @endforeach
    </ul>
@endif