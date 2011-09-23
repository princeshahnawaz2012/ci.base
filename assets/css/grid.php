<?php 
    header ("Content-type: text/css");
    
    $width = $_GET['width'];
    $margin = $_GET['margin'];
    $columns = 12;
    
    $column_width = $width/$columns;
    
?> 
body { min-width: <?php echo $width; ?>px;}

.container_12 { margin:0 auto; width: <?php echo $width; ?>px; }

<?php for( $i = 1; $i <= $columns ; $i++ ) { 
    echo ".grid_".$i." { display:inline; float:left; margin: 0px ".$margin."px;}\n";    
} ?>                    


<?php for( $i = 1; $i < $columns ; $i++ ) { 
    echo ".push_".$i.", .pull_".$i." { position:relative }\n";    
} ?>

.alpha { margin-left: 0; }
.omega { margin-right: 0; }

/* `Grid >> 12 Columns
----------------------------------------------------------------------------------------------------*/
<?php for( $i = 1; $i <= $columns ; $i++ ) { 
    echo ".container_12 .grid_".$i." { width:".($column_width*$i - $margin*2)."px}\n";    
} ?>

<?php for( $i = 1; $i < $columns ; $i++ ) { 
    echo ".container_12 .prefix_".$i." { padding-left:".($column_width*$i)."px}\n";    
} ?>

<?php for( $i = 1; $i < $columns ; $i++ ) { 
    echo ".container_12 .suffix_".$i." { padding-right:".($column_width*$i)."px}\n";    
} ?>

<?php for( $i = 1; $i < $columns ; $i++ ) { 
    echo ".container_12 .push_".$i." { left:".($column_width*$i)."px}\n";    
} ?>


<?php for( $i = 1; $i < $columns ; $i++ ) { 
    echo ".container_12 .pull_".$i." { left:-".($column_width*$i)."px}\n";    
} ?>

.clear {clear: both; display: block; overflow: hidden; visibility: hidden; width: 0; height: 0;}

.clearfix:before, .clearfix:after { content: '\0020'; display: block; overflow: hidden; visibility: hidden; width: 0; height: 0;}
.clearfix:after { clear: both;}

/*
	The following zoom:1 rule is specifically for IE6 + IE7.
	Move to separate stylesheet if invalid CSS is a problem.
.clearfix {
	zoom: 1;
}
*/