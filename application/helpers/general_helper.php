<?php
function sendEmail($to,$from,$subject,$message,$cc=array(),$bcc=array(),$attachments=array()) {
	if(isset($to) && !empty($subject) && !empty($message)){
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' =>  465,
			'smtp_user' => 'mastcrew22@gmail.com',
			'smtp_pass' => 'crew@1234',
			'mailtype'  => 'html', 
			'charset'   => 'UTF-8',
		);
		$CI =& get_instance();
		$CI->load->library('email',$config);
		$CI->email->set_newline("\r\n");
		if(isset($from)){
			$from=array(
			'name'=>'Active Academy',
			'email'=>'mastcrew22@gmail.com'
			);
		}
		$CI->email->from($from['email'], $from['name']); 
		//$to='mastcrew22@gmail.com';
		$CI->email->to($to);
		if(isset($cc)){
			$CI->email->cc($cc);
		}
		
		if(isset($bcc)){
			$CI->email->bcc($cc);
		}
		if(count($attachments)>0){
			foreach($attachments as $attachment){
				$CI->email->attach($attachment);
			}
		}
		$CI->email->subject($subject); 
		$CI->email->message($message); 
		$sent=$CI->email->send();
  		if(!$sent){
 			return $CI->email->print_debugger();
		}else{
 			return $sent;
		}
	}
	return false;
	
}

 function substrValue($value='')
{
	return substr($value,15);
}

// function unlinkImage($module,$image)
// {
//     // $full_url='./attachments/'.$module.'/';
//     // if(file_exists($full_url.'thumb/'.$image) && !empty($image))
// 		// {
//     //         unlink($full_url.'thumb/'.$image);
//     //     }
//     //     if(file_exists($full_url.'main/'.$image) && !empty($image))
// 		// 		{
//     //         unlink($full_url.'main/'.$image);
//     //     }
// 		// 
//     //     if(file_exists($full_url.'temp/'.$image) && !empty($image))
// 		// 		{
//     //         unlink($full_url.'temp/'.$image);
//     //     }
// }

function settDateYMD($date){
    if($date!='00/00/0000' && $date!=''){
        $return= date('Y-m-d',strtotime(str_replace('/','-',$date)));
    }else{
        $return="";
    }
    return $return;
}

function activityLog($data){
	if(count($data)>0){
		$CI = get_instance();
		$CI->load->model('Admin_model');
		$CI->Admin_model->activityLog($data);
	}
}
function makeSlug($str){
	if(!empty($str)){
		$str = preg_replace('~[^\pL\d]+~u', '-', $str);

		$str = iconv('utf-8', 'us-ascii//TRANSLIT', $str);

		$str = preg_replace('~[^-\w]+~', '', $str);

		$str = trim($str, '-');

		$str = preg_replace('~-+~', '-', $str);

		$str = strtolower($str);

		if (empty($str)) {
			return 'n-a';
		}
	}else{
		$str='n-a';;
	}
	return $str;
}

function getStatus($status){
	if($status){
		$return="<span class='btn btn-sm btn-success'>Active</span>";
	}else{
		$return="<span  class='btn btn-sm btn-danger'>In-active</span>";
	}
	return $return;
}
function showYesNo($status){
	if($status){
		$return="<span style='color:green'>Yes</span>";
	}else{
		$return="<span style='color:red'>No</span>";
	}
	return $return;
}

function getDateDMY($date){
	if($date!='0000-00-00' && $date!=''){
		$return= date('d/m/Y',strtotime($date));
	}else{
		$return="";
	}
	return $return;
}


function settYMD($date){
	if($date!='00-00-0000' && $date!=''){
		$return= date('Y-m-d',strtotime($date));
	}else{
		$return="";
	}
	return $return;
}
function getSettingData($key){
	if(!empty($key)){
		$CI = get_instance();
		$CI->load->model('Website_model');
		$where=array('setting_key'=>$key);
		$result= $CI->Website_model->getSettingData($where);
 		return $result;
	}else{
		return array();
	}
}
function getReplies($id){
 	if(!empty($id)){
 		$CI = get_instance();
		$CI->load->model('Website_model');
		$where=array('er.parent_id'=>$id,'er.status'=>1);
		return $CI->Website_model->getEventComment($where);
 	}else{
 		return array();
	}
}


// function resizeImage($path,$fileData,$old_image='',$image_sizes=array()){
// 	if(count($image_sizes)>0){
// 		$CI =& get_instance();
// 		$CI->load->library('image_lib');
// 		foreach ($image_sizes as $key=>$resize) {
// 			$config2 = array(
// 
// 			'source_image' => $fileData['full_path'],
// 
// 			'new_image' => $path.$key,
// 
// 			'maintain_ratio' => FALSE,
// 
// 			'width' => $resize[0],
// 
// 			'height' => $resize[1],
// 
// 			'quality' =>70,
// 
// 			);
// 
// 			$CI->image_lib->initialize($config2);
// 
// 			$CI->image_lib->resize();
// 
// 			$CI->image_lib->clear();
// 
// 		}
// 		$image=$fileData['file_name'];
// 		if(file_exists($path.'temp/'.$image)){
// 			//unlink($path.'temp/'.$image);
// 		}
// 		if(!empty($old_image)){
// 			if(file_exists($path.'thumb/'.$old_image)){
// 				unlink($path.'thumb/'.$old_image);
// 			}
// 			if(file_exists($path.'main/'.$old_image)){
// 				unlink($path.'main/'.$old_image);
// 			}
// 		}
// 	}
// }


function getBanner($page){
	$CI = get_instance();
	$CI->load->model('Website_model');
	$banner= $CI->Website_model->getBanner($page);
   	$html='';
	$image=$banner['image'];
  	if(!empty($image) && file_exists('./attachments/banner/main/'.$image)){
		 $full_image=base_url('attachments/banner/main/'.$image); 
	}else{ 
 		switch($page){
			case 0:
			$full_image=base_url('assets/images/slide.jpg');
			break;
			
			case 1:
			$full_image=base_url('assets/images/title-banner.jpg');
			break;
			
			case 2:
			$full_image=base_url('assets/images/title-banner5.jpg');
			break;
			
			default :
			$full_image=base_url('assets/images/slide.jpg');
			break;
		}
	}
	  $html .='<section class="title-wrapper news-title" style="background-image: url('.$full_image.');">';
	  $html .='<div class="container-fluid">';
	  $html .='<div class="row">';
	  $html .='<div class="col-md-12">';
	  $html .='<h2>'.$banner['title'].'</h2>';
	  $html .='<ul>
				<li><a href="'.base_url().'">Home</a></li>
				<i class="fas fa-angle-double-right"></i>
				<li><span>'.$banner['title'].'</span></li>
				</ul>';
	$html .='</div></div></div></section>';  
	return $html;
}

function get_date_diff( $time1, $time2, $precision = 2 ) {
	// If not numeric then convert timestamps
	if( !is_int( $time1 ) ) {
		$time1 = strtotime( $time1 );
	}
	if( !is_int( $time2 ) ) {
		$time2 = strtotime( $time2 );
	}

	// If time1 > time2 then swap the 2 values
	if( $time1 > $time2 ) {
		list( $time1, $time2 ) = array( $time2, $time1 );
	}

	// Set up intervals and diffs arrays
	$intervals = array( 'year', 'month', 'day', 'hour', 'minute', 'second' );
	$diffs = array();

	foreach( $intervals as $interval ) {
		// Create temp time from time1 and interval
		$ttime = strtotime( '+1 ' . $interval, $time1 );
		// Set initial values
		$add = 1;
		$looped = 0;
		// Loop until temp time is smaller than time2
		while ( $time2 >= $ttime ) {
			// Create new temp time from time1 and interval
			$add++;
			$ttime = strtotime( "+" . $add . " " . $interval, $time1 );
			$looped++;
		}

		$time1 = strtotime( "+" . $looped . " " . $interval, $time1 );
		$diffs[ $interval ] = $looped;
	}

	$count = 0;
	$times = array();
	foreach( $diffs as $interval => $value ) {
		// Break if we have needed precission
		if( $count >= $precision ) {
			break;
		}
		// Add value and interval if value is bigger than 0
		if( $value > 0 ) {
			if( $value != 1 ){
				$interval .= "s";
			}
			// Add value and interval to times array
			$times[] = $value . " " . $interval;
			$count++;
		}
	}

	// Return string with times
	return implode( ", ", $times );
}

function getScholasrshipByCategory($category_id){
	if(!empty($category_id)){
		$CI = get_instance();
		$CI->load->model('Website_model');
		$where=array('category_id'=>$category_id,'status'=>1);
		$result=$CI->Website_model->getScholasrshipByCategory($where);
		return $result;
	}
}
function getJudgementByCategory($category_id){
	if(!empty($category_id)){
		$CI = get_instance();
		$CI->load->model('Website_model');
		$where=array('category_id'=>$category_id,'status'=>1);
		$result=$CI->Website_model->getJudgementByCategory($where);
		return $result;
	}
}
function randomPassword( $length = 8 ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
}


 // Get Slider Data
function getHomeSlider($tableName = 'slider',$where=array()) {  

    $CI = & get_instance();
    $CI->load->database();
	$CI->db->select('*');
	$CI->db->from($tableName);
	if(count($where > 0)) 
	{
		$CI->db->where($where);
	}
	$CI->db->where('status',1);
	$CI->db->where('page_id',2);

	$query 	=  $CI->db->get(); 
    $result =  $query->result_array();
    if ($result )
    {    	
		/*$html='';	 	
	 	$s_img = 1; 
	 	foreach($result as $slider_img) 
	 	{ 			
			if($s_img == 1)
			{ 
				$html .='<div class="carousel-item active" >'; 
			}
			else
			{
				$html .='<div class="carousel-item" >'; 
			}

			$image= base_url("attachments/slider/main/").$slider_img["image"];

			$html .='<div class="bannerItem">';
			//$html .="<div class='fullBg' style='background-image: url(".$image.")'></div>";
			$html .='<div class="fullBg" style="background-image: url('.$image.');"></div>';
			//$html .='<a href=""><img  src="'.base_url("attachments/slider/main/").$slider_img["image"].'"></a>';
			$html .='</div>';
			$html .='</div>';
	        $s_img++; 
    	}*/
    	return $result;
    	//return $html;
    }
    else
    {
		return false;
    }
}


// Get All Event Lists
function getFeaturedCategoryLists($tableName = null, $limit = null) {  
	//$end=date('Y-m-d');
    $CI = & get_instance();
    $CI->load->database();
	$CI->db->select('*');
	$CI->db->order_by('id', 'ASC');
	$CI->db->from($tableName);	
	$CI->db->where('status',1);	
	$CI->db->where('featured',1);	
	$CI->db->where('is_deleted',0);	
	$CI->db->limit($limit);
	$query 	=  $CI->db->get(); 
    $categoryresults =  $query->result_array();
    if ($categoryresults )
    {    	
		$html='';	 	 
		$i=1;
	 	foreach($categoryresults as $categoryresult) 
	 	{ 
			$html .='<div class="serviceBox sb'. $i++ .' ">';
			$html .='<div class="d-flex">';
			$html .='<div class="serviceImg"><a href="'.base_urL('category/'.$categoryresult["id"]).'"><img src="'.base_urL('attachments/category/temp/'.$categoryresult["image"]).'" alt="image"></a></div>';
			$html .='<div class="serviceContent">';
			$html .='<div class="serviceContentText">';
			$html .='<h2><a href="'.base_urL('category/'.$categoryresult["id"]).'">'.ucfirst($categoryresult['name']).'</a></h2>';
			$html .='<p></p>';
			$html .='</div>';
			$html .='</div>';
			$html .='</div>';
			$html .='</div>';
	 	}
	 	return $html;
	}
	}


// Get All Event Lists
function getPastEventLists($tableName = null, $limit = null) {  
	//$end=date('Y-m-d');
    $CI = & get_instance();
    $CI->load->database();
	$CI->db->select('*');
	$CI->db->order_by('id', 'DESC');
	$CI->db->from($tableName);	
	$CI->db->where('status',1);	
	//$CI->db->where('total_booked <', 10);	
	$CI->db->where('event_start_date <',date('Y-m-d'));	
	$CI->db->limit($limit);
	$query 	=  $CI->db->get(); 
	//echo  $CI->db->last_query(); 

    $eventresults =  $query->result_array();
    if ($eventresults )
    {    	
		$html='';	 	 
	 	foreach($eventresults as $eventresult) 
	 	{ 
			$date= date('l, d M Y',strtotime($eventresult['event_start_date']));

			$dateonly = date('d',strtotime($eventresult['event_start_date']));

			$monthonly = date('M',strtotime($eventresult['event_start_date']));

			$todate= date('l, d M Y',strtotime($eventresult['event_end_date']));

			$todateonly = date('d',strtotime($eventresult['event_end_date']));

			$tomonthonly = date('M',strtotime($eventresult['event_end_date']));
			//Sunday, April 25
			$html .='<div class="col-lg-4 col-sm-6">';
			$html .='<div class="eventBox">';
			$html .='<div class="eventImg">';

			
			
			if ($eventresult['total_booked'] < 10 && $eventresult['type']==1) 
			{
				$eventtitle='Pre-booking';
				$slug=base_url('events-detail/'.$eventresult['slug']);
				
			}
			else
			{

				switch($eventresult['type']){
				case 0:
				$eventtitle='Free';
				$slug=base_url('events-detail/'.$eventresult['slug']);
				break;
				
				case 1:
				$eventtitle='Paid';
				$slug=base_url('events-detail/'.$eventresult['slug']);
				break;
				
				/*case 2:
				$eventtitle='Pre-booking';
				$slug=base_url('events-prebooking/'.$eventresult['slug']);
				break;*/
				
				default :
				$slug=base_url();
				break;
				}

			}
			if(!empty($eventresult['image']))
			{ 
				$image=base_url('attachments/event/temp/').$eventresult['image'];
				$html .='<a href="'.$slug.'"><img src="'.$image.'" alt="image"></a>';
			}
			else
			{
				$html .='<a href="'.$slug.'"><img src="'.base_urL().'assets/frontend/assets/images/event-1.jpg" alt="image name"></a>';
			}

			$html .='<div class="eventWish"><a href=""><i class="far fa-heart"></i></a> <span>'.$eventresult['total_booked'].'/'.$eventresult['number_of_person'].'</span></div>';		
			
			
			if($eventresult['price'] == 0)
			{ 
				$html .='<div class="eventPrice"><strong>Free</strong></div>'; 
			}
			else
			{
				$html .='<div class="eventPrice single eventPriceExt"> <span>Single</span><strong>'.$eventresult['price'].'</strong> <span>BHD</span></div>'; 
				$html .='<div class="eventPrice eventPriceExt"><span>Package</span> <strong>'.$eventresult['package_price'].'</strong> <span>BHD</span></div>';
			}
			
			$html .='<div class="eventType"><span>'.ucfirst($eventtitle).'</span></div>';
			$html .='</div>';
			$html .='<div class="eventContent">';
			$html .='<div class="d-flex">';
			$html .='<div class="eventDate eventDate2">';
			$html .='<strong>'.$dateonly.' '.$monthonly.'</strong>';
			$html .='<span>to</span>';
			$html .='<strong>'.$todateonly.' '.$tomonthonly.'</strong>';
			$html .='</div>';
			$html .='<div class="eventText">';
			$html .='<h6 class="aaTooltip"><a href="'.$slug.'" slug="'.$eventresult['type'].'" class="multiline-ellipsis" >'.ucfirst($eventresult['name']).'</a> <span class="aaTooltiptext">'.ucfirst($eventresult['name']).'</span></h6>';
			$html .='<div class="eventTime"><i class="fas fa-clock"></i> <span>'.$date.'</span></div>';
			//$html .='<div class="eventLocation"><i class="fas fa-map-marker-alt"></i> <span>Four Season Hotel</span></div>';
			$html .='</div>';
			$html .='</div>';
			$html .='</div>';
			$html .='</div>';
			$html .='</div>';
    	}
    	return $html;
    }
    else
    {
		return false;
    }
}

// Get All Event Lists
function getPastEventListsForGallery($tableName = null, $limit = null) {  
	//$end=date('Y-m-d');
    $CI = & get_instance();
    $CI->load->database();
	$CI->db->select('*');
	$CI->db->order_by('id', 'DESC');
	$CI->db->from($tableName);	
	$CI->db->where('status',1);	
	//$CI->db->where('total_booked <', 10);	
	$CI->db->where('event_start_date <',date('Y-m-d'));	
	$CI->db->limit($limit);
	$query 	=  $CI->db->get(); 
	//echo  $CI->db->last_query(); 

    $eventresults =  $query->result_array();
    if ($eventresults )
    {    	
		$html='';	 	 
	 	foreach($eventresults as $eventresult) 
	 	{ 
			$date= date('l, d M Y',strtotime($eventresult['event_start_date']));

			$dateonly = date('d',strtotime($eventresult['event_start_date']));

			$monthonly = date('M',strtotime($eventresult['event_start_date']));

			$todate= date('l, d M Y',strtotime($eventresult['event_end_date']));

			$todateonly = date('d',strtotime($eventresult['event_end_date']));

			$tomonthonly = date('M',strtotime($eventresult['event_end_date']));
			//Sunday, April 25
			

			
			
			if ($eventresult['total_booked'] < 10 && $eventresult['type']==1) 
			{
				//$eventtitle='Pre-booking';
				//$slug=base_url('events-gallery/'.$eventresult['slug']);
				
			}
			else
			{

				switch($eventresult['type']){
				case 0:
				$eventtitle='Free';
				$slug=base_url('events-gallery/'.$eventresult['slug']);
				break;
				
				case 1:
				$eventtitle='Paid';
				$slug=base_url('events-gallery/'.$eventresult['slug']);
				break;
					
				
				default :
				$slug=base_url();
				break;
				}

						$html .='<div class="col-lg-4 col-sm-6">';
						$html .='<div class="eventBox">';
						$html .='<div class="eventImg">';

							if(!empty($eventresult['image']))
						{ 
							$image=base_url('attachments/event/temp/').$eventresult['image'];
							$html .='<a href="'.$slug.'"><img src="'.$image.'" alt="image"></a>';
						}
						else
						{
							$html .='<a href="'.$slug.'"><img src="'.base_urL().'assets/frontend/assets/images/event-1.jpg" alt="image name"></a>';
						}

						//$html .='<div class="eventWish"><a href=""><i class="far fa-heart"></i></a> <span>'.$eventresult['total_booked'].'/'.$eventresult['number_of_person'].'</span></div>';		
						
						
						if($eventresult['price'] == 0)
						{ 
							$html .='<div class="eventPrice"><strong>Free</strong></div>'; 
						}
						else
						{
							$html .='<div class="eventPrice single eventPriceExt"> <span>Single</span><strong>'.$eventresult['price'].'</strong> <span>BHD</span></div>'; 
							$html .='<div class="eventPrice eventPriceExt"><span>Package</span> <strong>'.$eventresult['package_price'].'</strong> <span>BHD</span></div>';
						}
						
						$html .='<div class="eventType"><span>'.ucfirst($eventtitle).'</span></div>';
						$html .='</div>';
						$html .='<div class="eventContent">';
						$html .='<div class="d-flex">';
						$html .='<div class="eventDate eventDate2">';
						$html .='<strong>'.$dateonly.' '.$monthonly.'</strong>';
						$html .='<span>to</span>';
						$html .='<strong>'.$todateonly.' '.$tomonthonly.'</strong>';
						$html .='</div>';
						$html .='<div class="eventText">';
						$html .='<h6 class="aaTooltip"><a href="'.$slug.'" slug="'.$eventresult['type'].'" class="multiline-ellipsis">'.ucfirst($eventresult['name']).'</a><span class="aaTooltiptext">'.ucfirst($eventresult['name']).'</span></h6>';
						$html .='<div class="eventTime"><i class="fas fa-clock"></i> <span>'.$date.'</span></div>';
						//$html .='<div class="eventLocation"><i class="fas fa-map-marker-alt"></i> <span>Four Season Hotel</span></div>';
						$html .='</div>';
						$html .='</div>';
						$html .='</div>';
						$html .='</div>';
						$html .='</div>';

			}



			
    	}
    	return $html;
    }
    else
    {
		return false;
    }
}





// Get All Event Lists
function getUpcomingEventLists($tableName = null, $limit = null) {  
	//$end=date('Y-m-d');

	/*	$CI->db->select('
			e.*,
			c.name as cat_name,
			b.name as building_name,
			o.name as organizer_name,o.brief as organizer_brief,o.slug as organizer_slug,
			eg.id as eg_id, eg.image as eg_image_name, eg.status as eg_status
		');		
		$CI->db->from('event as e');
		$CI->db->join('event_banner_slider as eg', 'e.id = eg.event_id', 'inner');
		$CI->db->join('category as c', 'e.category_id = c.id', 'inner');
		$CI->db->join('building as b', 'e.building_id = b.id', 'inner');
		$CI->db->join('organizer as o', 'e.organizer_id = o.id', 'inner');
		$CI->db->order_by('e.id','DESC');	
		$CI->db->where('event_start_date >=',date('Y-m-d'));				
		$CI->db->where('e.status',1);	
*/
    $CI = & get_instance();
    $CI->load->database();
	$CI->db->select('*');
	$CI->db->order_by('id', 'DESC');
	$CI->db->from($tableName);	
	$CI->db->where('status',1);	
	$CI->db->where('event_start_date >=',date('Y-m-d'));	
	$CI->db->limit($limit);
	$query 	=  $CI->db->get(); 
    //echo $CI->db->last_query(); 
    $eventresults =  $query->result_array();
    //echo "<pre/>";print_r($eventresults);die();
    if ($eventresults )
    {    	
		$html='';	
	 	foreach($eventresults as $eventresult) 
	 	{ 
			$date= date('l, d M Y',strtotime($eventresult['event_start_date']));

			$dateonly = date('d',strtotime($eventresult['event_start_date']));

			$monthonly = date('M',strtotime($eventresult['event_start_date']));

			$todate= date('l, d M Y',strtotime($eventresult['event_end_date']));

			$todateonly = date('d',strtotime($eventresult['event_end_date']));

			$tomonthonly = date('M',strtotime($eventresult['event_end_date']));
			//Sunday, April 25
			$html .='<div class="col-lg-4 col-sm-6">';
			$html .='<div class="eventBox">';
			$html .='<div class="eventImg">';

			if ($eventresult['total_booked'] < 10 && $eventresult['type']==1) 
			{
				$eventtitle='Pre-booking';
				$slug=base_url('events-detail/'.$eventresult['slug']);
				
			}
			else
			{

				switch($eventresult['type']){
				case 0:
				$eventtitle='Free';
				$slug=base_url('events-detail/'.$eventresult['slug']);
				break;
				
				case 1:
				$eventtitle='Paid';
				$slug=base_url('events-detail/'.$eventresult['slug']);
				break;
				
				/*case 2:
				$eventtitle='Pre-booking';
				$slug=base_url('events-prebooking/'.$eventresult['slug']);
				break;*/
				
				default :
				$slug=base_url();
				break;
				}

			}

			if(!empty($eventresult['image']))
			{ 
				$image=base_url('attachments/event/temp/').$eventresult['image'];
				$html .='<a href="'.$slug.'"><img src="'.$image.'" alt="image"></a>';
			}
			else
			{
				$html .='<a href="'.$slug.'"><img src="'.base_urL().'assets/frontend/assets/images/event-1.jpg" alt="image name"></a>';
			}

			$html .='<div class="eventWish"><a href=""><i class="far fa-heart"></i></a> <span>'.$eventresult['total_booked'].'/'.$eventresult['number_of_person'].'</span></div>';		
			
			
			if($eventresult['price'] == 0)
			{ 
				$html .='<div class="eventPrice"><strong>Free</strong></div>'; 
			}
			else
			{
				$html .='<div class="eventPrice single eventPriceExt"> <span>Single</span><strong>'.$eventresult['price'].'</strong> <span>BHD</span></div>'; 
				$html .='<div class="eventPrice eventPriceExt"><span>Package</span> <strong>'.$eventresult['package_price'].'</strong> <span>BHD</span></div>';
			}

			



			$html .='<div class="eventType"><span>'.ucfirst($eventtitle).'</span></div>';
			$html .='</div>';
			$html .='<div class="eventContent">';
			$html .='<div class="d-flex">';
			$html .='<div class="eventDate eventDate2">';
			$html .='<strong>'.$dateonly.' '.$monthonly.'</strong>';
			$html .='<span>to</span>';
			$html .='<strong>'.$todateonly.' '.$tomonthonly.'</strong>';
			$html .='</div>';
			$html .='<div class="eventText">';
			$html .='<h6 class="aaTooltip"><a href="'.$slug.'" slug="'.$eventresult['type'].'" class="multiline-ellipsis">'.ucfirst($eventresult['name']).'</a><span class="aaTooltiptext">'.ucfirst($eventresult['name']).'</span></h6>';
			$html .='<div class="eventTime"><i class="fas fa-clock"></i> <span>'.$date.'</span></div>';
			//$html .='<div class="eventLocation"><i class="fas fa-map-marker-alt"></i> <span>Four Season Hotel</span></div>';
			$html .='</div>';
			$html .='</div>';
			$html .='</div>';
			$html .='</div>';
			$html .='</div>';
    	}
    	return $html;
    }
    else
    {
		return false;
    }
}
function getEventSlider($slug){
	$CI = & get_instance();
    $CI->load->database();
	$CI->db->select('ebs.image');
	$CI->db->from('event_banner_slider as ebs');	
	$CI->db->join('event as e','e.id=ebs.event_id','inner');
	$CI->db->where('e.status',1);	
	$CI->db->where('e.slug',$slug);	
	$query 	=  $CI->db->get(); 
	//echo  $CI->db->last_query();  die;
	$eventsliderresults =  $query->result_array();
	
	$html='';	 	

    if (count($eventsliderresults)>0 )
    {
	 	$s_img = 1; 
	 	foreach($eventsliderresults as $eventresult) 
	 	{ 			
			if($s_img == 1)
			{ 
				$html .='<div class="carousel-item active" >'; 
			}
			else
			{
				$html .='<div class="carousel-item" >'; 
			}
			$html .='<div class="biItem">';
			$image = base_url('attachments/event_slider/main/').$eventresult['image'];
			$html .='<div class="biItemImg"><img  src="'.$image.'"></div>';
			$html .='</div>';
			$html .='</div>';
	        $s_img++; 
    	}    	
	}
	else 
	{	
		//base_url('attachments/event_slider/main/').
		$image = base_url('assets/frontend/assets/images/no-image.jpg');
		$html .='<div class="carousel-item active">';
		$html .='<div class="biItem">';
		$html .='<div class="biItemImg">';
		$html .='<img src="'.base_url('assets/frontend/assets/images/no-image.jpg').'">';
		$html .='</div>';
		$html .='</div>';
		$html .='</div>';
		$html .='<div class="carousel-item">';
		$html .='<div class="biItem">';
		$html .='<div class="biItemImg">';
		$html .='<img src="'.base_url('assets/frontend/assets/images/no-image.jpg').'">';
		$html .='</div>';
		$html .='</div>';
	}
	return $html;


	// $html='';	 	 
	// 	foreach($eventsliderresults as $eventresult) 
	// 	{ 
			
	// 		$html .='<div class="carousel-item">';
	// 		$html .='<div class="biItem">';
	// 		if(!empty($eventresult['image']))
	// 		{ 
	// 			$image = base_url('attachments/event_slider/main/').$eventresult['image'];
	// 			$html .='<div class="biItemImg"><img src="'.$image.'" alt="image"></div>';
	// 			$html .='<div class="biContent">';
	// 		}
	// 		else
	// 		{
	// 			$image=base_url('assets/frontend/assets/images/event-5.jpg');
	// 			$html .='<div class="biItemImg"><img src="'.$image.'" alt="image"></div>';
	// 			$html .='<div class="biContent">';
	// 		}
	// 		//$html .='<h2>Corporate Events</h2>';
	// 		//$html .='<h4>Variety Excitement Elegance & Fun</h4>';
	// 		//$html .='<a href="" class="bookBtn btn">Book Now <i class="fas fa-arrow-circle-down"></i></a>';
	// 		$html .='</div>';
	// 		$html .='</div>';
	// 		$html .='</div>';
	// 	}
	// 		return $html;
	
}

function getDateDDMMYY($date){
	if($date!=''){
		$return= date('d M Y',strtotime($date));
	}else{
		$return="";
	}
	return $return;
}
function getTime($date){
	if($date!=''){
		$return= date('m:i:s',strtotime($date));
	}else{
		$return="";
	}
	return $return;
}
function getDateTime($date){
	if($date!=''){
		$return= date('d M Y m:i:s A',strtotime($date));
	}else{
		$return="";
	}
	return $return;
}



function getEventsLimitationsFacilities($eventid=null){
	$CI = & get_instance();
    $CI->load->database();
	$CI->db->select('e.event_limitations');
	$CI->db->from('event as e');	
	//$CI->db->join('event_limitation as el','e.id=el.id','left');	
	$CI->db->where('e.status',1);	
	$CI->db->where('e.id',$eventid);	
	$query 	=  $CI->db->get(); 
    $eventLimitationsults =  $query->result_array(); 
		
	if($eventLimitationsults){

		$eventLimitationsresults= explode(',',$eventLimitationsults[0]['event_limitations']); 

		$CI->db->select('el.id,el.name as ename,el.icon');
		$CI->db->from('event_limitation as el');	
		$CI->db->where_in('el.id',$eventLimitationsresults);	
		$query1 	=  $CI->db->get(); 
	    $eventLimitationsults1 =  $query1->result_array(); 
	    //echo "<pre/>";print_r($eventLimitationsults1) ;exit;
	    $html='';
   		foreach ($eventLimitationsults1 as $key => $value) 
   		{	
			//$html .='<li class="notAllow"><i class="fas fa-video"></i> <span>'.$value['ename'].'</span></li>';
			$html .='<li class="">'.$value["icon"]. '<span>'.$value["ename"].'</span></li>';
		}
		return $html;

	}else{
		return array();
	}
}




function totalEventsCount($id){
	$CI = & get_instance();
    $CI->load->database();
	return $CI->db->where_in('package_id', $id)->count_all_results('package_details');			
				
}	




function getAllEventGalleryImages($slug=null){
	$CI = & get_instance();
    $CI->load->database();
	$CI->db->select('eg.*');
	$CI->db->from('event_gallery_video as eg');			
	$CI->db->where('eg.slug',$slug);			
	$CI->db->where('eg.type',0);			
	$CI->db->where('eg.status',1);			
	$query 	=  $CI->db->get(); 
    $EventGalleryresults =  $query->result_array(); 
    if($EventGalleryresults){
    	$html='';
   		foreach ($EventGalleryresults as $key => $value) 
   		{
				$html .='<li>';
				$html .='<a class="image-popup-vertical-fit" href="'.base_urL("attachments/event_gallery_video/temp/".$value["image"]).'">';
				$html .='<img src="'.base_urL("attachments/event_gallery_video/temp/".$value["image"]).'">';
				$html .='</a>';
				$html .='</li>';
		}
			return $html;
		}else
		{
    		return array();
		}

				
}	

function getAllEventGalleryVideos($slug=null){
	$CI = & get_instance();
    $CI->load->database();
	$CI->db->select('eg.*');
	$CI->db->from('event_gallery_video as eg');			
	$CI->db->where('eg.slug',$slug);
	$CI->db->where('eg.type',1);	
	$CI->db->where('eg.status',1);			
			
	$query 	=  $CI->db->get(); 
    $EventGalleryresults =  $query->result_array(); 
    if($EventGalleryresults){
    	$html='';
   		foreach ($EventGalleryresults as $key => $value) 
   		{			

				$html .='<li>';
				$html .='<video controls>';
				$html .='<source src="'.base_urL("attachments/event_gallery_video/main/".$value["image"]).'" type="video/mp4">';
				$html .='</video>';
				$html .='</li>';
		}
			return $html;
		}else
		{
    		return array();
		}

				
}	

 // Get All Data
function getAllData($tableName = null) {   
    $CI = & get_instance();
    $CI->load->database();
	$CI->db->from($tableName);
	$CI->db->where(array('is_deleted'=>0,'status'=>1,'parent_id'=>0));
	$query =   $CI->db->get(); 
    $result =  $query->result_array();
    if ($result) {
    	return $result;
    }else{
    	return false;
    }
}


function getlevelCategory($id)
   {
	$CI = & get_instance();
    $CI->load->database();
	$CI->db->select('c.*');
	$CI->db->from('category as c');
	$CI->db->where('c.status',1);				
	$CI->db->where('c.is_deleted',0);					
	$CI->db->where('c.parent_id',$id);			
	$query 	=  $CI->db->get(); 
	//echo  $CI->db->last_query(); exit;

    return  $categories =  $query->result_array(); 

   }	

function getCms($tableName ,$where=array())
   {
	$CI = & get_instance();
    $CI->load->database();
	$CI->db->select('*');
	$CI->db->from($tableName);			
	$CI->db->where('id', 17);			
	$CI->db->where('status', 1);			
			
	$query 	=  $CI->db->get(); 
    return  $categories =  $query->row_array(); 

   }	
function getUpcommingEvents(){
	$CI = get_instance();
	$CI->load->model('admin/Admin_model');
	$where=array('e.event_start_date>='=>date('Y-m-d'));
 	$response= $CI->Admin_model->getUpcommingEvents($where);
  	return $response;
}


function getFooterLink()
{
	$CI = & get_instance();
	$CI->load->database();
	$CI->db->select('fl.*');	
	$CI->db->from('footer_links as fl');
	$CI->db->where('status',1);
	$result = $CI->db->get();
	$resultArray = $result->result_array();	
    if($resultArray){
	$html='';
		foreach ($resultArray as $key => $value) 
		{
		$html .='<li>';
		$html .=' <li><a href="'.base_urL($value["slug"]).'">'.ucfirst($value["name"]).'</a>';			
		$html .='</li>';
	}
		return $html;
	}else
	{
		return array();
	}
}

function getDataName($table,$where){
	$CI = & get_instance();
	$CI->load->database();
	$CI->db->from($table);
	$CI->db->where($where);
	$result = $CI->db->get();
	$response = $result->row_array();	
	return $response;
}

function getOrderStatus($status){
	if($status==1){
		return "Pending";
	}else if($status==2){
		return "Processing";
	}else{
		return "Completed";
	}
}


function getAllEventlist(){
	$CI = & get_instance();
    $CI->load->database();
	$CI->db->select('e.name,e.id');
	$CI->db->from('event as e');	
	$CI->db->where('e.status',1);		
	$query 	=  $CI->db->get(); 
    $eventlist =  $query->result_array(); 											
	if($eventlist)
	{
		return $eventlist;
	}
	else
	{
		return array();
	}		
}


function getSeoEvent($slug='')
{
	$CI = & get_instance();
    $CI->load->database();
	$CI->db->select('e.meta_title,e.meta_keywords,e.meta_description');
	$CI->db->from('event as e');	
	$CI->db->where('e.status',1);		
	$CI->db->where('e.slug',$slug);		
	$query 	=  $CI->db->get(); 
    $eventSeo =  $query->row_array(); 											
	if($eventSeo)
	{
		return $eventSeo;
	}
	else
	{
		return array();
	}		
}
function getSeo($slug='')
{
	$CI = & get_instance();
    $CI->load->database();
	$CI->db->select('cp.meta_title,cp.meta_keywords,cp.meta_description');
	$CI->db->from('cms_pages as cp');	
	$CI->db->where('cp.status',1);		
	$CI->db->where('cp.page_url',$slug);		
	$query 	=  $CI->db->get(); 
    $eventSeo =  $query->row_array(); 											
	if($eventSeo)
	{
		return $eventSeo;
	}
	else
	{
		return array();
	}		
}
