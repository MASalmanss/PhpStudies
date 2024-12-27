<?php

class VT extends Upload
{
    // Veritabanı bağlantı bilgileri
    const HOST = "127.0.0.1"; // "localhost" yerine "127.0.0.1" kullanımı tercih edildi.
    const USER = "root";
    const PASSWORD = "root_password";
    const DATABASE = "phpturkiye";
    protected static $connection;
    public static $table;
    public static $select = "*";

    public function __construct()
    {
        self::__connect();
    }

    public static function select($selectColumn)
    {
        self::$select = is_array($selectColumn) ? implode(",", $selectColumn) : $selectColumn;
        self::$table = "";
        return new self;
    }


    public static function table($tabelName)
    {
        self::$table = $tabelName;
        self::$select = "*";
        return new self;
    }

    // Veritabanı bağlantısı
    public static function __connect()
    {
        try {
            // PDO bağlantısını oluşturuyoruz
            self::$connection = new PDO(
                "mysql:host=" . self::HOST . ";dbname=" . self::DATABASE . ";charset=utf8mb4",
                self::USER,
                self::PASSWORD
            );

            // PDO hata modunu ayarlıyoruz
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            // Daha detaylı hata bilgisi
            echo "Veritabanı bağlantı hatası:<br>";
            echo "Hata Mesajı: " . htmlspecialchars($error->getMessage()) . "<br>";
            echo "Hata Kodu: " . htmlspecialchars($error->getCode()) . "<br>";
            echo "Hata Dosyası: " . htmlspecialchars($error->getFile()) . "<br>";
            echo "Hata Satırı: " . htmlspecialchars($error->getLine()) . "<br>";
        }
    }
}
