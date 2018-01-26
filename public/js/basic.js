// Start Login Area

$(document).ready(function () {
    $('#login-form-link').click(function(e) {
        $("#login-form").delay(100).fadeIn(100);
        $("#register-form").fadeOut(100);
        $('#register-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });
    $('#register-form-link').click(function(e) {
        $("#register-form").delay(100).fadeIn(100);
        $("#login-form").fadeOut(100);
        $('#login-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });
});

// Customer area
/*---------------------------------------------------------------*/
//    add modal for Customer_info
/*---------------------------------------------------------------*/


$(document).on('submit', '#addcustomer',function(e){
        e.preventDefault();
        var     id          = $("#addid").val();
        var     name        = $('#addname').val();
        var     price       = $('#addprice').val();
        var     phone       = $('#addphone').val();
        var     address     = $('#addaddress').val();
        $.ajax({
            type:'POST',
            url: "/customer_info/add",
            dataType: 'json',
            data: {
                "_token": $("input[name=_token]").val(),
                addid: id,
                addname: name,
                addprice: price,
                addphone: phone,
                addaddress: address
            },
            success: function(data){
                setTimeout(function(){// wait for 5 secs(2)
                    location.reload(); // then reload the pbirth_day.(3)
                },300);
                var td = '<tr '+id+'>'+
                    '<td>'+id+'</td>'+
                    '<td>'+name +'</td>'+
                    '<td>'+price +'</td>'+
                    '<td>'+phone +'</td>'+
                    '<td>'+address+'</td>'+
                    '<td><input type="button" name="edit" value="تعديل" class="btn btn-primary edit_modal"  data-name="'+name+'" data-price="'+price+'" data-phone="'+phone+'" data-address="'+ address +'" data-id="'+id +'"> '+
                    '<input type="button" name="delete" value="حذف"  class="btn btn-danger delete_modal" id="'+id+'"> </td>'+
            '</tr>';
                $("#tabl").prepend(td);
                console.log(data);
                $('#addmodal').modal('hide');

            },
            error:function (e) {
                // alert("error : "+e);
                console.log(e);
            }
        });
    });

/*---------------------------------------------------------------*/
//    update modal Customer_info
/*---------------------------------------------------------------*/
$(document).on('click', '.edit_modal', function() {
    $("#id").val($(this).data('id'));
    $("#name").val($(this).data('name'));
    $("#pricee").val($(this).data('price'));
    $("#phone").val($(this).data('phone'));
    $("#address").val($(this).data('address'));
    $('#editmodel').modal('show');
});
    $(document).on('submit','#updatetest', function(e){
        e.preventDefault();
        var id      = $("#id").val(),
            name    = $('#name').val(),
            price   = $('#pricee').val(),
            phone   = $('#phone').val(),
            address = $('#address').val();
        $.ajax({
            type:'POST',
            url: "customer_info/edit/"+id,
            data: {
                "_token": $("input[name=_token]").val(),
                id: id,
                name: name,
                price: price,
                phone: phone,
                address: address
            },
            success: function(data){
                console.log(id);
                var td = '<td>'+id+'</td>'+
                    '<td>'+name +'</td>'+
                    '<td>'+price +'</td>'+
                    '<td>'+phone +'</td>'+
                    '<td>'+address+'</td>'+
                    '<td><input type="button" name="edit" value="تعديل" class="btn btn-primary edit_modal"  data-name="'+name+'" data-price="'+price+'" data-phone="'+phone+'" data-address="'+ address +'" data-id="'+id +'"> '+
                    '<input type="button" name="delete" value="حذف"  class="btn btn-danger delete_modal" data-id="'+id+'"> </td>';
                // alert('success');
                $('tr[id='+id+']').html(td);
                $('#editmodel').modal('hide');

            },
            error:function (e) {
                // alert("error : "+e);
                console.log(e);
            }
        });
    });

/*---------------------------------------------------------------*/
//    delete modal Customer_info
/*---------------------------------------------------------------*/

$(document).on('click', '.delete_modal', function() {
    $("#id").val($(this).data('id'));
    $('#deletemodal').modal('show');
});

    $(document).on('submit','#delete', function(e){
        e.preventDefault();
        var id  = $("#id").val();
        $.ajax({
            type: 'POST',
            url: "customer_info/delete/"+id,
            data: {
                "_token": $("input[name=_token]").val(),
                id: id
            },
            success: function (data) {
                $('tr[id='+id+']').remove();
                $('#deletemodal').modal('hide');
            },
            error: function (e) {
                // alert("error : " + e);
                console.log(e);
            }
        });
    });

// Employee  area

/*---------------------------------------------------------------*/
//    add modal for Employee_info
/*---------------------------------------------------------------*/

    $(document).on('submit','#addEmployeeform', function(e){
        e.preventDefault();
        var     id          = $("#addid").val();
        var     name        = $('#addname').val();
        var     birth_day         = $('#addbirth_day').val();
        var     phone       = $('#addphone').val();
        var     address     = $('#addaddress').val();
        $.ajax({
            type:'POST',
            url: "employee_info/add",
            dataType: 'json',
            data: {
                "_token": $("input[name=_token]").val(),
                addid: id,
                addname: name,
                addbirth_day: birth_day,
                addphone: phone,
                addaddress: address
            },
            success: function(data){
                // setTimeout(function(){// wait for 5 secs(2)
                //     location.reload(); // then reload the pbirth_day.(3)
                // },300);
                var td = '<tr '+id+'>'+
                    '<td>'+id+'</td>'+
                    '<td>'+name +'</td>'+
                    '<td>'+birth_day +'</td>'+
                    '<td>'+phone +'</td>'+
                    '<td>'+address+'</td>'+
                    '<td><input type="button" name="edit" value="تعديل" class="btn btn-primary edit_modal"  data-name="'+name+'" data-birth_day="'+birth_day+'" data-phone="'+phone+'" data-address="'+ address +'" data-id="'+id +'"> '+
                    '<input type="button" name="delete" value="حذف"  class="btn btn-danger delete_modal" id="'+id+'"> </td>'+
                    '</tr>';
                $("#table").prepend(td);
                console.log(data);
                $('#addmodal').modal('hide');
            },
            error:function (e) {
                // alert("error : "+e);
                console.log(e);
            }
        });
    });

/*---------------------------------------------------------------*/
//    update modal Employee_info
/*---------------------------------------------------------------*/
$(document).on('click', '.edit_modal', function() {
    $("#id").val($(this).data('id'));
    $("#name").val($(this).data('name'));
    $("#birth_day").val($(this).data('birth_day'));
    $("#phone").val($(this).data('phone'));
    $("#address").val($(this).data('address'));
    $('#editmodel').modal('show');
});
    $(document).on('submit','#updateEmployeeform', function(e){
        e.preventDefault();
        var id      = $("#id").val(),
            name    = $('#name').val(),
            birth_day     = $('#birth_day').val(),
            phone   = $('#phone').val(),
            address = $('#address').val();
        $.ajax({
            type:'POST',
            url: "employee_info/update/"+id,
            data: {
                "_token": $("input[name=_token]").val(),
                id: id,
                name: name,
                birth_day: birth_day,
                phone: phone,
                address: address
            },
            success: function(data){
                console.log(id);
                var td ='<td>'+id+'</td>'+
                    '<td>'+name+'</td>'+
                    '<td>'+birth_day+'</td>'+
                    '<td>'+phone+'</td>'+
                    '<td>'+address+'</td>'+
                    '<td><input type="button" name="edit" value="تعديل" class="btn btn-primary edit_modal"  data-name="'+name+'" data-birth_day="'+birth_day+'" data-phone="'+phone+'" data-address="'+address+'" data-id="'+id+'"> '+
                    '<input type="button" name="delete" value="حذف"  class="btn btn-danger delete_modal" data-id="'+id+'"> </td>';
                // alert('success');
                $('tr[id='+id+']').html(td);
                $('#editmodel').modal('hide');
            },
            error:function (e) {
                alert("error : "+e);
                console.log(e);
            }
        });
    });

/*---------------------------------------------------------------*/
//    delete modal Employee_info
/*---------------------------------------------------------------*/

$(document).on('click', '.delete_modal', function() {
    $("#id").val($(this).data('id'));
    $('#deletemodal').modal('show');
});
    $(document).on('submit','#deleteForm', function(e){
        e.preventDefault();
        var id  = $("#id").val();
        $.ajax({
            type: 'POST',
            url: "employee_info/delete/"+id,
            data: {
                "_token": $("input[name=_token]").val(),
                id: id
            },
            success: function (data) {
                $('tr[id='+id+']').remove();
                $('#deletemodal').modal('hide');
            },
            error: function (e) {
                alert("error : " + e);
                console.log(e);
            }
        });
    });

// Sales  area

/*---------------------------------------------------------------*/
//    add modal for daily_sales
/*---------------------------------------------------------------*/

    $(document).on('submit','#addSalesform', function(e){
        e.preventDefault();
        var     id          = $("#addid").val();
        var     from        = $('#addfrom').val();
        var     to         = $('#addto').val();
        // var     number       = $('#addnumber').val();
        var     halek     = $('#addhalek').val();
        var     price     = $('#addprice').val();
        var     customerid     = $('#addcustomerid').val();
        // alert(customerid);
        $.ajax({
            type:'POST',
            url: "daily_sales/add",
            dataType: 'json',
            data: {
                "_token": $("input[name=_token]").val(),
                addid: id,
                addfrom: from,
                addto: to,
                // addnumber: number,
                addhalek: halek,
                addprice: price,
                // addtotal: total,
                addcustomerid: customerid
            },
            success: function(data){
                // setTimeout(function(){// wait for 5 secs(2)
                //     location.reload(); // then reload the pbirth_day.(3)
                // },300);
                var td = '<tr '+id+'>'+
                    '<td>'+id+'</td>'+
                    '<td>'+from +'</td>'+
                    '<td>'+to +'</td>'+
                    // '<td>'+number +'</td>'+
                    '<td>'+halek+'</td>'+
                    '<td>'+price+'</td>'+
                    // '<td>'+total+'</td>'+
                    '<td>'+customerid+'</td>'+
                // data-total="'+total+'"
                    '<td><input type="button" name="edit" value="تعديل" class="btn btn-primary edit_modal"  data-from="'+from+'" data-to="'+to+'"  data-halek="'+halek+'" data-price="'+price+'" data-customerid="'+customerid+'" data-id="'+id +'"> '+
                    '<input type="button" name="delete" value="حذف"  class="btn btn-danger delete_modal" id="'+id+'"> </td>'+
                    '</tr>';
                $("#table").prepend(td);
                console.log(data);
                $('#addmodal').modal('hide');
            },
            error:function (e) {
                // alert("error : "+e);
                console.log(e);
            }
        });
    });

/*---------------------------------------------------------------*/
//    update modal daily_sales
/*---------------------------------------------------------------*/
$(document).on('click', '.edit_modal', function() {
    $("#id").val($(this).data('id'));
    $("#from").val($(this).data('from_check'));
    $("#to").val($(this).data('to_check'));
    // $("#number").val($(this).data('number_checks'));
    $("#halek").val($(this).data('halek'));
    $('#price').val($(this).data('snowboard_price'));
    $('#customerid').val($(this).data('customer_id'));
    $('#editmodel').modal('show');
});

    $(document).on('submit','#updateSalesform', function(e){
        e.preventDefault();
        var     id          = $("#id").val();
        var     from        = $('#from').val();
        var     to         = $('#to').val();
        // var     number       = $('#number').val();
        var     halek     = $('#halek').val();
        var     price     = $('#price').val();
        var     customerid     = $('#customerid').val();
        // alert(customerid);
        $.ajax({
            type:'POST',
            url: "daily_sales/update/"+id,
            data: {
                "_token": $("input[name=_token]").val(),
                id: id,
                from: from,
                to: to,
                // number: number,
                halek: halek,
                price: price,
                customerid: customerid
            },
            success: function(data){
                console.log(id);
                var td = '<tr '+id+'>'+
                    '<td>'+id+'</td>'+
                    '<td>'+from +'</td>'+
                    '<td>'+to +'</td>'+
                    '<td>'+halek+'</td>'+
                    '<td>'+price+'</td>'+
                    '<td>'+customerid+'</td>'+
                    '<td><input type="button" name="edit" value="تعديل" class="btn btn-primary edit_modal"  data-from_check="'+from+'" data-to_check="'+to+'" data-halek="'+halek+'" data-snowboard_price="'+price+'" data-customer_id="'+customerid+'" data-id="'+id +'"> '+
                    '<input type="button" name="delete" value="حذف"  class="btn btn-danger delete_modal" data-id="'+id+'"> </td>'+
                    '</tr>';
                // alert('success');
                $('tr[id='+id+']').html(td);
                $('#editmodel').modal('hide');
            },
            error:function (e) {
                alert("error : "+e);
                console.log(e);
            }
        });
    });

/*---------------------------------------------------------------*/
//    delete modal daily_sales
/*---------------------------------------------------------------*/

$(document).on('click', '.delete_modal', function() {
    $("#id").val($(this).data('id'));
    $('#deletemodal').modal('show');
});
    $(document).on('submit','#deleteForm', function(e){
        e.preventDefault();
        var id  = $("#id").val();
        $.ajax({
            type: 'POST',
            url: "daily_sales/delete/"+id,
            data: {
                "_token": $("input[name=_token]").val(),
                id: id
            },
            success: function (data) {
                $('tr[id='+id+']').remove();
                $('#deletemodal').modal('hide');
            },
            error: function (e) {
                alert("error : " + e);
                console.log(e);
            }
        });
    });

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/*---------------------------------------------------------------*/
//    add modal for Categories
/*---------------------------------------------------------------*/
$(document).on('submit','#addcategoryform', function(e){
    e.preventDefault();
    var     id          = $("#addid").val();
    var     categ        = $('#addcateg').val();
    var     subcateg_id        = $('#addsubcateg').val();
    $.ajax({
        type:'POST',
        url: "categories",
        dataType: 'json',
        data: {
            "_token": $("input[name=_token]").val(),
            id : id,
            addcateg: categ,
            addsubcateg: subcateg_id
        },
        success: function(data){
            setTimeout(function(){// wait for 5 secs(2)
                location.reload(); // then reload the pbirth_day.(3)
            },300);
            var td = '<tr '+id+'>'+
                '<td>'+id+'</td>'+
                '<td>'+categ +'</td>'+
                '<td>'+subcateg_id +'</td>'+
                '<td><input type="button" name="edit" value="تعديل" class="btn btn-primary edit_modal" data-name="'+categ+'" data-subcateg="'+subcateg_id+'" data-id="'+id +'"></td>'+
                '<td><input type="button" name="delete" value="حذف"  class="btn btn-danger delete_modal" data-id="'+id+'"></td>'+
                '</tr>';
            $("#table").prepend(td);

            console.log(data);
            $("#null").hide();
            $('#addmodal').modal('hide');
        },
        error:function (e) {
            // alert("error : "+e);
            console.log(e);
        }
    });

});

/*---------------------------------------------------------------*/
//    update modal Categories
/*---------------------------------------------------------------*/
$(document).on('click', '.edit_modal', function() {
    $("#id").val($(this).data('id'));
    $("#categ").val($(this).data('name'));
    $("#subcateg").val($(this).data('subcateg_id'));
    $('#editmodel').modal('show');
});
// $('.modal-footer').on('click', '#updateSales', function () {

$(document).on('submit','#updatecategoryform', function(e){
    e.preventDefault();
    var     id          = $("#id").val();
    var     categ        = $('#categ').val();
    var     subcateg         = $('#subcateg').val();
    $.ajax({
        type:'PATCH',
        url: "categories/"+id,
        data: {
            "_token": $("input[name=_token]").val(),
            id: id,
            categ: categ,
            subcateg: subcateg
        },
        success: function(data){
            var td = '<tr '+id+'>'+
                '<td>'+id+'</td>'+
                '<td>'+categ +'</td>'+
                '<td>'+subcateg +'</td>'+
                '<td><input type="button" name="edit" value="تعديل" class="btn btn-primary edit_modal" data-name="'+categ+'" data-subcateg="'+subcateg+'" data-id="'+id +'"></td>'+
                '<td><input type="button" name="delete" value="حذف"  class="btn btn-danger delete_modal" data-id="'+id+'"></td>'+
                '</tr>';
            // alert('success');
            $('tr[id='+id+']').html(td);
            $('#editmodel').modal('hide');
        },
        error:function (e) {
            alert("error : "+e);
            console.log(e);
        }
    });
});
// });

/*---------------------------------------------------------------*/
//    delete modal Categories
/*---------------------------------------------------------------*/

$(document).on('click', '.delete_modal', function() {
    $("#id").val($(this).data('id'));
    $('#deletemodal').modal('show');
});
$(document).on('submit','#deletecategForm', function(e){
    e.preventDefault();
    var id  = $("#id").val();
    $.ajax({
        type: 'DELETE',
        url: "categories/"+id,
        data: {
            "_token": $("input[name=_token]").val(),
            id: id
        },
        success: function (data) {
            $('tr[id='+id+']').remove();
            $('#deletemodal').modal('hide');
        },
        error: function (e) {
            alert("error : " + e);
            console.log(e);
        }
    });
});

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/*---------------------------------------------------------------*/
//    add modal for Products
/*---------------------------------------------------------------*/
/*$(document).on('submit','#addproductform', function(e){
    e.preventDefault();
    var     id          = $("#addid").val();
    var     name        = $('#addname').val();
    var     image        = $('#addimage').attr('src');
    var     categ_id        = $('#addcateg_id').val();
    var imgsrc = "images/upload/"+image;
    $.ajax({
        type:'POST',
        url: "products",
        dataType: 'json',
        data: {
            "_token": $("input[name=_token]").val(),
            // data:new FormData($("#addimage")[0]),
            id : id,
            addname: name,
            addimage: image,
            addcateg: categ_id
        },
        success: function(data){
            setTimeout(function(){// wait for 5 secs(2)
                location.reload(); // then reload the pbirth_day.(3)
            },300);
            var td = '<tr '+id+'>'+
                '<td>'+id+'</td>'+
                '<td>'+name +'</td>'+
                '<td><img class="img-responsive" style="height : 50px; width: 100px; src="'+imgsrc+'"></td>'+
                '<td>'+categ_id +'</td>'+
                '<td><input type="button" name="edit" value="تعديل" class="btn btn-primary edit_modal" data-name="'+name+'" data-image="'+image+'" data-categid="'+categ_id+'" data-id="'+id +'"></td>'+
                '<td><input type="button" name="delete" value="حذف"  class="btn btn-danger delete_modal" data-id="'+id+'"></td>'+
                '</tr>';
            $("#table").prepend(td);

            console.log(data);
            $("#null").hide();
            $('#addmodal').modal('hide');
        },
        error:function (e) {
            // alert("error : "+e);
            console.log(e);
        }
    });

});*/

$(document).on('change', '#addimage', function() {
    readURL(this);
    $('.forhide').css("display", "block");

});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#addimages').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

/*---------------------------------------------------------------*/
//    update modal Products
/*---------------------------------------------------------------*/
$(document).on('click', '.edit_modal', function() {
    $("#id").val($(this).data('id'));
    $("#name").val($(this).data('name'));
    $("#images").attr("src","images/"+$(this).data('image'));
    $("#categ_id").val($(this).data('categ_id'));
    $("#updateproductform").attr('action', "products/update/"+$("#id").val());
    $('#editmodel').modal('show');
});

/*$(document).on('submit','#updateproductform', function(e){
    e.preventDefault();
    var     id          = $("#id").val();
    var     name        = $('#name').val();
    var     images        = $('#image').attr('src');
    var     categ_id         = $('#categ_id').val();
    var imgsrc = "images/"+images;
    // alert(imgsrc);
    $.ajax({
        type:'PATCH',
        url: "products/"+id,
        data: {
            "_token": $("input[name=_token]").val(),
            id: id,
            name: name,
            images: images,
            categ_id: categ_id
        },
        success: function(data){
            var td = '<tr '+id+'>'+
                '<td>'+id+'</td>'+
                '<td>'+name +'</td>'+
                '<td><img class="img-responsive" style="height : 50px; width: 100px; src="'+imgsrc+'"></td>'+
                '<td>'+categ_id +'</td>'+
                '<td><input type="button" name="edit" value="تعديل" class="btn btn-primary edit_modal" data-name="'+name+'" data-image="'+images+'" data-categid="'+categ_id+'" data-id="'+id +'"></td>'+
                '<td><input type="button" name="delete" value="حذف"  class="btn btn-danger delete_modal" data-id="'+id+'"></td>'+
                '</tr>';
            // alert('success');
            $('tr[id='+id+']').html(td);
            $('#editmodel').modal('hide');
        },
        error:function (e) {
            alert("error : "+e);
            console.log(e);
        }
    });
});*/

/*---------------------------------------------------------------*/
//    delete modal Products
/*---------------------------------------------------------------*/

$(document).on('click', '.delete_modal', function() {
    $("#id").val($(this).data('id'));
    $('#deletemodalproduct').modal('show');
});
$(document).on('submit','#deleteproductForm', function(e){
    e.preventDefault();
    var id  = $("#id").val();
    $.ajax({
        type: 'DELETE',
        url: "products/"+id,
        data: {
            "_token": $("input[name=_token]").val(),
            id: id
        },
        success: function (data) {
            $('tr[id='+id+']').remove();
            $('#deletemodalproduct').modal('hide');
            console.log(data);
        },
        error: function (e) {
            alert("error : " + e);
            console.log(e);
        }
    });
});
