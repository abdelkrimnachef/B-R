<?php 
$active='Shop';
include("includes/header.php");



?>





   <div id="content" ><!-- content begggin -->
       <div class="container"><!-- container begggin -->
           <div class="col-md-12"><!-- col-md-12 begggin -->
              <ul class="breadcrumb"><!-- breadcrumb begggin -->
                  <li><a href="index.php">Home</a></li>
                  <li>
                      Shop
                  </li>
              </ul><!-- breadcumb finnish -->
               
           </div><!--col-md-12 Finish -->
           <div class="col-md-3"><!--col-md-3 beggin -->
             <?php 
      include("includes/sidebar.php");    
            ?> 
              
               
           </div><!--col-md-3 Finish -->
           <div class="col-md-9"><!--col-md-9 beggin -->
           
                           <div class='box'><!--box beggin -->
                               <h1>Shop</h1>
                               <p>
                                    WINNER OF THE BOOKER PRIZE

                                AMAZON EDITORS’ PICK FOR THE BEST BOOK OF 2019

                                The Testaments is a modern masterpiece, a powerful novel that can be read on its own or as a companion to Margaret Atwood’s classic, The Handmaid’s Tale
                                </p>
                           </div><!--box Finish -->
                
               <div id="books" class="row"><!--row Finish -->
               <?php 
                      getbooks();
                       
           
           
           
              ?>
                         
                 </div><!--row Finish -->
                 <center>
                   <ul class="pagination"> <!--pagination begin -->
                       
<?php 
                      getpaginator();  
           
           
           
              ?>


                   </ul><!--pagination Finish -->
               </center>
               
              
           </div><!--col-md-9 Finish -->
           <div id="wait" style="position:absolute;top:40%;left:45%;padding:200px 100px 100px 100px;">

           </div>
           
       </div><!-- container Finish -->
   </div><!-- content Finish -->
    <?php 
      include("includes/footer.php");   
      
///begin getbooks ///

?>
 
       
       
              
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
<script>
        $(document).ready(function(){
                //hide and show sidebar
            $('.nav-toggle-c').click(function(){

                $('.panel-collapse-c').slideToggle(300,function() {
                    if ($(this).css('display')=='none'){
                        $(".hide-show-c").html('Show');
                        
                    }else{
                        $(".hide-show-c").html('Hide');

                    }
                });
            });
            $('.nav-toggle-a').click(function(){

                $('.panel-collapse-a').slideToggle(300,function() {
                    if ($(this).css('display')=='none'){
                        $(".hide-show-a").html('Show');
                        
                    }else{
                        $(".hide-show-a").html('Hide');

                    }
                });
            });
            $('.nav-toggle-l').click(function(){

                $('.panel-collapse-l').slideToggle(300,function() {
                    if ($(this).css('display')=='none'){
                        $(".hide-show-l").html('Show');
                        
                    }else{
                        $(".hide-show-l").html('Hide');

                    }
                });
            });

            //search filter by letter
            $(function(){
                $.fn.extend({
                    filterTable: function(){
                       return this.each(function(){
                           $(this).on('keyup', function(){
                                var $this = $(this),
                                search = $this.val().toLowerCase(),
                                target = $this.attr('data-filters'),
                                handle = $(target),
                                rows = handle.find('li a');
                                if(search == ''){
                                    rows.show();
                                }else{
                                    rows.each(function(){
                                         var $this = $(this);
                                        $this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();
                                    });

                                }if(search == ''){
                                    rows.show();
                                }

                           });

                       });
                    }
                });
                $('[data-action="filter"][id="dev-table-filter"]').filterTable()
            });
         });

      
    </script>
    
    <script>
    
        $(document).ready(function(){

            // getProducts Function Begin //

            function getBooks(){

                // Code For Manufacturers Begin //

                var sPath = '';
                var aInputs = $('li').find('.get_book_categories');
                var aKeys = Array();
                var aValues = Array();

                iKey = 0;

                $.each(aInputs, function(key, oInput){

                    if(oInput.checked){

                        aKeys[iKey] = oInput.value

                    };

                    iKey++;

                });

                if(aKeys.length>0){

                    var sPath = '';

                    for(var i = 0; i < aKeys.length; i++){

                        sPath = sPath + 'b_cat[]=' + aKeys[i]+'&';

                    }

                }

                // Code For Manufacturers Finish //

                // Code For Product Categories Begin //

                var aInputs = Array();
                var aInputs = $('li').find('.get_authors');
                var aKeys = Array();
                var aValues = Array();

                iKey = 0;

                $.each(aInputs, function(key, oInput){

                    if(oInput.checked){

                        aKeys[iKey] = oInput.value

                    };

                    iKey++;

                });

                if(aKeys.length>0){

                    var sPath = '';

                    for(var i = 0; i < aKeys.length; i++){

                        sPath = sPath + 'auth[]=' + aKeys[i]+'&';

                    }

                }

                // Code For Product Categories Finish //

                // Code For Categories Begin //

                var aInputs = Array();
                var aInputs = $('li').find('.get_languages');
                var aKeys = Array();
                var aValues = Array();

                iKey = 0;

                $.each(aInputs, function(key, oInput){

                    if(oInput.checked){

                        aKeys[iKey] = oInput.value

                    };

                    iKey++;

                });

                if(aKeys.length>0){

                    var sPath = '';

                    for(var i = 0; i < aKeys.length; i++){

                        sPath = sPath + 'lang[]=' + aKeys[i]+'&';

                    }

                }

                // Code For Categories Finish //

                // Loader When Loading Begin //    

                $('#wait').html('<img src="images/load.gif"');

                // Loader When Loading Finish //  

                $.ajax({

                    url:"load.php",
                    method:"POST",

                    data: sPath+'sAction=getbooks',

                    success:function(data){

                        $('#books').html('');
                        $('#books').html(data);
                        $('#wait').empty();

                    }

                });

                $.ajax({

                    url:"load.php",
                    method:"POST",

                    data: sPath+'sAction=getpaginator',

                    success:function(data){

                        $('.pagination').html('');
                        $('.pagination').html(data);

                    }

                });

            }

            // getProducts Function Finish //

            

            $('.get_book_categories').click(function(){
                getBooks();
            });
            $('.get_authors').click(function(){
                getBooks();
            });

            $('.get_languages').click(function(){
                getBooks();
            });

        });
    
    </script>
    

    </body>
</html>


