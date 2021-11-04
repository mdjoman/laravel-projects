@extends('admin.master')
@section('body')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Mamage Brand</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i>  Mamage Brand</a>
    </div>
</div>  
<div class="row">
    <div class="col-sm-12 container">
       <div class="card card-body rounded-0">
       @if($message = Session::get('message'))
      <div class="alert alert-warning alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       {{ $message}}
      </div>
      @endif
           <div class="table-responsive ">
               <table  class="table table-bordered">
                   <tr>
                    <th>SL.NO</th>
                    <th>Brand Name</th>
                    <th>Brand Description</th>
                    <th>Publication Status</th>
                    <th>Action</th>
                   </tr>
                   @foreach($brands as $key => $brand)
                   <tr>
                       <td>{{ $loop->iteration}}</td>
                       <td>{{$brand->name}}</td>
                       <td>{{$brand->Description}}</td>
                       <td>{{$brand->status}}</td>
                       <td>
                       <a href="{{ route('edit-brand', [ 'id' => $brand->id])}}"class="btn btn-success">Edite</a>
                       <a href="{{ route('delete-brand', [ 'id' => $brand->id])}}"class="btn btn-danger">Delete</a>
                       </td>
                   </tr>
                   @endforeach
               </table>
           </div>
       </div>
    </div>
</div> 


@endsection