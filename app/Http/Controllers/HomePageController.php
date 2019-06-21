<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use InstagramAPI\Instagram;

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

        return view('home_page.dashboard');
    }

    public function search(Request $request){
        $result1 = $this->ig->login('webvision100','instagram123456');
        $search1 =   $request->searchUser1;
        $search2 =   $request->searchUser2;
        $search3 =   $request->searchUser3;
        if ($search2 == null && $search3 == null){
            $id1 = $this->ig->people->getUserIdForName($search1);
            $profile1 = $this->ig->people->getInfoById($id1);
            $searchResult1 = $this->ig->timeline->getUserFeed($id1);
            $searchResult1 = json_decode($searchResult1);
            $profile1 = json_decode($profile1);
            return view('home_page.dashboard',compact('searchResult1','profile1'));
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
            return view('home_page.dashboard',compact('searchResult1','profile1','searchResult2','profile2'));
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
            return view('home_page.dashboard',compact('searchResult1','profile1','searchResult2','profile2','searchResult3','profile3'));
        }
        return view('home_page.dashboard');
    }

    public function test(){
        $result1 = $this->ig->login('webvision100','instagram123456');
        $search1 =  'fifa' ;//$request->searchUser;
        $id1 = $this->ig->people->getUserIdForName($search1);
       // $searchResult1 = $this->ig->people->getInfoById($id1);
        $searchResult1 = $this->ig->timeline->getUserFeed($id1);
        $searchResult1 = json_decode($searchResult1);
//        print_r($searchResult1);
//        exit();
        //$searchResult3->caption->text
        return $searchResult1->items[0]->caption->text;
    }


    public function followerAndFollowingList(){

        return view('home_page.follower_following_list');
    }

    public function followerAndFollowingListDetails(){

        return view('home_page.follower_following_list_details');
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
