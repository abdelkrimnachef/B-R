<?php 
session_start();
include("includes/db.php");
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{
     
        $admin_session = $_SESSION['admin_email'];
        
        $get_admin = "select * from admins where admin_email='$admin_session'";
        
        $run_admin = mysqli_query($con,$get_admin);
        
        $row_admin = mysqli_fetch_array($run_admin);
        
        $admin_id = $row_admin['admin_id'];
        
        $admin_name = $row_admin['admin_name'];
        
        $admin_email = $row_admin['admin_email'];
        
        $admin_image = $row_admin['admin_image'];
        
        $admin_country_id = $row_admin['country_id'];
        
        $admin_about = $row_admin['admin_about'];
        
        $admin_contact = $row_admin['admin_contact'];
        
        $admin_job = $row_admin['admin_job'];
        
        $get_books = "select * from books";
        
        $run_books = mysqli_query($con,$get_books);
        
        $count_books = mysqli_num_rows($run_books);
        
        $get_customers = "select * from customers";
        
        $run_customers = mysqli_query($con,$get_customers);
        
        $count_customers = mysqli_num_rows($run_customers);
        
        $get_b_categories = "select * from book_categories";
        
        $run_b_categories = mysqli_query($con,$get_b_categories);
        
        $count_b_categories = mysqli_num_rows($run_b_categories);
        
        $get_pending_orders = "select * from orders";
        
        $run_pending_orders = mysqli_query($con,$get_pending_orders);
        
        $count_pending_orders = mysqli_num_rows($run_pending_orders);

        $get_languages = "select * from languages";
        
        $run_languages = mysqli_query($con,$get_languages);
        
        $count_langs = mysqli_num_rows($run_languages);

        $get_authors = "select * from authors";
        
        $run_authors = mysqli_query($con,$get_authors);
        
        $count_authors = mysqli_num_rows($run_authors);

        
        $get_country = "select * from countries where country_id='$admin_country_id'";
        $run_country = mysqli_query($con,$get_country);
        $row_country = mysqli_fetch_array($run_country);
        $admin_country_name = $row_country['name'];
        
        $get_messages = "select * from messages where answer='/'";
        
        $run_messages = mysqli_query($con,$get_messages);
        
        $count_messages = mysqli_num_rows($run_messages);

       
        $get_deliveries = "select * from delivery where statu='waiting validation'";
        
        $run_deliveries = mysqli_query($con,$get_deliveries);
        
        $count_deliveries = mysqli_num_rows($run_deliveries);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>B&R Book Store Admin Area</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="../images/b&rpngsmall.png" sizes="16x16" />
</head>          
<body>

    <div id="wrapper"><!-- #wrapper begin -->
       
       <?php include("includes/sidebar.php"); ?>
       
        <div id="page-wrapper"><!-- #page-wrapper begin -->
            <div class="container-fluid"><!-- container-fluid begin -->
                
              
                <?php
                
                    if(isset($_GET['dashboard'])){
                        
                        include("dashboard.php");
                        
                }   if(isset($_GET['insert_book'])){
                        
                        include("insert_book.php");
                        
                    } if(isset($_GET['view_books'])){
                        
                        include("view_books.php");
                        
                    }
    
                        if(isset($_GET['delete_book'])){
                        
                        include("delete_book.php");
                        
                    }
                        if(isset($_GET['edit_book'])){
                        
                        include("edit_book.php");
                        
                    }
                    
                    if(isset($_GET['view_book'])){
                        
                        include("view_book.php");
                        
                    }
                    
                    if(isset($_GET['add_rem_qty'])){
                        
                        include("add_rem_qty.php");
                        
                    }
                        if(isset($_GET['insert_b_cat'])){
                        
                        include("insert_b_cat.php");
                        
                    }
    
                        if(isset($_GET['view_b_cats'])){
                        
                        include("view_b_cats.php");
                        }
                     if(isset($_GET['delete_b_cat'])){
                        
                        include("delete_b_cat.php");
                        
                }   if(isset($_GET['edit_b_cat'])){
                        
                        include("edit_b_cat.php");
                        
                } if(isset($_GET['insert_lang'])){
                        
                        include("insert_lang.php");
                        
                }   if(isset($_GET['view_langs'])){
                        
                        include("view_langs.php");
                        
                }   if(isset($_GET['edit_lang'])){
                        
                        include("edit_lang.php");
                        
                }   if(isset($_GET['delete_lang'])){
                        
                        include("delete_lang.php");
                        
                }   if(isset($_GET['insert_slide'])){
                        
                        include("insert_slide.php");
                        
                }   if(isset($_GET['view_slides'])){
                        
                        include("view_slides.php");
                        
                }   if(isset($_GET['delete_slide'])){
                        
                        include("delete_slide.php");
                        
                }   if(isset($_GET['edit_slide'])){
                        
                        include("edit_slide.php");
                        
                }   if(isset($_GET['view_customers'])){
                        
                        include("view_customers.php");
                        
                }   if(isset($_GET['delete_customer'])){
                        
                        include("delete_customer.php");
                        
                }   if(isset($_GET['view_orders'])){
                        
                        include("view_orders.php");
                        
                }   if(isset($_GET['delete_order'])){
                        
                        include("delete_order.php");
                        
                } if(isset($_GET['view_payments'])){
                        
                        include("view_payments.php");
                        
                }   if(isset($_GET['delete_payment'])){
                        
                        include("delete_payment.php");
                        
                }   if(isset($_GET['view_users'])){
                        
                        include("view_users.php");
                        
                }   if(isset($_GET['delete_user'])){
                        
                        include("delete_user.php");
                        
                }   if(isset($_GET['insert_user'])){
                        
                        include("insert_user.php");
                        
                }   if(isset($_GET['user_profile'])){
                        
                        include("user_profile.php");
                        
                } if(isset($_GET['view_boxes'])){
                        
                        include("view_boxes.php");
                        
                }   if(isset($_GET['insert_box'])){
                        
                        include("insert_box.php");
                        
                } if(isset($_GET['edit_box'])){
                        
                        include("edit_box.php");
                }if(isset($_GET['delete_box'])){
                        
                        include("delete_box.php");
                }if(isset($_GET['view_terms'])){
                        include("view_terms.php");
                        
                }   if(isset($_GET['insert_term'])){
                        
                        include("insert_term.php");
                        
                } if(isset($_GET['edit_term'])){
                        
                        include("edit_term.php");
                }if(isset($_GET['delete_term'])){
                        
                        include("delete_term.php");
                }if(isset($_GET['edit_css'])){
                        include("edit_css.php");

                }if(isset($_GET['view_authors'])){
                        include("view_authors.php");
                        
                }   if(isset($_GET['insert_author'])){
                        
                        include("insert_author.php");
                        
                } if(isset($_GET['edit_author'])){
                        
                        include("edit_author.php");
                }if(isset($_GET['delete_author'])){
                        
                        include("delete_author.php");
                }if(isset($_GET['insert_coupon'])){
                        
                        include("insert_coupon.php");
                        
                }   if(isset($_GET['view_coupons'])){
                        
                        include("view_coupons.php");
                        
                }   if(isset($_GET['delete_coupon'])){
                        
                        include("delete_coupon.php");
                        
                }   if(isset($_GET['edit_coupon'])){
                        
                        include("edit_coupon.php");
                        
                }if(isset($_GET['answer_fb'])){
                        
                        include("answer_fb.php");
                        
                }   if(isset($_GET['view_fbs'])){
                        
                        include("view_fbs.php");
                        
                }   if(isset($_GET['delete_fb'])){
                        
                        include("delete_fb.php");
                        
                } if(isset($_GET['view_deliveries'])){
                        
                        include("view_deliveries.php");
                        
                }  if(isset($_GET['validate_delivery'])){
                        
                        include("validate_delivery.php");
                        
                }  if(isset($_GET['delete_delivery'])){
                        
                        include("delete_delivery.php");
                        
                }if(isset($_GET['validate_paiment'])){
                        
                        include("validate_paiment.php");
                        
                
                        
                }if(isset($_GET['answer_qst'])){
                        
                        include("answer_qst.php");
                        
                }   if(isset($_GET['view_qsts'])){
                        
                        include("view_qsts.php");
                        
                }   if(isset($_GET['delete_qst'])){
                        
                        include("delete_qst.php");
                        
                }
                if(isset($_GET['books_chart_line'])){
                        
                        include("books_chart_line.php");
                        
                }if(isset($_GET['cats_chart_line'])){
                        
                        include("cats_chart_line.php");
                        
                }
                if(isset($_GET['langs_chart_line'])){
                        
                        include("langs_chart_line.php");
                        
                } if(isset($_GET['view_ccp_payments'])){
                        
                        include("view_ccp_payments.php");
                        
                }  if(isset($_GET['validate_ccp_payment'])){
                        
                        include("validate_ccp_payment.php");
                        
                }  if(isset($_GET['delete_ccp_payment'])){
                        
                        include("delete_ccp_payment.php");
                        
                }if(isset($_GET['validate_ccp_payment'])){
                        
                        include("validate_ccp_payment.php");
                }if(isset($_GET['view_trans_split'])){
                        
                        include("view_trans_split.php");
                }if(isset($_GET['view_subscribers'])){
                        
                        include("view_subscribers.php");
                }if(isset($_GET['delete_subscriber'])){
                        
                        include("delete_subscriber.php");
                }if(isset($_GET['mail_subscriber'])){
                        
                        include("mail_subscriber.php");
                }
    
        



                
                        
                    
                
                ?>
                

            </div><!-- container-fluid finish -->
        </div><!-- #page-wrapper finish -->
    </div><!-- wrapper finish -->

<script src="js/jquery-331.min.js"></script>     
<script src="js/bootstrap-337.min.js"></script>           
</body>
</html>
<?php }?>