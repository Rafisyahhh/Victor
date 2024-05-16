@extends('admin.master')
@section('content')
<div class="card">
    <div class="card-body">

        <h4 class="card-title mb-4">Bar Chart</h4>

        <div class="row text-center">
            <div class="col-4">
                <h5 class="mb-0">2541</h5>
                <p class="text-muted text-truncate">Activated</p>
            </div>
            <div class="col-4">
                <h5 class="mb-0">84845</h5>
                <p class="text-muted text-truncate">Pending</p>
            </div>
            <div class="col-4">
                <h5 class="mb-0">12001</h5>
                <p class="text-muted text-truncate">Deactivated</p>
            </div>
        </div>

        <canvas id="bar" data-colors="[&quot;--bs-success-rgb, 0.8&quot;, &quot;--bs-success&quot;]" height="300" width="473" style="display: block; box-sizing: border-box; height: 300px; width: 473px;"></canvas>

    </div>
</div>
@endsection