@extends('backend.layout.app')

@section('title', 'Thêm sách')

@section('content')
<div id="content">
    <div class="product-manager-add">
        <h3>
            <i class="fas fa-fighter-jet"></i>
            Thêm sản phẩm mới
            @if(session()->has('message_add'))
                <div class="add_message">
                    <i class="fas fa-exclamation-circle green"></i>
                    {{ session()->get('message_add') }}
                </div>
            @endif
        </h3>
        <form autocomplete="off" action="{{route('admin.store_product')}}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="form-add">
            <div class="form-add-img">
                <img id="form-add-img" src="#" alt="Book Image">
                <input type="file" name="file" onchange="readURL(this);" >
            </div>
            <table class="form-add-table">
                <tr>
                    <td class="add-table-td">Tên sách <br>
                        <input class="add-table-input" type="text" name="productName" id="" required>
                    </td>
                    <td class="add-table-td">Tác giả <br>
                        <input class="add-table-input" type="text" name="author" id="" required>
                    </td>
                    <td class="add-table-td">Người dịch <br>
                        <input class="add-table-input" type="text" name="translator" id="" required>
                    </td>
                </tr>
                <tr>
                    <td class="add-table-td">Nhà xuất bản <br>
                        <input class="add-table-input" type="text" name="publisher" id="" required>
                    </td>
                    <td class="add-table-td">Số trang <br>
                        <input class="add-table-input" type="text" name="numberPage" id="" required>
                    </td>
                    <td class="add-table-td">Số lượng <br>
                        <input class="add-table-input" type="text" name="quantity" id="" required>
                    </td>
                </tr>
                <tr>
                    <td class="add-table-td">Ngày ra mắt <br>
                        <input class="add-table-input" type="date" name="publicDate" id="" required>
                    </td>
                    <td class="add-table-td">Giá <br>
                        <input class="add-table-input" type="text" name="price" id="" required>
                    </td>
                    <td class="add-table-td">Thể loại <br>
                        <select name="category" id="category" required>
                            <option value="">Chọn thể loại sách</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->category}}">{{$category->category}}</option>
                                @endforeach
                          </select>
                    </td>
                </tr>
                <tr>
                    <td class="add-table-td">Mã sách <br>
                        <input class="add-table-input" type="text" name="productCode" id="" required>
                    </td>
                </tr>
            </table>
        </div>
        <div class="box2-form-add">
            <div class="ele1">
                <p>Giới thiệu</p>
                <textarea class="textarea-des" name="description"  id="" required></textarea>
            </div>
            <div class="ele2">
                <div class="btn-save-addform">
                    <button type="submit" class="">
                        <i class="far fa-save"></i>
                        Lưu
                    </button>
                </div>
            </div>
        </div>
        <ul class="alert text-danger">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach

        </ul>
        
        </form>
    </div>
</div>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#form-add-img')
                    .attr('src', e.target.result)
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection