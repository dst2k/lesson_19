<?php
$action = $_GET['action'] ?? false;
if($action == 'send')
{

	
    $name = (string) $_POST['name'];
	$name = mysqli_real_escape_string($db, $name);
    $email = (string) $_POST['email'];
 	$email = mysqli_real_escape_string($db, $email);
    $subject = (string) $_POST['subject'];
    $subject = mysqli_real_escape_string($db, $subject);
    $message = (string) $_POST['message'];
    $message = mysqli_real_escape_string($db, $message);

    	if(mb_strlen($name) > 250 OR mb_strlen($name) <= 0)
          	die('Введите корректное имя');
        	elseif(mb_strlen($email) > 250 OR mb_strlen($email) <= 0)
          	die('Введите корректный email');
         	elseif(mb_strlen($message) <= 0)
          	die('Введите сообщение');

			else
			{
            $sql = "
            INSERT INTO `contact`
            (`name`, `email`, `subject`, `message`)
            VALUES ('{$name}', '{$email}', '{$subject}', '{$message}')
            ";
            $result = mysqli_query($db, $sql);
        }
}



render_header([
	'title' => 'Contact Us',
	'is_home' => false,
	'menu_active_item' => 'contact'
]);
?>
<!-- Main -->
<section id="main" class="container 75%">
	<header>
		<h2>Contact Us</h2>
		<p>Tell us what you think about our little operation.</p>
	</header>
	<div class="box">
		<form method="post" action="index.php?page=contact&action=send">
			<div class="row uniform 50%">
				<div class="6u 12u(mobilep)">
					<input type="text" name="name" id="name" value="" placeholder="Name" />
				</div>
				<div class="6u 12u(mobilep)">
					<input type="email" name="email" id="email" value="" placeholder="Email" />
				</div>
			</div>
			<div class="row uniform 50%">
				<div class="12u">
					<input type="text" name="subject" id="subject" value="" placeholder="Subject" />
				</div>
			</div>
			<div class="row uniform 50%">
				<div class="12u">
					<textarea name="message" id="message" placeholder="Enter your message" rows="6"></textarea>
				</div>
			</div>
			<div class="row uniform">
				<div class="12u">
					<ul class="actions align-center">
						<li><input type="submit" value="Send Message" /></li>
					</ul>
				</div>
			</div>
		</form>
	</div>
</section>

<?php
render_footer();
?>