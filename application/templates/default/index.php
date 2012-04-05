<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
                      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
    	
<?php echo $metas; ?>
    
<?php echo $_styles; ?>
<?php echo $_scripts; ?>

   </head>
   
   <body>
      <div id="wrapper">
      
         <div id="header">
            <?php echo $header; ?>
         </div>

         <div id="main">
         
            <div id="content">
                <?php echo $content; ?>
            </div>
            
            <div id="sidebar">
                <?php echo $sidebar; ?>
            </div>
            
         </div>
         
         <div id="footer">
            <?php echo $footer; ?>
         
         </div>
      </div>
   </body>
</html>