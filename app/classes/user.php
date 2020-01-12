<?php

class User {

    public static function Login($data)//datadan user bilgileri gönderilecek
    {
        $_SESSION['user_id'] = $data['user_id'];
        $_SESSION['user_name'] = $data['user_name'];
        $_SESSION['user_email'] = $data['user_email'];
        $_SESSION['user_rank'] = $data['user_rank'];
        $_SESSION['user_permissions'] = $data['user_permissions'];
    }

    public static function userExist($username, $email = '@@')//üye kontrolü için sadece user name konrol edilecek 
    {//hem login hem registerde kullanmak için email=@@ yaptık
        global $db;
        $query = $db->prepare('SELECT * FROM users WHERE user_name = :username || user_email = :email');//sorguda (Pdo prepare() Çalıştırılmak üzere bir SQL deyimini hazırlar) user_name eşitse username'a ve user_mail eşitse usermaile
        $query->execute([//keyleri ile beraber gönderme işlemi yapılıyor
            'username' => $username,
            'email' => $email
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);//PDOStatement :: fetch, sonuç kümesinden bir satır döndürür. PDO :: FETCH_ASSOC parametresi PDO'ya sonucu ilişkilendirilebilir bir dizi olarak döndürmesini söyler.
    }

    public static function Register($data)//kayıt
    {
        global $db;
        $query = $db->prepare('INSERT INTO users SET user_name = :username, user_url = :url, user_email = :email, user_password = :password');
        return $query->execute($data);//değer gönderme
    }

}