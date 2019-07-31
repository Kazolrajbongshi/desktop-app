<?php

namespace App\Http\Controllers;

use Faker\Provider\Image;
use Illuminate\Http\Request;
use InstagramAPI\Instagram;
//use mysql_xdevapi\Exception;
use Storage;
use Ayesh\InstagramDownload\InstagramDownload;
use App\Providers\SweetAlertServiceProvider;
use Session;
use Alert;
use Exception;
class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function media()
    {
        return view('home_page.media_url');
    }
    public function mediaApp()
    {
        return view('home_page.media_app');
    }
    public function mediaAppImage(Request $request)
    {

        $result1 = $this->ig->login(session('username'), session('password'));
        $search1 = $request->pictureSearch;
        $id1 = $this->ig->people->getUserIdForName($search1);
        //$profile1 = $this->ig->people->getInfoById($id1);
        $searchResult = $this->ig->timeline->getUserFeed($id1);
        $pictures = json_decode($searchResult);
//        print_r($pictures->items[0]->image_versions2->candidates[0]->url);
//        exit();

        return view('home_page.media_app',compact('pictures'));
    }
    public function __construct()
    {
        Instagram::$allowDangerousWebUsageAtMyOwnRisk = true;
        $this->ig = new \InstagramAPI\Instagram();


    }



    public function dashboard(){
        if(session('username')){
            $deafult_active = 'active';

            // dd(session('username'));

           // dd(session('username'));

            return view('home_page.dashboard',compact('deafult_active'));
        }else{
            return redirect('/user-login');
        }
    }

    public function search(Request $request){
        $result1 = $this->ig->login(session('username'), session('password'));
        $search1 =   $request->searchUser1;
        $search2 =   $request->searchUser2;
        $search3 =   $request->searchUser3;
        $active = 'active';
        if ($search2 == null && $search3 == null){
            try{
                $id1 = $this->ig->people->getUserIdForName($search1);
            }catch (\Exception $ex){
                return response()->json(['data'=>1,'msg'=>$ex->getMessage()]);
            }
            try{
                $profile1 = $this->ig->people->getInfoById($id1);
                $searchResult1 = $this->ig->timeline->getUserFeed($id1);
                $searchResult1 = json_decode($searchResult1);
                $profile1 = json_decode($profile1);
                return view('home_page.compare_ajax_dashboard',compact('searchResult1','profile1','active'));
            }catch(\Exception $ex) {
                return response()->json(['data'=>2,'msg'=>$ex->getMessage()]);
            }
        }
        if($search1 !=null && $search2 !=null && $search3 == null){
            try{
                $id1 = $this->ig->people->getUserIdForName($search1);
                $id2 = $this->ig->people->getUserIdForName($search2);
            }catch (\Exception $ex){
                return response()->json(['data'=>1,'msg'=>$ex->getMessage()]);
            }
            try{
            $profile1 = $this->ig->people->getInfoById($id1);
            $profile2 = $this->ig->people->getInfoById($id2);
            $searchResult1 = $this->ig->timeline->getUserFeed($id1);
            $searchResult2 = $this->ig->timeline->getUserFeed($id2);
            $searchResult1 = json_decode($searchResult1);
            $searchResult2 = json_decode($searchResult2);
            $profile1 = json_decode($profile1);
            $profile2 = json_decode($profile2);
            return view('home_page.compare_ajax_dashboard',compact('searchResult1','profile1','searchResult2','profile2','active'));
            }catch (\Exception $ex){
                return response()->json(['data'=>2,'msg'=>$ex->getMessage()]);
            }
        }
        if ($search1 != null && $search2 != null && $search3 != null){
            try{
                $id1 = $this->ig->people->getUserIdForName($search1);
                $id2 = $this->ig->people->getUserIdForName($search2);
                $id3 = $this->ig->people->getUserIdForName($search3);
            }catch (\Exception $ex){
                return response()->json(['data'=>1,'msg'=>$ex->getMessage()]);
            }
            try{
                $profile1 = $this->ig->people->getInfoById($id1);
                $profile2 = $this->ig->people->getInfoById($id2);
                $profile3 = $this->ig->people->getInfoById($id3);
                $searchResult1 = $this->ig->timeline->getUserFeed($id1);
                $searchResult2 = $this->ig->timeline->getUserFeed($id2);
                $searchResult3 = $this->ig->timeline->getUserFeed($id3);
                $searchResult1 = json_decode($searchResult1);
                $searchResult2 = json_decode($searchResult2);
                $searchResult3 = json_decode($searchResult3);
                $profile1 = json_decode($profile1);
                $profile2 = json_decode($profile2);
                $profile3 = json_decode($profile3);
                return view('home_page.compare_ajax_dashboard',compact('searchResult1','profile1','searchResult2','profile2','searchResult3','profile3','active'));
            }catch (\Exception $ex){
                return response()->json(['data'=>2,'msg'=>$ex->getMessage()]);
            }
        }
        return view('home_page.dashboard');
    }

    public function defaultSearch(Request $request){

        // $result1 = $this->ig->login(session('username'), session('password'));
        // $search =   $request->searchUser;
        // // return response()->json(['data'=>$search]);
        // $deafult_active = 'active';
        // if ($search != null){
        //     $id = $this->ig->people->getUserIdForName($search);
        //     $profile = $this->ig->people->getInfoById($id);
        //     $searchResult = $this->ig->timeline->getUserFeed($id);
        //     $searchResult = json_decode($searchResult);
        //     $profile = json_decode($profile);
        //     // return view('home_page.dashboard',compact('searchResult','profile','deafult_active'));
        //     return view('home_page.ajax_dashboard',compact('searchResult','profile','deafult_active'));
        // }

           $user_name = $request->searchUser;
           $usersInfo = array();
           $result1 = $this->ig->login(session('username'), session('password'));
           try{
            $userid = $this->ig->people->getUserIdForName($user_name);

            }catch (\Exception $ex){
                return response()->json(['data'=>1,'msg'=>$ex->getMessage()]);
            }
            $ranktoken = \InstagramAPI\Signatures::generateUUID();

               if($request->searchType == 'follower'){
                    try{
                         $searchResult1 = $this->ig->people->getFollowers($userid,$ranktoken);
                         $searchResult1 = json_decode($searchResult1);
                         if(count($searchResult1->users) == 0){
                             return response()->json(['data'=>3,'msg'=>'Account is private']);
                         }
                    }catch(\Exception $ex){
                        return response()->json(['data'=>2,'msg'=>$ex->getMessage()]);
                   }
                   // $searchResult1 = json_decode($searchResult1);
               }else{
                    try{
                         $searchResult1 = $this->ig->people->getFollowing($userid,$ranktoken);
                         $searchResult1 = json_decode($searchResult1);
                         if(count($searchResult1->users) == 0){
                             return response()->json(['data'=>3,'msg'=>'Account is private']);
                         }

                     }catch(\Exception $ex){
                        return response()->json(['data'=>2,'msg'=>$ex->getMessage()]);
                    }
                    // $searchResult1 = json_decode($searchResult1);
               }

            try{

               foreach ($searchResult1->users as $searchResult){
                   $id = $searchResult->pk;
                   $userSelfInfo = $this->ig->people->getInfoById($id);

                   $userSelfInfo = json_decode($userSelfInfo);

                   $usersInfo[] = ['username' => $userSelfInfo->user->username,'biography' => $userSelfInfo->user->biography,
                       'followerCount' => $userSelfInfo->user->follower_count,'followingCount' => $userSelfInfo->user->following_count,
                       'photo' => $userSelfInfo->user->profile_pic_url,'post' => $userSelfInfo->user->media_count,'private' => $userSelfInfo->user->is_private];

               }



           }catch (\Exception $ex){
                return response()->json(['data'=>4,'msg'=>$ex->getMessage()]);
           }
           return view('home_page.ajax_follower_following_list_details',compact('usersInfo'));


    }


    public function test(){


        $this->ig->login('webvision100', 'instagram123456');
        $ranktoken = \InstagramAPI\Signatures::generateUUID();
        $id1 = $this->ig->people->getUserIdForName('mad__beatz');
        //$profile1 = $this->ig->people->getInfoById($id1);

        $searchResult = $this->ig->timeline->getUserFeed($id1);

       // $pictures = json_decode($searchResult);
        return $searchResult;
    }

    public function pictureSearch(Request $request){

        $result1 = $this->ig->login(session('username'), session('password'));
        try{
            $search1 = $request->pictureSearch;
            if($request->maxId !=null){
                $maxId = $request->maxId;
            }else{
                $maxId = null;
            }
            $searchName = $search1;
            try{
                $id1 = $this->ig->people->getUserIdForName($search1);
            }catch (\Exception $ex){
                return back()->with('media_search',1);
            }
            //$profile1 = $this->ig->people->getInfoById($id1);

            $searchResult = $this->ig->timeline->getUserFeed($id1,$maxId);
            $pictures = json_decode($searchResult);
//        print_r($pictures->items[0]->image_versions2->candidates[0]->url);
//        exit();
            $media_active = 'active';
            return view('home_page.dashboard',compact('pictures','media_active','searchName'));
        }
        catch (Exception $e){
//            return redirect('home_page.dashboard')->with('error','Email or Password invalid');

            return $e;

        }

    }
    public function pictureDownload(Request $request){
        $result1 = $this->ig->login(session('username'), session('password'));
        if ($request->imageUrl !=null){
            $url = $request->imageUrl;
            //dd($url);
            $contents = file_get_contents($url);

            $name = str_random(10).'.'.'jpg';
            // Storage::put($name, $contents);
            $temp = Storage::disk('uploads')->put($name, $contents);
            //$url = Storage::url($name);
            //return response()->download(asset('images/'.$name));
            return response()->download('images/'.$name);
        }elseif($request->videoUrl != null){
            $link = $this->ig->media->getPermalink($request->videoUrl);
            $update_link = json_decode($link);


            $mystring = $update_link->permalink;

            $parts = explode("?",$mystring);
//break the string up around the "/" character in $mystring

            $mystring = $parts['0'];
//grab the first part

           // echo $mystring;

            $client = new InstagramDownload($mystring);
            $url = $client->getDownloadUrl(); // Returns the download URL.

                $contents = file_get_contents($url);
                $name = str_random(10).'.'.'mp4';
                // Storage::put($name, $contents);
                $temp = Storage::disk('uploads')->put($name, $contents);
                //$url = Storage::url($name);
                //return response()->download(asset('images/'.$name));
                return response()->download('images/'.$name);

        }



        //echo $temp;
    }

    public function urlDownload(Request $request){
        $copyLink = $request->copyLink;
        try {
            $client = new InstagramDownload($copyLink);
            $url = $client->getDownloadUrl(); // Returns the download URL.

            if($client->getType() == 'video'){
                $contents = file_get_contents($url);
                $name = str_random(10).'.'.'mp4';
                // Storage::put($name, $contents);
                $temp = Storage::disk('uploads')->put($name, $contents);
                //$url = Storage::url($name);
                //return response()->download(asset('images/'.$name));
                return response()->download('images/'.$name);
            }else{
                $contents = file_get_contents($url);
                $name = str_random(10).'.'.'jpg';;
                // Storage::put($name, $contents);
                $temp = Storage::disk('uploads')->put($name, $contents);
                //$url = Storage::url($name);
                //return response()->download(asset('images/'.$name));
                return response()->download('images/'.$name);
            }
            //$type = $client->getType(); // Returns "image" or "video" depending on the media type.

        }
        catch (\InvalidArgumentException $exception) {
            /*
             * \InvalidArgumentException exceptions will be thrown if there is a validation
             * error in the URL. You might want to break the code flow and report the error
             * to your form handler at this point.
             */
            $error = $exception->getMessage();
        }

    }
    public function appImageView(Request $request){
        $imageUrl = $request->urlImage;

    }
    public function appUrlDownload(Request $request){
        $copyLink = $request->appImageUrl;
        try {
            $client = new InstagramDownload($copyLink);
            $url = $client->getDownloadUrl(); // Returns the download URL.

            if($client->getType() == 'video'){
                $contents = file_get_contents($url);
                $name = str_random(10).'.'.'mp4';;
                // Storage::put($name, $contents);
                $temp = Storage::disk('uploads')->put($name, $contents);
                //$url = Storage::url($name);
                //return response()->download(asset('images/'.$name));
                return response()->download('images/'.$name);
            }else{
                $contents = file_get_contents($url);
                $name = str_random(10).'.'.'jpg';;
                // Storage::put($name, $contents);
                $temp = Storage::disk('uploads')->put($name, $contents);
                //$url = Storage::url($name);
                //return response()->download(asset('images/'.$name));
                return response()->download('images/'.$name);
            }
            //$type = $client->getType(); // Returns "image" or "video" depending on the media type.

        }
        catch (\InvalidArgumentException $exception) {
            /*
             * \InvalidArgumentException exceptions will be thrown if there is a validation
             * error in the URL. You might want to break the code flow and report the error
             * to your form handler at this point.
             */
            $error = $exception->getMessage();
        }
    }

    public function csvImageDownload(Request $request){
        if ($request->has('link')) {
            $path = $request->input('link');
        }
        // echo $path;
        // exit();
        $contents = file_get_contents($path);
        $name = str_random(10).'.'.'jpg';;
       // Storage::put($name, $contents);
        $temp = Storage::disk('uploads')->put($name, $contents);
        //$url = Storage::url($name);
        //return response()->download(asset('images/'.$name));
        return response()->download('images/'.$name);


        //echo $temp;
    }

    public function two($username,$password,$verificationCode){
        $temp = $this->ig->finishTwoFactorLogin($username, $password, $this->twoFactorIdentifier, $verificationCode);

    }

    public function loginPage(){
        return view('home_page.login_page');
    }


    public function followerAndFollowingList(){

        return view('home_page.follower_following_list');
    }

    public function loginSubmit(Request $request){
        $username = $request->username;
        $password = $request->password;

        set_time_limit(0);
        date_default_timezone_set('UTC');
        try {
            $loginResponse = $this->ig->login($username, $password);
            if ($loginResponse !== null && $loginResponse->isTwoFactorRequired()) {
                $twoFactorIdentifier = $loginResponse->getTwoFactorInfo()->getTwoFactorIdentifier();
                session(['twoFactorIdentifier' => $twoFactorIdentifier]);
                // The "STDIN" lets you paste the code via terminal for testing.
                // You should replace this line with the logic you want.
                // The verification code will be sent by Instagram via SMS.
//                $verificationCode = '2222';
//
//                //$this->two($username,$password,$verificationCode);
//                $this->ig->finishTwoFactorLogin($username, $password, $this->twoFactorIdentifier, $verificationCode);
                session(['username' => $username,'password' => $password]);
                return view('home_page.sms_page');
            }else{
                session(['username' => $username,'password' => $password]);
                return redirect('dashboard');
            }
        } catch (\Exception $e) {
            // echo 'Something went wrong: '.$e->getMessage()."\n";
            return back()->with('user_pass_err','1');
        }

    }

    public function smsPage(Request $request){
        try{
            $sms = $request->code;
            $this->ig->finishTwoFactorLogin(session('username'), session('password'), session('twoFactorIdentifier'), $sms);
            // return view('home_page.dashboard');
            return redirect('/dashboard');
        }catch (\Exception $ex){
            echo $ex;
        }

    }

    public function followerAndFollowingListDetails(Request $request){

        if(session('username')){
    //        echo $id;
    //        exit();
            // return response()->json(['data'=>$request->user_id]);
           $userid = $request->user_id;
           $usersInfo = array();
           $result1 = $this->ig->login(session('username'), session('password'));
           $ranktoken = \InstagramAPI\Signatures::generateUUID();
           $searchResult1 = $this->ig->people->getFollowers($userid,$ranktoken);

           $searchResult1 = json_decode($searchResult1);
           try{
               foreach ($searchResult1->users as $searchResult){
                   $id = $searchResult->pk;
                   $userSelfInfo = $this->ig->people->getInfoById($id);

                   $userSelfInfo = json_decode($userSelfInfo);

                   $usersInfo[] = ['username' => $userSelfInfo->user->username,'biography' => $userSelfInfo->user->biography,
                       'followerCount' => $userSelfInfo->user->follower_count,'followingCount' => $userSelfInfo->user->following_count,
                       'photo' => $userSelfInfo->user->profile_pic_url,'post' => $userSelfInfo->user->media_count,'private' => $userSelfInfo->user->is_private];

               }
           }catch (\Exception $ex){

           }
    //        print_r($usersInfo);
    //        exit();

           return view('home_page.ajax_follower_following_list_details',compact('usersInfo'));
    //        return $searchResult1;
       }else{
            return response()->json(['data'=>'1']);
        }
   }

   public function hashtagSearch(Request $request){

            $hashtag = $request->hashtag;

            $this->ig->login(session('username'), session('password'));
            $rank_token= \InstagramAPI\Signatures::generateUUID();
            $result = $this->ig->hashtag->search($hashtag);

            $obj = json_decode($result);
            if($obj->results == null){
                return response()->json(['no_hashtag_err'=>'No hashtag found','data'=>'2']);

            }
            $results = $obj->results;

            $hashtag_active = 'active';

            return view('home_page.ajax_hashtag_list',compact('results','hashtag'));
    }

    public function locationSearch(Request $request){

            $location = $request->location;

            $this->ig->login(session('username'), session('password'));
            $rank_token= \InstagramAPI\Signatures::generateUUID();
            // $result = $this->ig->hashtag->search($location);
            $result = $this->ig->location->findPlaces($location);

            $obj = json_decode($result);
            if($obj->items == null){
                return response()->json(['no_location_err'=>'No location found','data'=>'2']);

            }
            $results = $obj->items;

            $location_active = 'active';

            return view('home_page.ajax_location_list',compact('results','location'));
    }

   public function logout(){
       $this->ig->login(session('username'), session('password'));
        Session::flush();
       $this->ig->logout();
    return redirect('/');
   }


    public function index()
    {
        return view('home_page.desigram');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userLogin()
    {
        return view('home_page.user_login');
    }

    public function hashtagListSearchDetails(Request $request){

        $result1 = $this->ig->login(session('username'), session('password'));
        $ranktoken = \InstagramAPI\Signatures::generateUUID();

        try{

            $result = $this->ig->hashtag->getFeed($request->hashtag,$ranktoken);
            $obj = json_decode($result);
           foreach($obj->items as $media) {
                $result = $media->id;
                $likers = $this->ig->media->getLikers($result);
                $likers = json_decode($likers);
                foreach ($likers->users as $like){

                        $second[] = $like->pk;
                        // array_push($second,$like->pk);

                }


            }

            foreach ($second as $searchResult){


                   $userSelfInfo = $this->ig->people->getInfoById($searchResult);

                   $userSelfInfo = json_decode($userSelfInfo);

                   $usersInfo[] = ['username' => $userSelfInfo->user->username,'biography' => $userSelfInfo->user->biography,
                       'followerCount' => $userSelfInfo->user->follower_count,'followingCount' => $userSelfInfo->user->following_count,
                       'photo' => $userSelfInfo->user->profile_pic_url,'post' => $userSelfInfo->user->media_count,'private' => $userSelfInfo->user->is_private];


            }

           }catch (\Exception $ex){
                // return response()->json(['msg'=>'<h3 style="text-align:center;color:red;">Something went wrong.Please try sometimes later.</h3>','value'=>1]);
            return response()->json(['data'=>1]);
           }

        return view('home_page.ajax_hashtag_follower_following_list_details',compact('usersInfo'));

    }

    public function locationListSearchDetails(Request $request){

        $result1 = $this->ig->login(session('username'), session('password'));
        $ranktoken = \InstagramAPI\Signatures::generateUUID();

        try{

            $result = $this->ig->location->getFeed($request->location,$ranktoken);
            $obj = json_decode($result);
            $usersInfo = $obj->sections[0]->layout_content->medias;
                
           }catch (\Exception $ex){
                // return response()->json(['msg'=>'<h3 style="text-align:center;color:red;">Something went wrong.Please try sometimes later.</h3>','value'=>1]);
            return response()->json(['data'=>1]);
           }

        return view('home_page.ajax_location_follower_following_list_details',compact('usersInfo'));

    }

    public function apiTest(){

        $result1 = $this->ig->login('webvision100','instagram123456');
        // $userid = $this->ig->people->getUserIdForName('fifa');
        $ranktoken = \InstagramAPI\Signatures::generateUUID();
        // $searchResult1 = $this->ig->people->getFollowers($userid,$ranktoken);
        // $searchResult1 = json_decode($searchResult1);
        //  $result = $this->ig->location->findPlaces('dhaka');
        // return $result;
        $result = $this->ig->location->getFeed('1032889491',$ranktoken);
        // $result = $this->ig->hashtag->search('dhaka');
        $obj = json_decode($result);
        $usersInfo = $obj->sections[0]->layout_content->medias;
        foreach ($usersInfo as $value) {
            $data[] = $value->media->taken_at;
        }
                return $data;
        return $result;
        $obj = json_decode($result);

        foreach($obj->items as $media) {
                    $result = $media->id;
                    $likers = $this->ig->media->getLikers($result);
                    $likers = json_decode($likers);
                    foreach ($likers->users as $like){

                            $second[] = $like->pk;
                            // array_push($second,$like->pk);

                    }


                }
                $i=0;
        foreach ($second as $searchResult){
            if($i<50){

                   $userSelfInfo = $this->ig->people->getInfoById($searchResult);

                   $userSelfInfo = json_decode($userSelfInfo);

                   $usersInfo[] = ['username' => $userSelfInfo->user->username,'biography' => $userSelfInfo->user->biography,
                       'followerCount' => $userSelfInfo->user->follower_count,'followingCount' => $userSelfInfo->user->following_count,
                       'photo' => $userSelfInfo->user->profile_pic_url,'post' => $userSelfInfo->user->media_count,'private' => $userSelfInfo->user->is_private];
                       $i++;
               }
           }

        return $usersInfo;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
