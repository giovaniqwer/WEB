<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {


	public function index()
	{
		$this->load->view('site');
	}
	
	public function chamaTelaCadastro()
	{
		$this->load->view('telaCadastro');
	}
	
	public function adicionarDados(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txt_nome', 'Nome', 'required');
		$this->form_validation->set_rules('txt_titulo', 'Título', 'required');
		$this->form_validation->set_rules('txt_autores', 'Autores', 'required');
		$this->form_validation->set_rules('txt_citacoes', 'Citações', 'required');
		$this->form_validation->set_rules('txt_referencias', 'Referências', 'required');
		$this->form_validation->set_rules('txt_palavraschave', 'Palavras-chave', 'required');
		
		if($this->form_validation->run()){
			$data['nomeArquivo'] = $this->input->post('txt_nome');
			$data['titulo'] = $this->input->post('txt_titulo');
			$data['autores'] = $this->input->post('txt_autores');
			$data['citacoes'] = $this->input->post('txt_citacoes');
			$data['referencias'] = $this->input->post('txt_referencias');
			$data['palavrasChave'] = $this->input->post('txt_palavraschave');
			if($this->db->insert('citacoes', $data)){
			redirect(base_url());
			}else{
				echo "Não foi possível adicionar os dados!!!!";
			};
		}else{
				echo "Há campos em branco!!!!!!!!!!!!!!!!!";
		}}
		
	public function gerarPdf()
	{
		//CONSULTANDO NO BANCO
		$dados['citacoes'] = $this->db->get('citacoes')->result();
		$this->load->view('pdf', $dados);
	}
	
}
