
@extends('layouts.app')

@section('maine')
    <!-- start page-wrapper -->
    <div id="page-wrapper">
        <!-- Content Here -->
        <!-- row -->
        <div class="row edit-row">
            <div class="col-xm-12">

                <h1>صفحة المنتجات <span><button type="button" class="btn btn-info add_modal" data-toggle="modal" data-target="#addmodal">اضف منتج جديد</button> </span><span class="navbar-left"></span></h1>
            <!-- Trigger the modal with a button -->
                        <!-- Modal -->
            <div class="modal fade" id="addmodal"  role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">اضافة منتج</h4>
                        </div>
                        <div class="modal-body">
                            <form id="addproductform"  {{--action="products"--}} method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="text" class="form-control" id="addname" name="addname" placeholder="اسم المنتج">
                                </div>
                                <div class="form-group">
                                <select id="addcateg_id" class="form-control" name="addcateg_id">
                                    <option selected value=""> اختر الفئة </option>
                                    @foreach($all_category as $category)
                                     <option value="{{$category->id}}">{{$category->name}}</option>
                                     @endforeach
                                </select>
                                    <input type="hidden" class="form-control" id="addid" name="addid">
                                </div>
                                <div class="form-group">
                                    <label> اختر صورة </label>
                                    <input  type="file" class="form-control" id="addimage"  name="addimage">
                                </div>
                                <div class="form-group forhide" style="display: none">
                                    <img id="addimages" class="img-responsive" style="width: 100%;height: 350px;" src="" />
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary" value="أحفظ المنتج" id="addprod" name="addprod" >
                                    <button type="button" class="btn btn-default" data-dismiss="modal">أغلق</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                        <!-- /Modal -->
            </div>
        </div>
        <!-- /row -->

        <div class="modal fade" id="editmodel" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">تحديث بيانات المنتج</h4>
                    </div>
                    <div class="modal-body">
                        <form id="updateproductform" action="" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label> اسم المنتج </label>
                                <input type="text" id="name" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label> فئة المنتج </label>
                                <select id="categ_id" class="form-control" name="categ_id">
                                        @foreach($all_category as $category)
                                            <option selected="selected" value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                </select>
                                <input type="hidden" id="id" class="form-control" name="id">
                            </div>
                            <div class="form-group">
                                <label for="images" class="custom-file-upload">
                                    <i class="fa fa-cloud-upload"></i> اختر صورة
                                </label>
                                <input  type="file" onchange="document.getElementById('images').src = window.URL.createObjectURL(this.files[0])" class="form-control" id="image"  name="image">
                            </div>
                                <div class="form-group">
                                        <img id="images" class="img-responsive" style="width: 100%;height: 350px;" src="" />
                                </div>
                            <div class="modal-footer">
                                <input type="submit" id="updateproduct" class="btn btn-success" value="حدث البيانات" >
                                <button type="button" class="btn btn-default" data-dismiss="modal">أغلق</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- /row -->
    <div class="modal fade" id="deletemodalproduct" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">حذف المنتج</h4>
                </div>
                <div class="modal-body">
                    <form id="deleteproductForm" method="POST" >
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label id="msg"> هل انت متأكد من الحذف </label>
                            <input type="hidden" id="id" class="form-control" name="id">
                        </div>
                        <div class="modal-footer">
                            <input type="submit" id="deleteproduct" class="btn btn-danger" value="احذف المنتج" >
                            <button type="button" class="btn btn-default" data-dismiss="modal">أغلق</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@include('includes.messages')
    <div class="table-responsive">
        <!-- Table -->
        <table id="table" class="table table-hover table-bordered table-striped table-responsive">
        <thead>
            <tr>
                <th>ID</th>
                <th>اسم المنتج</th>
                <th>الصور</th>
                <th>الفئة</th>
                <th>تعديل</th>
                <th>حذف</th>
            </tr>
        </thead>
        <tbody>
            @foreach($all_product as $product)
            <tr id="{{ $product->id }}">
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td><img class="img-responsive" style="height : 50px; width: 100px; " src="images/{{ $product->image }}" /></td>
                <td>{{ $product->category->name }}</td>
                <td><input type="button" name="edit" value="تعديل" class="btn btn-primary edit_modal"  data-name="{{ $product->name }}" data-image="{{ $product->image }}" data-categid="{{ $product->category_id }}" data-id="{{ $product->id }}"></td>
                  <td>  <input type="button" name="delete" value="حذف"  class="btn btn-danger delete_modal" data-id="{{ $product->id }}"> </td>
            </tr>
            @endforeach
            @if(count($all_product) <= 0)
            <tr>
                 <td colspan="7" class="alert alert-danger"><strong> نأسف ولكن لا يوجد منتجات حالياّ </strong></td>
            </tr>
            @endif
            </tbody>
         </table>
      {{--</div>--}}
</div>
<!-- /#page-wrapper -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#table').dataTable();
        $( "#birth_day,#addbirth_day" ).datepicker({

            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd",
            yearRange: "-100:+0"
        });
    });
</script>
@endsection