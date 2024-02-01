@extends('admin.admin_master')
@section('admin')


<div class="d-flex justify-content-between mb-3">
    <h3>Welcome : {{Auth::user()->name }} </h3>
    <h3>Total Of Categories : {{count( $brands)}} </h3>
</div>

<div class="row mt-3">
    <div class="col-md-8">
        <h3 class="text-center mb-3 text-dark"> All Brands</h3>

         <!-- alret for addition -->
        @if (session('success'))
        <h4  class="alert alert-success my-3"> {{session('success')}}</h4>
        @endif



        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Process</th>
                </tr>
            </thead>

            <tbody>
        @php($i=1)
            @foreach ($brands as $brand)
            <tr>
                <td scope="row">{{$i++}}</td>
                <td>{{$brand->brand_name}}</td>
                <td><img src="{{$brand->brand_image}}" style="width: 50px; height: 50px;"></td>
                <td>{{$brand->created_at->diffForHumans()}}</td>
                <td class="text-center">
                    <a href="{{route('Brands.edit',$brand->id)}}" class="btn btn-success">Edit</a>
                    <a href="{{route('Brands.delete',$brand->id)}}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
<div>
    {{ $brands->links() }}

</div>

    </div><!-- col 8 -->


    <div class="col-md-4">

        <div class="card p-3 text-center">
                <div class="card-header">
                      <h3 class="text-center mb-3 text-dark"> Add Brand</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('Brands.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @error('brand_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" name="brand_name" class="form-control form-control-lg mb-3" placeholder="brandname">
                        <input type="file" name="brand_image" class="form-control form-control-lg mb-3" >
                        <button type="submit" class="btn btn-primary">Add Brand</button>
                  </form>
                </div>


        </div><!-- card -->
    </div><!-- col 4 -->
</div><!-- row -->



@endsection
