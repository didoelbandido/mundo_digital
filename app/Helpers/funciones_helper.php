
<?php
function generarcombo($data)
{$comb=array();
foreach($data as $obj){
    $comb[$obj['f1']]=$obj['f2'];
}
return $comb;}
?>