<?php
include_once "Database.php";

class Order extends Database {
    private $table = "orders";

    /**
     * ADD ORDER
     */
    public function addNew($info) {

        $requiredFields = array(
            "eventType" => $info["eventType"],
            "eventDate" => $info["eventDate"],
            "servingsNo" => $info["servingsNo"],
            "contactPerson" => $info["contactPerson"],
            "phone" => $info["phone"],
            "locationName" => $info["locationName"],
            "locationAddress" => $info["locationAddress"],
            "appetizerStandard" => $info["appetizerStandard"],
            "firstTypeSteak" => $info["firstTypeSteak"],
            "firstTypeSideDish" => $info["firstTypeSideDish"],
            "firstTypeSalad" => $info["firstTypeSalad"],
            "secondType" => $info["secondType"],
            "desert" => $info["desert"]
        );

        $emptyVal = array();
        foreach ($requiredFields as $required => $required_val) {
            if (empty($required_val)) {
                $emptyVal[] = $required;
            }
        }

        if (count($emptyVal) > 0) {
            $this->sendUserMsg("danger", "Completati toate campurile obligatorii", $emptyVal);
            exit();
        } else {
            $sql = "INSERT INTO " . $this->table . " (event_type, event_date, servings_no, contact_person, phone, location_name, location_address, details, appetizer_standard, appetizer_custom, first_type_steak, first_type_side_dish, first_type_salad, second_type, desert, id_user)
             VALUES ('" . $info["eventType"] . "', '" .
              $info["eventDate"] . "', '" .
              $info["servingsNo"] . "', '" .
              $info["contactPerson"] . "', '" .
              $info["phone"] . "', '" .
              $info["locationName"] . "', '" .
              $info["locationAddress"] . "', '" .
              $info["details"] . "', '" .
              $info["appetizerStandard"] . "', '" .
              $info["appetizerCustom"] . "', '" .
              $info["firstTypeSteak"] . "', '" .
              $info["firstTypeSideDish"] . "', '" .
              $info["firstTypeSalad"] . "', '" .
              $info["secondType"] . "', '" .
              $info["desert"] . "', '" .
              $info["user"] . "')";
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