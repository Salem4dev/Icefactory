
@extends('layouts.app')

@section('maine')
  <!-- start page-wrapper -->
  <div id="page-wrapper">
    <!-- Content Here -->
    <!-- row -->
    <div class="row edit-row">
      <div class="col-xm-12">

        <h1>صفحة المصروفات <span><button type="button" class="btn btn-info add_modal" data-toggle="modal" data-target="#addmodal">اضف عملية بيع جديدة</button> </span></h1>
            <!-- Trigger the modal with a button -->
            <!-- Modal -->
            <div class="modal fade" id="addmodal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">اضف عملية بيع</h4>
                        </div>
                        <div class="modal-body">
                            <form id="addExpenseform" {{--action="expenses/add"--}} method="POST">
                              {{ csrf_field() }}
                              <div class="form-group">
                                <input type="text" id="addsoe" class="form-control" placeholder="اضف بيان الصرف" name="addsoe">
                              </div>
                              <div class="form-group">
                                <input type="text" id="addqty" class="form-control" placeholder="اضف عدد الصنف" name="addqty">
                              </div>
                              <div class="form-group">
                                <input type="text" id="addprice" class="form-control" placeholder="سعر القطعة" name="addprice">
                              </div>
                              <div class="form-group">
                                <input type="text" id="addnotes" class="form-control" placeholder="ملاحظات" name="addnotes">
                              </div>
                              <div class="form-group">
                                <select id="addtype" class="form-control" name="addtype">
                                      <option selected="selected"> اختر نوع الصرف </option>
                                  @foreach($all_type as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                  @endforeach
                                  </select>
                              </div>
                              <div class="form-group">
                                <select id="addofficer" class="form-control" name="addofficer">
                                      <option selected="selected"> مسؤول الصرف </option>
                                  @foreach($all_employee as $employee)
                                    <option  value="{{ $employee->id }}">{{ $employee->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="form-group">
                                  <select id="addpartnerid" class="form-control" name="addpartnerid">
                                      <option selected="selected">اختر شريك</option>
                                    @foreach($all_partner as $partner)
                                      <option  value="{{ $partner->id }}">{{ $partner->name }}</option>
                                    @endforeach
                                  </select>
                              </div>
                                <input type="hidden" id="id" class="form-control" name="id">
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary" value="أحفظ الموظف" id="addexpense" name="addexpense" >
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
            <form id="updateExpensesform"  method="POST" >
              {{ csrf_field() }}
              <div class="form-group">
                <label> بيان الصرف </label>
                <input type="text" id="soe" class="form-control" name="soe">
              </div>
              <div class="form-group">
                <label> عدد الصنف </label>
                <input type="text" id="qty" class="form-control" name="qty">
              </div>
              <div class="form-group">
                <label> سعر القطعة </label>
                <input type="text" id="price" class="form-control" name="price">
              </div>
              <div class="form-group">
                <label> ملاحظات </label>
                <input type="text" id="note" class="form-control" name="note">
              </div>
              <div class="form-group">
                <label> نوع الصرف </label>
                <select id="type" class="form-control" name="type">
                  @foreach($all_type as $type)
                    <option selected="selected" value="{{ $type->id }}">{{ $type->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label> مسؤول الصرف </label>
                <select id="officer" class="form-control" name="officer">
                  @foreach($all_employee as $employee)
                    <option selected="selected" value="{{ $employee->id }}">{{ $employee->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label> اسم العميل </label>
                <select id="partnerid" class="form-control" name="partnerid">
                  @foreach($all_partner as $partner)
                    <option selected="selected" value="{{ $partner->id }}">{{ $partner->name }}</option>
                  @endforeach
                </select>
              </div>
              <input type="hidden" id="id" class="form-control" name="id">
              <div class="modal-footer">
                <input type="submit" id="updateExpenses" class="btn btn-success" value="حدث البيانات" >
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
            <form id="deleteExpensesForm" method="POST" >
              {{ csrf_field() }}
              <div class="form-group">
                <label id="msg"> هل انت متأكد من الحذف </label>
                <input type="hidden" id="id" class="form-control" name="id">
              </div>
              <div class="modal-footer">
                <input type="submit" id="deleteExpenses" class="btn btn-danger" value="احذف الموظف" >
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
          <th>التاريخ</th>
          <th>اليوم</th>
          <th>بيان الصرف</th>
          <th>عدد الصنف</th>
          <th>سعر القطعة</th>
          <th>مسؤل الصرف</th>
          <th>مبلغ الصرف</th>
          <th>نوع الصرف</th>
          <th>الشريك</th>
          <th>ملاحظات</th>
          <th>تاريخ اخر تعديل</th>
          <th>تعديل على البيع</th>
        </tr>
        </thead>
        <tbody>
        @foreach($all_expenses as $expenses)
          <tr id="ex{{ $expenses->id }}">
            <td>{{ $expenses->id }}</td>
            <td>{{ $created = $expenses->created_at->format('Y/m/d') }}</td>
            <td>{{ $day= $expenses->created_at->format('l') }}</td>
            <td>{{ $expenses->soe }}</td>
            <td>{{ $expenses->qty }}</td>
            <td>{{ $expenses->unit_price }}</td>
            <td>{{ $expenses->employee->name }} </td>
            <td>{{ $total = $expenses->qty * $expenses->unit_price }} </td>
            <td>{{ $expenses->type->name }}</td>
            <td>{{ $expenses->partner->name }}</td>
            <td>{{ $expenses->notes }}</td>
            <td>{{ $updated = $expenses->updated_at->format('Y/m/d') }}</td>
            <td><input type="button" name="edit" value="تعديل" class="btn btn-primary edit_modal"  data-soe="{{ $expenses->soe }}" data-qty="{{ $expenses->qty }}" data-price="{{ $expenses->unit_price }}" data-officer="{{ $expenses->empl_id }}" data-type="{{ $expenses->type_id }}"  data-partner="{{ $expenses->partner_id }}" data-notes="{{ $expenses->notes }}" data-id="{{ $expenses->id }}">
              <input type="button" name="delete" value="حذف"  class="btn btn-danger delete_modal" data-id="{{ $expenses->id }}"> </td>
          </tr>
        @endforeach
        @if(count($all_expenses) <= 0)
          <tr>
            <td colspan="13" class="alert alert-danger"><strong> نأسف ولكن لا يوجد مصروفات حالياّ </strong></td>
          </tr>
        @endif
        </tbody>
      </table>
  </div>
  <!-- /#page-wrapper -->
  <script>
      /*function viewTable() {
          $.ajax({
              type: 'POST',
              url: "api/expenses",
              // async:false,
              // dataType: 'json',
              success:function (response) {
                  // alert(data);
                  console.log(response);
                  data = response.data;
                  for (i = 0; i < response.data.length; i++) {
                      $("#table").append("<tr id='ex" + response.data[i].id + "'>" +
                          "<td>" + response.data[i].id + "</td>" +
                          "<td>" + response.data[i].soe + "</td>" +
                          "<td>" + response.data[i].qty + "</td>" +
                          "<td>" + response.data[i].unit_price + "</td>" +
                          "<td>" + response.data[i].empl_id + "</td>" +
                          '<td>' + response.data[i].parseInt(qty * unit_price) + '</td>' +
                          "<td>" + response.data[i].type_id + "</td>" +
                          "<td>" + response.data[i].partner_id + "</td>" +
                          "<td>" + response.data[i].notes + "</td>" +
                          '<td><input type="button" name="edit" value="تعديل" class="btn btn-primary edit_modal" data-soe="' + response.data[i].soe + '" data-qty="' + response.data[i].qty + '" data-price="' + response.data[i].unit_price + '" data-notes="' + response.data[i].notes + '" data-type="' + response.data[i].type_id + '" data-officer="' + response.data[i].empl_id + '" data-partner="' + response.data[i].partner_id + '" data-id="' + response.data[i].id + '"><input type="button" name="delete" value="حذف"  class="btn btn-danger delete_modal" data-id="' + response.data[i].id + '"></td>' +
                          "</tr>");
                      alert(data);
                  }
              },
              error:function (e) {
                  alert('No Data Found Sorry.');
              }
          })
      }*/
      $(document).ready(function() {
          $('#table').dataTable();
      });
  </script>
@endsection