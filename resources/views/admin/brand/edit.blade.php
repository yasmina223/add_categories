@extends('admin.admin_master')
@section('admin')

<div class="d-flex justify-content-between mb-3">
    <h3>Welcome : {{Auth::user()->name }} </h3>

</div>


        <div class="card p-3 text-center">
                <div class="card-header">
                      <h3 class="text-center mb-3 text-dark"> Edit Brand</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('Brands.update',$brands->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @error('brand_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" name="brand_name"  value="{{$brands->brand_name}}" class="form-control form-control-lg mb-3" placeholder="brandname">
                        <input type="file" name="brand_image" class="form-control form-control-lg mb-3" >
                        <button type="submit" class="btn btn-primary">Edit Brand</button>
                  </form>
                </div>


        </div><!-- card -->




@endsection
