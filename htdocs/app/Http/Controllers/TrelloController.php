<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevenmaguire\Services\Trello\Client;
class TrelloController extends Controller
{
    //
private $client;

public function __construct(){

	$tcon = \Config::get('trello');
	// se puede arreglar esto
	$this->client = new Client([
    'domain' => 'https://trello.com',
    'key' => $tcon['key'] ,
    'scope' => 'read,write',
    'secret' => $tcon['secret'],
    'token'  => $tcon['token'],
    'version' => '1',
	]);

}


public function getBoards(Request $request){

/*
	if($request->isJson()){
*/	


			$data = $this->client->getCurrentUserBoards();
			$boards=[];
			//$boards = $this->client->getMember('5abc878b2946d5c2f0776093');
			//$boards = $this->client->getBoardActions('5abb077137932a5b62e33051');
			
			//$boards = $this->client->getBoard('5abb077137932a5b62e33051');
			//getCardBoard
			//$boards = $this->client->getCardBoardField('5abb077137932a5b62e33051');
			//getCardBoardField
			//$boards = $this->client->getCardBoard('5abb077137932a5b62e33051');
			//5abb077137932a5b62e33051

			foreach ($data as $b) {

				$boards[] = [
				'id'=>$b->id,
				'name'=>$b->name,
				'desc'=>$b->desc,
				'idOrg'=>$b->idOrganization,
				'updated_at'=>$b->dateLastActivity,
				'labelNames'=>$b->labelNames,
				'members'=>$b->memberships
				];
			}


			return response()->json($boards,200);

/*
	}

	return response()->json(['error'=>'No autorizado'],401,[]);
*/
	

}


}
