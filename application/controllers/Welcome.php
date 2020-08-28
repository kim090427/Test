<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	CONST STATUS_OK = 0;
	CONST STATUS_ERROR = 1;
	protected $deck = array(
		'S-A', 'S-2', 'S-3', 'S-4', 'S-5', 'S-6', 'S-7', 'S-8', 'S-9', 'S-X', 'S-J', 'S-Q', 'S-K',
		'H-A', 'H-2', 'H-3', 'H-4', 'H-5', 'H-6', 'H-7', 'H-8', 'H-9', 'H-X', 'H-J', 'H-Q', 'H-K',
		'D-A', 'D-2', 'D-3', 'D-4', 'D-5', 'D-6', 'D-7', 'D-8', 'D-9', 'D-X', 'D-J', 'D-Q', 'D-K',
		'C-A', 'C-2', 'C-3', 'C-4', 'C-5', 'C-6', 'C-7', 'C-8', 'C-9', 'C-X', 'C-J', 'C-Q', 'C-K',
	);


	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('util');
	}

	public function distribute($player_count = null) 
	{
		// $player_count = $this->input->post('player_count');
		// Input check
		if(empty($player_count)){
			$data['status'] = SELF::STATUS_ERROR;
			$data['message'] = 'Please enter number of player';
			echo json_encode($data);
			exit();
		} else if (!is_numeric($player_count)) {
			$data['status'] = SELF:: STATUS_ERROR;
			$data['message'] = 'PLease enter a valid number of player';
			echo json_encode($data);
			exit();
		} else if (is_numeric($player_count) &&  floor($player_count) != $player_count) {
			$data['status'] = SELF:: STATUS_ERROR;
			$data['message'] = sprintf('It is hard to image how 0.%s people look like', substr(strrchr($player_count, "."), 1));
			echo json_encode($data);
			exit();
		}
	
		shuffle($this->deck);

		$distribution = array();
		while(sizeof($this->deck) > 0) {			
			for($i = 0 ; $i < $player_count ;$i++){
				if(!empty($this->deck[0])) {
					$distribution[$i][] = $this->deck[0];	
					array_shift($this->deck);
				}
			}
		};
		
		$data['status'] = SELF::STATUS_OK;
		$data['message'] = '';
		$data['players'] = array();
		for($i = 0 ; $i < $player_count ; $i++){
			$data['players'][] = array(
				'name' => sprintf('Player %s', $i + 1),
				'cards' => empty($distribution[$i]) ? [] : $distribution[$i],
				'card_qty' => empty($distribution[$i]) ? 0 : sizeof($distribution[$i])
			);			
		}
		
		echo json_encode($data);
		exit();
	}

	public function index()
	{
		load_js(["app"], "js_assets");

		$this->load->view('welcome_message');
	}
}
