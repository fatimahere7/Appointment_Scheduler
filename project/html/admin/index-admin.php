<?php
 include("include/header.php");
 include("include/topbar.php");
 include("include/sidebar.php");
 include 'Calendar.php';
$calendar = new Calendar();
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
         

          </div><!-- /.col -->
          <div class="content home">
    			   <?=$calendar?>
    		   </div>
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol> -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <script>
    $(document).ready(function(){ 
					 $("ul#sidemenu li a").click(function(e){
						if (!$(this).hasClass("active")) {
								var tabNum = $(this).index();
								var nthChild = tabNum+1;
							$("ul#sidemenu li a.active").removeClass("active");
							$(this).addClass("active");
							$("ul#Contenttab1 li.selected").removeClass("selected");
							$("ul#Contenttab1 li:nth-child("+nthChild+")").addClass("selected");
						}
					});
                 });
</script>
<?php
 include("include/footer.php");
?>