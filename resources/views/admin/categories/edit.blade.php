@extends('admin.admin_master')
@section('admin')


<div class="d-flex justify-content-between mb-3">
    <h3>Welcome : {{Auth::user()->name }} </h3>
</div>


        <div class="card p-3 text-center">
                <div class="card-header">
                      <h3 class="text-center mb-3 text-dark"> Edit Category</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('category.update',$categories->id)}}" method="post">
                        @csrf
                        @error('category_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" name="category_name" value="{{$categories->category_name}}" class="form-control form-control-lg mb-3" placeholder="category name">
                        <button type="submit" class="btn btn-primary">Update Category</button>
                  </form>
                </div>


        </div><!-- card -->





@endsection
