@extends('layouts.app')

@section('maine')

<div id="page-wrapper"> <!-- start page-wrapper -->
  <!-- Content Here -->
  <div class="row">
    <div class="col-xs-3" >
          <label for="sel1">Select list</label>
          <select class="form-control" id="sel1">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
          </select>

    </div>
    <div class="col-xs-3" >
      <label for="sel1">Select list</label>
           <input type="text" class="form-control" id="datepicker" placeholder="Due Date (dd/mm/yyyy)" />
    </div>
    
    <div class="col-xs-3" >
          <label for="sel1">Select list</label>
          <input type="currentdate" class="form-control" name="" value="">

    </div>
    <div class="col-xs-3" >
          <label for="sel1">Select list</label>
          <select class="form-control" id="sel1">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
          </select>
    </div>
  </div>
  
    
  </div>
</div>
<!-- /#page-wrapper -->

@endsection('content')