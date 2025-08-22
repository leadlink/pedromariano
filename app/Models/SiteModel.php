<?php
namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\BaseBuilder;

class SiteModel extends Model{
	##########################################################
	##########################################################
	public function Add($tabela, $dados){
        return $this->db->table($tabela)->insert($dados)
            ? $this->db->insertID()
            : false;
    }
	##########################################################
	##########################################################
    public function Upd($tabela, $dados, $where){
        return $this->db->table($tabela)->update($dados, $where);
    }

    public function UpdaAll($tabela, $dados){
        return $this->db->table($tabela)->update($dados);
    }
	##########################################################
	##########################################################
	public function Del($id, $tabela){
        return $this->db->table($tabela)->where('id', $id)->delete();
    }

    public function DeleteAll($tabela, $campo, $id){
        return $this->db->table($tabela)->where($campo, $id)->delete();
    }

	public function Truncate($tabela){
        return $this->db->table($tabela)->truncate();
    }
	##########################################################
	##########################################################
	public function getRegistro($tabela, $campo, $id){
        return $this->db->table($tabela)
            ->where($campo, $id)
            ->get()
            ->getRow();
    }

	public function getRegistros($tabela, $campo = null, $ordem = null, $status = null, $limit = null){
		$builder = $this->db->table($tabela);

        if( !empty($status) ){
            $builder->where('status', $status);
        }

        if( !empty($campo) && !empty($ordem) ){
            $builder->orderBy($campo, $ordem);
        }

        if( !empty($limit) ){
            $builder->limit($limit);
        }

        return $builder->get()->getResult();
    }

	public function totalRows($tabela){
        return $this->db->table($tabela)->countAllResults();
    }
	##########################################################
	##########################################################
	public function getRegs($tabela, $options = []){
		$builder = $this->db->table($tabela);

		// Limit e Offset
		if( isset($options['offset']) && isset($options['limit']) ){
			$builder->limit($options['limit'], $options['offset']);
			unset($options['offset']);
			unset($options['limit']);
		}

		// Order by
		if( isset($options['order_by']) ){
			$builder->orderBy($options['order_by']['key'], $options['order_by']['dir']);
			unset($options['order_by']);
		}

		if( isset($options['order']) ){
			$builder->orderBy($options['order']);
			unset($options['order']);
		}

		// Group by
		if( isset($options['groupby']) ){
			$builder->groupBy($options['groupby']);
			unset($options['groupby']);
		}

		// Like
		if( isset($options['like']) ){
			$builder->like($options['like']['campo'], $options['like']['valor']);
			unset($options['like']);
		}

		// Where In
		if( isset($options['wherein']) ){
			$builder->whereIn($options['wherein']['campo'], $options['wherein']['valor']);
			unset($options['wherein']);
		}

		// Pesquisa por datas
		if( isset($options['pesquisa']) ){
			if( isset($options['pesquisa']['data_de']) && isset($options['pesquisa']['data_ate']) ){
				$builder->where('data >=', $options['pesquisa']['data_de'] . ' 00:00:01');
				$builder->where('data <=', $options['pesquisa']['data_ate'] . ' 23:59:59');
			}
			unset($options['pesquisa']);
		}else{
			// Demais filtros
			foreach( $options as $key => $val ){
				if( $val === 'NULO' ){
					$builder->where($key);
				}else{
					$builder->where($key, $val);
				}
			}
		}

		return $builder->get();
	}
	##########################################################
	##########################################################
	public function BuscaImoveis($where, $ordem = null, $offset = null, $limit = null){
		$builder = $this->db->table('tb_imoveis');
		$builder->select('tb_imoveis.*');
		$builder->where($where);

		// Ordenação
		if( !empty($ordem) ){
			if( is_array($ordem) ){
				$builder->orderBy($ordem[0], $ordem[1]);
			}else{
				$builder->orderBy($ordem);
			}
		}

		// Paginação
		if( !empty($offset) && $limit !== null ){
			$offset = ($offset == '1') ? 0 : (($offset * $limit) - $limit);
			$builder->limit($limit, $offset);
		}

		return $builder->get();
	}
	##########################################################
	##########################################################

}
