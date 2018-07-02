<?php
//
//Process a Form and print results
//by Minas Dasygenis (minas@spam.vlsi.gr) 2010
//
//
//echo "Your post request was succesfully processed: ";
//print "<table border=1 width=50%>";
//
//foreach($_POST as $key => $value) {
//	if(is_array($value)){
//	print "<tr><td><strong>$key</strong></td>";
//		foreach($value as $key2 => $value2) {
//			print "<td>$value2</td>";
//						    }
//		 	    }
//else 
//  print "<tr><td><strong>$key</strong></td><td>$value</td>";
//}
//print "</table>";




function print_r_xml($arr,$wrapper = 'data',$cycle = 1)
{
  //useful vars
  $new_line = "\n";

  //start building content
  if($cycle == 1) { $output = '<?xml version="1.0" encoding="UTF-8" ?>'.$new_line; }
  $output.= tabify($cycle - 1).'<'.$wrapper.'>'.$new_line;
  foreach($arr as $key => $val)
  {
    if(!is_array($val))
    {
      $output.= tabify($cycle).'<'.htmlspecialchars($key).'>'.$val.'</'.htmlspecialchars($key).'>'.$new_line;
    }
    else
    {
      $output.= print_r_xml($val,$key,$cycle + 1).$new_line;
    }
  }
  $output.= tabify($cycle - 1).'</'.$wrapper.'>';

  //return the value
  return $output;
}

/* tabify */
function tabify($num_tabs)
{
  for($x = 1; $x <= $num_tabs; $x++) { $return.= "\t"; }
  return $return;
}


//echo print_r_xml($_REQUEST);

                                $log=fopen("/tmp/344.postdata.txt","a");
				fwrite($log,"\n ************************ NEW ENTRY ************************ \n");
                                fwrite($log, print_r_xml($_REQUEST));
				fwrite($log,"\n\n\n\n\n");
                                fclose($log);


  if (! empty($_REQUEST) )
    {
	echo "Έλαβα το POST";
    }

?> 
