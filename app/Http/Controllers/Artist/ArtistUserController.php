<?php
namespace App\Http\Controllers\Artist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\ArtworkRepository;
use App\Repository\ArtworkImageRepository;
use App\Repository\VariantRepository;
use App\Repository\CategoryRepository;
use App\Repository\SubCategoryRepository;
use App\Repository\SubjectRepository;
use App\Repository\StyleRepository;
use App\Repository\UserRepository;
use Exeception;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Image;
use Illuminate\Support\Facades\Auth;
use Validator;
use Exception;
use Session;
use Mail;
use DB;
use Hash;
use Cookie;
use Segment;
use DateTime;
class ArtistUserController extends Controller
{
    private $artwork_files;
    private $users_files;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request, ArtworkRepository $artworkRepository, ArtworkImageRepository $artworkImageRepository, VariantRepository $variantRepository,CategoryRepository $categoryRepository,SubCategoryRepository $SubCategoryRepository,SubjectRepository $subjectRepository,StyleRepository $styleRepository,UserRepository $userRepository)
    {
        $this->middleware('auth');
        $this->request = $request;
        $this->artworkRepository = $artworkRepository;
        $this->artworkImageRepository = $artworkImageRepository;
        $this->variantRepository = $variantRepository;
        $this->categoryRepository = $categoryRepository;
        $this->SubCategoryRepository = $SubCategoryRepository;
        $this->subjectRepository = $subjectRepository;
        $this->styleRepository = $styleRepository;
        $this->userRepository = $userRepository;
        $this->artwork_files = '/images/artwork_files/';
        $this->users_files = '/images/users_files/';
    }
    public function index(){
    	return view('artist.artist_dashboard');
    }
    public function add_artwork(){
        $categories = $this->categoryRepository->getData(['is_deleted'=>'no'],'get',[],0);
        $subjects = $this->subjectRepository->getData(['is_deleted'=>'no'],'get',[],0);
        $styles = $this->styleRepository->getData(['is_deleted'=>'no'],'get',[],0);
        return view('artist.add_artwork', compact('categories','subjects','styles'));
    }
    public function profile($id){
        // $userId = Auth::id();
        $artist =  $this->userRepository->getData(['id'=>$id],'first',[],0);
        return view('artist.profile',compact('artist'));
    } 
    public function artworks(){
        $artworks = $this->artworkRepository->getData(['is_deleted'=>'no'],'get',['category_detail', 'sub_category_detail'],0);
        return view('artist/artworks',compact('artworks'));
    } 
    public function change_artwork_status($id, $status, $page, $user_id)
    {
        if($status == 'publish'){
            $data['is_publised'] = 'unpublish';
            $new_status = "Un-Published";
        }else{
            $data['is_publised'] = 'publish';
            $new_status = "Published";
        }
        $artist = $this->artworkRepository->createUpdateData(['id'=> $id],$data);
        \Session::flash('success_message', 'Artwork Status Changed to '.$new_status.' Succssfully!.');
        return redirect('/artist/artworks'); 
        
    }
    public function delete_artwork($id)
    {
        $artwork = $this->artworkRepository->getData(['id'=>$id],'delete',[],0);
        \Session::flash('success_message', 'Artwork Deleted Succssfully!.'); 
            return redirect('/artist/artworks');
    } 
    public function view_artwork($id){
        $artwork_result = $this->artworkRepository->getData(['id'=> $id],'first',['artwork_images', 'variants', 'artist', 'artwork_like', 'category_detail', 'sub_category_detail','style_detail', 'subject_detail'],0);
        // echo "<pre>";
        // print_r($artwork_result->variants[0]->price); die;
        $similar_artwork = $this->artworkRepository->getData(['category'=> $artwork_result['category']],'get',['artwork_images', 'variants', 'artist', 'artwork_like'],0);
        return view('artist/view_artwork',compact('artwork_result', 'similar_artwork'));
    } 
    public function edit_artwork($id){
        $categories = $this->categoryRepository->getData(['is_deleted'=>'no'],'get',[],0);
        $subjects = $this->subjectRepository->getData(['is_deleted'=>'no'],'get',[],0);
        $styles = $this->styleRepository->getData(['is_deleted'=>'no'],'get',[],0);
        $subcategories = $this->SubCategoryRepository->getData(['category_id'=>$this->request->category_id],'get',[],0);
       $artwork = $this->artworkRepository->getData(['id'=> $id],'first',['artwork_images', 'variants', 'artist', 'artwork_like', 'category_detail', 'sub_category_detail','style_detail', 'subject_detail'],0);
       return view('artist/edit_artwork',compact('artwork','categories','subjects','styles','subcategories'));
    }
    public function deleteImage(){
        
        // dd($this->request->all());
        return response()->json([
            'status' => 'success',
            'message' => 'Artwork Updated Succssfully',
            'data'  => $this->request->all(),
        ], 200);
    }
    public function update_artist(){
        $validation = Validator::make($this->request->all(), [
        // $validate = $this->validate($this->request, [
            'email'         => trim('required|string|email|max:255|unique:users,email,'.$this->request->id),
            'user_name'         => trim('required|string|max:255|unique:users,user_name,'.$this->request->id),
            'first_name'         => trim('required|string'),
            'last_name'         => trim('required|string'),
            'address'         => trim('required|string'),
            'postal_code'         => trim('required|string'),
            'state'         => trim('required|string'),
            'country'         => trim('required|string'),
        ]);
        // $validator = Validator::make($this->request->all() , $rules);
       if ($validation->fails()) {
                throw new ValidationException($validation);
        }
        
        $artist_array = [];
        $artist_array['first_name'] = $this->request->first_name;
        $artist_array['last_name'] = $this->request->last_name;
        $artist_array['email'] = $this->request->email;
        $artist_array['address'] = $this->request->address;
        $artist_array['postal_code'] = $this->request->postal_code;
        $artist_array['user_name'] = $this->request->user_name;
        $artist_array['state'] = $this->request->state;
        $artist_array['country'] = $this->request->country;
        $artist_array['biography'] = $this->request->biography;
        if($this->request->hasFile('media_url')){
            $media_url = $this->request->file('media_url');
            $parts = pathinfo($media_url->getClientOriginalName());
            $extension = strtolower($parts['extension']);
            $imageName = uniqid() . mt_rand(999, 9999) . '.' . $extension;
            $imageName = uniqid() . mt_rand(999, 9999) . '.' . $extension;
            $media_url->move(public_path() . $this->users_files, $imageName);  
            $image_name = url($this->users_files . $imageName);
            $artist_array['media_url'] = $image_name;
        }
      
        $artist = $this->userRepository->createUpdateData(['id'=> $this->request->id],$artist_array);
        if($artist){
            \Session::flash('success_message', 'Artist Details Updated Succssfully.'); 
            return redirect('/artist/profile/'.$artist->id);
        }else{
            \Session::flash('error_message', 'Something went wrong.');
            return back()->withInput();
        }
    }
    
    function upload_artwork(Request $request)
    {
        $artwork_array = [];
        $artwork_array['title'] = $this->request->title;
        $artwork_array['description'] = $this->request->description;
        $artwork_array['category'] = $this->request->category;
        $artwork_array['sub_category'] = $this->request->sub_category;
        $artwork_array['style'] = $this->request->style;
        $artwork_array['subject'] = $this->request->subject;
        $artwork_array['user_id'] = Auth::user()->id;
        $artwork = $this->artworkRepository->createUpdateData(['id'=> $this->request->id],$artwork_array);
        if($artwork){
            $upload_files = $this->request->file('upload_files');
            $main_image = $this->request->file('main_image_base64');
            $image = $request->main_image_base64;  // your base64 encoded
            $image = str_replace('data:image/jpeg;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = str_random(10).'.'.'jpeg';
            $success = file_put_contents(public_path() . $this->artwork_files.$imageName, base64_decode($image));
            $image_name = url($this->artwork_files . $imageName); 
            $uploads['media_url'] = $image_name;
            $uploads['artwork_id'] = $artwork['id'];
            $upload_file = $this->artworkImageRepository->createUpdateData(['id'=> $this->request->doc_id],$uploads);
                    
            if($this->request->hasFile('upload_files')){
                foreach ($upload_files as $file) {
                    
                    // $resize_image = Image::make($file->getRealPath());
                    // $parts = pathinfo($file->getClientOriginalName());
                    // $extension = strtolower($parts['extension']);
                    // $imageName = uniqid() . mt_rand(999, 9999) . '.' . $extension;
                    
                    // $resize_image->resize(700, 350, function($constraint){
                    // $constraint->aspectRatio();
                    // })->save($destinationPath . '/' . $imageName);
                    // $destinationPath = public_path() . $this->artwork_files;
                    // $file->move($destinationPath, $imageName);
                    $parts = pathinfo($file->getClientOriginalName());
                    $extension = strtolower($parts['extension']);
                    $imageName = uniqid() . mt_rand(999, 9999) . '.' . $extension;
                    $file->move(public_path() . $this->artwork_files, $imageName);  
                    $image_name = url($this->artwork_files . $imageName); 
                    $uploads['media_url'] = $image_name;
                    $uploads['artwork_id'] = $artwork['id'];
                    $upload_file = $this->artworkImageRepository->createUpdateData(['id'=> $this->request->doc_id],$uploads);
                }
            }
            $checked_variant_type = $this->request->checked_variant_type;
            $variant_type = explode(',', $checked_variant_type);
            foreach ($variant_type as $key => $value) {
                if($value == "original"){
                    $variant = [];
                    $variant['artwork_id'] = $artwork['id'];
                    $variant['variant_type'] = $this->request->variant_type;
                    $variant['width'] = $this->request->original_width;
                    $variant['height'] = $this->request->original_height;
                    $variant['price'] = $this->request->original_price;
                    $variant['worldwide_shipping_charge'] = 0;
                    $variants = $this->variantRepository->createUpdateData(['id'=> $this->request->id],$variant);
                }
                if($value == "limited_edition"){
                    foreach ($this->request->limited_width as $key => $limited_edition) {
                        $variant = [];
                        $variant['artwork_id'] = $artwork['id'];
                        $variant['variant_type'] = "limited_edition";
                        $variant['editions_count'] = $this->request->limited_edition_count[$key];
                        $variant['width'] = $this->request->limited_width[$key];
                        $variant['height'] = $this->request->limited_height[$key];
                        $variant['price'] = $this->request->limited_price[$key];
                        $variant['worldwide_shipping_charge'] = 0;
                        // $variant['not_for_sale'] = $this->request->not_for_sale;
                        $variants = $this->variantRepository->createUpdateData(['id'=> $this->request->id],$variant);
                    }
                }
                if($value == "art_paint"){
                    foreach ($this->request->art_width as $key => $art_paint) {
                        $variant = [];
                        $variant['artwork_id'] = $artwork['id'];
                        $variant['variant_type'] = "art_paint";
                        $variant['width'] = $this->request->art_width[$key];
                        $variant['height'] = $this->request->art_height[$key];
                        $variant['price'] = $this->request->art_price[$key];
                        $variant['worldwide_shipping_charge'] = 0;
                        // $variant['not_for_sale'] = $this->request->not_for_sale;
                        $variants = $this->variantRepository->createUpdateData(['id'=> $this->request->id],$variant);
                    }
                }
            }
                    
            \Session::flash('success_message', 'Artwork Details Updated Succssfully.'); 
            return redirect('/artist/artworks');
            $artwork_details = $this->artworkRepository->getData(['id'=>$artwork['id']],'get',['artist', 'artwork_images', 'variants', 'artwork_images'],0);
            
            // return response()->json([
            //     'status' => 'success',
            //     'message' => 'Artwork Updated Succssfully',
            //     'data'  => $artwork_details,
            // ], 200);
        }else{
            \Session::flash('error_message', 'Something went wrong.');
            return back()->withInput();
        }
    } 
    public function getSubcategory(){
        $subcategories = [];
        if(!empty($this->request->category_id)){
            $subcategories = $this->SubCategoryRepository->getData(['category_id'=>$this->request->category_id],'get',[],0);
        }
        $options = "";
        $options .='<option value="">Select Type</option>';
        if(!empty($this->request->category_id)){
            if(count($subcategories) > 0){
                foreach ($subcategories as $key => $value) {
                    $options .= '<option value="'.$value->id.'">'.$value->name.'</option>';
                }
            }
        }
        return response()->json(array(
            'result' => $options,
            'status' => 200,
        ), 200);
    }
    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);
        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
}