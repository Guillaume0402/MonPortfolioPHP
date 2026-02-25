<?php
    
    function getProjects(PDO $pdo): array
    {        
        $stmt = $pdo->query("SELECT * FROM projects ORDER BY idproject DESC");
        return $stmt->fetchAll();
    }