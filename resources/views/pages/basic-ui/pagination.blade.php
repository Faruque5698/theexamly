@extends('layout.master')

@section('content')
<div class="row">
  <div class="col-md-4 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Basic Paginations</h4>
        <p class="card-description">Default bordered pagination</p>
        <nav>
          <ul class="pagination flex-wrap">
            <li class="page-item"><a class="page-link" href="#"><i class="ti-angle-left"></i></a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#"><i class="ti-angle-right"></i></a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
  <div class="col-md-4 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Flat Pagination</h4>
        <p class="card-description">Add calss <code>.pagination-flat</code></p>
        <nav>
          <ul class="pagination flex-wrap pagination-flat pagination-success">
            <li class="page-item"><a class="page-link" href="#"><i class="ti-angle-left"></i></a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#"><i class="ti-angle-right"></i></a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
  <div class="col-md-4 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Separated  Pagination</h4>
        <p class="card-description">Add calss <code>.pagination-separated</code></p>
        <nav>
          <ul class="pagination flex-wrap pagination-separated pagination-danger">
            <li class="page-item"><a class="page-link" href="#"><i class="ti-angle-left"></i></a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#"><i class="ti-angle-right"></i></a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
  <div class="col-md-4 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Bordered Rounded</h4>
        <p class="card-description">Add calss <code>.pagination-rounded</code></p>
        <nav>
          <ul class="pagination flex-wrap pagination-rounded">
            <li class="page-item"><a class="page-link" href="#"><i class="ti-angle-left"></i></a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#"><i class="ti-angle-right"></i></a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
  <div class="col-md-4 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Flat Rounded Pagination</h4>
        <p class="card-description">Add calss <code>.pagination-rounded-flat</code></p>
        <nav>
          <ul class="pagination flex-wrap pagination-rounded-flat pagination-success">
            <li class="page-item"><a class="page-link" href="#"><i class="ti-angle-left"></i></a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#"><i class="ti-angle-right"></i></a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
  <div class="col-md-4 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Separated Rounded</h4>
        <p class="card-description">Add calss <code>.pagination-rounded-separated</code></p>
        <nav>
          <ul class="pagination flex-wrap pagination-rounded-separated pagination-danger">
            <li class="page-item"><a class="page-link" href="#"><i class="ti-angle-left"></i></a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#"><i class="ti-angle-right"></i></a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
  <div class="col-md-4 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Left Position</h4>
        <p class="card-description">Left Pagination</p>
        <nav>
          <ul class="pagination flex-wrap">
            <li class="page-item"><a class="page-link" href="#"><i class="ti-angle-left"></i></a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#"><i class="ti-angle-right"></i></a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
  <div class="col-md-4 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Center Position</h4>
        <p class="card-description">Centered Pagination</p>
        <nav>
          <ul class="pagination d-flex flex-wrap justify-content-center pagination-success">
            <li class="page-item"><a class="page-link" href="#"><i class="ti-angle-left"></i></a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#"><i class="ti-angle-right"></i></a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
  <div class="col-md-4 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Right Position</h4>
        <p class="card-description">Right Pagination</p>
        <nav>
          <ul class="pagination d-flex flex-wrap justify-content-end pagination-danger">
            <li class="page-item"><a class="page-link" href="#"><i class="ti-angle-left"></i></a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#"><i class="ti-angle-right"></i></a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div>
@endsection