<?php
	/**
	 * Clase para agilizar CSRF/XSRF y capturar datos del navegante.
	 *
	 * @category   Utilities
	 * @package    dave.utilities
	 * @author     David Martín <mcdave91@gmail.com>
	 * @license    http://www.opensource.org/licenses/mit-license.php  MIT License
	 * @version    1.0.0
	 * @link       https://twitter.com/davemtc
	 */

	abstract class executePhoto {
		private static $_db_server   = 'localhost';
		private static $_db_user     = 'root';
		private static $_db_passowrd = '';
		private static $_db_select   = '';

		public static function save_client(){
			$objDB = @new mysqli(self::$_db_server,
					     self::$_db_user,
					     self::$_db_passowrd,
					     self::$_db_select);

			if($objDB->connect_error) return false;

			$remote_ip = @$objDB->real_escape_string($_SERVER['SERVER_ADDR']);
			$lang      = @$objDB->real_escape_string($_SERVER['HTTP_ACCEPT_LANGUAGE']);
			$client    = @$objDB->real_escape_string($_SERVER['HTTP_USER_AGENT']);
			$referer   = @$objDB->real_escape_string($_SERVER['HTTP_REFERER']);

			$sql = 'INSERT INTO `list_clients` '
			     .     '(`ip`, `lang`, `browser`, `referer`) '
			     . 'VALUES '
			     . 	   '(\'' . $remote_ip . '\', \'' . $lang . '\', \'' . $client . '\', \'' . $referer . '\')';

			if($objDB->query($sql)) return true;
		}

		public static function redirect($url){
			header('Location: ' . $url);
		}

		public static function redirect_post($url, $param = array()){
			echo '<body onload="document.getElementById(\'executePhoto\').submit();">'
			   . 	'<form id="executePhoto" action="' . $url . '" method="POST">';

			foreach($param as $key => $val)
				echo 	'<input type="hidden" name="' . $key . '" value="' . $val . '">';

			echo 	'</form>'
			   . '</body>';
		}

		public static function print_img($img = false){
			$image = 'photos/default.jpg';

			if($img) $image = $img;

			header("Content-Type: image/jpg");
			header("Cache-Control: no-store, no-cache, must-revalidate");
			header("Cache-Control: post-check=0, pre-check=0", false);
			header("Pragma: no-cache");

			$ext = strtolower(substr(strrchr($image, '.'), 1));

		    switch($ext){
			case "jpg":  $img = imagecreatefromjpeg($image); break;
			case "jpeg": $img = imagecreatefromjpeg($image); break;
		        case "gif":  $img = imagecreatefromgif($image);  break;
			case "png":  $img = imagecreatefrompng($image);  break;
		    }

			$file = imagecreatefromjpeg($image);

			imagejpeg($img);
			imagedestroy($file);
		}

		public static function print_pdf($pdf){
			header("Content-Type: application/pdf");
			header("Cache-Control: no-store, no-cache, must-revalidate");
			header("Cache-Control: post-check=0, pre-check=0", false);
			header('Content-Disposition: attachment; filename="' . basename($pdf) . '"');

			readfile($pdf);
		}
	}
