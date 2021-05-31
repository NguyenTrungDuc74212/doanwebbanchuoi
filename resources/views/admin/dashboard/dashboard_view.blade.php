@extends('layout.admin_layout')
@push('title')
<title>Admin</title>
@endpush
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Quản lý thống kê</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard v1</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="container">
  <h1 class="text-center"></h1>
  <hr>
  <div class="row">
    <div class="col-lg-12 text-center">
      <h3 class="text-center" style="color: #d46709;padding: 20px;">Thống kê doanh thu</h3>
    </div>
  </div>
  
  <form autocomplete="off">
    @csrf
    <div class="row">
      <div class="col-lg-4">
        <p>Từ ngày: <input type="text" id="datepicker3" class="form-control"></p>
      </div>
      <div class="col-lg-4">
        <p>Đến ngày: <input type="text" id="datepicker4" class="form-control"></p>
      </div>
      <div class="col-lg-2">
        <p>
          Lọc theo:
          <select class="admin_filter form-control">
            <option>---chọn---</option>
            <option value="1tuan">1 tuần qua</option>
            <option value="thangtruoc">Tháng trước</option>
            <option value="thangnay">Tháng này</option>
            <option value="1namqua">1 năm qua</option>
          </select>
        </p>
      </div>
      <div class="col-lg-2">
        <input type="button" id="btn-dashboard-filter" value="lọc kệt quả" class="btn btn-primary" style="margin: 24px -12px;">
      </div>
    </div>
  </form>
  <div class="col-lg-12">
    <div id="chart" style="height: 250px;"></div>
  </div>
  <h3 class="text-center" style="color: #d46709;padding: 20px;">Thống kê truy cập</h3>
    <table class="table table-bordered table-dark" style="background: #292424">
      <thead>
        <tr>
          <th scope="col">Đang online</th>
          <th scope="col">Tổng tháng trước</th>
          <th scope="col">Tổng tháng này</th>
          <th scope="col">Tổng 1 năm</th>
          <th scope="col">Tổng truy cập</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{ $visitor_count_online }}</td>
          <td>{{ $visitor_lastmonth_count }}</td>
          <td>{{ $visitor_thismonth_count }}</td>
          <td>{{ $visitor_oneyear_count }}</td>
          <td>{{ $visitors_total }}</td>
        </tr>
      </tbody>
    </table>
</div>
<!-- /.content -->
@stop