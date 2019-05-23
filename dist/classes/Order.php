<?php
include_once "Database.php";

class Order extends Database {
    private $table = "orders";

    /**
     * ADD ORDER
     */
    public function addNew($info) {
        if (empty($info["eventType"]) || empty($info["eventDate"]) || empty($info["servingsNO"]) || empty($info["contactPerson"]) || empty($info["phone"]) || empty($info["locationName"])  || empty($info["locationAddress"]) || empty($info["details"]) || empty($info["appetizerStandard"]) || empty($info["appetizerCustom"]) || empty($info["firstTypeSteak"]) || empty($info["firstTypeSideDish"]) || empty($info["firstTipeSalad"]) || empty($info["secondType"]) || empty($info["desert"])) {            
            $this->sendUserMsg("danger", "Completati toate campurile");
            exit();
        } else {
            $sql = "INSERT INTO " . $this->table . " (event_type, event_date, servings_no, contact_person, phone, location_name, location_addrress, details, appetizer_standart, appetizer_custom, first_type_steak, first_type_side_dish, first_type_Salad, second_type, desert)
             VALUES ('" . $info["event_type"] . "', '" .
              $info["event_date"] .
              $info["servings_no"] . "', '" .
              $info["contact_person"] . "', '" .
              $info["phone"] . "', '" .
              $info["location_name"] . "', '" .
              $info["location_address"] . "', '" .
              $info["details"] . "', '" .
              $info["appetizer_standard"] . "', '" .
              $info["appetizer_custom"] . "', '" .
              $info["first_type_steak"] . "', '" .
              $info["first_type_side_dish"] . "', '" .
              $info["first_type_salad"] . "', '" .
              $info["second_type"] . "', '" .
              $info["desert"] . "')";
            $result = mysqli_query($this->connect, $sql);
            if ($result) {
                $this->sendUserMsg("success", "Comanda a fost plasata cu succes.");
                exit();
            } else {
                $this->sendUserMsg("danger", "Eroare BD: " . mysqli_error($this->connect));
                exit();
            }
        }
    }
}