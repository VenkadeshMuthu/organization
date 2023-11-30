<?php 
session_start();
$user_id = $_SESSION['id'];
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);

$api_url = $_SERVER['HTTP_HOST'].'/'.$uri_segments[1].'/test_api?action=all_users&id='.$user_id;


$client = curl_init($api_url);

curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
curl_setopt($client, CURLOPT_URL,$api_url);
$response = curl_exec($client);

$result = json_decode($response);
$output ='';

if(count($result) > 0){
	foreach($result as $row){
		$output .='
		<tr>
	      <td class="product-thumbnail">'. $row->name.'</td>
	      <td class="product-thumbnail">'. $row->email.'</td>
	      <td class="product-thumbnail">'. $row->phone.'</td>
	      <td class="product-thumbnail">'. $row->address.'</td>
	      <td class="product-name">
		  	<a href="update_user?id='. $row->id.'"><button type="button" class="btn btn-success btn-lg">Update</button></a>
			<a href="delete_user?id='. $row->id.'"><button type="button" class="btn btn-danger btn-lg ms-2">Delete</button></a>
	      </td>
	    </tr>
		';
	}
}else{
	$output .='
	<tr>
	<td colspan="4" align="center">No Data Found</td>
	</tr>
	';
}
echo $output;
?>