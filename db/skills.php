<?php
    
    function getSkills(PDO $pdo): array
    {        
        $stmt = $pdo->query("SELECT * FROM skills");
        return $stmt->fetchAll();
    }