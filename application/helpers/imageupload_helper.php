<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function resizeImage($source="",$target="",$filename="",$width="",$height="")
{
	 if(!empty($source) && !empty($target) && !empty($filename) && !empty($width) && !empty($height))
	  {
	  	  $CI =& get_instance();
		  $source_path = $source.$filename;

		  $config = array(
		      'image_library' => 'gd2',
		      'source_image' => $source_path,
		      'new_image' => $target,
		      'create_thumb' => FALSE,
	          'maintain_ratio' => FALSE,
	          'master_dim'=> 'width',
	          'quality'  => 100,
	          'width' => $width,
	          'height'=> $height,
		  );

		  $CI->load->library('image_lib');
		  $CI->image_lib->initialize($config);

		  if (!$CI->image_lib->resize())
		  {
		      return $CI->image_lib->display_errors();
		  }
		  else
		  {
		  	return true;
		  }


		  //$CI->image_lib->clear();
	}
	else
	{
		return false;
	}
}

	function unlinkImage($table = null, $cond = null, $column = null) // unlink image
	{
		$CI =& get_instance();
		$imageDetail = $CI->CommonModel->single($table, $cond, $column);
	    $full_url1 = './assets/admin/img/'.$imageDetail[$column];
	   	$full_url2 = './assets/admin/resizeImage/'.$imageDetail[$column];
				if(file_exists($full_url1))
				{
					unlink($full_url1);
				}
				if(file_exists($full_url2))
				{
					unlink($full_url2);
				}
		return true;
	}





 

?>
