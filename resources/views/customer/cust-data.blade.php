<?php 

/* if(isset($_GET['customer_info'])){ 
    $customer_info = $_GET['customer-info'] ;
    $dbh= new PDO("mysql:dbhost=localhost;dbname=icefactorydb","root","");
    $sql = $dbh->prepare("SELECT name FROM customer-info WHERE name LIKE '%$customer_info%'");
    $sql->execute();
    if($sql->rowCount()>0){
        $allcustomer = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($allcustomer as $customer) :
            echo '<tr>
                    <td>'.$customer['id'].'</td>
                    <td>'.$customer['name'].'</td>
                    <td>'.$customer['price'].'</td>
                    <td>'.$customer['phone'].'</td>
                    <td>'.$customer['address'].'</td>
                    <td class="btncolor"><button type="button" class="btn btn-primary" data-toggle="modal" 
                    data-target="#editmodel"><a href="?action=edit&id='.$customer['id'].'">تعديل</a></button></td>
                    <td class="btncolor"><button type="button" class="btn btn-danger"><a href="?action=delete&id='.$customer['id'].'"> حذف </a></button></td>
                </tr> <br />';
       endforeach;
       }else{
             echo '<tr>
                    <td colspan="7" class="alert alert-danger"><strong> نأسف ولكن لا يوجد عملاء حالياّ </strong></td>  
                   </tr>';
        }
    }