
  @include('headers::header')
      <div class="container">
        
        <div class="card card-login mx-auto mt-5">
          <div class="card-header">Send Email </div>

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
            <a href="{{ route('emailt') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Update</li>
          </ol>

          <div class="card-body">
                {!! Form::model($item, ['route'=>'emails.update','name'=>'EmailForm',"id"=>"EmailForm"]) !!}



            <div class="form-group name {{ $errors->has('name') ? 'has-error' : '' }}">
                {!! Form::label('Name:') !!}
                {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Enter Name','id'=>"name",]) !!}

                 {{ Form::hidden('id', $item->id) }}

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
                <button class="btn btn-primary" id="send">Update!</button>
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
              $('#EmailTemplate').change(function(e)
              {
                e.preventDefault();

                $templateId = $(this).val();
                  if($templateId == "New"){
                     CKEDITOR.instances.message.setData('');
                     $("#subject").val('');
                     $(".emailFrom").hide();
                     $(".emailTo").hide();
                     $("#send").hide();
                     $("#add").text("Add!");
                    return false;
                   }
                    $(".emailFrom").show();
                    $(".emailTo").show();
                    $("#send").show();
                    $("#add").text("Update!");


                  $.ajax
                  ({
                    url: '{{ url('getEmailDetails') }}/'+$templateId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data)
                    {

                      data = JSON.parse(JSON.stringify(data));  
                     
                      $("#subject").val(data['subject']);
                      CKEDITOR.instances.message.setData( data['message']);
                    }
                  });
              });


                $.ajax
                ({
                  url: '{{ url('getEmailTemplateList') }}',
                  type: 'GET',
                  dataType: 'json',
                  success: function(data)
                  {

                    data = JSON.parse(JSON.stringify(data));  
                    console.log(data);
                   $.each( data, function( key, value ) {
                    
                      $('<option value="'+value['id']+'">'+value['subject']+'</option>').prependTo('#EmailTemplate');
                    })

                  }
                });


        </script>
    </body>

    </html>
