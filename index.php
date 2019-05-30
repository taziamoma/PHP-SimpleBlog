<?php
include_once("includes/config.php");


?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="images/style.css">
  <title>Simple Blog</title>
</head>
<body>

<div class="wrapper">
	<div class="container">
	    <div class="header"><h1><?php echo "Simple Blog"; ?></h1></div>
		<div class="article-wrap">
			<div class="article-left">
				<?php
				try {
					$stmt = $db->query('SELECT id, title, content, date FROM articles ORDER BY id DESC');
					while($row = $stmt->fetch()) { ?>
						<div class="article-block">
							<?php echo '<h2 class="title"><a href="viewpost.php?id='.$row['id'].'">'.$row['title']; ?></h2></a>
							<?php echo $article_content = $row['content']; ?></p>
							<?php echo '<p><a href="viewpost.php?id='.$row['id'].'">'; echo "Read More"; ?></a></p>
						</div>
						<?php }
				} catch(PDOException $e) {
					echo $e->getMessage();
				}
				?>
			</div>

			<div class="sidebar">
				Sidebar
				<ul>
					<li><a href="login.php">Login</a></li>
					<li><a href="register.php">Register</a></li>
				</ul>
			</div>
	</div>
</div>

</body>
</html>