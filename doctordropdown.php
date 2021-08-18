<?Php
//echo $_GET['spec_name'];
@$spec_name=$_GET['spec_name'];
include_once('resources/init.php');

 $sql="SELECT
		               doctor.doctor_name, doctor.email as doctorname,
		               categories.name
		               FROM doctor
		               JOIN categories ON categories.id = doctor.doctor_cat
									 where
									 categories.name = '$spec_name' ";


$getdoctor = mysqli_query($conn, $sql);
$result=mysqli_fetch_array($getdoctor);
//echo $getdoctor->num_rows;
$main=array();
//$results_array = array();
foreach($getdoctor as $doc)
{      $main[] = array('doctor_name' => $doc['doctor_name'],
                          'email' =>
                               $doc['doctorname']
);
}

//$main = array('data'=>$result);
echo json_encode($main);
?>
