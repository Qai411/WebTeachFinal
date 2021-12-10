<?php
    use PHPUnit\Framework\TestCase;

    require_once '../settings/db_conn.php';

    class ManagementTest extends TestCase{
        public function testFailure(): void{
            $this->assertArrayHasKey('generalName',['genaralName'=>'Lion']);
        }
    }

    class ConnectionTest extends TestCase{
        public function testFailure(){

        $testConn = new DbConnection;
        $this->assertIsIterable($testConn->db_connect());
        }
    }

    class TestValidation extends TestCase{

        public function testValidation(){
            $this->assertIsArray(["generalName"=>"","phylum"=>""]);
        }
    }


?>