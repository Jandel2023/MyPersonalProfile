
@extends('layouts/app')

@section('content')
             <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            {{-- <i class="fa fa-chart-line fa-3x text-primary"></i> --}}
                            <i class="bi bi-person-bounding-box fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Spectator</p>
                                <h6 class="mb-0">{{$countspectator}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="bi bi-diagram-3 fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Projects</p>
                                <h6 class="mb-0">4</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="bi bi-person-lines-fill fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Testimonials</p>
                                <h6 class="mb-0">{{$counttestimonials}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="bi bi-card-text fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Certificates</p>
                                <h6 class="mb-0">6</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container-fluid pt-4 px-4">
                <div class="row">
                    <div class="col-md-12">

                        <h3 class="progress-title">HTML</h3>
                        <div class="progress">
                            <div class="progress-bar" style="width:45%; background:rgb(2, 74, 2);">45%</div>
                        </div>
                        <h3 class="progress-title">CSS</h3>
                        <div class="progress">
                            <div class="progress-bar" style="width:25%; background:rgb(2, 74, 2);">25%</div>
                        </div>
                        <h3 class="progress-title">JAVASCRIPT</h3>
                        <div class="progress">
                            <div class="progress-bar" style="width:25%; background:rgb(2, 74, 2);">20%</div>
                        </div>
                        <h3 class="progress-title">BOOTSTRAP</h3>
                        <div class="progress">
                            <div class="progress-bar" style="width:15%; background:rgb(2, 74, 2);">15%</div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- dashboard End -->

<style>
.progress-title {
    font-size: 16px;
    font-weight: 700;
    color: #333;
    margin: 0 0 20px
}

.progress {
    height: 20px;
    background: #333;
    border-radius: 0;
    box-shadow: none;
    margin-bottom: 30px;
    overflow: visible
}

.progress .progress-bar {
    position: relative;
    -webkit-animation: animate-positive 2s;
    animation: animate-positive 2s
}



.progress .progress-bar:after {
    content: "";
    display: inline-block;
    width: 10px;
    background: #fff;
    position: absolute;
    top: -10px;
    bottom: -10px;
    right: -5px;
    z-index: 1;
    transform: rotate(35deg)
}

h1 {
    text-align: center
}


</style>

@endsection
           