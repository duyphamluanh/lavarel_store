@extends('admin.main')

@section('header')
<script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('contents')
<!-- form start -->
<form action="" method="POST">
    <div class="card-body">
        <div class="form-group">
            <label for="menu">Tên danh mục</label>
            <input type="text" name="name" value="{{ $menu->name }}" class="form-control" id="menu" placeholder="Nhập tên danh mục">
        </div>

        <div class="form-group">
            <label for="parent-id">Danh mục cha</label>
            <select class="form-control" name="parent_id" id="parent-id" >
              <option value="0"  {{ $menu->parent_id == 0 ? 'selected' : '' }}>Chọn danh mục</option>
              @foreach ($parents as $parent)
                <option value="{{ $parent->id }}" {{ $menu->parent_id == $parent->id ? 'selected' : '' }}>{{ $parent->name }}</option>
              @endforeach   
            </select>
        </div>
        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea type="text" name="description" class="form-control" id="description" placeholder="Nhập mô tả">{{ $menu->description }}</textarea>
        </div>
        <div class="form-group">
          <label for="content">Mô tả chi tiết</label>
          <textarea type="text" name="content" class="form-control" id="content" placeholder="Nhập mô tả chi tiết">{{ $menu->content }}</textarea>
        </div>

        <div class="form-group">
          <label>Hoạt động</label>
          <div class="custom-control custom-radio">
            <input class="custom-control-input" type="radio" id="active" name="active" value="1" {{ $menu->active === 1 ? 'checked' : '' }}>
            <label for="active" class="custom-control-label">có</label>
          </div>
          <div class="custom-control custom-radio">
            <input class="custom-control-input" type="radio" id="inactive" name="active" value="0" {{ $menu->active === 0 ? 'checked' : '' }}>
            <label for="inactive" class="custom-control-label">Không</label>
          </div>
        </div>

    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
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