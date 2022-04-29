<?php
   class memego
   {
      private static $db;
      private $connection;

      private function __construct()
      {
         $this->connection = new mysqli("mariadb", "cs332s25", "MwRMm07y", "cs332s25");
      }

      function __destruct()
      {
         $this->connection->close();
      }

      public static function connDatabase()
      {
         if (self::$db == null) 
         { 
            self::$db = new memego(); 
         }

         return self::$db->connection();
      }

      function insertPolicyholder($cid, $name, $dob, $pn, $address, $yos) 
      {
         $result = $this->connection->query("INSERT INTO POLICYHOLDER VALUES ({$cid}, {$name}, {$dob}, {$pn}, {$address}, {$yos});");
         $result->free_result();
      }

      function insertInsuranceCompany($cs_ph, $ceoName, $hqAddress, $email)
      {
         $result = $this->connection->query("INSERT INTO INS_COMPANY_NAME VALUES ({$cs_ph}, {$ceoName}, {$hqAddress}, {$email});");
         $result->free_result();
      }

      function insertPolicies($pNum, $cid, $pType, $cs_ph, $start, $end, $total)
      {
         $result = $this->connection->query("INSERT INTO POLICIES VALUES ({$pNum}, {$cid}, {$pType}, {$cs_ph}, {$start}, {$end}, {$total});");
         $result->free_result();
      }

      function insertBalances($pNum, $total, $lastPayDate, $currentBal)
      {
         $result = $this->connection->query("INSERT INTO BALANCES VALUES ({$pNum}, {$total}, {$lastPayDate}, {$currentBal});");
         $result->free_result();
      }

      function insertDrivingActivity($cid, $vioType, $points, $vioDate, $vioID)
      {
         $result = $this->connection->query("INSERT INTO DRIVING_ACTIVITY VALUES ({$cid}, {$vioType}, {$points}, {$vioDate}, {$vioID});");
         $result->free_result();
      }

      function additionalDrivers($cid, $name, $dob)
      {
         $result = $this->connection->query("INSERT INTO DRIVING_ACTIVITY VALUES ({$cid}, {$name}, {$dob});");
         $result->free_result();
      }
   }