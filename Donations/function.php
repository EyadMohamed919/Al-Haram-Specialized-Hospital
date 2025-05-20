<?php 
function deleteRecord($FileName,$Id)
{
    $myfile = fopen("BF.txt", "r+") or die("Unable to open file!");
	$LastId=0;
    $LoadFileContent="";
	while(!feof($myfile)) 
	{
  		$line= fgets($myfile);
  		$ArrayLine=explode("~",$line);
  		
  		if ($ArrayLine[0]==$Id)
  		{
		//Skip
		}
        else
        {
        $LoadFileContent.=$line;
        }
	}
    fclose($myfile);
    file_put_contents($FileName, trim($LoadFileContent));

}

?>