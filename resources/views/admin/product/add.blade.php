@extends('admin.main')

@section('header')
<script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('contents')
<!-- form start -->
<form action="" method="POST">
    <div class="card-body">
        <div class="form-group">
            <label for="product">Tên sản phẩm</label>
            <input type="text" name="name" class="form-control" id="product" placeholder="Nhập tên sản phẩm">
        </div>
        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea type="text" name="description" class="form-control" id="description" placeholder="Nhập mô tả"></textarea>
        </div>
        <div class="form-group">
          <label for="content">Mô tả chi tiết</label>
          <textarea type="text" name="content" class="form-control" id="content" placeholder="Nhập mô tả chi tiết"></textarea>
        </div>
        <div class="form-group">
            <label for="menu_id">Danh mục</label>
            <select class="form-control" name="menu_id" id="menu_id" >
              <option value="0">Chọn danh mục</option>
              @foreach ($menus as $menu)
                <option value="{{ $menu->id }}">{{ $menu->name }}</option>
              @endforeach   
            </select>
        </div>
        <div class="form-group">
            <label for="price">Giá</label>
            <input type="text" name="price" class="form-control" id="price" placeholder="Nhập giá sản phẩm">
        </div>
        <div class="form-group">
            <label for="price_sale">Giá bán</label>
            <input type="text" name="price_sale" class="form-control" id="price_sale" placeholder="Nhập giá bán sản phẩm">
        </div>
        <div class="form-group">
            <label for="upload">Ảnh</label>
            <input type="file" class="form-control" id="upload">
            <div id="image_show">
              
            </div>
            <input type="text" hidden name="image" id="file" value="">
        </div>
        <div class="form-group">
          <label>Hoạt động</label>
          <div class="custom-control custom-radio">
            <input class="custom-control-input" type="radio" id="active" name="active" value="1" checked="">
            <label for="active" class="custom-control-label">có</label>
          </div>
          <div class="custom-control custom-radio">
            <input class="custom-control-input" type="radio" id="inactive" name="active" value="0">
            <label for="inactive" class="custom-control-label">Không</label>
          </div>
        </div>

    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Tạo danh mục</button>
    </div>
    @csrf
</form>

@endsection

@section('footer')
<script>
  // CKEDITOR.replace( 'description' );
  CKEDITOR.replace( 'content' );
</script>
@endsection