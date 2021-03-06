<?php
if (!empty($_SESSION['articleNum']) || !empty($_GET['articleNum'])) {
    
    if(empty($_SESSION['articleNum'])){
        $_SESSION['articleNum'] = $_GET['articleNum'];
    }
    include_once './OldArticleDataTable.php';
    $new = false;
}
?>


<form method='GET'>
    Artikelname <input type='text' name='name'>    
    Einkaufspreis <input type='text' name='buyPrice'>
    Verkaufspreis <input type="text" name="sellPrice">
    Basiseinheit <input type="text" name="unit">
    Verpackungseinheit<input type="text" name="packUnit">
    Verpackungsgröße <input type="text" name="packSize">
    Mindestbestand <input type="text" name="minStock">   
    Margenaufschlag <input type="text" name="surcharge">
    <?php
    if($new){
        echo " <button type='submit' name=\"subNewArticle\">Eintragen</button>";
    }else{
        echo " <button type='submit' name=\"modArticle\">Eintragen</button>";
    }
    ?>
    Lieferant 
    <select name="vendor">
        <option>Test</option>
        <?php
            include_once '../../persistance/dao/dao_purchase/SupplierDAO.php';
            include_once '../../persistance/model/Supplier.php';
            $db = new SupplierDAO;
            
            $vendors = $db->getSupplierStock();
            
            for($i = 0; $i < count($vendors); $i++){
                echo "<option name=".$vendors[$i]->getId().">";
                echo $vendors[$i]->getName();
                echo "</option>";
            }
        ?>
    </select>
    Artikelgruppe
    <select name="group">
        <option>Test</option>
        <?php
        include_once '../../persistance/dao/dao_purchase/ArticleGroupDAO.php';
        include_once '../../persistance/model/ArticleGroup.php';
        $db = new ArticleGroupDAO;
        
        $groups = $db->getAllArtikleGroup();
        
        for($i = 0; $i < count($groups); $i++) {
            echo "<option name=".$article[$i]->getId().">";
            echo $groups[$i]->getName();
            echo "</option>";
        }
        ?>
    </select>
</form>

