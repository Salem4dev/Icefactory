
@extends('layouts.app')

@section('maine')
    <!-- start page-wrapper -->
    <div id="page-wrapper">
        <!-- Content Here -->
        <!-- row -->
        <div class="row edit-row">
            <div class="col-xm-12">

                <h1>صفحة الفئات <span><button type="button" class="btn btn-info add_modal" data-toggle="modal" data-target="#addmodal">اضف فئة جديد</button> </span><span class="navbar-left">
            <!-- Trigger the modal with a button -->
                        <!-- Modal -->
            <div class="modal fade" id="addmodal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">اضافة فئة</h4>
                        </div>
                        <div class="modal-body">
                            <form id="addcategoryform"  method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <!-- <label> اسم الفئة </label> -->
                                    <input type="text" class="form-control" id="addcateg" name="addcateg" placeholder="اسم الفئة">
                                </div>
                                <div class="form-group">
                                    <!-- <label> موبايل الفئة </label> -->
                                    {{--<input type="text" class="form-control" id="addsubcateg"  name="addsubcateg" placeholder="الفئة الصغرى">--}}
                                     <select id="addsubcateg" class="form-control" name="addsubcateg">
                                          <option selected="selected" value=""> اختر فئة صغرى </option>
                                        @foreach($all_category as $category)
                                             <option value="{{ $category->id }}">{{ $category->name }}</option>
                                         @endforeach
                                     </select>
                                     {{--<input type="hidden" class="form-control" id="addid" name="addid">--}}
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary" value="أحفظ الفئة" id="addcateg" name="addcateg" >
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
                        <h4 class="modal-title">تحديث بيانات الفئة</h4>
                    </div>
                    <div class="modal-body">
                        <form id="updatecategoryform" method="POST" >
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label> اسم الفئة </label>
                                <input type="text" id="categ" class="form-control" name="categ">
                            </div>
                            <div class="form-group">
                                <label> اسم العميل </label>
                                <select id="subcateg" class="form-control" name="subcateg">
                                    <option value=""> اختر الفئة الاب </option>
                                    @foreach($all_category as $category)
                                        <option selected="selected" value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" id="updatecategory" class="btn btn-success" value="حدث البيانات" >
                                <button type="button" class="btn btn-default" data-dismiss="modal">أغلق</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- /row -->
    <div class="modal fade" id="deletemodal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">حذف الفئة</h4>
                </div>
                <div class="modal-body">
                    <form id="deletecategForm" method="POST" >
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label id="msg"> هل انت متأكد من الحذف </label>
                            <input type="hidden" id="id" class="form-control" name="id">
                        </div>
                        <div class="modal-footer">
                            <input type="submit" id="deletecategory" class="btn btn-danger" value="احذف الفئة" >
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
                <th>اسم الفئة</th>
                <th>الفئة الأب</th>
                <th>تعديل</th>
                <th>حذف</th>
            </tr>
        </thead>
        <tbody>
            @foreach($all_category as $category)
            <tr id="{{ $category->id }}">
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                @if(is_null($category->subcateg_id))
               <?php echo ' <td></td> '; ?>
                @else
                    <td>{{ $category->category->name }}</td>
                @endif
                <td><input type="button" name="edit" value="تعديل" class="btn btn-primary edit_modal"  data-name="{{ $category->name }}" data-subcateg="{{ $category->subcateg_id }}" data-id="{{ $category->id }}"></td>
                    <td><input type="button" name="delete" value="حذف"  class="btn btn-danger delete_modal" data-id="{{ $category->id }}"> </td>
            </tr>
            @endforeach
            @if(count($all_category) <= 0)
            <tr>
                 <td id="null" colspan="5" class="alert alert-danger"><strong> نأسف ولكن لا يوجد فئات حالياّ </strong></td>
            </tr>
                @else

            @endif
            </tbody>
         </table>
      </div>
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