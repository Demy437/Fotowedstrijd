@extends('images.layout')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 Image upload</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('images.create') }}"> Create New image</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($images as $image)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src="/image/{{ $image->image }}" width="100px"></td>
            <td>{{ $image->name }}</td>
            <td>{{ $image->detail }}</td>
            <td>
                <form action="{{ route('images.destroy',$image->id) }}" method="POST">
     
                    <a class="btn btn-info" href="{{ route('images.show',$image->id) }}">Show</a>
      
                    <a class="btn btn-primary" href="{{ route('images.edit',$image->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $images->links() !!}
        
@endsection