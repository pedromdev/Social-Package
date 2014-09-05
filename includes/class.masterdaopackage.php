<?php

if (!class_exists('MasterDAOPackage'))
{
	class MasterDAOPackage
	{
		protected $table;

		protected $primary_key;

		protected $wpdb;

		public function __construct()
		{
			global $wpdb;
			$this->wpdb = $wpdb;
		}

		public function salvar($values)
		{
			$this->wpdb->insert($this->table, $values);

			return $this->wpdb->insert_id;
		}

		public function atualizar($values, $where)
		{
			if (is_array($where))
			{
				$this->wpdb->update($this->table, $values, $where);
			}
			else
			{
				$this->wpdb->update($this->table, $values, array($this->primary_key => $where));
			}
		}

		public function buscarPorId($id)
		{
			$sql = $this->wpdb->prepare("SELECT * FROM " . $this->table . " WHERE " . $this->primary_key . " = %d", $id);

			return $this->wpdb->get_row($sql);
		}

		public function listarTodos()
		{
			return $this->wpdb->get_results("SELECT * FROM " . $this->table);
		}

		public function excluir($where)
		{
			# code...
		}
	}
}