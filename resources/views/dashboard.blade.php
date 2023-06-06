<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<style type="text/css">
    button {
        background-color: #0d6efd !important;
    }
    .row{
        padding: 20px;
    }
    .file-button{
        margin-top: 10px;
    }
    .main-set{
        margin-bottom:20px;
    }
    .thumbnail{
        position: relative;
    }
    .del-form{
        display: block;
    position: absolute;
    top: 0px;
    right: 0px;
    }

</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gallery Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">

    <h1 class="text-2xl font-medium text-gray-900">
        Add Images
    </h1>
    <div>
                   <form action="{{ url('dashboard') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">


        {!! csrf_field() !!}


        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            <!-- <button type="button" class="close" data-dismiss="alert">×</button> -->
        </div>
        @endif


        <div class="row">
            <div class="col-md-5">
              
                <input type="text" name="title" class="form-control" placeholder="Title">
            </div>
            <div class="col-md-5">
               
                <input type="file" name="image" class="form-control file-button">
            </div>
            <div class="col-md-12">
                <br/>
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </div>


    </form> 

    </div>

</div>
<div class="row">

    @if($images->count())
    @if($images->count()==1)

    @foreach($images as $image)
  <div class="col-md-4 offset-md-4 main-set">
    <div class="thumbnail">
      <a href="/images/{{ $image->image }}">
        <img  src="/images/{{ $image->image }}" alt="{{ $image->title }}" class="img-fluid">
        <div class="caption">
          <p>{{ $image->title }}</p>

        </div>
      </a>
       <form class="del-form" action="{{ url('dashboard',$image->id) }}" method="POST">
                    <input type="hidden" name="_method" value="delete">
                    {!! csrf_field() !!}
                    <button type="submit" class="close-icon btn btn-danger">X</button>
                    </form>
    </div>
  </div>
@endforeach

    @else
     @foreach($images as $image)
  <div class="col-md-4 main-set">
    <div class="thumbnail">
      <a href="/images/{{ $image->image }}">
        <img  src="/images/{{ $image->image }}" alt="{{ $image->title }}" class="img-fluid">
        <div class="caption">
          <p>{{ $image->title }}</p>

        </div>
      </a>
       <form class="del-form" action="{{ url('dashboard',$image->id) }}" method="POST">
                    <input type="hidden" name="_method" value="delete">
                    {!! csrf_field() !!}
                    <button type="submit" class="close-icon btn btn-danger">X</button>
                    </form>
    </div>
  </div>
@endforeach
 
            @endif
            @endif


</div>   </div>
        </div>
    </div>
</x-app-layout>
