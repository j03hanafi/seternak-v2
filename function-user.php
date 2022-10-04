<?php
include_once("config.php"); 
use PHPMailer\PHPMailer\PHPMailer;

class Db_Class{
    private $table_name = 'user';
        function createUser(){
            $hashPasswd = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $query = "INSERT INTO PUBLIC.".$this->table_name."(name,username,email,password,role,contact,kota,alamat) ".
            "VALUES('".$this->cleanData($_POST['name'])."',
            '".$this->cleanData($_POST['username'])."',
            '".$this->cleanData($_POST['email'])."',
            '".$this->cleanData($hashPasswd)."',
            '".$this->cleanData($_POST['role'])."',
            '".$this->cleanData($_POST['contact'])."',
            '".$this->cleanData($_POST['kota'])."',
            '".$this->cleanData($_POST['alamat'])."')";

            $user = $_POST['username'];

            $message  = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                        <html xmlns="http://www.w3.org/1999/xhtml">
                        <head>
                            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                            <title>Seternak - Email Verification</title>
                            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
                            <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800,900&display=swap" rel="stylesheet">
                        </head>
                        <body style="margin: 0; padding: 0; box-sizing: border-box;">
                            <table align="center" cellpadding="0" cellspacing="0" width="95%">
                            <tr>
                                <td align="center">
                                <table align="center" cellpadding="0" cellspacing="0" width="600" style="border-spacing: 2px 5px;" bgcolor="#fff">
                                    <tr>
                                    <td align="center" style="padding: 5px 5px 5px 5px;">
                                        <img src="assets/logop.jpg" alt="Logo" style="width:100px; border:0;"/>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td bgcolor="#fff">
                                        <table cellpadding="0" cellspacing="0" width="100%%">
                                        <tr>
                                            <td style="padding: 10px 0 10px 0; font-family: Nunito, sans-serif; font-size: 20px; font-weight: 900">
                                            Aktifkan Akun Seternak Anda
                                            </td>
                                        </tr>
                                        </table>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td bgcolor="#fff">
                                        <table cellpadding="0" cellspacing="0" width="100%%">
                                        <tr>
                                            <td style="padding: 20px 0 20px 0; font-family: Nunito, sans-serif; font-size: 16px;">
                                            Hi, <span id="name">User</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 0; font-family: Nunito, sans-serif; font-size: 16px;">
                                            Terima kasih telah mendaftar di Seternak. Mohon konfirmasi email ini untuk mengaktifkan akun Seternak Anda.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 20px 0 20px 0; font-family: Nunito, sans-serif; font-size: 16px; text-align: center;">
                                            <form action="http://localhost/seternakv2-master/function/activate-user.php" method="post">
                                            <input type="hidden" name="username" value="'.$_POST['username'].'">
                                            <button type="submit" name="activate" style="border-radius: 8px;background-color: #0E8450; border: none; color: white; padding: 15px 40px; text-align: center; display: inline-block; font-family: Nunito, sans-serif; font-size: 18px; font-weight: bold; cursor: pointer;">
                                                Konfimasi Email
                                            </button>
                                            </form>
                                            </td>
                                        </tr>
                                        <tr>
                                        </tr>
                                        <tr>
                                            <td style="padding: 50px 0; font-family: Nunito, sans-serif; font-size: 16px;">
                                            <p>Seternak</p>
                                            </td>
                                        </tr>
                                        </table>
                                    </td>
                                    </tr>
                                </table>
                                </td>
                            </tr>
                            </table>
                        </body>
                        </html>';

            require 'vendor/autoload.php';
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = 2;                      //Enable verbose debug output
                $mail->isSMTP();      
                $mail->isHTML(true);                                      //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'seternak@gmail.com';                     //SMTP username
                $mail->Password   = 'cqkxtpraplmudwuu';                               //SMTP password
                $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //pengirim
                $mail->setFrom('seternak@gmail.com', 'Seternak.com');
                $mail->addAddress($_POST['email']);     //Add a recipient
            
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Aktifasi akun';
                $mail->Body    = $message;
                $mail->AltBody    = $message;
                $mail->AddEmbeddedImage('assets/logop.jpg', 'logo'); //abaikan jika tidak ada logo
                //$mail->addAttachment(''); 

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

            }
            
            return pg_affected_rows(pg_query($query));
            
        }
        function tambahPeternak(){
            $user = $_POST['username'];
            $query = "INSERT into peternak (id_peternak, nama_peternakan, alamat_peternakan, deskripsi_usaha) VALUES ('$user', NULL, NULL, NULL)";
            return pg_affected_rows(pg_query($query));
        }
        function tambahMitra(){
            $user = $_POST['username'];
            $query = "INSERT into mitra (id_pemilik, nama_usaha, alamat_usaha) VALUES ('$user', NULL, NULL)";
            return pg_affected_rows(pg_query($query));
            
        }

        // function createPeternak(){
        //     $user = $_POST['username'];
        //     if($_POST['role']="2"){
        //         $query = pg_query("INSERT into peternak (id_peternak, nama_peternakan, alamat_peternakan, deskripsi_usaha) VALUES ('$user', NULL, NULL, NULL)");                return $query;
        //     }            
        // }

        // function createMitra(){
        //     $user = $_POST['username'];
        //     if($_POST['role']="1"){
        //         $query = pg_query("INSERT into mitra (id_pemilik) VALUES ('$user')");
        //         return $query;
        //     }
        // }
        
    
    function getUsers(){             
        $query ="select *from public." . $this->table_name . " WHERE role='1' ORDER BY name DESC";
        return pg_query($query);
    } 

    function getPartners(){             
        $query ="select *from public." . $this->table_name . " WHERE role='2' ORDER BY name DESC";
        return pg_query($query);
    } 

    function getUserById(){    
  
        $sql ="select *from public." . $this->table_name . "  where username='".$this->cleanData($_POST['id'])."'";
        return pg_query($sql);
    } 

    // function getAllUsers(){             
    //     $query ="select *from public." . $this->table_name . " ";
    //     return pg_affected_rows(pg_query($query));
    // } 

    function deleteuser(){    
  
         $sql ="delete from public." . $this->table_name . "  where username='".$this->cleanData($_POST['id'])."'";
        return pg_query($sql);
    } 

    function updateUser($data=array()){       
     
        $sql = "update public.user set name='".$this->cleanData($_POST['name'])."'
        ,email='".$this->cleanData($_POST['email'])."'
        ,role='".$this->cleanData($_POST['role'])."'
        ,contact='".$this->cleanData($_POST['contact'])."'
        ,kota='".$this->cleanData($_POST['kota'])."'
        ,alamat='".$this->cleanData($_POST['alamat'])."' where username = '".$this->cleanData($_POST['id'])."' ";
        return pg_affected_rows(pg_query($sql));        
    }
    function cleanData($val){
         return pg_escape_string($val);
    }

}



?>