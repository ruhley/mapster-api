<?php

	namespace App\Controller\Component;

	use App\Controller\Component\AppComponent;

	class ImageComponent extends AppComponent {
		public function createThumbs($src) {
			$sizes = ['tiny' => 30, 'small' => 50, 'medium' => 100, 'large' => 200, 'massive' => 500];
			$fileInfo = pathinfo($src);

			foreach ($sizes as $size => $dimension) {
				$this->resizeImage($src, str_replace('.'.$fileInfo['extension'], '-'.$size.'.'.$fileInfo['extension'], $src), $dimension, $dimension);
			}
		}

		public function resizeImage($src, $dest, $newWidth, $newHeight, $forceDimensions = false) {
			$imageDetails = getimagesize($src);
			$original = array(
				'width' => $imageDetails[0],
				'height' => $imageDetails[1],
			);

			// get aspect ratio new width and height
			if ($forceDimensions) {
				$new = array(
					'width' => $newWidth,
					'height' => $newHeight
				);
			} else {
				if ($original['width'] > $original['height'])
				{
					$new = array(
						'width' => $newWidth,
						'height' => intval($original['height'] * $newWidth / $original['width'])
					);
				}
				else
				{
					$new = array(
						'width' => intval($original['width'] * $newHeight / $original['height']),
						'height' => $newHeight
					);
				}
			}


			$position = array(
				'x' => 0,
				'y' => 0
			);


			if ($imageDetails[2] == 1)
			{
				$imgt = 'ImageGIF';
				$imgcreatefrom = 'ImageCreateFromGIF';
			}
			else if ($imageDetails[2] == 2)
			{
				$imgt = 'ImageJPEG';
				$imgcreatefrom = 'ImageCreateFromJPEG';
			}
			else if ($imageDetails[2] == 3)
			{
				$imgt = 'ImagePNG';
				$imgcreatefrom = 'ImageCreateFromPNG';
			}

			if ($imgt) {
				$old_image = $imgcreatefrom($src);
				$new_image = imagecreatetruecolor($new['width'], $new['height']);

				switch ($imageDetails[2]) {
					case 1:
						// integer representation of the color black (rgb: 0,0,0)
						$background = imagecolorallocate($new_image, 0, 0, 0);
						// removing the black from the placeholder
						imagecolortransparent($simage, $background);

					break;
					case 3:
						// integer representation of the color black (rgb: 0,0,0)
						$background = imagecolorallocate($new_image, 0, 0, 0);
						// removing the black from the placeholder
						imagecolortransparent($new_image, $background);

						// turning off alpha blending (to ensure alpha channel information
						// is preserved, rather than removed (blending with the rest of the
						// image in the form of black))
						imagealphablending($new_image, false);

						// turning on alpha channel information saving (to ensure the full range
						// of transparency is preserved)
						imagesavealpha($new_image, true);

					break;

				}

				imagecopyresized($new_image, $old_image, $position['x'], $position['y'], 0, 0, $new['width'], $new['height'], $original['width'], $original['height']);
				$imgt($new_image, $dest);
			}
		}
	}

?>