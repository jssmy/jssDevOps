<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevenmaguire\Services\Trello\Client as TrelloClient;
use Slack;
class ProjectController extends Controller
{

    private $trello_client;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

          
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       $boards= $this->get_TrelloBoards();

       return view('project.index')->with('boards',$boards);

    }

  

    public function github(){

        
    }

    public function slack(){
            $slack = new SlackController('xoxp-343664166967-342068005361-341937107120-367e267eb6cc59c0bcf468177ee9813c');

            dd($slack->call('groups.create'));
    }

    public function create(){


        return view('project.create');
    }

    public function store(Request $request){

        $data = $request->all();
        $name = $data['name'];
        $this->post_createBoardTrello($name);
        return redirect()->route('project.index');
    }


    public function details($idBoard){

        $board = $this->get_detailsBoardTrello($idBoard);
        //dd($board);
        return view('project.details')->with('board',$board);

    }



    public function members($idBoard){
        
        //$data =  $this->get_TrelloBoards();
        $data = $this->get_TrelloBoardMembers($idBoard);

        //dd($data);

        return view('project.members')->with('members',$data);

    }


    private function get_detailsBoardTrello($idBoard){
        $result = $this->connect_trello();
        if(!$result) return [];
        $lists=[];
        $board=[];

        $tmp_lists = $this->get_TrelloLists($idBoard);

        foreach ($tmp_lists as $list) {
            

            $cards= $this->trello_client->getListCards($list->id);
            $list->cards =$cards;
            $lists[] = $list;
            //$lists->cards= $cards;
            
        }

        $board =  [
            'name'=>'nombre board',
            'lists'=> $lists
        ];
        return $board;

    }

    private function post_createBoardTrello($project_name){
        $result= $this->connect_trello();
        if(!$result){
            return [];
        }
        $attributes = ['name'=>$project_name];
        $board = $this->trello_client->addBoard($attributes);
        return $board;
    }

    private function get_TrelloBoards(){
        $result = $this->connect_trello();
        if(!$result) return [];
        $data = $this->trello_client->getCurrentUserBoards();

        //dd($data);
        $boards=[];

        foreach ($data as $b) {
                $lists = $this->get_TrelloLists($b->id);
                $boards[] = [
                'id'=>$b->id,
                'name'=>$b->name,
                'desc'=>$b->desc,
                'idOrg'=>$b->idOrganization,
                'updated_at'=>$b->dateLastActivity,
                'labelNames'=>$b->labelNames,
                'members'=>$b->memberships,
                'lists' => count($lists)
                ];
        }

        return $boards;

    }

    private function get_TrelloLists($idBoard){
        $this->connect_trello();
        $data  = $this->trello_client->getBoardLists($idBoard);
        //dd($data);
        return $data;

    }

    private function get_TrelloBoardMembers($idBoard){


            //getBoardMember
        $this->connect_trello();
        $data =$this->trello_client->getBoardMembers($idBoard);
        //dd($data);
        $members=[];
        foreach ($data as $member) {
            $m =$this->trello_client->getMember($member->id);
            $members[] = [
                'id'        => $member->id,
                'fullname'  => $member->fullName,
                'username'  => $member->username,
                'type'      => $m->memberType,
                'email'     => $m->email,
                'avatar'    => 'http://trello-avatars.s3.amazonaws.com/'.$m->avatarHash.'/50.png'
            ];
        }


        return $members;
    }



//http://trello-avatars.s3.amazonaws.com/e1e516fffa9fb6471fca2aef533cc90c/50.png

private function connect_trello(){
    /// o es manager
    $app_trello=[];
    if(auth()->user()->type=="manager")
    {
        $app_trello =\Auth::user()->apps()->where('name','trello')->first();    
        //dd($app_trello);
        //dd(auth()->user()->apps());
    }
    if(auth()->user()->type=="collaborator"){
        $manager = \App\User::find(auth()->user()->manager_id);
        //dd($manager);
        $app_trello= $manager->apps()->where('name','trello')->first();    
        //dd($app_trello);   
    }

    // o es colaborador
    
    if(!$app_trello){
        return false;
    }
    
    $this->trello_client = new TrelloClient([
        'domain' => 'https://trello.com',
        'key' => $app_trello->key,
        'scope' => 'read,write',
        'token'  =>$app_trello->token,
        'version' => '1',
        ]);
    return true;
}






}
