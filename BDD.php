<?php

class BDD {

	private $bd;

	private static $instance = null;

	private function __construct(){
		$this->bd = pg_connect('postgres://sepengrl:Ek-FxC-Lf9VmfvySaKuqkfJD9_4uY0yf@dumbo.db.elephantsql.com:5432/sepengrl');
		pg_set_client_encoding($this->bd, "UTF8");
	}

	public static function getModel(){
		if (self::$instance === null){
			self::$instance = new Self();
		}
		return self::$instance;
	}

	public function get_odd($id){
		$req = pg_query_params($this->bd, 'SELECT * FROM odd WHERE id = $1', array($id));

		$res = pg_fetch_all($req);

		return $res;
	}

	public function get_inds_par_odd($odd){
		$inds = [];
		$req_sdg = pg_query_params($this->bd, 'SELECT * FROM ind_sdg WHERE sdg = $1', array($odd));

		$inds["ind_sdg"] = pg_fetch_all($req_sdg);

		$req_sdg_compass = pg_query_params($this->bd, 'SELECT * FROM ind_sdg_compass WHERE sdg = $1', array($odd));

		$inds["ind_sdg_compass"] = pg_fetch_all($req_sdg_compass);

		$req_cerise_et_iris = pg_query_params($this->bd, 'SELECT * FROM ind_cerise_et_iris WHERE sdg = $1', array($odd));

		$inds["ind_cerise_et_iris"] = pg_fetch_all($req_cerise_et_iris);

		$req_iris = pg_query_params($this->bd, 'SELECT * FROM ind_iris WHERE sdg = $1', array($odd));

		$inds["ind_iris"] = pg_fetch_all($req_iris);

		$req_cerise = pg_query_params($this->bd, 'SELECT * FROM ind_cerise WHERE sdg = $1', array($odd));

		$inds["ind_cerise"] = pg_fetch_all($req_cerise);

		return $inds;

	}

	public function get_inds_par_odd_et_cat($odd, $cat){
		$inds = [];
		$req_sdg = pg_query_params($this->bd, 'SELECT * FROM ind_sdg WHERE sdg = $1 and target = $2', array($odd, $cat));

		$inds["ind_sdg"] = pg_fetch_all($req_sdg);

		$req_sdg_compass = pg_query_params($this->bd, 'SELECT * FROM ind_sdg_compass WHERE sdg = $1 and indicator_field = $2', array($odd, $cat));

		$inds["ind_sdg_compass"] = pg_fetch_all($req_sdg_compass);

		$req_cerise_et_iris = pg_query_params($this->bd, 'SELECT * FROM ind_cerise_et_iris WHERE sdg = $1 and indicator_field = $2', array($odd, $cat));

		$inds["ind_cerise_et_iris"] = pg_fetch_all($req_cerise_et_iris);

		$req_iris = pg_query_params($this->bd, 'SELECT * FROM ind_iris WHERE sdg = $1 and indicator_field = $2', array($odd, $cat));

		$inds["ind_iris"] = pg_fetch_all($req_iris);

		$req_cerise = pg_query_params($this->bd, 'SELECT * FROM ind_cerise WHERE sdg = $1 and indicator_field = $2', array($odd, $cat));

		$inds["ind_rise"] = pg_fetch_all($req_cerise);

		return $inds;
	}

	public function get_inds_par_mot_cles($mots_cles, $tab = null){
		$res = [];
		if ($tab == null){
			$inds = [];
			$req_sdg = pg_query($this->bd, 'SELECT * FROM ind_sdg');

			$inds["ind_sdg"] = pg_fetch_all($req_sdg);

			// $req_sdg_compass = pg_query($this->bd, 'SELECT * FROM ind_sdg_compass');

			// $inds["ind_sdg_compass"] = pg_fetch_all($req_sdg_compass);

			// $req_cerise_et_iris = pg_query($this->bd, 'SELECT * FROM ind_cerise_et_iris');

			// $inds["ind_cerise_et_iris"] = pg_fetch_all($req_cerise_et_iris);

			// $req_iris = pg_query($this->bd, 'SELECT * FROM ind_iris');

			// $inds["ind_iris"] = pg_fetch_all($req_iris);

			// $req_cerise = pg_query($this->bd, 'SELECT * FROM ind_cerise');

			// $inds["ind_rise"] = pg_fetch_all($req_cerise);

			foreach ($inds as $c => $v){
				$res[$c] = []; 
				foreach ($v as $c2 => $v2){
					foreach ($v2 as $c3 => $v3) {
						foreach ($mots_cles as $k => $mot) {
							if (preg_match("/\b$mot\b/i", $v3)){
								array_push($res[$c], $v2);
							}
						}
					}
				}
			}
		} 
		else {
			foreach ($tab as $c => $v){
				foreach ($v as $c2 => $v2){
					foreach ($v2 as $c3 => $v3) {
						foreach ($mots_cles as $k => $mot) {
							if (preg_match("/\b$mot\b/i", $v3)){
								array_push($res[$c], $v2);
							}
						}
					}
				}
			}
		}
		return $res;
	}

}