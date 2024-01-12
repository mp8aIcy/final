<?php require 'db-connect.php'; ?>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('select m.id,m.itemid,i.name,m.quantity,ir.rmid,i2.name,ir.quantity * m.quantity sum
                        from material m 
                        JOIN item i ON m.itemid = i.id
                        LEFT OUTER JOIN itemrm ir ON m.itemid = ir.id
                        LEFT OUTER JOIN item i2 ON ir.rmid = i2.id');
    $sql->execute([]);
    $sql->execute();
    $results = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach($results as $row){
        echo $row["id"]+"  ";
        echo $row["itemid"]+"  ";
        echo $row["name"]+"  ";
        echo $row["quantity"]+"  ";
        echo $row["rmid"]+"  ";
        echo $row["name"]+"  ";
        echo $row["sum"]+"  ";
        }
?>