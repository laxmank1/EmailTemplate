@include('headers::header')


  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Email Template</li>
      </ol>
    <div class="row">
    <div class="col-lg-12 margin-tb">
    <div class="pull-left">
    <h2></h2>
    </div>
    <div class="pull-right">
    <a class="btn btn-success" href="{{ route('add') }}"> Add New Email Template</a>
    </div>
    </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
    <p>{{ $message }}</p>
    </div>
    @endif
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Email</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0"> 

              <thead class="thead-inverse">
                <tr>
                  <th>Template Name</th>
                  <th>Subject</th>
                  <th>Created</th>
                   <th>Actions</th>
                  
                </tr>
              </thead>
              <tfoot class="thead-inverse">
                <tr>
              <th> Template Name</th>
                  <th>Subject</th>
                  <th>Created</th>
                   <th>Actions</th>
                 
                </tr>
              </tfoot>
              <tbody>
               @foreach ($items as $key => $item)

                <tr>
                  <td>{{$item->name}}</td>
                  <td>{{$item->subject}}</td>
                  <td>{{$item->created_at}}</td>
                  <td>
                    <a class="btn btn-info" href="{{ route('emails.edit',$item->id) }}">Edit</a>
              
                    {{ Form::open(['route' => ['destroy', $item->id], 'method' => 'delete','style'=>'display:inline']) }}
                      {{ Form::hidden('id', $item->id) }}

                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                  </td>
                </tr>
      
               
                 @endforeach
               
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>

    @include('footers::footer')
   