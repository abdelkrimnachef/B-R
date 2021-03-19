<?php 

$aAuth = array();
$aBcat = array();
$aLang = array();
// This is for categories Begin //

if(isset($_REQUEST['b_cat'])&&is_array($_REQUEST['b_cat'])){

    foreach($_REQUEST['b_cat'] as $sKey=>$sVal){

        if((int)$sVal!=0){

            $aBcat[(int)$sVal] = (int)$sVal;

        }

    }

}

// This is for categories Finisih //
// This is for manufacturers Begin //

if(isset($_REQUEST['auth'])&&is_array($_REQUEST['auth'])){

    foreach($_REQUEST['auth'] as $sKey=>$sVal){

        if((int)$sVal!=0){

            $aAuth[(int)$sVal] = (int)$sVal;

        }

    }

}

// This is for manufacturers Finisih //


// This is for categories Begin //

if(isset($_REQUEST['lang'])&&is_array($_REQUEST['lang'])){

    foreach($_REQUEST['lang'] as $sKey=>$sVal){

        if((int)$sVal!=0){

            $aLang[(int)$sVal] = (int)$sVal;

        }

    }

}

// This is for categories Finisih //


?>
<div class="panel panel-default sidebar-menu"><!--panel panel-default sidebar-menu beggin-->
    <div class="panel-heading"><!--panel heading beggin -->
        <h3 class="panel-title"><!--panel title begin -->
          Book category
          <div class="pull-right"><!--pull-right begin -->
              <a href="#" style="color: #999999;">
                <span class="nav-toggle-c hide-show-c"><!--nav-toggle hide-show begin -->
                    Hide
                </span><!--nav-toggle hide-show finish -->
              </a>
           </div><!--pull-right finish -->
        </h3><!--panel title Finish -->
    </div><!--panel heading Finish -->
    <div class="panel-collapse-c"><!--panel-collapse collapse-data begin -->
        <div class="panel-body"><!--panel body beggin -->
            <div class="input-group"><!--input-group beggin -->
                <input type="text" class="form-control" id="dev-table-filter" data-filters="#dev-b-cat" data-action="filter" placeholder="Filter Book Categries">
                <a class="input-group-addon"><!--input-group-addon beggin -->
                    <i class="fa fa-search"></i>
                </a><!--input-group-addon finish -->
            </div><!--input-group finish -->
        </div><!--panel body finish -->
            
        <div class="panel-body scroll-menu" id="dev-b-cat"><!--panel body begin -->
            <ul class="nav nav-pills nav-stacked category-menu"><!--nav nav-pills nav-stacked category-menu beggin -->
                <?php 
                    $get_book_categories = "select * from book_categories where b_cat_top='yes' order by b_cat_title ASC";
                    $run_book_categories = mysqli_query($con,$get_book_categories);
                    while($book_categories=mysqli_fetch_array($run_book_categories)){
                        $b_cat_id = $book_categories['b_cat_id'];
                        $b_cat_title = $book_categories['b_cat_title'];
                      
                        echo "
                    <li style='background:#999999' class='checkbox checkbox-primary'>

                        <a>

                            <label style='color:#111111'>

                                <input ";
                                
                                if(isset($aBcat[$b_cat_id])){
                                    echo "checked='checked'";
                                }
                                
                                echo " value='$b_cat_id' type='checkbox' class='get_book_categories' name='b_cat'>

                                <span>
                            
                                $b_cat_title
                                </span>

                            </label>

                        </a>
                    
                    </li>
                    ";
                    }
                
                    
                    $get_book_categories = "select * from book_categories where b_cat_top='no' order by b_cat_title ASC";
                    $run_book_categories = mysqli_query($con,$get_book_categories);
                    while($row_book_categories=mysqli_fetch_array($run_book_categories)){
                        $b_cat_id = $row_book_categories['b_cat_id'];
                        $b_cat_title = $row_book_categories['b_cat_title'];
                       
                        echo "
                    <li  class='checkbox checkbox-primary'>

                        <a>

                            <label style='color:#777777'>

                                <input ";
                                
                                if(isset($aBcat[$b_cat_id])){
                                    echo "checked='checked'";
                                }
                                
                                echo " value='$b_cat_id' type='checkbox' class='get_book_categories' name='b_cat'>

                                <span>
                            
                                $b_cat_title
                                </span>

                            </label>

                        </a>
                    
                    </li>
                    ";
                    }
                
                ?>
            </ul><!--nav nav-pills nav-stacked category-menu finish -->
        </div><!--panel body finish -->
    </div><!--panel-collapse collapse-data Finish -->
</div><!--panel panel-default sidebar-menu Finish -->        

<div class="panel panel-default sidebar-menu"><!--panel panel-default sidebar-menu beggin-->
    <div class="panel-heading"><!--panel heading beggin -->
        <h3 class="panel-title"><!--panel title begin -->
          Authors
          <div class="pull-right"><!--pull-right begin -->
              <a href="#" style="color: #999999;">
                <span class="nav-toggle-a hide-show-a"><!--nav-toggle hide-show begin -->
                    Hide
                </span><!--nav-toggle hide-show finish -->
              </a>
           </div><!--pull-right finish -->
        </h3><!--panel title Finish -->
    </div><!--panel heading Finish -->
    <div class="panel-collapse-a collapse-data"><!--panel-collapse collapse-data begin -->
        <div class="panel-body"><!--panel body beggin -->
            <div class="input-group"><!--input-group beggin -->
                <input type="text" class="form-control" id="dev-table-filter" data-filters="#dev-author" data-action="filter" placeholder="Filter Authors">
                <a class="input-group-addon"><!--input-group-addon beggin -->
                    <i class="fa fa-search"></i>
                </a><!--input-group-addon finish -->
            </div><!--input-group finish -->
        </div><!--panel body finish -->
            
        <div class="panel-body scroll-menu" id="dev-author"><!--panel body begin -->
            <ul class="nav nav-pills nav-stacked category-menu"><!--nav nav-pills nav-stacked category-menu beggin -->
                <?php 
                    $get_authors = "select * from authors where author_top='yes' order by author_name ASC";
                    $run_authors = mysqli_query($con,$get_authors);
                    while($row_authors=mysqli_fetch_array($run_authors)){
                        $author_id = $row_authors['author_id'];
                        $author_name = $row_authors['author_name'];
                        $author_image = $row_authors['author_image'];
                        if ($author_image == "") {
                            #
                        }else{
                            $author_image = "<img src='admin_area/other_images/$author_image'width='20px'>&nbsp ";
                        }
                        echo "
                    <li style='background:#999999' class='checkbox checkbox-primary'>

                        <a>

                            <label style='color:#111111'>

                                <input ";
                                
                                if(isset($aAuth[$author_id])){
                                    echo "checked='checked'";
                                }
                                
                                echo " value='$author_id' type='checkbox' class='get_authors' name='author'>

                                <span>
                                $author_image
                              $author_name 
                                </span>

                            </label>

                        </a>
                    
                    </li>
                    ";
                    }
                
                    
                    $get_authors = "select * from authors where author_top='no' order by author_name ASC";
                    $run_authors = mysqli_query($con,$get_authors);
                    while($row_authors=mysqli_fetch_array($run_authors)){
                        $author_id = $row_authors['author_id'];
                        $author_name = $row_authors['author_name'];
                        $author_image = $row_authors['author_image'];
                        if ($author_image == "") {
                            #
                        }else{
                            $author_image = "<img src='admin_area/other_images/$author_image'width='20px'>&nbsp ";
                        }
                        
                        echo "
                    <li style='backcolor:#777777' class='checkbox checkbox-primary'>

                        <a>

                            <label style='color:#777777'>

                                <input ";
                                
                                if(isset($aAuth[$author_id])){
                                    echo "checked='checked'";
                                }
                                
                                echo " value='$author_id' type='checkbox' class='get_authors' name='author'>

                                <span>
                                $author_image
                                $author_name
                                </span>

                            </label>

                        </a>
                    
                    </li>
                    ";
                    }
                
                ?>
            </ul><!--nav nav-pills nav-stacked category-menu finish -->
        </div><!--panel body finish -->
    </div><!--panel-collapse collapse-data Finish -->
</div><!--panel panel-default sidebar-menu Finish -->

<div class="panel panel-default sidebar-menu"><!--panel panel-default sidebar-menu beggin-->
    <div class="panel-heading"><!--panel heading beggin -->
        <h3 class="panel-title"><!--panel title begin -->
          Languages
          <div class="pull-right"><!--pull-right begin -->
              <a href="#" style="color: #999999;">
                <span class="nav-toggle-l hide-show-l"><!--nav-toggle hide-show begin -->
                    Hide
                </span><!--nav-toggle hide-show finish -->
              </a>
           </div><!--pull-right finish -->
        </h3><!--panel title Finish -->
    </div><!--panel heading Finish -->
    <div class="panel-collapse-l collapse-data"><!--panel-collapse collapse-data begin -->
        <div class="panel-body"><!--panel body beggin -->
            <div class="input-group"><!--input-group beggin -->
                <input type="text" class="form-control" id="dev-table-filter" data-filters="#dev-lang" data-action="filter" placeholder="Filter Languages">
                <a class="input-group-addon"><!--input-group-addon beggin -->
                    <i class="fa fa-search"></i>
                </a><!--input-group-addon finish -->
            </div><!--input-group finish -->
        </div><!--panel body finish -->
            
        <div class="panel-body scroll-menu" id="dev-lang"><!--panel body begin -->
            <ul class="nav nav-pills nav-stacked category-menu"><!--nav nav-pills nav-stacked category-menu beggin -->
                <?php 
                    $get_languages = "select * from languages where lang_top='yes'order by lang_title ASC";
                    $run_languages = mysqli_query($con,$get_languages);
                    while($row_languages=mysqli_fetch_array($run_languages)){
                        $lang_id = $row_languages['lang_id'];
                        $lang_title = $row_languages['lang_title'];
                       
                        echo "
                    <li style='background:#999999' class='checkbox checkbox-primary'>

                        <a>

                            <label style='color:#111111'>

                                <input ";
                                
                                if(isset($aLang[$lang_id])){
                                    echo "checked='checked'";
                                }
                                
                                echo " value='$lang_id' type='checkbox' class='get_languages' name='lang'>

                                <span>
                               
                                $lang_title
                                </span>

                            </label>

                        </a>
                    
                    </li>
                    ";
                    }
                
                    
                    $get_languages = "select * from languages where lang_top='no' order by lang_title ASC";
                    $run_languages = mysqli_query($con,$get_languages);
                    while($row_languages=mysqli_fetch_array($run_languages)){
                        $lang_id = $row_languages['lang_id'];
                        $lang_title = $row_languages['lang_title'];
                        
                        echo "
                    <li class='checkbox checkbox-primary'>

                        <a>

                            <label style='color:#777777'>

                                <input ";
                                
                                if(isset($aLang[$lang_id])){
                                    echo "checked='checked'";
                                }
                                
                                echo " value='$lang_id' type='checkbox' class='get_languages' name='lang'>

                                <span>
                               
                                $lang_title
                                </span>

                            </label>

                        </a>
                    
                    </li>
                    ";
                    }
                
                ?>
            </ul><!--nav nav-pills nav-stacked category-menu finish -->
        </div><!--panel body finish -->
    </div><!--panel-collapse collapse-data Finish -->
</div><!--panel panel-default sidebar-menu Finish -->

<!--------------------------------------mm3d n3awdha psq ji ghir f shop.php berq ltahta kml -->