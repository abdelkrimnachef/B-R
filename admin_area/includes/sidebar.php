<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
   
<nav class="navbar navbar-inverse navbar-fixed-top"><!-- navbar navbar-inverse navbar-fixed-top begin -->
    <div class="navbar-header"><!-- navbar-header begin -->
        
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><!-- navbar-toggle begin -->
            
            <span class="sr-only">Toggle Navigation</span>
            
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            
        </button><!-- navbar-toggle finish -->
        
        <a href="index.php?dashboard" class="navbar-brand">Admin Area</a>
        
    </div><!-- navbar-header finish -->
    
    <ul class="nav navbar-right top-nav"><!-- nav navbar-right top-nav begin -->
        
        <li class="dropdown"><!-- dropdown begin -->
            
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><!-- dropdown-toggle begin -->
                
                <i class="fa fa-user"></i> <?php echo $admin_name;  ?> <b class="caret"></b>
                
            </a><!-- dropdown-toggle finish -->
            
            <ul class="dropdown-menu"><!-- dropdown-menu begin -->
                <li><!-- li begin -->
                    <a href="index.php?user_profile=<?php echo $admin_id; ?>"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-user"></i> Profile
                        
                    </a><!-- a href finish -->
                </li><!-- li finish -->
                <li><!-- li begin -->
                    <a href="index.php?view_qsts"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-comment"></i> Messages
                        <span class="badge"><?php echo $count_messages; ?></span>
                        
                    </a><!-- a href finish -->
                </li><!-- li finish -->
                <li><!-- li begin -->
                    <a href="index.php?view_deliveries"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-truck"></i> Deliveries
                        <span class="badge"><?php echo  $count_deliveries; ?></span>
                        
                    </a><!-- a href finish -->
                </li><!-- li finish -->
                
                
                <li><!-- li begin -->
                    <a href="index.php?view_customers"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-users"></i> Customeres
                        
                        <span class="badge"><?php echo $count_customers; ?></span>
                        
                    </a><!-- a href finish -->
                </li><!-- li finish -->
                
            
                <li class="divider"></li>
                
                <li><!-- li begin -->
                    <a href="logout.php"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-power-off"></i> Log Out
                        
                    </a><!-- a href finish -->
                </li><!-- li finish -->
                
            </ul><!-- dropdown-menu finish -->
            
        </li><!-- dropdown finish -->
        
    </ul><!-- nav navbar-right top-nav finish -->
    
    <div class="collapse navbar-collapse navbar-ex1-collapse"><!-- collapse navbar-collapse navbar-ex1-collapse begin -->
        <ul class="nav navbar-nav side-nav"><!-- nav navbar-nav side-nav begin -->
            <li><!-- li begin -->
                <a href="index.php?dashboard"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-dashboard"></i> Dashboard
                        
                </a><!-- a href finish -->
                
            </li><!-- li finish -->
            
            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#books"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-book"></i> Books
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="books" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_book"> Insert Books </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_books"> View Books </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->
            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#authors"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-edit"></i> Authors
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="authors" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_author"> Insert Author </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_authors"> View Authors </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->
            
            
            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#b_cat"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-star"></i> Books Categories
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="b_cat" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_b_cat"> Insert Book Category </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_b_cats"> View Books Categories </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->
            
            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#lang"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-language"></i> Languages
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="lang" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_lang"> Insert Languages </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_langs"> View Languages </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->
            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#slides"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-gear"></i> Slides
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="slides" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_slide"> Insert Slide </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_slides"> View Slides </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->
            <li><!-- li begin -->
                <a href="index.php?view_fbs"><!-- a href begin -->
                    <i class="fa fa-fw fa-comment"></i> View FeedBacks
                </a><!-- a href finish -->
            </li><!-- li finish -->
            <li><!-- li begin -->
                <a href="index.php?view_qsts"><!-- a href begin -->
                    <i class="fa fa-fw fa-question"></i> View Messages
                </a><!-- a href finish -->
            </li><!-- li finish -->
            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#boxes"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-dropbox"></i> Boxes
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="boxes" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_box"> Insert Box </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_boxes"> View Box </a>
                    </li><!-- li finish -->
                   
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->
            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#terms"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-table"></i> Terms
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="terms" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_term"> Insert Term </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_terms"> View Terms </a>
                    </li><!-- li finish -->
                   
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->
            
            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#coupon"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-gift"></i> Coupons
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="coupon" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?insert_coupon"> Insert Coupon </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_coupons"> View Coupons </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->
            
            <li><!-- li begin -->
                <a href="index.php?view_customers"><!-- a href begin -->
                    <i class="fa fa-fw fa-users"></i> View Customers
                </a><!-- a href finish -->
            </li><!-- li finish -->
            
            <li><!-- li begin -->
                <a href="index.php?view_orders"><!-- a href begin -->
                    <i class="fa fa-fw fa-list"></i> View Orders
                </a><!-- a href finish -->
            </li><!-- li finish -->
            <li><!-- li begin -->
                <a href="index.php?view_deliveries"><!-- a href begin -->
                    <i class="fa fa-fw fa-truck"></i> View Deliveries
                </a><!-- a href finish -->
            </li><!-- li finish -->
            <li><!-- li begin -->
                <a href="index.php?view_ccp_payments"><!-- a href begin -->
                    <i class="fa fa-fw fa-bank"></i> View CCP Payments
                </a><!-- a href finish -->
            </li><!-- li finish -->
            
            <li><!-- li begin -->
                <a href="index.php?view_payments"><!-- a href begin -->
                    <i class="fa fa-fw fa-money"></i> View Payments
                </a><!-- a href finish -->
            </li><!-- li finish -->
            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#states"><!-- a href begin -->
                        
                <i class="fa fa-bar-chart" aria-hidden="true"></i> Stats
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="states" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?books_chart_line">books Stats </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?cats_chart_line"> Categories Stats </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?langs_chart_line"> Languages Stats </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->
            <li><!-- li begin -->
                <a href="index.php?view_subscribers"><!-- a href begin -->
                    <i class="fa fa-fw fa-money"></i> Subscribers
                </a><!-- a href finish -->
            </li><!-- li finish -->
            <li><!-- li begin -->
                <a href="index.php?edit_css"><!-- a href begin -->
                    <i class="fa fa-fw fa-money"></i> CSS Editor
                </a><!-- a href finish -->
            </li><!-- li finish -->
            
            <li><!-- li begin --> <?php
            if($_SESSION['admin_email']=='nachef97@gmail.com'){
              echo "
                <a href='#' data-toggle='collapse' data-target='#users'><!-- a href begin -->
                        
                        <i class='fa fa-fw fa-users'></i> Users
                        <i class='fa fa-fw fa-caret-down'></i>
                        
                </a><!-- a href finish -->
                
                 <ul id='users' class='collapse'><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href='index.php?insert_user'> Insert User </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href='index.php?view_users'> View Users </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href='index.php?user_profile= $admin_id'> Edit User Profile </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                ";  }  ?>
                
            </li><!-- li finish -->
            
            <li><!-- li begin -->
                <a href="logout.php"><!-- a href begin -->
                    <i class="fa fa-fw fa-power-off"></i> Log Out
                </a><!-- a href finish -->
            </li><!-- li finish -->
            
        </ul><!-- nav navbar-nav side-nav finish -->
    </div><!-- collapse navbar-collapse navbar-ex1-collapse finish -->
    
</nav><!-- navbar navbar-inverse navbar-fixed-top finish -->




<?php } ?>