<?php

function search_customers($last_name) {
  global $db;
  $query = 'SELECT * FROM customers
            WHERE lastName = :last_name';
  $statement = $db->prepare($query);
  $statement->bindValue(':last_name', $last_name);
  $statement->execute();
  $customers = $statement->fetchAll();
  $statement->closeCursor();
  return $customers;
}

function select_customer($email) {
  global $db;
  $query = 'SELECT * FROM customers
            WHERE email = :email';

  $statement = $db->prepare($query);
  $statement->bindValue(':email', $email);
  $statement->execute();
  $customer = $statement->fetch();
  $statement->closeCursor();
  return $customer;
}
function update_customer($first_name, $last_name, $address, $city,
                        $state, $postal_code, $country_code, $phone,
                        $email, $password) {
  global $db;
  $query = 'UPDATE customers
  SET       firstName = :first_name,
            lastName = :last_name,
            address = :address,
            city = :city,
            state = :state,
            postalCode = :postal_code,
            countryCode = :country_code,
            phone = :phone,
            email = :email,
            password = :password
  WHERE email = :email';
  $statement = $db->prepare($query);
  $statement->bindValue(':first_name', $first_name);
  $statement->bindValue(':last_name', $last_name);
  $statement->bindValue(':address', $address);
  $statement->bindValue(':city', $city);
  $statement->bindValue(':state', $state);
  $statement->bindValue(':postal_code', $postal_code);
  $statement->bindValue(':country_code', $country_code);
  $statement->bindValue(':phone', $phone);
  $statement->bindValue(':email', $email);
  $statement->bindValue(':password', $password);
  $statement->execute();
  $statement->closeCursor();


        }
        function delete_customer($email) {
          global $db;
          $query = 'DELETE FROM customers
                    WHERE email = :email';
          try {
              $statement = $db->prepare($query);
              $statement->bindValue(':email', $email);
              $row_count = $statement->execute();
              $statement->closeCursor();
              return $row_count;
          } catch (PDOException $e) {
              display_db_error($e->getMessage());
          }
      }
      function add_customer($first_name, $last_name, 
        $address, $city, $state, $postal_code, $country_code,
        $phone, $email, $password) {
    global $db;
    $query = 'INSERT INTO customers
                 (firstName, lastName,
                  address, city, state, postalCode, countryCode,
                  phone, email, password)
              VALUES
                 (:first_name, :last_name,
                  :address, :city, :state, :postal_code, :country_code,
                  :phone, :email, :password)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':first_name', $first_name);
        $statement->bindValue(':last_name', $last_name);
        $statement->bindValue(':address', $address);
        $statement->bindValue(':city', $city);
        $statement->bindValue(':state', $state);
        $statement->bindValue(':postal_code', $postal_code);
        $statement->bindValue(':country_code', $country_code);
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $statement->closeCursor();
        // Get the last product ID that was automatically generated
        $id = $db->lastInsertId();
        return $id;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

?>
