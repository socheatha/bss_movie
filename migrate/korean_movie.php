<?php 
	$arr = [];
	$arr[] = ["Train To Busan", "train-to-busan", "https://movie-khmer.com/wp-content/uploads/train-to-busan-210x136.jpg", 4, "https://movie-khmer.com/train-to-busan/ :: https://movie-khmer.com/"];
	$arr[] = ["Kou Snae Kou Jivit [02END]", "kou-snae-kou-jivit", "https://movie-khmer.com/wp-content/uploads/kou-snae-kou-jivit.jpg", 4, "https://movie-khmer.com/kou-snae-kou-jivit/ :: https://movie-khmer.com/"];
	$arr[] = ["Dara Knong Duong Chet", "dara-knong-duong-chet", "https://movie-khmer.com/wp-content/uploads/dara-knong-duong-chet.jpg", 4, "https://movie-khmer.com/dara-knong-duong-chet/ :: https://movie-khmer.com/"];
	$arr[] = ["Baby And Me [END-SUB]", "baby-and-me", "https://movie-khmer.com/wp-content/uploads/baby-and-me.jpg", 4, "https://movie-khmer.com/baby-and-me/ :: https://movie-khmer.com/"];
?>
<?php
	// require_once '../autoload.api';
	foreach ($arr as $movie) {
		$name_en = $movie[0];
		$video_path = $movie[1];
		$thumbnail = $movie[2];
		$category_id = $movie[3];
		$keywords = "$video_path," . str_replace(['-', '_'], ',', $video_path);
		$description = str_replace('::', '<br/>This movie has been getted from website ', $movie[4]);

		$req = "INSERT INTO movies (name_en, name_kh, video_path, category_id, keywords, description, thumbnail) 
                VALUES ('" . $name_en . "', '" . $name_en . "', '" . $video_path . "', '" . $category_id . "', '" . $keywords . "', '" . $description . "', '" . $thumbnail . "')";
        if ($conn->query($req)) {
			echo '=============> yes <br/>';
		}
	}
?>