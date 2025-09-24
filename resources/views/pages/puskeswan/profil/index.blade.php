@extends('layouts.app', ['id' => 'profil'])

@section('content')

    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4" >
        <div class="card-body px-4 py-3" style="background-color: #E6F5EF ">
          <div class="row align-items-center">
            <div class="col-9">
              <h4 class="fw-semibold mb-8">User Profile</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a class="text-muted text-decoration-none" href="../main/index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item" aria-current="page">User Profile</li>
                </ol>
              </nav>
            </div>
            <div class="col-3">
              <div class="text-center mb-n5">
                <img src="../assets/images/breadcrumb/ChatBc.png" alt="modernize-img" class="img-fluid mb-n4">
              </div>
            </div>
          </div>
        </div>
      </div>
      <img src="../assets/images/backgrounds/image.png" alt="modernize-img" class="img-fluid">
      <div class="row align-items-center">
        <div class="col-lg-4 order-lg-1 order-2">
          <div class="d-flex align-items-center justify-content-around m-4">
          </div>
        </div>
        <div class="col-lg-4 mt-n3 order-lg-2 order-1">
          <div class="mt-n5">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <div class="d-flex align-items-center justify-content-center round-110">
                <div class="border border-4 border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden round-100 profile-img-container" style="  width: 80px; height: 80px; ">
                  <img src="../assets/images/profile/image.png" alt="modernize-img" class="w-100 h-100 profile-img" style=" width: 100%; height: 100%; object-fit: cover;">
                </div>
              </div>
            </div>
            <div class="text-center">
              <h5 class="mb-0">{{ $profil_puskeswan->name }}</h5>
            </div>
          </div>
        </div>
      </div>
      <ul class="nav user-profile-tab justify-content-end mt-2  rounded-2 rounded-top-0" style="background-color: #E6F5EF ">
        <li class="nav-item" role="presentation">
            <a href="{{ route('profil-puskeswan.edit', ['profil_puskeswan' => auth()->id()]) }}" class="nav-link hstack gap-2 rounded-0 py-6"  aria-controls="pills-friends" aria-selected="false" tabindex="-1">
                <i class="ti ti-user-circle fs-5"></i>
                <span class="d-none d-md-block">Edit Profil</span>
            </a>
            
        </li>
      </ul>

      <div class="card-body">
       
        <div class="vstack gap-3 mt-4">
          <div class="hstack gap-6">
            <i class="ti ti-briefcase text-dark fs-6"></i>
            <h6 class=" mb-0">{{ $profil_puskeswan->name }}</h6>
          </div>
          <div class="hstack gap-6">
            <i class="ti ti-mail text-dark fs-6"></i>
            <h6 class=" mb-0">{{ $profil_puskeswan->email }}</h6>
          </div>
        </div>
      </div>
@endsection
