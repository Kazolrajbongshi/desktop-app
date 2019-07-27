<?php

namespace App\Http\Controllers;

use Faker\Provider\Image;
use Illuminate\Http\Request;
use InstagramAPI\Instagram;
use Storage;
use Ayesh\InstagramDownload\InstagramDownload;
use Session;


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

        $result1 = $this->ig->login('dosnix.tech','ilove100%');
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
            $id1 = $this->ig->people->getUserIdForName($search1);
            $profile1 = $this->ig->people->getInfoById($id1);
            $searchResult1 = $this->ig->timeline->getUserFeed($id1);
            $searchResult1 = json_decode($searchResult1);
            $profile1 = json_decode($profile1);
            return view('home_page.compare_ajax_dashboard',compact('searchResult1','profile1','active'));
        }
        if($search1 !=null && $search2 !=null && $search3 == null){
            $id1 = $this->ig->people->getUserIdForName($search1);
            $id2 = $this->ig->people->getUserIdForName($search2);
            $profile1 = $this->ig->people->getInfoById($id1);
            $profile2 = $this->ig->people->getInfoById($id2);
            $searchResult1 = $this->ig->timeline->getUserFeed($id1);
            $searchResult2 = $this->ig->timeline->getUserFeed($id2);
            $searchResult1 = json_decode($searchResult1);
            $searchResult2 = json_decode($searchResult2);
            $profile1 = json_decode($profile1);
            $profile2 = json_decode($profile2);
            return view('home_page.compare_ajax_dashboard',compact('searchResult1','profile1','searchResult2','profile2','active'));
        }
        if ($search1 != null && $search2 != null && $search3 != null){
            $id1 = $this->ig->people->getUserIdForName($search1);
            $id2 = $this->ig->people->getUserIdForName($search2);
            $id3 = $this->ig->people->getUserIdForName($search3);
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
           $userid = $this->ig->people->getUserIdForName($user_name);
           $ranktoken = \InstagramAPI\Signatures::generateUUID();
           $searchResult1 = $this->ig->people->getFollowers($userid,$ranktoken);
           $searchResult2 = $this->ig->people->getFollowing($userid,$ranktoken);

           $searchResult1 = json_decode($searchResult1);
           $searchResult2 = json_decode($searchResult2);
           try{
               foreach ($searchResult1->users as $searchResult){
                   $id = $searchResult->pk;
                   $userSelfInfo = $this->ig->people->getInfoById($id);

                   $userSelfInfo = json_decode($userSelfInfo);

                   $usersInfo[] = ['username' => $userSelfInfo->user->username,'biography' => $userSelfInfo->user->biography,
                       'followerCount' => $userSelfInfo->user->follower_count,'followingCount' => $userSelfInfo->user->following_count,
                       'photo' => $userSelfInfo->user->profile_pic_url,'post' => $userSelfInfo->user->media_count,'private' => $userSelfInfo->user->is_private];

               }

               foreach ($searchResult2->users as $searchResult2){
                   $id = $searchResult2->pk;
                   $userSelfInfo2 = $this->ig->people->getInfoById($id);

                   $userSelfInfo2 = json_decode($userSelfInfo2);

                   $usersInfoFollowing[] = ['username' => $userSelfInfo2->user->username,'biography' => $userSelfInfo2->user->biography,
                       'followerCount' => $userSelfInfo2->user->follower_count,'followingCount' => $userSelfInfo2->user->following_count,
                       'photo' => $userSelfInfo2->user->profile_pic_url,'post' => $userSelfInfo2->user->media_count,'private' => $userSelfInfo2->user->is_private];

               }

           }catch (\Exception $ex){

           }

           return view('home_page.ajax_follower_following_list_details',compact('usersInfo','usersInfoFollowing'));

    }


    public function test(){


        $result1 = $this->ig->login('webvision100','instagram123456');
//        $search1 =  'fifa' ;//$request->searchUser;
//        $ranktoken = \InstagramAPI\Signatures::generateUUID();
 //$searchResult1 = $this->ig->people->getInfoById('1474834026');
        $id1 = $this->ig->people->getUserIdForName('icc');
        $userid = $this->ig->people->getUserIdForName('kazolrazbongshi');
        $ranktoken = \InstagramAPI\Signatures::generateUUID();
        $searchResult1 = $this->ig->people->getFollowing($userid,$ranktoken);
        //$profile1 = $this->ig->people->getInfoById($id1);
        // $searchResult1 = $this->ig->timeline->getUserFeed($id1,'2087994060823561670_376525195');
        //$searchResult1 = json_decode($searchResult1);
//        $profile1 = json_decode($profile1);

////        print_r($searchResult1);
////        exit();
//        //$searchResult3->caption->text
////        print_r($searchResult1) ;
//        return $searchResult1;
//        $url = 'https://instagram.fdac26-1.fna.fbcdn.net/vp/738cf7b8c9f5b9a6517dad72b3b0c250/5DAA9E32/t51.2885-15/e35/54800752_2330402480568290_2482030731750175422_n.jpg?_nc_ht=instagram.fdac26-1.fna.fbcdn.net&se=7&ig_cache_key=MjAxMzMxNDY0MzY4Njg1NTM4NA%3D%3D.2';
//        $url = 'https://instagram.fdac26-1.fna.fbcdn.net/vp/65537cc766e0c8563e1043f2b8012d2f/5DC70746/t51.2885-15/e35/61911421_527895654412951_8439248423457928837_n.jpg?_nc_ht=instagram.fdac26-1.fna.fbcdn.net&se=7&ig_cache_key=MjA2NDA5NjE4NDk2NDY5Nzc5NA%3D%3D.2';
////       // $url = "http://www.google.co.in/intl/en_com/images/srpr/logo1w.png";
//        $contents = file_get_contents($url);
//        $name = str_random(10).'.'.'jpg';;
//       // Storage::put($name, $contents);
//        $temp = Storage::disk('uploads')->put($name, $contents);
        //return $searchResult1;

//        set_time_limit(0);
//        date_default_timezone_set('UTC');
///////// CONFIG ///////
//
//        $username = 'mahfuzhur007';
//        $password = 'rockerboy0168';

//
//////        print_r($searchResult1);
//////        exit();
////        //$searchResult3->caption->text
//////        print_r($searchResult1) ;
////        return $searchResult1;
////        $url = 'https://instagram.fdac26-1.fna.fbcdn.net/vp/738cf7b8c9f5b9a6517dad72b3b0c250/5DAA9E32/t51.2885-15/e35/54800752_2330402480568290_2482030731750175422_n.jpg?_nc_ht=instagram.fdac26-1.fna.fbcdn.net&se=7&ig_cache_key=MjAxMzMxNDY0MzY4Njg1NTM4NA%3D%3D.2';
////        $url = 'https://instagram.fdac26-1.fna.fbcdn.net/vp/65537cc766e0c8563e1043f2b8012d2f/5DC70746/t51.2885-15/e35/61911421_527895654412951_8439248423457928837_n.jpg?_nc_ht=instagram.fdac26-1.fna.fbcdn.net&se=7&ig_cache_key=MjA2NDA5NjE4NDk2NDY5Nzc5NA%3D%3D.2';
//////       // $url = "http://www.google.co.in/intl/en_com/images/srpr/logo1w.png";
////        $contents = file_get_contents($url);
////        $name = str_random(10).'.'.'jpg';;
////       // Storage::put($name, $contents);
////        $temp = Storage::disk('uploads')->put($name, $contents);
//        //return $searchResult1;
//
////        set_time_limit(0);
////        date_default_timezone_set('UTC');
/////////// CONFIG ///////
////
////        $username = 'mahfuzhur007';
////        $password = 'rockerboy0168';
////
//////////////////////////
////
////        try {
////            $loginResponse = $this->ig->login($username, $password);
////            if ($loginResponse !== null && $loginResponse->isTwoFactorRequired()) {
////                $this->twoFactorIdentifier = $loginResponse->getTwoFactorInfo()->getTwoFactorIdentifier();
////                // The "STDIN" lets you paste the code via terminal for testing.
////                // You should replace this line with the logic you want.
////                // The verification code will be sent by Instagram via SMS.
////                $verificationCode = '374650';
////
////               $this->two($username,$password,$verificationCode);
////            }
////        } catch (\Exception $e) {
////            echo 'Something went wrong: '.$e->getMessage()."\n";
////        }
////        $searchResult1 =$this->ig->people->getSelfInfo();
//
        //$username = $request->json('username');
        //dd($username);
//        $hash = $request->json('token'); //generate token from the control panel
//        $numbers = $request->json('number'); //Recipient Phone Number multiple number must be separated by comma
//        $message = $request->json('mgs');
////        dd($username,$hash,$numbers,$message);
//        $params = array('app'=>'ws', 'u'=>$username, 'h'=>$hash, 'op'=>'pv', 'unicode'=>'1','to'=>$numbers, 'msg'=>$message);
//
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, "http://alphasms.biz/index.php?".http_build_query($params, "", "&"));
//        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:application/json", "Accept:application/json"));
//        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
//
//        $response = curl_exec($ch);
//        curl_close ($ch);
    }

    public function pictureSearch(Request $request){
        $result1 = $this->ig->login('webvision100','instagram123456');
        $search1 = $request->pictureSearch;
        $id1 = $this->ig->people->getUserIdForName($search1);
        //$profile1 = $this->ig->people->getInfoById($id1);
        $searchResult = $this->ig->timeline->getUserFeed($id1);
        $pictures = json_decode($searchResult);
//        print_r($pictures->items[0]->image_versions2->candidates[0]->url);
//        exit();
        $media_active = 'active';
        return view('home_page.dashboard',compact('pictures','media_active'));
    }
    public function pictureDownload(Request $request){
        $url = $request->imageUrl;
        $contents = file_get_contents($url);
        $name = str_random(10).'.'.'jpg';;
       // Storage::put($name, $contents);
        $temp = Storage::disk('uploads')->put($name, $contents);
        //$url = Storage::url($name);
        //return response()->download(asset('images/'.$name));
        return response()->download('images/'.$name);


        //echo $temp;
    }

    public function urlDownload(Request $request){
        $copyLink = $request->copyLink;
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
        session(['username' => $username,'password' => $password]);
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
                return view('home_page.sms_page');
            }else{
                return redirect('dashboard');
            }
        } catch (\Exception $e) {
            echo 'Something went wrong: '.$e->getMessage()."\n";
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
            $hashtagName = array();
            $postCounter = array();

            $results = $obj->results;

            $hashtag_active = 'active';

            return view('home_page.ajax_hashtag_list',compact('results','hashtag','hashtag_active'));
    }

   public function logout(){
//    Session::flush();
       $this->ig->logout();
    return redirect('/user-login');
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

        $result1 = $this->ig->login('webvision100','instagram123456');
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

           }catch (\Exception $ex){
                return response()->json(['msg'=>'<h3 style="text-align:center;color:red;">Something went wrong.Please try sometimes later.</h3>','value'=>1]);
           }

        return view('home_page.ajax_hashtag_follower_following_list_details',compact('usersInfo'));

    }

    public function apiTest(){

        $result1 = $this->ig->login('webvision100','instagram123456');
        // $userid = $this->ig->people->getUserIdForName('fifa');
        $ranktoken = \InstagramAPI\Signatures::generateUUID();
        // $searchResult1 = $this->ig->people->getFollowers($userid,$ranktoken);
        // $searchResult1 = json_decode($searchResult1);
        $result = $this->ig->hashtag->getFeed('kazolafasion',$ranktoken);
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
