<?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addGame'])) {
    $postData = [
        'image' => $_POST['gameimage'],
        'title' => $_POST['gametitle'],
        'category' => $_POST['gamecategory'],
        'developer' => $_POST['gamedeveloper']
    ];

    if (empty($postData['image']) || empty($postData['title']) || empty($postData['category']) || empty($postData['developer'])) {
        echo "Hibás adatok!";
    } else {
        $query = "INSERT INTO games (title, category, developer, image) VALUES (:title, :category, :developer, :image)";
        $params = [
            ':title' => $postData['title'],
            ':category' => $postData['category'],
            ':developer' => $postData['developer'],
            ':image' => $postData['image']
        ];
        
        require_once DATABASE_CONTROLLER;
        if (!executeDML($query, $params)) {
            echo "Hiba az adatbevitel során!";
        } header("Location: index.php");
    }
}
?>

<form method="post">
    <div class="form-row">
        <div class="form-group">
            <label for="gameImage">Image</label>
            <input type="file" class="form-control-file" id="gameImage" name="gameimage">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="gameTitle">Title</label>
            <input type="text" class="form-control" id="gameTitle" name="gametitle" value ="<?=isset($postData) ? $postData['gametitle'] : ""; ?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="gameCategory">Category</label>
            <input type="text" class="form-control" id="gameCategory" name="gamecategory" value ="<?=isset($postData) ? $postData['gamecategory'] : ""; ?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="gameDeveloper">Developer</label>
            <input type="text" class="form-control" id="gameDeveloper" name="gamedeveloper" value ="<?=isset($postData) ? $postData['gamedeveloper'] : ""; ?>">
        </div>
    </div>

    <button type="submit" class="btn btn-primary" name="addGame">Add game</button>
</form>