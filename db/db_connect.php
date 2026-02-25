<?php

function connectDB(): PDO
{
    try {
        return new PDO(
            "mysql:host=127.0.0.1;dbname=my_portfolio;charset=utf8mb4",
            "guillaume",
            "azerqsdf",
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]
        );
    } catch (PDOException $e) {
        throw new RuntimeException("DB connection failed: " . $e->getMessage());
    }
}