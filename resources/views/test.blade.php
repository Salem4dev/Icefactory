
@extends('layouts.app')

@section('maine')

<!-- start page-wrapper -->
<div id="page-wrapper">
  <!-- Content Here -->
    
</div>
<!-- /#page-wrapper -->
@endsection
php artisan make:migration create_users_table --create=users
php artisan make:migration create_password_resets_table --create=password_resets
php artisan make:migration create_employee_table --create=employee
php artisan make:migration create_employee_attendance_table --create=employee_attendance
php artisan make:migration create_customer_table --create=customer
php artisan make:migration create_customer_sales_table --create=customer_sales
