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
		  *		@ path - string (where to upload to)
		  *		@ name [optional] - override saved filename
		  *		@ rules [optional] - how to handle file types
		  *			- rules['type'] = string ('resize','resizemin','resizecrop','crop')
		  *			- rules['size'] = array (x, y) or single number
		  *			- rules['output'] = string ('gif','png','jpg')
		  *			- rules['quality'] = integer (quality of output image)
		  *		@ allowed [optional] - allowed filetypes
		  *			- defaults to 'jpg','jpeg','gif','png'
		  *	ex:
		  * 	$upload = new upload($_FILES['MyFile'], 'uploads');
		  *
		  */
		
		function upload ($file, $destination, $org = false) {
			
			$this->result = false;
			$this->errors = false;
			
			// -- save parameters
			$this->_file = $file;

			$this->_destination = $destination;
			
			if (!is_null($rules)) {
				$this->_rules = $rules;
			}
			
			if (!is_null($allowed)) { 
				$this->_allowed = $allowed; 
			} else { 
				$this->_allowed = array('jpg','jpeg','gif','png','JPG','JPEG','GIF','PNG'); 
			}
			
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
				if(!in_array($this->ext($fileName),$this->_allowed)){
					$this->error( __("File type not allowed.",true) );
				} else { 
				
					// -- it's been uploaded with php
					if (is_uploaded_file($fileTmp)) {
						
						
						// -- how are we handling this file
						if ($rules == NULL) {
							// -- where to put the file?
							$output = $fileName;
							// -- just upload it
							if (move_uploaded_file($fileTmp, $output)) {
								chmod($output, 0644);
								$this->result = basename($this->_name);
							} else {
								$this->error(__("Could not move '$fileName' to '$destination'",true) );
							}
							
							
						} else {
							// -- gd lib check
							if (function_exists("imagecreatefromjpeg")) {
								
								
								if (!isset($rules['output'])) {
									$rules['output'] = NULL;
								}
								if (!isset($rules['quality'])) {
									$rules['quality'] = NULL;
								}
								
								
								
								
									$size = array('sq' => '100', 'thm' => array('100','75'), 'sml' => array('180','240'), 'md' => array('500','375'), 'lrg' => array('630','470') );							
									
									$this->image($this->_file, $size, $quality );
									
									
									
					
							} else {
								$this->error(__("GD library is not installed",true) );
							}
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

		// -- return the extension of a file	
		function ext ($file) {
			$ext = trim(substr($file,strrpos($file,".")+1,strlen($file)));
			return $ext;
		}
		
		// -- add a message to stack (for outside checking)
		function error ($message) {
			if (!is_array($this->errors)) $this->errors = array();
			array_push($this->errors, $message);
		}	
		
		
		
		
		//----------------------------------------
		function image ($file,  $size, $quality = NULL ) {
			//toDel
			if (is_null($output)) {
				$output = 'jpg';
			}
			

			if ( $quality = null ) {
				$quality = 75;
			}
			
	
			// -- get some information about the file
			$uploadSize = getimagesize($file['tmp_name']);
			$uploadWidth  = $uploadSize[0];
			$uploadHeight = $uploadSize[1];
			$uploadType = $uploadSize[2];
				if ($uploadType != 1 && $uploadType != 2 && $uploadType != 3) {
					$this->error (__("File type must be GIF, PNG, or JPG to resize",true) );
				}		
			switch ($uploadType) {
				case 1: $srcImg = imagecreatefromgif($file['tmp_name']); break;
				case 2: $srcImg = imagecreatefromjpeg($file['tmp_name']); break;
				case 3: $srcImg = imagecreatefrompng($file['tmp_name']); break;
				default: $this->error (__("File type must be GIF, PNG, or JPG to resize",true) );
			}
			
									
			foreach( $size as $k => $v ) {
				
			}
			
			
						
			switch ($type) {
			
				case 'resize':
					# Maintains the aspect ration of the image and makes sure that it fits
					# within the maxW and maxH (thus some side will be smaller)
					// -- determine new size
					if ($uploadWidth > $maxScale || $uploadHeight > $maxScale) {
						if ($uploadWidth > $uploadHeight) {
							$newX = $maxScale;
							$newY = ($uploadHeight*$newX)/$uploadWidth;
						} else if ($uploadWidth < $uploadHeight) {
							$newY = $maxScale;
							$newX = ($newY*$uploadWidth)/$uploadHeight;
						} else if ($uploadWidth == $uploadHeight) {
							$newX = $newY = $maxScale;
						}
					} else {
						$newX = $uploadWidth;
						$newY = $uploadHeight;
					}
					
					$dstImg = imagecreatetruecolor($newX, $newY);
					imagecopyresampled($dstImg, $srcImg, 0, 0, 0, 0, $newX, $newY, $uploadWidth, $uploadHeight);
					
					break;
					
				case 'resizemin':
					# Maintains aspect ratio but resizes the image so that once
					# one side meets its maxW or maxH condition, it stays at that size
					# (thus one side will be larger)
					#get ratios
					$ratioX = $maxW / $uploadWidth;
					$ratioY = $maxH / $uploadHeight;

					#figure out new dimensions
					if (($uploadWidth == $maxW) && ($uploadHeight == $maxH)) {
						$newX = $uploadWidth;
						$newY = $uploadHeight;
					} else if (($ratioX * $uploadHeight) > $maxH) {
						$newX = $maxW;
						$newY = ceil($ratioX * $uploadHeight);
					} else {
						$newX = ceil($ratioY * $uploadWidth);		
						$newY = $maxH;
					}

					$dstImg = imagecreatetruecolor($newX,$newY);
					imagecopyresampled($dstImg, $srcImg, 0, 0, 0, 0, $newX, $newY, $uploadWidth, $uploadHeight);
				
					break;
				
				case 'resizecrop':
					// -- resize to max, then crop to center
					$ratioX = $maxW / $uploadWidth;
					$ratioY = $maxH / $uploadHeight;

					if ($ratioX < $ratioY) { 
						$newX = round(($uploadWidth - ($maxW / $ratioY))/2);
						$newY = 0;
						$uploadWidth = round($maxW / $ratioY);
						$uploadHeight = $uploadHeight;
					} else { 
						$newX = 0;
						$newY = round(($uploadHeight - ($maxH / $ratioX))/2);
						$uploadWidth = $uploadWidth;
						$uploadHeight = round($maxH / $ratioX);
					}
					
					$dstImg = imagecreatetruecolor($maxW, $maxH);
					imagecopyresampled($dstImg, $srcImg, 0, 0, $newX, $newY, $maxW, $maxH, $uploadWidth, $uploadHeight);
					
					break;
				
				case 'crop':
					// -- a straight centered crop
					$startY = ($uploadHeight - $maxH)/2;
					$startX = ($uploadWidth - $maxW)/2;

					$dstImg = imageCreateTrueColor($maxW, $maxH);
					ImageCopyResampled($dstImg, $srcImg, 0, 0, $startX, $startY, $maxW, $maxH, $maxW, $maxH);
				
					break;
				
				default: $this->error ("Resize function \"$type\" does not exist");
			}	
		
			// -- try to write
			switch ($output) {
				case 'jpg':
					$write = imagejpeg($dstImg, $this->_name, $quality);
					break;
				case 'png':
					$write = imagepng($dstImg, $this->_name . ".png", $quality);
					break;
				case 'gif':
					$write = imagegif($dstImg, $this->_name . ".gif", $quality);
					break;
			}
			
			// -- clean up
			imagedestroy($dstImg);
			
			if ($write) {
				$this->result = basename($this->_name);
			} else {
				$this->error(__("Could not write file",true) );
				//$this->error("Could not write " . $this->_name . " to " . $this->_destination); original
			}
		}
		
		
		//----------------------------------------
		function newName ($file) {
			return time() . "." . $this->ext($file);
		}
		//----------------------------------------
		function uniqueName ($file) {
			$parts = pathinfo($file);
			$dir = $parts['dirname'];
			//$parts['basename']
			$ext = $parts['extension'];
			if ($ext) {
				$ext = '.'.$ext;
				$file = substr($file,0,-strlen($ext));
			}
			$i = 0;
			while (file_exists($dir.DS.$file.$i.$ext)) {
				$i++;
			}
			return $dir.DS.$file.$i.$ext;
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