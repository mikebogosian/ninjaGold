
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	protected 	$gold_count = 0,
				$activity = array();

	public function __construct()
	{
		parent::__construct();
		$this->gold_count = $this->session->userdata('gold_count');
		$this->activity = $this->session->userdata('activity');
	}

	public function index()
	{
		$this->load->view('home');				
	}

	public function process()
	{
		$post_data = $this->input->post();

		if(isset($post_data['action']) && $post_data['action'] == 'restart_form')
		{
			$this->session->sess_destroy();
			redirect(base_url());
		}

		if(!$this->gold_count)
		{
			$this->session->set_userdata('gold_count', 0);
		}

		if(isset($post_data['building']))
		{
			$building = $post_data['building'];
			$gold_count = 0;
			$class="green";

			if($building == 'farm')
				$gold_count = rand(10, 20);
			elseif($building == 'cave')
				$gold_count = rand(5, 10);
			elseif($building == 'house')
				$gold_count = rand(2, 5);
			else
			{
				$percent = rand(0, 100);

				if ($percent <= 70) 
				{
					$gold_count = rand(-50, -1);
					$message = "Ouch";
				}
				else 
				{
					$gold_count = rand(1, 50);
					$message = "Nice";
				}
			}

			if($this->activity != false)
			{
				$this->activity = $this->session->userdata('activity');
			}

			$this->activity[] = 'You entered a ' . $building . ' and earned ' . $gold_count .' golds. 
								' . (($building == 'casino') ? '... '. $message .'.. ' : '') .
								'   (' . date('M d, Y h:ia') . ')';

			$gold_count += $this->session->userdata('gold_count');
			$this->session->set_userdata('gold_count', $gold_count);
			$this->session->set_userdata('activity', $this->activity);

			redirect(base_url());
		}
	}
}
