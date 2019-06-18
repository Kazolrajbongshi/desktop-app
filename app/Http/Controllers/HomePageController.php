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
        $search1 =   $request->searchUser;
        $id1 = $this->ig->people->getUserIdForName($search1);
        $searchResult1 = $this->ig->timeline->getUserFeed($id1);
       // $searchResult1 = $this->ig->people->getActiveFeedAds($id1);
        $searchResult1 = json_decode($searchResult1);
        
        return view('home_page.dashboard',compact('searchResult1'));
    }

    public function test(){
        $result1 = $this->ig->login('webvision100','instagram123456');
        $search1 =  'icc' ;//$request->searchUser;
        $id1 = $this->ig->people->getUserIdForName($search1);
        $searchResult1 = $this->ig->timeline->getUserFeed($id1);
        // $searchResult1 = $this->ig->people->getActiveFeedAds($id1);
        //$searchResult1 = json_decode($searchResult1);
//        print_r($searchResult1);
//        exit();

        return $searchResult1;
    }


    public function followerAndFollowingList(){

        return view('home_page.follower_following_list');
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
