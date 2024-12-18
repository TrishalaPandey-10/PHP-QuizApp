<?php 
session_start();
include "connection.php";
if (isset($_SESSION['id'])) {
$query = "SELECT * FROM questions";
$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
$total = mysqli_num_rows($run);
?>

<html>
	<head>
		<title>Kuiz-Mania</title>
		<link rel="stylesheet" type="text/css" href="css/home.css">
	</head>

	<body>
	<header>
        <div class="container">
            <h1 class="title">Kuiz-Mania</h1>
        </div>
    </header>

    <main>
        <div class="container">
            <h2>Welcome to PHP Kuiz!</h2>
            <p>This is a simple quiz game to test your knowledge!</p>
            <ul>
                <li><strong>Number of questions: </strong><?php echo $total; ?></li>
                <li><strong>Type: </strong>Multiple Choice</li>
                <li><strong>Estimated time for each question: </strong><?php echo $total * 0.05 * 60; ?> seconds</li>
                <li><strong>Score: </strong>+1 point for each correct answer</li>
            </ul>
            <div class="button-container">
                <a href="question.php?n=1" class="button start">Start Kuiz</a>
                <a href="exit.php" class="button exit">Exit</a>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            &copy; 2024 Kuiz-Mania | All Rights Reserved
        </div>
    </footer>

	</body>
</html>


<?php unset($_SESSION['score']); ?>
<?php }
else {
	header("location: index.php");
}
?>