<?php 
	$arr = [];
	$arr[] = ["Plerng Kumnum Reachny Puos [50ep]", "plerng-kumnum-reachny-puos", "https://movie-khmer.com/wp-content/uploads/plerng-kumnum-reachny-puos.jpg", 9, "https://movie-khmer.com/plerng-kumnum-reachny-puos/ :: https://movie-khmer.com/"];
	$arr[] = ["Ashoka II [49END]", "ashoka-ii", "https://movie-khmer.com/wp-content/uploads/ashoka-II.jpg", 9, "https://movie-khmer.com/ashoka-ii/ :: https://movie-khmer.com/"];
	$arr[] = ["Propun Pos II [112END]", "propun-pos-ii", "https://movie-khmer.com/wp-content/uploads/propun-pos-II.jpg", 9, "https://movie-khmer.com/propun-pos-ii/ :: https://movie-khmer.com/"];
	$arr[] = ["Bropun Pos [96END]", "bropun-pos", "https://movie-khmer.com/wp-content/uploads/bropun-pos.jpg", 9, "https://movie-khmer.com/bropun-pos/ :: https://movie-khmer.com/"];
	$arr[] = ["Teuk Phnek Pheakriyea [148ep]", "teuk-phnek-pheakriyea", "https://movie-khmer.com/wp-content/uploads/teuk-phnek-pheakriyea.jpg", 9, "https://movie-khmer.com/teuk-phnek-pheakriyea/ :: https://movie-khmer.com/"];
	$arr[] = ["Komhoeng Snae Knong Phup Ngor Nget [84END]", "komhoeng-snae-knong-phup-ngor-nget", "https://movie-khmer.com/wp-content/uploads/komhoeng-snae-knong-phup-ngor-nget.jpg", 9, "https://movie-khmer.com/komhoeng-snae-knong-phup-ngor-nget/ :: https://movie-khmer.com/"];
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