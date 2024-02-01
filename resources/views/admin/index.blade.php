@extends('admin.admin_master')
 @section('admin')
   <!-- Top Statistics -->
    <div class="row">

        <div class="col-xl-3 col-sm-6">
            <div class="card card-mini mb-4">
              <div class="card-body">
                <h2 class="mb-1">{{\App\Models\User::count()}}</h2>
                <p>Users</p>
                <div class="chartjs-wrapper">
                  <canvas id="line"></canvas>
                </div>
              </div>
            </div>
          </div>



        <div class="col-xl-3 col-sm-6">
          <div class="card card-mini mb-4">
            <div class="card-body">
              <h2 class="mb-1">{{\App\Models\Category::count()}}</h2>
              <p>Categories</p>
              <div class="chartjs-wrapper">
                <canvas id="barChart"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card card-mini  mb-4">
            <div class="card-body">
              <h2 class="mb-1">{{ \App\Models\Brand::count()}}</h2>
              <p>Brands</p>
              <div class="chartjs-wrapper">
                <canvas id="dual-line"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card card-mini mb-4">
            <div class="card-body">
              <h2 class="mb-1">{{\App\Models\Category::count('deleted_at')}}</h2>
              <p>Archived</p>
              <div class="chartjs-wrapper">
                <canvas id="area-chart"></canvas>
              </div>
            </div>
          </div>
        </div>

      </div>


           

 @endsection
