<?php 
	$arr = [];
	$arr[] = ["Propun Ker", "propun-ker", "https://movie-khmer.com/wp-content/uploads/propun-ker-210x136.jpg", 8, "https://movie-khmer.com/propun-ker/ :: https://movie-khmer.com/"];
	$arr[] = ["Jeur Kruteay", "jeur-kruteay", "https://movie-khmer.com/wp-content/uploads/jeur-kruteay-210x136.jpg", 8, "https://movie-khmer.com/jeur-kruteay/ :: https://movie-khmer.com/"];
	$arr[] = ["Propun Louch Leak", "propun-louch-leak", "https://movie-khmer.com/wp-content/uploads/propun-louch-leak-210x136.jpg", 8, "https://movie-khmer.com/propun-louch-leak/ :: https://movie-khmer.com/"];
	$arr[] = ["Tuk Mae Jea Avey", "tuk-mae-jea-avey", "https://movie-khmer.com/wp-content/uploads/tuk-mae-jea-avey-210x136.jpg", 8, "https://movie-khmer.com/tuk-mae-jea-avey/ :: https://movie-khmer.com/"];
	$arr[] = ["York Propun Khos", "york-propun-khos", "https://movie-khmer.com/wp-content/uploads/york-propun-khos-210x136.jpg", 8, "https://movie-khmer.com/york-propun-khos/ :: https://movie-khmer.com/"];
	$arr[] = ["Chey Krot 2018", "chey-krot-2018", "https://movie-khmer.com/wp-content/uploads/chey-krot-2018.jpg", 8, "https://movie-khmer.com/chey-krot-2018/ :: https://movie-khmer.com/"];
	$arr[] = ["Ov Kmek Rers Kon Brosar", "ov-kmek-rers-kon-brosar", "https://movie-khmer.com/wp-content/uploads/ov-kmek-rers-kon-brosar.jpg", 8, "https://movie-khmer.com/ov-kmek-rers-kon-brosar/ :: https://movie-khmer.com/"];
	$arr[] = ["Chantrea", "chantrea", "https://movie-khmer.com/wp-content/uploads/chantrea.jpg", 8, "https://movie-khmer.com/chantrea/ :: https://movie-khmer.com/"];
	$arr[] = ["Kmoach Asongha", "kmoach-asongha", "https://movie-khmer.com/wp-content/uploads/kmoach-asongha.jpg", 8, "https://movie-khmer.com/kmoach-asongha/ :: https://movie-khmer.com/"];
	$arr[] = ["Kon Brosar Ler Ker", "kon-brosar-ler-ker", "https://movie-khmer.com/wp-content/uploads/kon-brosar-ler-ker.jpg", 8, "https://movie-khmer.com/kon-brosar-ler-ker/ :: https://movie-khmer.com/"];
	$arr[] = ["Sbaek Kong", "sbaek-kong", "https://movie-khmer.com/wp-content/uploads/sbaek-kong.jpg", 8, "https://movie-khmer.com/sbaek-kong/ :: https://movie-khmer.com/"];
	$arr[] = ["Orn Ery Srey Orn", "orn-ery-srey-orn", "https://movie-khmer.com/wp-content/uploads/orn-ery-srey-orn.jpg", 8, "https://movie-khmer.com/orn-ery-srey-orn/ :: https://movie-khmer.com/"];
	$arr[] = ["Krolor Ey Neng", "krolor-ey-neng", "https://movie-khmer.com/wp-content/uploads/krolor-ey-neng.jpg", 8, "https://movie-khmer.com/krolor-ey-neng/ :: https://movie-khmer.com/"];
	$arr[] = ["Ajar 3 Sas", "ajar-3-sas", "https://movie-khmer.com/wp-content/uploads/ajar-3-sas.jpg", 8, "https://movie-khmer.com/ajar-3-sas/ :: https://movie-khmer.com/"];
	$arr[] = ["2 Brother", "2-brother", "https://movie-khmer.com/wp-content/uploads/2-brother.jpg", 8, "https://movie-khmer.com/2-brother/ :: https://movie-khmer.com/"];
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