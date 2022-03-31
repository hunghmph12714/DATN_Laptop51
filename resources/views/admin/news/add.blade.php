@extends('admin.layouts.main')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<div class="container">
<h5 class="alert alert-danger  text-center">ADD NEWS</h5>
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                  <label for="">Title</label>
                  <input type="text" name="title" class="form-control" placeholder="">
                </div> 
                <div class="form-group">
                    <label for="">Ảnh</label>
                    <input type="file" name="image" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Mô tả ngắn</label>
                    <textarea name="description_short" id="" cols="75" rows="5"></textarea>
                </div> 
                {{-- <div class="form-group" hidden>
                    <label for="">Người Đăng</label>
                    <input type="text" name="actor" class="form-control" value="">
                </div>  --}}
                <div class="form-group">
                <label for="">Trạng Thái</label>
                <select name="status" class="form-control">
                    <option value="">Chọn trạng thái</option>
                    <option value="1">Hiện Thị</option>
                    <option value="2">Ẩn</option>
                </select>
                </div> 
                <div class="form-group">
                <label for="">Danh Mục</label>
                <select name="category_news_id" class="form-control">
                    <option value="">Chọn sản phẩm</option>
                    @foreach ($cates as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                </div>
            </div>            
            <div class="col-6">
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <textarea name="description" id="ckeditor" cols="30" rows="10"></textarea>
                </div>
                   
            </div>            
            <div class="col-12 d-flex justify-content-end">
                <br>
                <a style="text-decoration" href="{{route('news.index')}}" class="btn btn-danger">Hủy</a>
                &nbsp;
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </div>
    </form>
</div>
<script src="//cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
<script type="text/javascript">
  CKEDITOR.replace('ckeditor');
  CKEDITOR.replace('ckeditor1');

</script>
@endsection
