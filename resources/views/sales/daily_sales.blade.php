
@extends('layouts.app')

@section('maine')
  <!-- start page-wrapper -->
  <div id="page-wrapper">
    <!-- Content Here -->
    <!-- row -->
    <div class="row edit-row">
      <div class="col-xm-12">

        <h1>صفحة المبيعات <span><button type="button" class="btn btn-info add_modal" data-toggle="modal" data-target="#addmodal">اضف عملية بيع جديدة</button> </span><span class="navbar-left">
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
                            <form id="addSalesform" method="POST">
                              {{ csrf_field() }}
                                <div class="form-group">
                                <input type="text" id="addfrom" class="form-control" placeholder="من رقم" name="addfrom">
                              </div>
                              <div class="form-group">
                                <input type="text" id="addto" class="form-control" placeholder="الى رقم" name="addto">
                              </div>
                              <div class="form-group">
                                <input type="text" id="addnumber" class="form-control" placeholder="عدد الشكات" name="addnumber">
                              </div>
                                <div class="form-group">
                                <input type="text" id="addhalek" class="form-control" placeholder="هالك الواح" name="addhalek">
                              </div>
                                <div class="form-group">
                                <input type="text" id="addprice" class="form-control" placeholder="سعر اللوح" name="addprice">
                              </div>
                              <div class="form-group">
                                  <select id="addcustomerid" class="form-control" name="addcustomerid">
                                      <option selected="selected">اختر عميل</option>
                                      @foreach($all_cu as $customer)
                                        <option  value="{{ $customer->id }}">{{ $customer->name }}</option>
                                      @endforeach
                                  </select>
                                {{--<input type="text" id="addcustomerid" class="form-control" placeholder="اختر عميل" name="addcustomerid">--}}
                              </div>
                                <input type="hidden" id="id" class="form-control" name="id">
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary" value="أحفظ الموظف" id="addsale" name="addsale" >
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
            <h4 class="modal-title">تحديث بيانات البيع</h4>
          </div>
          <div class="modal-body">
            <form id="updateSalesform" method="POST" >
              {{ csrf_field() }}
              <div class="form-group">
                <label> من رقم </label>
                <input type="text" id="from" class="form-control" name="from">
              </div>
              <div class="form-group">
                <label> الى رقم </label>
                <input type="text" id="to" class="form-control" name="to">
              </div>
              <div class="form-group">
                <label> عدد الشكات </label>
                <input type="text" id="number" class="form-control" name="number">
              </div>
                <div class="form-group">
                <label> هالك الواح </label>
                <input type="text" id="halek" class="form-control" name="halek">
              </div>
                <div class="form-group">
                <label> سعر اللوح </label>
                <input type="text" id="price" class="form-control" name="price">
              </div>
                <div class="form-group">
                    <label> اسم العميل </label>
                    <select id="customerid" class="form-control" name="customerid">
                        @foreach($all_cu as $customer)
                            <option selected="selected" value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" id="id" class="form-control" name="id">
              <div class="modal-footer">
                <input type="submit" id="updateSales" class="btn btn-success" value="حدث البيانات" >
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
                <input type="submit" id="deleteSales" class="btn btn-danger" value="احذف الموظف" >
                <button type="button" class="btn btn-default" data-dismiss="modal">أغلق</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    @include('includes.messages')
      <!-- Table -->
      <table id="table" class="table table-hover table-responsive table-bordered table-striped table-condensed">
        <thead>
        <tr>
          <th>ID</th>
          <th>التاريخ</th>
          <th>اليوم</th>
          <th>من</th>
          <th>الى</th>
          <th>عدد الشكات</th>
          <th>هالك اللوح</th>
          <th>سعر اللوح</th>
          <th>صافى الالواح</th>
          <th>اجمالى السعر</th>
          <th>اسم العميل</th>
          <th>تاريخ اخر تعديل</th>
          <th>تعديل على البيع</th>
        </tr>
        </thead>
        <tbody>
        @foreach($all_Sales as $sales)
          <tr id="ex{{ $sales->id }}">
            <td>{{ $sales->id }}</td>
            <td>{{ $sales->created_at->format('Y/m/d') }}</td>
              {{--<td>{{ $sales->created_at->format('l') }}</td>--}}
              <td>{{ \Carbon\Carbon::parse($sales->created_at)->format('l')}}</td>
              <?php  $sum = $sales->from_check ;
               $calc = $sales->from_check + $sales->number ;
              ?>
              <td>{{ $calc }}</td>
            <td>{{$calc += $sales->from_check + $sales->number -1 }}</td>
            <td>{{ $sales->number }}</td>
            <td>{{ $sales->halek }}</td>
            <td>{{ $sales->snowboard_price }} ج.م</td>
            {{--<td>{{ $total = $sales->from_check + $sales->to_check -1 }}</td>--}}
            <td>{{ $safyloh = $sales->number  * 30 - $sales->halek }}</td>
            <td>{{ $safyloh * $sales->snowboard_price }} ج.م</td>
            <td>{{ $sales->customer->name }}</td>
            {{--<td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $sales->updated_at) }}</td>--}}
            <td>{{ $sales->updated_at->format('Y/m/d') }}</td>
            <td><input type="button" name="edit" value="تعديل" class="btn btn-primary edit_modal"  data-from_check="{{ $sales->from_check }}" data-to_check="{{ $sales->to_check }}" data-number="{{ $sales->number }}" data-halek="{{ $sales->halek }}" data-price="{{ $sales->snowboard_price }}"  data-customer_id="{{ $sales->customer_id }}" data-id="{{ $sales->id }}">
              <input type="button" name="delete" value="حذف"  class="btn btn-danger delete_modal" data-id="{{ $sales->id }}"> </td>
          </tr>
        @endforeach
        @if(count($all_Sales) <= 0)
          <tr>
            <td colspan="13" class="alert alert-danger"><strong> نأسف ولكن لا يوجد مبيعات حالياّ </strong></td>
          </tr>
        @endif
        </tbody>
      </table>
  </div>
  <!-- /#page-wrapper -->
  <script>
      $(document).ready(function() {
          $('#table').dataTable();
      });
  </script>
@endsection