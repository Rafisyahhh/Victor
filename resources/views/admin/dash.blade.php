@extends('admin.master')

@section('content')
<h3>Dashboard</h3>
<div class="card">
  <div class="row">
    <div class="col-md-3">
      <div class="card mini-stats-wid">
        <div class="card-body">
          <div class="d-flex">
            <div class="flex-grow-1">
              <p class="text-muted fw-medium">User</p>
              <h4 class="mb-0">{{$u}}</h4>
            </div>
            <div class="flex-shrink-0 align-self-center">
              <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                <span class="avatar-title">
                  <i class="bx bx-user font-size-24"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card mini-stats-wid">
        <div class="card-body">
          <div class="d-flex">
            <div class="flex-grow-1">
              <p class="text-muted fw-medium">Perusahaan</p>
              <h4 class="mb-0">{{$p}}</h4>
            </div>
            <div class="flex-shrink-0 align-self-center">
              <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                <span class="avatar-title">
                  <i class="bx bxs-business font-size-24"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card mini-stats-wid">
        <div class="card-body">
          <div class="d-flex">
            <div class="flex-grow-1">
              <p class="text-muted fw-medium">Lowongan</p>
              <h4 class="mb-0">{{$l}}</h4>
            </div>
            <div class="flex-shrink-0 align-self-center">
              <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                <span class="avatar-title">
                  <i class="bx bxs-file-find font-size-24"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card mini-stats-wid">
        <div class="card-body">
          <div class="d-flex">
            <div class="flex-grow-1">
              <p class="text-muted fw-medium">Pelamar</p>
              <h4 class="mb-0">{{$lm}}</h4>
            </div>
            <div class="flex-shrink-0 align-self-center">
              <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                <span class="avatar-title">
                  <i class="bx bx-copy-alt font-size-24"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card-header">
    Jumlah Lowongan
  </div>
  <div class="card-body">
    <div id="chart-vacancy"></div>

  </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
  var options = {
    series: [{
      name: 'lowongan',
      data: [@foreach($lowonganPerusahaan as $p)
        '{{$p->jumlah_lowongan}}',
        @endforeach
      ]
    }],
    chart: {
      type: 'bar',
      height: 350
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: '55%',
        endingShape: 'rounded'
      },
    },
    dataLabels: {
      enabled: false
    },
    stroke: {
      show: true,
      width: 2,
      colors: ['transparent']
    },
    xaxis: {
      categories: [@foreach($pp as $p)
        '{{$p->nama_perusahaan}}',
        @endforeach
      ],
    },
    yaxis: {
      title: {
        text: 'lowongan'
      }
    },
    fill: {
      opacity: 1
    },
    tooltip: {
      y: {
        formatter: function(val) {
          return val + " lowongan"
        }
      }
    }
  };

  var chart = new ApexCharts(document.querySelector("#chart-vacancy"), options);
  chart.render();
</script>
@endsection