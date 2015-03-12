<?php
class Group_Model extends Model {

  public  function __construct($db) {
        parent::__construct($db);
    }

  public function list_items($option = null){
     
		$query[] 	= "SELECT `g`.`id`,`g`.`name`,`g`.`status`,`g`.`ordering`, COUNT(`u`.id) AS total";
		$query[] 	= "FROM `group` AS `g` LEFT JOIN `user` AS `u` ON `g`.`id` = `u`.`group_id`";
		$query[] 	= "GROUP BY `g`.`id`";
		$sql		= implode(" ", $query);		
		$result = $this->db->GetAssoc($sql);
		return $result;

  }
}