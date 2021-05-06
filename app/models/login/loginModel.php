<?php 
    class LoginModel {   
        //Este método le va a pegar a una api en .net con AD  
        //Por ahora esta "mockeado"
        //Voy a necesitar: user, password y voy a recibir un token + url retorno (JSON)     
        public function loginAD(string $userRec, string $passwordRec){
            //mok -> user
            $userTemp = 'admin';
            $passwordTemp = 'covid2021';
            $userNameTemp = 'admin';
            $rolTemp = 'admin';
            $sectorTemp = 'Sector Total';
            $levelAccess = 2;

            if ((strcmp($userRec, $userTemp) === 0) && (strcmp($passwordRec, $passwordTemp) === 0)){
                return true;
            }else{
                return false;
            }
        }
    }
?>