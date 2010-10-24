<?php

/**
 * User controller
 * 
 * @author Dale Emasiri & Phil Hutchinson
 * @version 1.0
 */
class Animes extends Controller {
	
	function index() {
		$this->listAnime();
	}
	
	function addAnime() {
		// add anime series code --- validation to be added -phil
		$a = new Anime();
		$a->anime_name = $this->input->post('anime_name');
		$a->anime_description = $this->input->post('anime_description');
		$a->anime_episodes = $this->input->post('anime_episodes');
		$a->anime_ova = $this->input->post('anime_ova');
		$a->anime_alt_name = $this->input->post('anime_alt_name');
		$a->anime_watched_status = $this->input->post('anime_watched_status');
		
		if($a->save()) {
			redirect($_SERVER["HTTP_REFERER"]);
		}
	}
	
	function listAnime() {
		$this->load->library('table');
		$a = new Anime();
		$a->get();
		
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading('Name', 'Synopsis', 'Episodes', 'OVA\'s', 'Watched Status', '');
		$table_row = array();
		foreach ($a as $ani) {
			$table_row = NULL;
			$table_row[] = $ani->anime_name;
			$table_row[] = $ani->anime_description;
			$table_row[] = $ani->anime_episodes;
			$table_row[] = $ani->anime_ova;
			$table_row[] = $ani->anime_watched_status;
			
			$table_row[] = '<nobr>' .
			anchor('animes/editanime/' . $ani->id, 'Edit') . ' | ' .
			anchor('animes/deleteanime/' . $ani->id, 'Delete') .
			'<nobr>';
			
			$this->table->add_row($table_row);
		}
		
		$ani_table = $this->table->generate();
		
		$template['page_view'] = 'animefunction/anime_list';
		$template['page_title'] = 'Anime List';
		$template['data_table'] = $ani_table;
		$this->load->view('main/index', $template);
	}
	
	function editAnime() {
		$a = new Anime();
		$id = $this->uri->segment(3);
		$template['row'] = $a->get_by_id($id);
		$template['page_view'] = 'animefunction/anime_edit';
		$template['page_title'] = 'edit anime ';
		$this->load->view('main/index', $template);
	}
	
	function updateAnime() {
		$id = $this->uri->segment(3);
		
		$a = new Anime();
		$a->get_by_id($a->id);
		
		$a->anime_name = $this->input->post('anime_name');
		$a->anime_description = $this->input->post('anime_description');
		$a->anime_episodes = $this->input->post('anime_episodes');
		$a->anime_ova = $this->input->post('anime_ova');
		$a->anime_alt_name = $this->input->post('anime_alt_name');
		$a->anime_watched_status = $this->input->post('anime_watched_status');
		
		$a->save();
		if(!$a->save()) {
			redirect('animes/editAnime/'.$id);
		} else {
			redirect('animes/listAnime');
		}
	}
	
	function deleteAnime() {
		$id = $this->uri->segment(3);
		$a = new Anime();
		$a->where('id', $id)->get();
		$a->delete();
		$this->listAnime();
	}

}