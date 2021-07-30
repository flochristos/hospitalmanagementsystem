<?php
require_once './includes/dbconfig.php';

if(isset($_POST['submit']))
{
    if($_FILES['csvFile']['name']!="")
    {   $fileName=uploadFile($_FILES['excelFile'],array(".csv"),"excel_file");
        $row=0;
        if(($handle = fopen("excel/".$fileName , "r")) !== FALSE) 
        {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
            {
                $num = count($data);
                $query="INSERT INTO StudentData(FirstName,LastName,MobileNo,City)
                                VALUES('".$data[0]."','".$data[1]."','".$data[2]."','".$data[3]."')";
                mysql_query($query);
            }
            fclose($handle);
        }
    }
    else if($_FILES['excelFile']['name']!="")
    {
        $fileName=uploadFile($_FILES['excelFile'],array(".xls",".xlsx"),"excel_file");
        $data = new Spreadsheet_Excel_Reader();
        $data->read('excel_file/'.$fileName);
        for($i=1;$i<=$data->sheets[0]['numRows'];$i++)
        {
            $firstname=$data->sheets[0]['cells'][$i][1];
            $lastname=$data->sheets[0]['cells'][$i][2];
            $mobile=$data->sheets[0]['cells'][$i][3];
            $city=$data->sheets[0]['cells'][$i][4];
            $query="INSERT INTO StudentData(FirstName,LastName,MobileNo,City)
                        VALUES('".$firstname."','".$lastname."','".$mobile."','".$city."')";
            mysql_query($query);
        }
    }
}
?>


<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
<input type="file" name="excelFile" id="file" />
<input type="submit" name="submit" />

