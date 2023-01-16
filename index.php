<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>TEST Webapp Server</title>


    <!-- Bootstrap -->
    <link href="./assets/bootstrap.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">



   
  </head>
  <body>
  <div class="container">
  <div class="row justify-content-md-center">
      <div class="col col-md-12">
      &nbsp
    </div>
  </div>

  <div class="row justify-content-md-center">
    <div class="col col-lg-1">
      
    </div>
    <div class="col col-lg-8">
    <h2>Hi There!  You have reached <?php echo gethostname(); ?> </h2>
    <p>This is a LIVE environment

    </div>
  </div><!-- row -->

<?php

function specials($itm)
  {
   $itm = ($itm == 'snipeit')? $itm.'/public': $itm; 
   $itm = ($itm == 'SocialMediaQuiz')? $itm.'': $itm; 
   return $itm ;
  }


function buttoneer($itm, $col)
  {
   $lnk = specials($itm);
   $btn  = '  <div class="col col-lg-2 ">'."\n";
   $btn .= ($itm != 'BLANKO!') ? '    <a class="btn btn-'.$col.' btn-block" href="http://'.gethostname().'/'.$lnk.'/" role="button">'.$itm.'</a>'."\n" : '&nbsp';
  
   $btn .= '  </div>'."\n";
   return $btn;    
  }


$pop = scandir(getcwd());
foreach ($pop as $dir)
{
  if(is_dir ( $dir ))
  {if($dir != "." && $dir != ".." && $dir !='assets')
  {$pip[] = $dir; }
  }
}

$fin = count($pip);
while ($fin >= 5)
  {$fin -= 5 ;}

$fin = (5 - $fin);

for($i = 1; $i <= $fin; $i++ )
  {
    $pip[] = 'BLANKO!';
  }


$colours = ['primary', 'success', 'info', 'warning', 'danger'];

$col = 6;
$clr = 0;
$row = 0;
$out = '';

foreach ($pip as $dir)
  {

      if($row === 0)
        {
         $out .= ($out != '') ? '</div>'."\n" : '';
         $out .=  '<div class="row mt-3 justify-content-md-center">' ."\n";
         $row = 1;
         $clr += 1;
        }
        
        
        $out .= buttoneer($dir, $colours[$clr]);
        
        $clr = ($clr < 4) ? $clr+1 : 0;
        $col -= 1;
        if($col ===  1 )
        {
          $col = 6;
          $row  = 0;
        }
        
      }
    
 
  echo $out . '</div>';
?>


   </div> <!-- container -->

  </body>
 </html>