
@extends('layouts.app')

@section('maine')
    <!-- start page-wrapper -->
    <div id="page-wrapper">
        <!-- Content Here -->
        <!-- row -->
        <div class="row edit-row">
            <div class="col-xm-12">

                <h1>صفحة الموظفين <span><button type="button" class="btn btn-info add_modal" data-toggle="modal" data-target="#addmodal">اضف موظف جديد</button> </span><span class="navbar-left">
            <!-- Trigger the modal with a button -->
                        <!-- Modal -->
            <div class="modal fade" id="addmodal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">اضافة موظف</h4>
                        </div>
                        <div class="modal-body">
                            <form id="addEmployeeform"  method="POST"> {{-- action="employee_info/add" --}}
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <!-- <label> اسم الموظف </label> -->
                                    <input type="text" class="form-control" id="addname" name="addname" placeholder="اسم الموظف">
                                </div>
                                <div class="form-group">
                                   <!--  <label> سعر الموظف </label> -->
                                    <input type="text" class="form-control"  id="addbirth_day"  name="addbirth_day" placeholder="تاريخ ميلاد الموظف">
                                </div>
                                <div class="form-group">
                                    <!-- <label> موبايل الموظف </label> -->
                                    <input type="text" class="form-control" id="addphone"  name="addphone" placeholder="موبايل الموظف">
                                </div>
                                <div class="form-group">
                                   <!--  <label> عنوان الموظف </label> -->
                                    <input type="text" class="form-control" id="addaddress"   name="addaddress" placeholder="عنوان الموظف">
                                    <input type="hidden" class="form-control" id="addid" name="addid">
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary" value="أحفظ الموظف" id="addemp" name="addemp" >
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
                        <h4 class="modal-title">تحديث بيانات الموظف</h4>
                    </div>
                    <div class="modal-body">
                        <form id="updateEmployeeform" method="POST" >
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label> اسم الموظف </label>
                                <input type="text" id="name" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label> تاريخ ميلاد الموظف </label>
                                <input type="text" id="birth_day" class="form-control" name="birth_day">
                            </div>
                            <div class="form-group">
                                <label> موبايل الموظف </label>
                                <input type="text" id="phone" class="form-control" name="phone">
                            </div>
                            <div class="form-group">
                                <label> عنوان الموظف </label>
                                <input type="text" id="address" class="form-control" name="address">
                                <input type="hidden" id="id" class="form-control" name="id">
                            </div>
                            <div class="modal-footer">
                                <input type="submit" id="updateEmployee" class="btn btn-success" value="حدث البيانات" >
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
                    <h4 class="modal-title">حذف الموظف</h4>
                </div>
                <div class="modal-body">
                    <form id="deleteForm" method="POST" >
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label id="msg"> هل انت متأكد من الحذف </label>
                            <input type="hidden" id="id" class="form-control" name="id">
                        </div>
                        <div class="modal-footer">
                            <input type="submit" id="deleteEmployee" class="btn btn-danger" value="احذف الموظف" >
                            <button type="button" class="btn btn-default" data-dismiss="modal">أغلق</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@include('includes.messages')
        <!-- Table -->
        <table id="table" class="table table-hover table-bordered table-striped table-responsive table-condensed">
        <thead>
            <tr>
                <th>ID</th>
                <th>الأسم</th>
                <th>العمر</th>
                <th>الموبايل</th>
                <th>العنوان</th>
                <th>تعديل موظف</th>
            </tr>
        </thead>
        <tbody>
            @foreach($all_employee as $employee)
            <tr id="ex{{ $employee->id }}">
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->age }}</td>
                <td>{{ $employee->phone }}</td>
                <td>{{ $employee->address }}</td>
                <td><input type="button" name="ediautot" value="تعديل" class="btn btn-primary edit_modal"  data-name="{{ $employee->name }}" data-birth_day="{{ $employee->birth_day }}" data-phone="{{ $employee->phone }}" data-address="{{ $employee->address }}" data-id="{{ $employee->id }}">
                    <input type="button" name="delete" value="حذف"  class="btn btn-danger delete_modal" data-id="{{ $employee->id }}"> </td>
            </tr>
            @endforeach
            @if(count($all_employee) <= 0)
            <tr>
                 <td colspan="7" class="alert alert-danger"><strong> نأسف ولكن لا يوجد موظفين حالياّ </strong></td>  
            </tr>
            @endif
            </tbody>
         </table>
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