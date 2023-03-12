<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cit;
use DB;
use App\Models\Upcoming;
use App\Models\Ourclients;
use App\Models\Ourgallary;
use App\Models\Core\Users;
use App\Models\Websitesettings;
use App\Models\Vacancyannouncement;
use App\Notifications\arifPasswordResetNotification;
use Hash;
use Helper;


use Illuminate\Support\Str;
class VmslController extends Controller{
	

	public function event_single($id){
    $data['single'] = Upcoming::where('id', $id)->first();
    $data['title'] = Upcoming::where('id', $id)->first()->title;
		$data['ourclients'] = Ourclients::orderBy('id', 'DESC')->get();
    $data['setting'] = Websitesettings::where('id', 1)->first();
    
    if(!is_null($data['single'])){
      return view('layouts.default.template.singleEvent', $data);
    }else{
      return redirect()->route('index');
    }
	}
	public function causes_single($id){
    $data['single'] = Recentcauses::where('id', $id)->first();
    $data['title'] = Recentcauses::where('id', $id)->first()->title;
		$data['ourclients'] = Ourclients::orderBy('id', 'DESC')->get();
    $data['setting'] = Websitesettings::where('id', 1)->first();
    if(!is_null($data['single'])){
      return view('layouts.default.template.singleCauses', $data);
    }else{
      return redirect()->route('index');
    }
	}
	public function gallary(){
        $data['title'] = 'Gallery';
		$data['ourgallary'] = Ourgallary::all();
		$data['setting'] = Websitesettings::where('id', 1)->first();
		return view('layouts.default.template.gallary', $data);
	}
	public function volunteer_single($id){
    $data['volunteer'] = Ourvolunteers::where('id', $id)->first();
    $data['title'] = Ourvolunteers::where('id', $id)->first()->name;
		$data['ourclients'] = Ourclients::orderBy('id', 'DESC')->get();
    $data['setting'] = Websitesettings::where('id', 1)->first();
    if(!is_null($data['volunteer'])){
      return view('layouts.default.template.singleVolunteer', $data);
    }else{
      return redirect()->route('index');
    }
		
	}
	public function contact_page(){
    $data['title'] = 'Contact Us';
		$data['ourclients'] = Ourclients::orderBy('id', 'DESC')->get();
		$data['setting'] = Websitesettings::where('id', 1)->first();
		return view('layouts.default.template.contact', $data);
	}
	
	
	public function reCaptcha( $request)	{
		if(!is_null($request['g-recaptcha-response']))
        {
            $api_url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . config('sximo.cnf_recaptchaprivatekey') . '&response='.$request['g-recaptcha-response'];
            $response = @file_get_contents($api_url);
            $data = json_decode($response, true);
 
           return $data;
        }else{
           return false;
        }		
	}
	
	
public function savecareer(Request $request ){
    
    $file = $request->file('cv');
    $this->validate($request, [
        'firstname' => 'required',
        'lastname'=>'required',
        'email'=>'required | email',
        'phone'=>'required',
        'job_post'=>'required',
        'cv'=>'required | mimes:doc,docx,pdf'
    ]);
    
    $allowedfileExtension=['pdf','doc','docx'];
    $extension = $file->getClientOriginalExtension();
    $check = in_array($extension,$allowedfileExtension);
    
    if($check){
        $data = array_map('strip_tags', $request->input());
        unset($data['job_title']);
        unset($data['_token']);
        
        if($request->hasFile('cv')){
            $newName = round(microtime(true)+rand(11,99)).'.'.$extension;
            $data ['cv'] = $newName;
            
            $destinationPath = 'uploads/cv';
            $uploaded = $file->move($destinationPath,$newName);
            if($uploaded){
                $response = DB::table('con_career')->insert($data);
                $emailVars = [];
                $emailVars['firstname'] = $request->input('firstname');
                $emailVars['job_title'] = $request->input('job_title');
                $emailVars['company'] = $this->config['cnf_appname'];
                $recipient = $request->input('email');
                $message = view('emails.career_request',array('data'=> $emailVars));
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers .= 'From: '.$this->config['cnf_appname'].' < career@shasthoshurokkha.org >' . "\r\n";
                mail($recipient, 'Thank You For Your Application', $message, $headers);
            }
        }
    }
    
    if($response){
        return redirect()->back()->with('success', 'Successfully submitted your request. Please check your email for further procedure.');   
    }

}
	
	
	public function contact_data(Request $request){
	    
	    if(config('sximo.cnf_recaptcha') =='true') {
			$return = $this->reCaptcha($request->all());
			
			if($return){
				if($return['success'] !='true'){
				     return back()->with('message', 'Invalid reCpatcha');
					return response()->json(['status' => $return['success'], 'message' =>'Invalid reCpatcha']);	
				}
				
			}else{
			     return back()->with('message', 'Invalid reCpatcha');
			}
		}
	    
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ];

        if ($this->validate($request, $rules)) {
            $data['first_name']    = $request->first_name;
            $data['last_name']    = $request->last_name;
            $data['email']   = $request->email;
            $data['phone']   =  $request->phone;
            $data['message'] = $request->message;
            $data['status'] = 1;
           DB::table('contact')->insert($data);
        }
        return back()->with('message', 'Successfully message sent.');
	}
	
	public function contact_email(Request $request){
        $request->validate([
            'name'    => 'required',
            'email' => 'required | email',
            'message' => 'required'
        ]);
        $from  = 'vmslfinl@server33.web-hosting.com';
        $to = $request->email;
        $email = $request->email;
        $subject = 'Customer Support';
        $message = $request->message;
        $name = $request->name;
        $body = "From: $name\n E-Mail: $from\n Message:\n $message";
        mail ($to, $subject, $body, $from);   
        echo " <div class='row formSentMsg'>
        		<div class='col-md-12 mt-2'>
                        <p style='margin-top:10px; font-style:italic; color:green;'>Message send Successfully..!</p>
                </div>
                </div>
                <script type='text/javascript'>
                   $('.formSentMsg').delay(5000).fadeOut(300);
                </script>
            ";
        
	}
	
	public function volunteer_account(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:3048',
            'email' => 'required|email',
            'profession' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'degree' => 'required',
            'experience' => 'required',
            'training' => 'required',
            'work_day' => 'required'
        ]);
        
      $data = new Ourvolunteers();
	    $image = $request->file('image');
	    if ($image) {
        	$image_name = date("Ymd".time());
        	$ext = strtolower($image->getClientOriginalExtension());
        	$image_full_name = $image_name.'.'.$ext;
        	$upload_path = public_path('/theme/img/team/');
        	//$image->move($upload_path, $image_full_name);
        	$data->image = $image_full_name;
	    }
        $data->name         = $request->name;
        $data->profession    = $request->profession;
        $data->short_description = $request->short_description;
        $data->description  = $request->description;
        $data->hobby        = $request->hobby;
        $data->degree       = $request->degree;
        $data->experience   = $request->experience;
        $data->training     = $request->training;
        $data->work_day     = $request->work_day;
        $data->facebook     = $request->facebook;
        $data->twitter      = $request->twitter;
        $data->linkedin     = $request->linkedin;
        $data->googleplus   = $request->googleplus;
        
        //$data->save();  
        
        $usedata             = new Users();
        $usedata->username   = $request->name;
        $usedata->email      = $request->email;
        $usedata->password   = Hash::make($request->password);
        $usedata->group_id   = 3;
        $usedata->created_at = now();
        $token = $usedata->remember_token = Str::random(32);
        $usedata->save();
        
        //$usedata->notify(new arifPasswordResetNotification($token));
        
        return back()->with('message', 'Success..! You are joined.');
        
	}
    public function verefy($token){
        echo $token;
    }
    
    
    public function grid_volunteer(){
    $data['title'] = 'Volunteers';
		$data['volunteer'] = Ourvolunteers::where('status', 1)->orderBy('id', 'DESC')->paginate(8);
		$data['ourclients'] = Ourclients::where('status', 1)->orderBy('id', 'DESC')->get();
		$data['setting'] = Websitesettings::where('id', 1)->first();
		return view('layouts.default.template.gridVolunteer', $data);
    }
	
    public function grid_event(){
    $data['title'] = 'Events';
		$data['upcoming'] = Upcoming::where('status', 1)->orderBy('id', 'DESC')->paginate(6);
		$data['ourclients'] = Ourclients::where('status', 1)->orderBy('id', 'DESC')->get();
		$data['setting'] = Websitesettings::where('id', 1)->first();
		return view('layouts.default.template.gridEvent', $data);
    }	
    public function grid_causes(){
    $data['title'] = 'Initiatives';
		$data['recentcauses'] = Recentcauses::where('status', 1)->orderBy('id', 'DESC')->paginate(12);
		$data['ourclients'] = Ourclients::where('status', 1)->orderBy('id', 'DESC')->get();
		$data['setting'] = Websitesettings::where('id', 1)->first();
		return view('layouts.default.template.gridCauses', $data);
    }	
    
    
    public function about(){
        $data['title'] = 'About Us';
		$data['ourclients'] = Ourclients::where('status', 1)->orderBy('id', 'DESC')->get();
		$data['setting'] = Websitesettings::where('id', 1)->first();
		return view('layouts.default.template.about', $data);
    }
    
    
	public function career(){
	    $data['title'] = 'Career';
	    $data['setting'] = Websitesettings::where('id', 1)->first();
	    $data['circular'] = Vacancyannouncement::orderBy('id', 'DESC')->get();
	    return view('layouts.default.template.career', $data);
	}
	
	public function circular($id=null){
	    $data['title'] = 'Career';
	    $data['setting'] = Websitesettings::where('id', 1)->first();
	    $data['career'] = Vacancyannouncement::where('id', $id)->first();
	    if($data['career']){
	        return view('layouts.default.template.career_view', $data);
	    }else{
	        return view('errors.404');
	    }
	}

    public function whatwedo(){
        $data['title'] = 'Our Activities';
        $data['setting'] = Websitesettings::where('id', 1)->first();
        return view('layouts.default.template.what-we-do', $data); 
    }

    public function team(){
        $data['title'] = 'Team';
        $data['setting'] = Websitesettings::where('id', 1)->first();
        return view('layouts.default.template.team', $data); 
    }

    public function donation(){
        $data['title'] = 'Donation';
        $data['setting'] = Websitesettings::where('id', 1)->first();
        return view('layouts.default.template.donation', $data); 
    }

    public function user_details(Request $request){
     $data = DB::table('con_team')->where('id', $request->id)->first();

      echo '
            <div class="popup_doal_img">
            <img src="'.url('/').'/uploads/images/team/'.$data->image.'" alt="">
            </div>
            <div class="popup_doal_description">
                <ul>
                    <li> <b>Name:</b> ' .$data->name.'</li>
                    <li> <b>Position:</b> ' .$data->position.'</li>
                    <li> <p><b>Description:</b> '.$data->description.'</p> </li>
                </ul>
            </div>
            ';
    }

    public function news(){
      $data['title'] = 'News';
      $data['setting'] = Websitesettings::where('id', 1)->first();
      return view('layouts.default.template.news', $data); 
    }

    public function video(){
      $data['title'] = 'Video';
      $data['setting'] = Websitesettings::where('id', 1)->first();
      return view('layouts.default.template.video', $data); 
    }

    
  public function photo_filter(Request $request){
      $category = $request->id;
      if($category){
          $media = DB::table('our_gallary')->where('category', $category)->where('status', 1)->orderBy('id', 'DESC')->limit(6)->get();
      }else{
          $media = DB::table('our_gallary')->where('status', 1)->orderBy('id', 'DESC')->limit(6)->get();
      }
    if ($media){
      $result = '';
      foreach ($media as $key=> $data){
        $index = $key+1;
          $result .= '<li class="image-thumbnail"><a href="#lightbox_'.$index.'"><img src="'.url('/').'/uploads/images/gallery/'.$data->image.'" alt="Summer Season" class="image"></a></li>
          <div class="light-box" id="lightbox_'.$index.'">
              <div class="edges"><span class="close-btn"><a href="#">X</a></span>
                  <p class="title">'.$data->title.'</p>
                  <div class="inner-image">
                      <img src="'.url('/').'/uploads/images/gallery/'.$data->image.'" alt="image 01" class="swap"/>
                  </div>
                  <span class="next-btn"><a href="#lightbox_'.($index+1).'">Next</a></span>
                  <span class="previous-btn"><a href="#lightbox_'.($index-1).'">Previous</a></span>
              </div>
          </div> '; 
      }
    }
    return  $result;
    }
    
    
    
    
    public function forum_for_health(){
        $data['title'] = 'Parliamentary Forum For Health';
        $data['setting'] = Websitesettings::where('id', 1)->first();
        return view('layouts.default.template.forum', $data); 
    }    
    
    
    
    public function forum_for_health_modal(Request $request){
     $data = DB::table('con_forum')->where('id', $request->id)->first();

      echo '
            <div class="popup_doal_img">
            <img src="'.url('/').'/uploads/images/forum/'.$data->image.'" alt="">
            </div>
            <div class="popup_doal_description">
                <ul>
                    <li> <b>Name:</b> ' .$data->name.'</li>
                    <li> <b>Position:</b> ' .$data->position.'</li>
                    <li> <p><b>Description:</b> '.$data->description.'</p> </li>
                </ul>
            </div>
            ';
    }
    public function achivement_details(Request $request){
     $data = DB::table('con_achivement')->where('id', $request->id)->first();
                        
     $date  =  date("d", strtotime($data->date));
     $month = date("M", strtotime($data->date));
     $year  = date("Y", strtotime($data->date));
     $full_date = $date.' '.$month.' '.$year;   
      echo '
            <div class="achimved_img">
            <img src="'.url('/').'/uploads/images/achivement/'.$data->image.'" alt="">
            </div>
            <div class="popup_doal_description">
                <ul>
                    <li> <b>Name:</b> ' .$data->title.'</li>
                    <li> <b>Date:</b> ' .$full_date.'</li>
                    <li> <p><b>Description:</b> '.$data->description.'</p> </li>
                </ul>
            </div>
            ';
    }	
	
	
	
	
	
    public function publication(){
        $data['title'] = 'Research & Publication';
        $data['setting'] = Websitesettings::where('id', 1)->first();
        return view('layouts.default.template.publication', $data); 
    }  
	
	
    public function achivement(){
        $data['title'] = 'Achivement';
        $data['setting'] = Websitesettings::where('id', 1)->first();
        return view('layouts.default.template.achivement', $data); 
    }
    
    
    public function governing_board(){
        $data['title'] = 'Governing Board';
        $data['setting'] = Websitesettings::where('id', 1)->first();
        return view('layouts.default.template.governing-board', $data); 
    } 
    
    
    public function project_team(){
        $data['title'] = 'Project Team';
        $data['setting'] = Websitesettings::where('id', 1)->first();
        return view('layouts.default.template.project-team', $data); 
    }	
    public function ebulletin(){
        $data['title'] = 'E-Bulletin';
        $data['setting'] = Websitesettings::where('id', 1)->first();
        return view('layouts.default.template.e-bulletin', $data); 
    }

    public function timeline(){
        $data['title'] = 'Timeline';
        $data['setting'] = Websitesettings::where('id', 1)->first();
        return view('layouts.default.template.timeline', $data); 
    }

    public function professionalaffiliation(){
        $data['title'] = 'Professional Affiliation';
        $data['setting'] = Websitesettings::where('id', 1)->first();
        return view('layouts.default.template.professionalaffiliation', $data); 
    }

    public function publications(){
        $data['title'] = 'Publications';
        $data['setting'] = Websitesettings::where('id', 1)->first();
        return view('layouts.default.template.publication', $data); 
    }

    public function research(){
        $data['title'] = 'Research';
        $data['setting'] = Websitesettings::where('id', 1)->first();
        return view('layouts.default.template.research', $data); 
    }

    public function Vediogallary(){
        $data['title'] = 'Video Gallery';
        $data['setting'] = Websitesettings::where('id', 1)->first();
        return view('layouts.default.template.video-gallary', $data); 
    }

    public function CareerDetails($id){
        $data['title'] = 'Career Details';
        $data['setting'] = Websitesettings::where('id', 1)->first();

        $data['history_details'] = DB::table('con_career_history')->where('id', $id)->first();
        return view('layouts.default.template.career-details', $data); 
    }

}?>