<?php

if (!class_exists('MasterDAOPackage'))
{
	class MasterDAOPackage extends Paginate
	{
		protected $table;

		protected $primary_key;

		protected $wpdb;

		protected $list_results;

		protected $per_page = 5;

		public function __construct()
		{
			global $wpdb;
			$this->wpdb = $wpdb;
		}

		protected function clear($values)
		{
			foreach ($values as $key => $value) {
				$values[$key] = trim($value);
			}

			return $values;
		}

		public function salvar($values)
		{
			$values = $this->clear($values);
			
			$this->wpdb->insert($this->table, $values);

			return $this->wpdb->insert_id;
		}

		public function atualizar($values, $where)
		{
			$values = $this->clear($values);

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
			$this->list_results = $this->wpdb->get_results("SELECT * FROM " . $this->table);

			$this->setElements($this->list_results, $this->per_page);

			return $this->list_results;
		}

		public function excluir($where)
		{
			if (is_array($where))
			{
				$this->wpdb->delete($this->table, $where);
			}
			else
			{
				$this->wpdb->delete($this->table, array($this->primary_key => $where));
			}
		}
	}
}