<?php

Class PurchasOrderDAO extends AbstractDAO {

    function __construct() {
        
    }
    
    function getPurchaseOrder() {
        $this->doConnect();
        
        $this->closeConnect();
    }
    
    function setPurchaseOrder() {
        $this->doConnect();
        
        $this->closeConnect();
    }

}
