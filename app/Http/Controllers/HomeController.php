<?php  namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Homeslider;
use App\Models\Upcoming;
use App\Models\Ourclients;
use App\Models\Ourgallary;
use App\Models\Ourmission;
use App\Models\Websitesettings;



use App\Library\Markdown;
use DB;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect ;

class HomeController extends Controller {

	public function __construct()
	{
		parent::__construct();

		$this->data['pageLang'] = 'en';
		if(\Session::get('lang') != '')
		{
			$this->data['pageLang'] = \Session::get('lang');
		}	
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index( Request $request,  $category = ''){
        \App::setLocale(\Session::get('lang'));
		if(config('sximo.cnf_front') =='false' && $request->segment(1) =='' ) :
			return redirect('dashboard');
		endif; 	
		$data['title'] = 'Home';
		$data['setting'] = Websitesettings::where('id', 1)->first();
		$data['designations'] = DB::TABLE('my_designation')->where('status', 1)->GET();
		$data['myself'] = DB::table('home_section')->where('status',1)->first();
		return view('layouts.default.template.homepage', $data);
	}

	
	public function  getLang( Request $request , $lang='en')
	{
		$request->session()->put('lang', $lang);
		return  Redirect::back();
	}

	public function  getSkin($skin='sximo')
	{
		\Session::put('themes', $skin);
		return  Redirect::back();
	}		


	public function submit( Request $request )
	{
		$formID = $request->input('form_builder_id');

		$rows = \DB::table('tb_forms')->where('formID',$formID)->get();
		if(count($rows))
		{
			$row = $rows[0];
			$forms = json_decode($row->configuration,true);
			$content = array();
			$validation = array();
			foreach($forms as $key=>$val)
			{
				$content[$key] = (isset($_POST[$key]) ? $_POST[$key] : ''); 
				if($val['validation'] !='')
				{
					$validation[$key] = $val['validation'];
				}
			}
			
			$validator = Validator::make($request->all(), $validation);	
			if (!$validator->passes()) 
					return redirect()->back()->with(['status'=>'error','message'=>'Please fill required input !'])
							->withErrors($validator)->withInput();

			
			if($row->method =='email')
			{
				// Send To Email
				$data = array(
					'email'		=> $row->email ,
					'content'	=> $content ,
					'subject'	=> "[ " .config('sximo.cnf_appname')." ] New Submited Form ",
					'title'		=> $row->name 			
				);
			
				if( config('sximo.cnf_mail') =='swift' )
				{ 				
					\Mail::send('sximo.form.email', $data, function ( $message ) use ( $data ) {
			    		$message->to($data['email'])->subject($data['subject']);
			    	});		

				}  else {

					$message 	 = view('sximo.form.email', $data);
					$headers  	 = 'MIME-Version: 1.0' . "\r\n";
					$headers 	.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$headers 	.= 'From: '. config('sximo.cnf_appname'). ' <'.config('sximo.cnf_email').'>' . "\r\n";
						mail($data['email'], $data['subject'], $message, $headers);	
				}
				
				return redirect()->back()->with(['status'=>'success','message'=> $row->success ]);

			} else {
				// Insert into database 
				\DB::table($row->tablename)->insert($content);
				return redirect()->back()->with(['status'=>'success','message'=>  $row->success  ]);
			
			}
		} else {

			return redirect()->back()->with(['status'=>'error','message'=>'Cant process the form !']);
		}


	}

	public function getLoad()
	{	
		$result = \DB::table('tb_notification')->where('userid',\Session::get('uid'))->where('is_read','0')->orderBy('created','desc')->limit(5)->get();

		$data = array();
		$i = 0;
		foreach($result as $row)
		{
			if(++$i <=10 )
			{
				if($row->postedBy =='' or $row->postedBy == 0)
				{
					$image = '<img src="'.asset('uploads/images/system.png').'" border="0" width="30" class="img-circle" />';
				} 
				else {
					$image = \SiteHelpers::avatar('30', $row->postedBy);
				}
				$data[] = array(
						'url'	=> $row->url,
						'title'	=> $row->title ,
						'icon'	=> $row->icon,
						'image'	=> $image,
						'text'	=> substr($row->note,0,100),
						'date'	=> date("d/m/y",strtotime($row->created))
					);
			}	
		}
	
		$data = array(
			'total'	=> count($result) ,
			'note'	=> $data
			);	
		 return response()->json($data);	
	}
	public function posts( Request $request ,  $category = ''){
		$posts = \DB::table('tb_pages')
				->select('tb_pages.*','tb_users.username',\DB::raw('COUNT(commentID) AS comments'))
				->leftJoin('tb_users','tb_users.id','tb_pages.userid')
				->leftJoin('tb_comments','tb_comments.pageID','tb_pages.pageID')		
				->leftJoin('tb_categories','tb_categories.cid','tb_pages.cid')					
				->where('pagetype','post');
	
				if( $category !=''  ) {
					$mode = 'category';
					$this->data['categoryDetail'] = Post::categoryDetail( $category );
					$posts = $posts->where('tb_categories.alias',$category )->paginate(6);					
				}
				else {
					$mode = 'all';

					$posts = $posts->groupBy('tb_pages.pageID')->paginate(6);
				}
		$this->data['title']		= 'Post Articles';
		$this->data['posts']		= $posts;
		$this->data['pages']		= 'secure.posts.posts';
		$this->data['popular']		= Post::lists('popular');
		$this->data['headline']		= Post::lists('headline');
		$this->data['categories']	= Post::categories();
		$this->data['setting'] = Websitesettings::where('id', 1)->first();
		$this->data['mode']			= $mode;
		$this->data['pages'] = 'layouts.'.config('sximo.cnf_theme').'.blog.index';	
		$page = 'layouts.'.config('sximo.cnf_theme').'.index';
		return view( $page , $this->data);	
	}

	public function read( Request $request , $read = '')  {

		$row = Post::read( $read);
		if($row->cid){
	//	print_r($posts);exit;
		$comments = Post::comments($row->pageID );
		$data = [
			'title'	=> $row->title ,
			'posts'	=> $row ,
			'comments'	=>  $comments ,
			'pages' => 'layouts.'.config('sximo.cnf_theme').'.blog.view',
			'popular'	=> Post::lists('popular') , 
			'categories'	=> Post::categories()
		];
		$page = 'layouts.'.config('sximo.cnf_theme').'.index';
		return view( $page , $data);
		}else{
		   return redirect('/posts');
		}

	}



	public function comment( Request $request)
	{
		$rules = array(
			'comments'	=> 'required'
		);
		$validator = Validator::make($request->all(), $rules);	
		if ($validator->passes()) {

			$data = array(
					'userID'		=> \Session::get('uid'),
					'posted'		=> date('Y-m-d H:i:s') ,
					'comments'		=> $request->input('comments'),
					'pageID'		=> $request->input('pageID')
				);

			\DB::table('tb_comments')->insert($data);
			return redirect('posts/read/'.$request->input('alias'))
        		->with(['message'=>'Thank You , Your comment has been sent !','status'=>'success']);
		} else {
			return redirect('posts/'.$request->input('alias'))
				->with(['message'=>'The following errors occurred','status'=>'error']);	
		}
	}

	public function remove( Request $request, $pageID , $alias , $commentID )
	{
		if($commentID !='')
		{
			\DB::table('tb_comments')->where('commentID',$commentID)->delete();
			return redirect('posts/read/'.$alias)
				->with(['message'=>'Comment has been deleted !','status'=>'success']);
       
		} else {
			return redirect('posts/post/'.$alias)
				->with(['message'=>'Failed to remove comment !','status'=>'error']);
		}
	}

	public function set_theme( $id ){
		session(['set_theme'=> $id ]);
		return response()->json(['status'=>'success']);
	}	


}
