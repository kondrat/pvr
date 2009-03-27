<?php	
	class UploadComponent extends Object {
	
		/**
		  *	Private Vars
		  */
		  
		var $_file;
		var $_filepath;
		var $_destination;
		var $_name;
		var $_short;
		var $_rules;
		var $_allowed;
		
		/**
		  *	Public Vars
		  */
		var $errors;
		
		function startup (&$controller) {
			// This method takes a reference to the controller which is loading it.
			// Perform controller initialization here.
			$this->controller=&$controller;
		}
		
		/**
		  * upload
		  * - handle uploads of any type
		  *		@ file - a file (file to upload) $_FILES[FILE_NAME]
		  *		@ destination - string (where to upload to)
		  *		@ qlt= integer (quality of output image)
		  *		@ allowed [optional] - allowed filetypes
		  *			- defaults to 'jpg','jpeg','gif','png'
		  *		@ org - should we save original or not
		  *
		  */
		
		function upload ($file, $destination, $org = false, $qlt = null) {
			
			$this->result = false;
			$this->errors = false;
			
			// -- save parameters
			//$this->_file = $file;

			$this->_destination = $destination;
			

			$this->_allowed = array('jpg','jpeg','gif','png','JPG','JPEG','GIF','PNG'); 

			
			// -- hack dir if '/' not provided
			if (substr($this->_destination,-1) != DS) {
				$this->_destination .= DS;
			}
			
			
			// -- check that FILE array is even set
			if ( isset($file) && is_array($file) && !$this->upload_error($file['error'])) {
				
				// -- cool, now set some variables
								
				$fileName = $this->uniqueName($destination . $file['name']);

				// -- update name
				$this->_name = $fileName;				
				
				$fileTmp = $file['tmp_name'];
				$fileSize = $file['size'];
				$fileType = $file['type'];
				$fileError = $file['error'];
								

				
				// -- error if not correct extension
				if(!in_array( $this->ext($file['name']), $this->_allowed)){
					$this->error( __("File type not allowed.",true) );
				} else { 
				
					// -- it's been uploaded with php
					if (is_uploaded_file($fileTmp)) {
											
						// -- how are we handling this file
						if ($org == true) {
							// -- where to put the file?
							$output = $destination . $file['name'];
							// -- just upload it
							if (move_uploaded_file($fileTmp, $output)) {
								chmod($output, 0644);
								$this->result = basename($this->_name);
							} else {
								$this->error(__("Could not move '$fileName' to '$destination'",true) );
							}
						}	
							
						
						// -- gd lib check
						if (function_exists("imagecreatefromjpeg")) {
							

													
								$size = array( 'sq' => '75', 'thm' => '100', 'sml' => '240', 'md' => '630', 'lrg' => '1024' );
															
								
								$this->image($file, $size, $qlt );
								
								
								
				
						} else {
							$this->error(__("GD library is not installed",true) );
						}
						
						
					} else {
						$this->error(__("Possible file upload problem",true) );
					}
				}
					
			} else {
				//debug( $this->upload_error($file['error']) );
				$this->error(__('Problem with file upload: '.$this->upload_error($file['error']),true) );
			}





			if( $this->errors != false ) {
				return 1;
			} else {
				return 2;
			}
			
			
			
			
		}



		
		
		
		// -- add a message to stack (for outside checking)
		function error ($message) {
			if (!is_array($this->errors)) {
				$this->errors = array();
			}
			array_push($this->errors, $message);
		}	
		
		
		
		
		//----------------------------------------
		function image ($file,  $size, $qlt = null ) {

			$output = 'jpg';	
			$resultSize = array();
			
			if ( $qlt == null ) {
				$qlt = 75;
			}
			
	
			// -- get some information about the file
			$uploadSize = getimagesize($file['tmp_name']);
			$uploadWidth  = $uploadSize[0];
			$uploadHeight = $uploadSize[1];
			$uploadType = $uploadSize[2];
				if ($uploadType != 1 && $uploadType != 2 && $uploadType != 3) {
					$this->error (__("$uploadSize[2] File type must be GIF, PNG, or JPG to resize",true) );
				}		
			switch ($uploadType) {
				case 1: $srcImg = imagecreatefromgif($file['tmp_name']); break;
				case 2: $srcImg = imagecreatefromjpeg($file['tmp_name']); break;
				case 3: $srcImg = imagecreatefrompng($file['tmp_name']); break;
				default: $this->error (__("File type must be GIF, PNG, or JPG to resize",true) );
			}
			
			
			
			
			
			
			
			$size = array( 'sq' => '75', 'thm' => '100', 'sml' => '240', 'md' => '630', 'lrg' => '1024' );
			//$size = array( 'md' => '500' );
									
			foreach( $size as $k => $v ) {
				switch($k) {
					
					case('sq'):	
							
							$newX = $newY = $v;		
							// -- resize to max, then crop to center
							$ratioX = $v / $uploadWidth;
							$ratioY = $v / $uploadHeight;
							
							if ($ratioX < $ratioY) { 
								$srcX = round(($uploadWidth - ($v / $ratioY) )/2);
								$srcY = 0;
								$srcWidth = round($v / $ratioY);
								$srcHeight = $uploadHeight;
							} else { 
								$srcX = 0;
								$srcY = round( ($uploadHeight - ($v / $ratioX) )/2);
								$srcWidth = $uploadWidth;
								$srcHeight = round($v / $ratioX);
							}
							
							$dstImg = imagecreatetruecolor($v, $v);
							imagecopyresampled($dstImg, $srcImg, 0, 0, $srcX, $srcY, $newX, $newY, $srcWidth, $srcHeight);
							// -- try to write
							$write = imagejpeg($dstImg, $this->_name.'-'.$k.'.jpg', $qlt);
							imagedestroy($dstImg);
						break;
					
					default:
 
							if ($uploadWidth >= $uploadHeight) {
								
								if( $uploadWidth >= $v ) {
									$newX = $v;
									$newY = ($newX*$uploadHeight)/$uploadWidth;
								} else {									
									if($k == 'lrg'|| $k == 'thm') {
										$newX = $uploadWidth;
										$newY = $uploadHeight;
									} else {
										break;
									}
								}
								
							} else {
								if( $uploadHeight >= $v ) {
									$newY = $v;
									$newX = ($newY*$uploadWidth)/$uploadHeight;
								} else {
									if($k == 'lrg' || $k == 'thm') {
										$newX = $uploadWidth;
										$newY = $uploadHeight;
									} else {
										break;
									}
								}					
							}
						
							$dstImg = imagecreatetruecolor($newX, $newY);
							imagecopyresampled($dstImg, $srcImg, 0, 0, 0, 0, $newX, $newY, $uploadWidth, $uploadHeight);
							
							// -- try to write
							$write = imagejpeg($dstImg, $this->_name.'-'.$k.'.jpg', $qlt);
							$resultSize[$k] = 1;
							imagedestroy($dstImg);

						break;
					

				}								

				// -- clean up
				$resultImg['img'][$k]['height'] = $newY;
				$resultImg['img'][$k]['width'] = $newX; 

			}

			$resultImg['img']['img'] = basename($this->_name);
			

			
			if ( $write ) {
				$this->result = serialize($resultImg);
				//debug($write);
				/*
				if ( ($resultSize['md'] == 1 ) ) {
					$this->result = basename($this->_name).'-md';
				} else {
					$this->result = basename($this->_name).'-lrg';
				}
				*/
			} else {
				$this->error(__("Could not write file",true) );
				//$this->error("Could not write " . $this->_name . " to " . $this->_destination); original
			}
		}
		
		//----------------------------------------
		// -- return the extension of a file	
		function ext ($file) {
			$parts = pathinfo($file);
			$dir = $parts['dirname'];
			$ext = $parts['extension'];
			//$ext = trim(substr($file,strrpos($file,".")+1,strlen($file)));
			return $ext;
		}

		//----------------------------------------
		function uniqueName ($file) {
			$parts = pathinfo($file);
			$dir = $parts['dirname'];
			$ext = $parts['extension'];
			if ($ext) {
				$ext = '.'.$ext;
				$file = mt_rand(10000,99999).'-'.uniqid();
			}
			
			return $dir.DS.$file;
		}
		
		
		//---------------------------------
		function upload_error ($errorobj) {
			$error = false;
			switch ($errorobj) {
			   case UPLOAD_ERR_OK: break;
			   //case UPLOAD_ERR_INI_SIZE: $error = "The uploaded file exceeds the upload_max_filesize directive (".ini_get("upload_max_filesize").") in php.ini."; break;
			   case UPLOAD_ERR_INI_SIZE: $error = "Превышен максимально допустимый размер файла (".ini_get("upload_max_filesize").")"; break;			   
			   case UPLOAD_ERR_FORM_SIZE: $error = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form."; break;
			   case UPLOAD_ERR_PARTIAL: $error = "The uploaded file was only partially uploaded."; break;
			   case UPLOAD_ERR_NO_FILE: $error = "No file was uploaded."; break;
			   case UPLOAD_ERR_NO_TMP_DIR: $error = "Missing a temporary folder."; break;
			   case UPLOAD_ERR_CANT_WRITE: $error = "Failed to write file to disk"; break;
			   default: $error = "Unknown File Error";
			}
			return ($error);
		}
				
	}
	
?>