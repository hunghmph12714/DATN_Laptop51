@extends('admin.layouts.main')
@section('content')
<div class="row">
  <div class="col">
    <div class="card">
      <!-- Card header -->
      <div class="card-header border-0">
        <h3 class="mb-0">Liên Hệ</h3>
      </div>
      <!-- Light table -->
      <div class="table-responsive">
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col">STT</th>
              <th scope="col" class="sort" data-sort="name">Họ tên</th>
              <th scope="col" class="sort" data-sort="phone">SDT</th>
              <th scope="col" class="sort" data-sort="email">Email</th>
              <th scope="col" class="sort" data-sort="descript">Nội Dung</th>
            </tr>
          </thead>
        </table>
      </div>

      <table class="table">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          {{-- @foreach ($result as $item)

          <li class="nav-item">
            <div class="nav-link">
              <div class="d-flex ">

                <div class="mx-5">
                  {{ $item['name'] }}
                </div>
                <div class="mx-5">
                  {{ $item['phone'] }}
                </div>
                <div class="mx-5">
                  {{ $item['email'] }}
                </div>
                <div class="mx-5">
                    {{ $item['descript'] }}
                </div>
                <div></div>
                <a href="#dd">
                  <div class="">
                    <a class="btn btn-danger" href="{{ route('dat-lich.delete', ['id'=>$item['id']]) }}"
                      role="button">Xóa</a>
                  </div>
                </a>
              </div>
            </div>
          </li>
          @endforeach --}}
        </ul>
      </table>



      <!-- Card footer -->
      <div class="card-footer py-4">
        <nav aria-label="...">
          <ul class="pagination justify-content-end mb-0">
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1">
                <i class="fas fa-angle-left"></i>
                <span class="sr-only">Previous</span>
              </a>
            </li>
            <li class="page-item active">
              <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#">
                <i class="fas fa-angle-right"></i>
                <span class="sr-only">Next</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div><select class="js-example-placeholder-multiple js-states form-control" multiple="multiple">

</select>
@endsection