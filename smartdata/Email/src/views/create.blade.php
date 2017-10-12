
@include('headers::header')
  <div class="container">


    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Add Email </div>
       

        <!-- Breadcrumbs-->
          <ol class="breadcrumb">
              <li class="breadcrumb-item">
              <a href="{{ route('emailt') }}">Dashboard</a>
              </li>
              <li class="breadcrumb-item active">Add</li>
          </ol>
          
           @if (\Session::has('success'))
                <div class="alert alert-success">
                <ul>
                <li>{!! \Session::get('success') !!}</li>
                </ul>
        </div>
          @endif
      <div class="card-body">
         {!! Form::open(['route'=>'emails.add','name'=>'EmailForm',"id"=>"EmailForm"]) !!}


        <div class="form-group name {{ $errors->has('name') ? 'has-error' : '' }}">
            {!! Form::label('Name:') !!}
            {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Enter Name','id'=>"name",]) !!}
            <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>

        <div class="form-group {{ $errors->has('subject') ? 'has-error' : '' }}">
        {!! Form::label('Subject:') !!}
        {!! Form::text('subject', old('subject'), ['class'=>'form-control', 'placeholder'=>'Enter subject','id'=>"subject"]) !!}
        <span class="text-danger">{{ $errors->first('subject') }}</span>
        </div>
        <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
            {!! Form::label('Template:') !!}
            {!! Form::textarea('message', old('message'), ['class'=>'form-control', 'placeholder'=>'Enter Message', 'id'=>"message"]) !!}
            <span class="text-danger">{{ $errors->first('message') }}</span>
        </div>

        <div class="form-group">
            <button class="btn btn-primary" id="send">Add!</button>
            {{ Form::reset('Reset!', ['class' => 'form-button btn btn-primary' ]) }}

        </div>
         
      {!! Form::close() !!}

      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="{{URL::asset('smartdata/assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{URL::asset('smartdata/assets/vendor/popper/popper.min.js')}}"></script>
  <script src="{{URL::asset('smartdata/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{URL::asset('smartdata/assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{URL::asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    <script src="{{URL::asset('vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>
    <script>
      
        CKEDITOR.replace( 'message' );





    </script>
  </body>

  </html>
