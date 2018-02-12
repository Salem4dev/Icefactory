@extends('layouts.app')

@section('maine')
<!-- start page-wrapper -->
<div id="page-wrapper">
      <!-- Content Here -->
    <!-- row -->
    <div class="row edit-row">
        <div class="col-xm-12">
            <h1>صفحة العملاء <span><button type="button" class="btn btn-info add_modal" data-toggle="modal" data-target="#addmodal">اضف عميل جديد</button> </span><span class="navbar-left">
            <!-- Trigger the modal with a button -->
            <!-- Modal -->
            <div class="modal fade" id="addmodal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">اضافة عميل</h4>
                        </div>
                        <div class="modal-body">
                            <form id="addcustomer"  method="POST"> {{--action="customer_info/add" --}}
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <!-- <label> اسم العميل </label> -->
                                    <input type="text" class="form-control" id="addname" name="addname" placeholder="اسم العميل">
                                </div>
                                <div class="form-group">
                                   <!--  <label> سعر العميل </label> -->
                                    <input type="text" class="form-control"  id="addprice"  name="addprice" placeholder="سعر العميل">
                                </div>
                                <div class="form-group">
                                    <!-- <label> موبايل العميل </label> -->
                                    <input type="text" class="form-control" id="addphone"  name="addphone" placeholder="موبايل العميل">
                                </div>
                                <div class="form-group">
                                   <!--  <label> عنوان العميل </label> -->
                                    <input type="text" class="form-control" id="addaddress"   name="addaddress" placeholder="عنوان العميل">
                                    <input type="hidden" class="form-control" id="addid" name="addid">
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary" value="أحفظ العميل" id="addcust" name="addcust">
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
                <h4 class="modal-title">تحديث بيانات العميل</h4>
            </div>
            <div class="modal-body">
                <form id="updatetest" method="POST" >
                     {{ csrf_field() }}

                    <div class="form-group">
                        <label> اسم العميل </label>
                        <input type="text" id="name" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label> سعر العميل </label>
                        <input type="text" id="pricee" class="form-control" name="price">
                    </div>
                    <div class="form-group">
                        <label> موبايل العميل </label>
                        <input type="text" id="phone" class="form-control" name="phone">
                    </div>
                    <div class="form-group">
                        <label> عنوان العميل </label>
                        <input type="text" id="address" class="form-control" name="address">
                        <input type="hidden" id="id" class="form-control" name="id">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" id="updatecustomer" class="btn btn-success" value="حدث البيانات" name="updatecustomer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">أغلق</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <div class="modal fade" id="deletemodal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">حذف العميل</h4>
                </div>
                <div class="modal-body">
                    <form id="delete" method="POST" >
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label id="msg"> هل انت متأكد من الحذف </label>
                            <input type="hidden" id="id" class="form-control" name="id">
                        </div>
                        <div class="modal-footer">
                            <input type="submit" id="deletecustomer" class="btn btn-danger" value="احذف العميل" name="deletecustomer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">أغلق</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
 @include('includes.messages')
        <!-- Table -->
        <table id="tabl" class="table table-hover table-bordered table-striped table-responsive table-condensed" >
        <thead>
            <tr>
                <th>ID</th>
                <th>الأسم</th>
                <th>السعر</th>
                <th>الموبايل</th>
                <th>العنوان</th>
                <th>تعديل عميل</th>
                {{--<th>احذف عميل</th>--}}
            </tr>
        </thead>
        <tbody>
            @foreach($all_Customers as $customer)
            <tr id="ex{{ $customer->id }}">
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->price }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->address }}</td>
                <td><input type="button" name="edit" value="تعديل" class="btn btn-primary edit_modal"  data-name="{{ $customer->name }}" data-price="{{ $customer->price }}" data-phone="{{ $customer->phone }}" data-address="{{ $customer->address }}" data-id="{{ $customer->id }}">
                <input type="button" name="delete" value="حذف"  class="btn btn-danger delete_modal" data-id="{{ $customer->id }}"> </td>
            </tr>
            @endforeach
            @if(count($all_Customers) <= 0)
            <tr>
                 <td colspan="7" class="alert alert-danger"><strong> نأسف ولكن لا يوجد عملاء حالياّ </strong></td>
            </tr>
            @endif
            </tbody>
         </table>
</div>
<!-- /#page-wrapper -->
<script>
    $(document).ready(function() {
        $('#tabl').dataTable();
    });
</script>

@endsection