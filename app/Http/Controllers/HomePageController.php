<?php

namespace App\Http\Controllers;

use Faker\Provider\Image;
use Illuminate\Http\Request;
use InstagramAPI\Instagram;
use Storage;
use Ayesh\InstagramDownload\InstagramDownload;


class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        Instagram::$allowDangerousWebUsageAtMyOwnRisk = true;
        $this->ig = new \InstagramAPI\Instagram();
    }

    public function dashboard(){
        $deafult_active = 'active';
        return view('home_page.dashboard',compact('deafult_active'));
    }

    public function search(Request $request){
        $result1 = $this->ig->login('webvision100','instagram123456');
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
            return view('home_page.dashboard',compact('searchResult1','profile1','active'));
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
            return view('home_page.dashboard',compact('searchResult1','profile1','searchResult2','profile2','active'));
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
            return view('home_page.dashboard',compact('searchResult1','profile1','searchResult2','profile2','searchResult3','profile3','active'));
        }
        return view('home_page.dashboard');
    }

    public function defaultSearch(Request $request){

        $result1 = $this->ig->login('webvision100','instagram123456');
        $search =   $request->searchUser;
        $deafult_active = 'active';
        if ($search != null){
            $id = $this->ig->people->getUserIdForName($search);
            $profile = $this->ig->people->getInfoById($id);
            $searchResult = $this->ig->timeline->getUserFeed($id);
            $searchResult = json_decode($searchResult);
            $profile = json_decode($profile);
            return view('home_page.dashboard',compact('searchResult','profile','deafult_active'));
        }

    }

    public function test(){


//        $result1 = $this->ig->login('webvision100','instagram123456');
//        $search1 =  'fifa' ;//$request->searchUser;
//        $ranktoken = \InstagramAPI\Signatures::generateUUID();
//       // $searchResult1 = $this->ig->people->getInfoById('1474834026');

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

        set_time_limit(0);
        date_default_timezone_set('UTC');
/////// CONFIG ///////

        $username = 'mahfuzhur007';
        $password = 'rockerboy0168';

//////////////////////

        try {
            $loginResponse = $this->ig->login($username, $password);
            if ($loginResponse !== null && $loginResponse->isTwoFactorRequired()) {
                $this->twoFactorIdentifier = $loginResponse->getTwoFactorInfo()->getTwoFactorIdentifier();
                // The "STDIN" lets you paste the code via terminal for testing.
                // You should replace this line with the logic you want.
                // The verification code will be sent by Instagram via SMS.
                $verificationCode = '374650';

               $this->two($username,$password,$verificationCode);
            }
        } catch (\Exception $e) {
            echo 'Something went wrong: '.$e->getMessage()."\n";
        }
        $searchResult1 =$this->ig->people->getSelfInfo();

        return $searchResult1;
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
                $this->twoFactorIdentifier = $loginResponse->getTwoFactorInfo()->getTwoFactorIdentifier();
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
            $this->ig->finishTwoFactorLogin(session('username'), session('password'), $this->twoFactorIdentifier, $sms);
            return view('dashboard');
        }catch (\Exception $ex){

        }

    }

    public function followerAndFollowingListDetails(Request $request,$id){
//        echo $id;
//        exit();
       $userid = $id;
       $usersInfo = array();
       $result1 = $this->ig->login('webvision100','instagram123456');
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

       return view('home_page.follower_following_list_details',compact('usersInfo'));
//        return $searchResult1;
   }


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
